@extends('layouts.admin')

@section('title', 'Contact boxes')
@section('heading', 'Contact boxes')

@section('content')
<p class="text-secondary">These details appear in the homepage contact cards, the contact page, and the footer. The wording you save here replaces the current public text.</p>
<div class="card shadow-sm border-0">
    <div class="card-body">
        <form method="POST" action="{{ route('contact-boxes.update') }}" class="row g-3">
            @csrf
            @method('PUT')
            @foreach ($settings as $setting)
                <div class="col-md-6">
                    <label class="form-label" for="setting-{{ $setting->setting_key }}">{{ $setting->label }}</label>
                    <input id="setting-{{ $setting->setting_key }}" name="values[{{ $setting->setting_key }}]" value="{{ old('values.'.$setting->setting_key, $setting->setting_value) }}" class="form-control @error('values.'.$setting->setting_key) is-invalid @enderror">
                    @error('values.'.$setting->setting_key)<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            @endforeach
            <div class="col-12">
                <button class="btn btn-brand" type="submit">Save contact boxes</button>
            </div>
        </form>
    </div>
</div>
@endsection
