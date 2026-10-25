@extends('layouts.admin')

@section('title', $post->exists ? 'Edit post' : 'New post')
@section('heading', $post->exists ? 'Edit post' : 'New post')

@section('content')
<div class="mb-3"><a href="{{ route('blog.index') }}">&larr; All posts</a></div>
<div class="card shadow-sm border-0">
    <div class="card-body">
        <form method="POST" action="{{ $post->exists ? route('blog.update', $post) : route('blog.store') }}" enctype="multipart/form-data" class="row g-3">
            @csrf
            @if ($post->exists) @method('PUT') @endif
            <div class="col-md-8">
                <label class="form-label" for="title">Title</label>
                <input id="title" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4">
                <label class="form-label" for="status">Status</label>
                <select id="status" name="status" class="form-select">
                    <option value="draft" @selected(old('status', $post->status) === 'draft')>Draft</option>
                    <option value="published" @selected(old('status', $post->status) === 'published')>Published</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label" for="excerpt">Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="2" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Short summary. Leave blank to generate one from the post.">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label" for="body">Post</label>
                <textarea id="body" name="body" rows="14" class="form-control @error('body') is-invalid @enderror" required>{{ old('body', $post->body) }}</textarea>
                @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="cover_image">Cover image</label>
                <input id="cover_image" name="cover_image" type="file" accept="image/jpeg,image/png,image/webp" class="form-control @error('cover_image') is-invalid @enderror">
                @error('cover_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                <div class="form-text">JPG, PNG, or WebP. Up to 3 MB.</div>
            </div>
            @if ($post->cover_image)
                <div class="col-md-6">
                    <img src="{{ config('liba.public_site_url') }}/{{ $post->cover_image }}" alt="" class="img-fluid rounded mb-2" style="max-height: 140px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remove_cover" value="1" id="remove_cover">
                        <label class="form-check-label" for="remove_cover">Remove current image</label>
                    </div>
                </div>
            @endif
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-brand" type="submit">{{ $post->exists ? 'Save post' : 'Create post' }}</button>
            </div>
        </form>
        @if ($post->exists)
            <form method="POST" action="{{ route('blog.destroy', $post) }}" class="mt-3" onsubmit="return confirm('Delete this post?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm" type="submit">Delete post</button>
            </form>
        @endif
    </div>
</div>
@endsection
