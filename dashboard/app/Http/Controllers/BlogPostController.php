<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\SiteSetting;
use App\Services\GeminiBlogWriter;
use App\Support\UploadedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index(?string $channel = null)
    {
        $channel = $this->channel($channel);

        return view('blog.index', [
            'posts' => BlogPost::where('channel', $channel)->latest()->paginate(12),
            'channel' => $channel,
            'pageHeading' => $channel === 'travel'
                ? $this->settingValue('travel_blog_heading', 'Travel notes')
                : $this->settingValue('blog_heading', 'Blog'),
            'pageIntro' => $channel === 'travel'
                ? $this->settingValue('travel_blog_intro', 'Flight, hotel, and travel notes from Liba Travel in Addis Ababa.')
                : $this->settingValue('blog_intro', 'Notes and updates from Liba Digitals.'),
            'hasApiKey' => $this->apiKey() !== null,
        ]);
    }

    public function updatePage(Request $request, ?string $channel = null)
    {
        $channel = $this->channel($channel);

        if ($channel === 'travel') {
            $data = $request->validate([
                'page_heading' => ['required', 'string', 'max:120'],
                'page_intro' => ['nullable', 'string', 'max:500'],
            ]);
            $this->saveSetting('travel_blog_heading', 'Travel blog heading', $data['page_heading'], 22);
            $this->saveSetting('travel_blog_intro', 'Travel blog introduction', $data['page_intro'] ?? '', 23);
        } else {
            $data = $request->validate([
                'page_heading' => ['required', 'string', 'max:120'],
                'page_intro' => ['nullable', 'string', 'max:500'],
            ]);
            $this->saveSetting('blog_heading', 'Blog page heading', $data['page_heading'], 20);
            $this->saveSetting('blog_intro', 'Blog page introduction', $data['page_intro'] ?? '', 21);
        }

        return redirect()->route('blog.channel', $channel)->with('status', 'Blog page updated.');
    }

    public function generate(Request $request, GeminiBlogWriter $writer, ?string $channel = null)
    {
        $channel = $this->channel($channel);

        $data = $request->validate([
            'idea' => ['required', 'string', 'max:1000'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'in:draft,published'],
            'api_key' => ['nullable', 'string', 'max:300'],
        ]);
        $data['channel'] = $channel;

        if ($request->filled('api_key')) {
            $this->saveSetting('gemini_api_key', 'Google Gemini API key', Crypt::encryptString(trim($data['api_key'])), 30);
            $apiKey = trim($data['api_key']);
        } else {
            $apiKey = $this->apiKey();
        }

        if (! $apiKey) {
            return back()
                ->withInput($request->except('api_key'))
                ->with('error', 'Add your Google Gemini API key before writing a post.');
        }

        try {
            $draft = $writer->write($data['idea'], $data['notes'] ?? null, $apiKey, $data['channel']);
        } catch (\Throwable $e) {
            return back()
                ->withInput($request->except('api_key'))
                ->with('error', $e->getMessage());
        }

        $post = BlogPost::create([
            'title' => $draft['title'],
            'slug' => $this->uniqueSlug($draft['title']),
            'excerpt' => $this->excerpt($draft['excerpt'], $draft['body']),
            'body' => $draft['body'],
            'status' => $data['status'],
            'channel' => $data['channel'],
            'published_at' => $data['status'] === 'published' ? now() : null,
        ]);

        $place = $data['channel'] === 'travel' ? 'Liba Travel' : 'the main site';
        $message = $data['status'] === 'published'
            ? "The post was written and published on {$place}. You can still edit it here."
            : 'The post was written and saved as a draft.';

        return redirect()->route('blog.edit', $post)->with('status', $message);
    }

    public function create(?string $channel = null)
    {
        $channel = $this->channel($channel);

        return view('blog.form', ['post' => new BlogPost(['status' => 'draft', 'channel' => $channel])]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        unset($data['cover_image']);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['excerpt'] = $this->excerpt($data['excerpt'] ?? null, $data['body']);
        $data['published_at'] = $data['status'] === 'published' ? now() : null;
        $data['cover_image'] = $this->storeCover($request);

        BlogPost::create($data);

        return redirect()->route('blog.channel', $data['channel'])->with('status', 'Blog post created.');
    }

    public function edit(BlogPost $post)
    {
        return view('blog.form', ['post' => $post]);
    }

    public function update(Request $request, BlogPost $post)
    {
        $data = $this->validated($request);
        unset($data['cover_image']);
        $data['slug'] = $this->uniqueSlug($data['title'], $post->id);
        $data['excerpt'] = $this->excerpt($data['excerpt'] ?? null, $data['body']);

        if ($data['status'] === 'published' && ! $post->published_at) {
            $data['published_at'] = now();
        }

        if ($data['status'] === 'draft') {
            $data['published_at'] = null;
        }

        if ($request->boolean('remove_cover')) {
            $this->deleteCover($post->cover_image);
            $data['cover_image'] = null;
        }

        $cover = $this->storeCover($request);
        if ($cover !== null) {
            $this->deleteCover($post->cover_image);
            $data['cover_image'] = $cover;
        }

        $post->update($data);

        return redirect()->route('blog.edit', $post)->with('status', 'Blog post saved.');
    }

    public function destroy(BlogPost $post)
    {
        $this->deleteCover($post->cover_image);
        $post->delete();

        return redirect()->route('blog.channel', $post->channel ?: 'main')->with('status', 'Blog post deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string', 'max:50000'],
            'status' => ['required', 'in:draft,published'],
            'channel' => ['required', 'in:main,travel'],
            'cover_image' => UploadedImage::rules(),
        ]);
    }

    private function excerpt(?string $excerpt, string $body): string
    {
        $excerpt = trim((string) $excerpt);
        if ($excerpt !== '') {
            return $excerpt;
        }

        return Str::limit(trim(preg_replace('/\s+/', ' ', $body)), 180);
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'post';
        $slug = $base;
        $suffix = 2;

        while (BlogPost::where('slug', $slug)->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    private function storeCover(Request $request): ?string
    {
        if (! $request->hasFile('cover_image') && ! $request->filled('cover_image_data')) {
            return null;
        }

        $directory = dirname(base_path()).DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.'blog';
        $filename = UploadedImage::storeRequest($request, 'cover_image', $directory);
        if ($filename === null) {
            return null;
        }

        return 'image/blog/'.$filename;
    }

    private function channel(?string $channel): string
    {
        return $channel === 'travel' ? 'travel' : 'main';
    }

    private function settingValue(string $key, string $default): string
    {
        $value = SiteSetting::where('setting_key', $key)->value('setting_value');

        return ($value === null || $value === '') ? $default : $value;
    }

    private function saveSetting(string $key, string $label, string $value, int $order): void
    {
        SiteSetting::updateOrCreate(
            ['setting_key' => $key],
            ['label' => $label, 'setting_value' => $value, 'sort_order' => $order]
        );
    }

    private function apiKey(): ?string
    {
        $value = SiteSetting::where('setting_key', 'gemini_api_key')->value('setting_value');
        if (! $value) {
            return null;
        }

        try {
            $key = Crypt::decryptString($value);
        } catch (\Throwable) {
            return null;
        }

        return $key !== '' ? $key : null;
    }

    private function deleteCover(?string $path): void
    {
        if (! $path || ! str_starts_with($path, 'image/blog/')) {
            return;
        }

        $fullPath = dirname(base_path()).DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $path);
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}
