@extends('layouts.admin')

@section('title', 'Contact inbox')
@section('heading', 'Contact inbox')

@section('content')
<div class="d-flex flex-wrap gap-2 mb-3">
    @foreach (['' => 'All', 'new' => 'New', 'read' => 'Read', 'replied' => 'Replied', 'archived' => 'Archived'] as $key => $label)
        <a class="btn btn-sm {{ $status === $key ? 'btn-brand' : 'btn-outline-secondary' }}" href="{{ route('contacts.index', $key ? ['status' => $key] : []) }}">
            {{ $label }}
            <span class="badge text-bg-light">{{ $counts[$key === '' ? 'all' : $key] }}</span>
        </a>
    @endforeach
</div>

<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Received</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td class="text-nowrap">{{ $contact->created_at?->format('M j, Y H:i') }}</td>
                    <td>{{ $contact->name }}</td>
                    <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                    <td>{{ $contact->subject ?: '—' }}</td>
                    <td><span class="badge text-bg-{{ $contact->status === 'new' ? 'success' : 'secondary' }}">{{ $contact->status }}</span></td>
                    <td class="text-end"><a class="btn btn-sm btn-outline-dark" href="{{ route('contacts.show', $contact) }}">Open</a></td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-secondary p-4">No contact messages in this view.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $contacts->links() }}</div>
@endsection
