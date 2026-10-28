@extends('layouts.admin')

@section('title', 'Logo and favicon')
@section('heading', 'Logo and favicon')

@section('content')
<p class="text-secondary">Upload a replacement for the main site or Liba Travel. Leave a field empty to keep the image that is already live.</p>
<form method="POST" action="{{ route('branding.update') }}" enctype="multipart/form-data" class="row g-4">
    @csrf
    @foreach (['Main site', 'Liba Travel'] as $group)
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h2 class="h5 mb-3">{{ $group }}</h2>
                    @foreach ($assets as $key => $asset)
                        @continue($asset['group'] !== $group)
                        <div class="mb-4">
                            <label class="form-label" for="{{ $key }}">{{ $asset['label'] }}</label>
                            <div class="mb-2 p-3 bg-light rounded d-inline-block">
                                <img src="{{ $asset['preview'] }}" alt="" style="max-height: 64px; max-width: 180px;">
                            </div>
                            <input id="{{ $key }}" name="{{ $key }}" type="file" accept="image/*{{ str_contains($key, 'favicon') ? ',.ico' : '' }}" class="form-control @error($key) is-invalid @enderror">
                            @error($key)<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div class="form-text">{{ $asset['hint'] }} JPG, PNG, GIF, or WebP. Up to 8 MB.</div>
                            @if ($asset['custom'])
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="restore[{{ $key }}]" value="{{ $key }}" id="restore-{{ $key }}">
                                    <label class="form-check-label" for="restore-{{ $key }}">Restore the original image</label>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-12">
        <button class="btn btn-brand" type="submit">Save images</button>
    </div>
</form>
@endsection
