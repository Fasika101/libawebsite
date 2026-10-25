@extends('layouts.admin')

@section('title', $contact->name)
@section('heading', 'Contact message')

@section('content')
<div class="mb-3"><a href="{{ route('contacts.index') }}">&larr; Back to inbox</a></div>
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="h4">{{ $contact->subject ?: 'No subject' }}</h2>
                <p class="text-secondary mb-4">{{ $contact->created_at?->format('M j, Y \a\t H:i') }}</p>
                <dl class="row mb-4">
                    <dt class="col-sm-3">Name</dt><dd class="col-sm-9">{{ $contact->name }}</dd>
                    <dt class="col-sm-3">Email</dt><dd class="col-sm-9"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></dd>
                    <dt class="col-sm-3">Phone</dt><dd class="col-sm-9">{{ $contact->phone ?: '—' }}</dd>
                </dl>
                <h3 class="h6">Message</h3>
                <p class="mb-0" style="white-space: pre-wrap;">{{ $contact->message }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form method="POST" action="{{ route('contacts.update', $contact) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="form-select">
                            @foreach (['new', 'read', 'replied', 'archived'] as $option)
                                <option value="{{ $option }}" @selected(old('status', $contact->status) === $option)>{{ ucfirst($option) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="admin_notes">Internal notes</label>
                        <textarea id="admin_notes" name="admin_notes" rows="6" class="form-control">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                    </div>
                    <button class="btn btn-brand" type="submit">Save</button>
                </form>
                <form method="POST" action="{{ route('contacts.destroy', $contact) }}" class="mt-3" onsubmit="return confirm('Delete this message?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit">Delete message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
