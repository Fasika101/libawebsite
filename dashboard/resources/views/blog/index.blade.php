@extends('layouts.admin')

@section('title', 'Blog posts')
@section('heading', 'Blog posts')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-lg-5">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h2 class="h5">Blog page</h2>
                <p class="text-secondary">This heading and introduction appear on the public blog.</p>
                <form method="POST" action="{{ route('blog.page') }}" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label class="form-label" for="blog_heading">Heading</label>
                        <input id="blog_heading" name="blog_heading" value="{{ old('blog_heading', $blogHeading) }}" class="form-control @error('blog_heading') is-invalid @enderror" required>
                        @error('blog_heading')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="blog_intro">Introduction</label>
                        <textarea id="blog_intro" name="blog_intro" rows="3" class="form-control @error('blog_intro') is-invalid @enderror">{{ old('blog_intro', $blogIntro) }}</textarea>
                        @error('blog_intro')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-brand" type="submit">Save blog page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h2 class="h5">Write a post from an idea</h2>
                <p class="text-secondary">Paste the Google Gemini API key once. After that, an idea is enough for a full post on the site.</p>
                <form method="POST" action="{{ route('blog.generate') }}" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label class="form-label" for="idea">Idea</label>
                        <textarea id="idea" name="idea" rows="3" class="form-control @error('idea') is-invalid @enderror" required placeholder="What the post should be about">{{ old('idea') }}</textarea>
                        @error('idea')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="notes">Extra direction</label>
                        <input id="notes" name="notes" value="{{ old('notes') }}" class="form-control @error('notes') is-invalid @enderror" placeholder="Optional. Audience, angle, or points to include.">
                        @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="generate-status">Status</label>
                        <select id="generate-status" name="status" class="form-select">
                            <option value="published" @selected(old('status', 'published') === 'published')>Publish on the site</option>
                            <option value="draft" @selected(old('status') === 'draft')>Save as draft</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label" for="api_key">Google Gemini API key</label>
                        <input id="api_key" name="api_key" type="password" autocomplete="off" class="form-control @error('api_key') is-invalid @enderror" placeholder="{{ $hasApiKey ? 'A key is saved. Paste a new one only to replace it.' : 'Paste the key from Google AI Studio' }}">
                        @error('api_key')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-brand" type="submit">Write the post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-secondary mb-0">Published posts appear on the website blog.</p>
    <a class="btn btn-outline-dark" href="{{ route('blog.create') }}">Write a post yourself</a>
</div>
<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr><th>Title</th><th>Status</th><th>Updated</th><th></th></tr>
            </thead>
            <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>
                        <div class="fw-semibold">{{ $post->title }}</div>
                        <div class="small text-secondary">/blog-post.php?slug={{ $post->slug }}</div>
                    </td>
                    <td><span class="badge text-bg-{{ $post->status === 'published' ? 'success' : 'secondary' }}">{{ $post->status }}</span></td>
                    <td>{{ $post->updated_at?->format('M j, Y') }}</td>
                    <td class="text-end text-nowrap">
                        @if ($post->status === 'published')
                            <a class="btn btn-sm btn-outline-secondary" target="_blank" rel="noopener" href="{{ config('liba.public_site_url') }}/blog-post.php?slug={{ $post->slug }}">View</a>
                        @endif
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('blog.edit', $post) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-secondary p-4">No posts yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $posts->links() }}</div>
@endsection
