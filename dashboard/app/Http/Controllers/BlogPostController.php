<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\SiteSetting;
use App\Services\GeminiBlogWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'posts' => BlogPost::latest()->paginate(12),
            'blogHeading' => $this->settingValue('blog_heading', 'Blog'),
            'blogIntro' => $this->settingValue('blog_intro', 'Notes and updates from Liba Digitals.'),
            'hasApiKey' => $this->apiKey() !== null,
        ]);
    }

    public function updatePage(Request $request)
    {
        $data = $request->validate([
            'blog_heading' => ['required', 'string', 'max:120'],
            'blog_intro' => ['nullable', 'string', 'max:500'],
        ]);

        $this->saveSetting('blog_heading', 'Blog page heading', $data['blog_heading'], 20);
        $this->saveSetting('blog_intro', 'Blog page introduction', $data['blog_intro'] ?? '', 21);

        return redirect()->route('blog.index')->with('status', 'Blog page updated on the site.');
    }

    public function generate(Request $request, GeminiBlogWriter $writer)
    {
        $data = $request->validate([
            'idea' => ['required', 'string', 'max:1000'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'in:draft,published'],
            'api_key' => ['nullable', 'string', 'max:300'],
        ]);

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
            $draft = $writer->write($data['idea'], $data['notes'] ?? null, $apiKey);
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
            'published_at' => $data['status'] === 'published' ? now() : null,
        ]);

        $message = $data['status'] === 'published'
            ? 'The post was written and published on the site. You can still edit it here.'
            : 'The post was written and saved as a draft.';

        return redirect()->route('blog.edit', $post)->with('status', $message);
    }

    public function create()
    {
        return view('blog.form', ['post' => new BlogPost(['status' => 'draft'])]);
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

        return redirect()->route('blog.index')->with('status', 'Blog post created.');
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

        if ($request->hasFile('cover_image')) {
            $this->deleteCover($post->cover_image);
            $data['cover_image'] = $this->storeCover($request);
        }

        $post->update($data);

        return redirect()->route('blog.edit', $post)->with('status', 'Blog post saved.');
    }

    public function destroy(BlogPost $post)
    {
        $this->deleteCover($post->cover_image);
        $post->delete();

        return redirect()->route('blog.index')->with('status', 'Blog post deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string', 'max:50000'],
            'status' => ['required', 'in:draft,published'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
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
        if (! $request->hasFile('cover_image')) {
            return null;
        }

        $directory = dirname(base_path()).DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.'blog';
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $extension = strtolower($request->file('cover_image')->getClientOriginalExtension());
        $filename = Str::uuid()->toString().'.'.$extension;
        $request->file('cover_image')->move($directory, $filename);

        return 'image/blog/'.$filename;
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
