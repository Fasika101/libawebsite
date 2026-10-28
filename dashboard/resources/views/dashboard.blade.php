@extends('layouts.admin')

@section('title', 'Overview')
@section('heading', 'Overview')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body">
                <div class="text-secondary small">New messages</div>
                <div class="display-6">{{ $newContacts }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body">
                <div class="text-secondary small">All messages</div>
                <div class="display-6">{{ $totalContacts }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body">
                <div class="text-secondary small">Published posts</div>
                <div class="display-6">{{ $publishedPosts }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body">
                <div class="text-secondary small">Drafts</div>
                <div class="display-6">{{ $draftPosts }}</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <strong>Recent contact messages</strong>
                <a href="{{ route('contacts.index') }}">View all</a>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead><tr><th>Name</th><th>Subject</th><th>Status</th><th></th></tr></thead>
                    <tbody>
                    @forelse ($recentContacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->subject ?: '—' }}</td>
                            <td><span class="badge text-bg-{{ $contact->status === 'new' ? 'success' : 'secondary' }}">{{ $contact->status }}</span></td>
                            <td class="text-end"><a href="{{ route('contacts.show', $contact) }}">Open</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-secondary">No messages yet.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <strong>Recent posts</strong>
                <a href="{{ route('blog.channel', 'main') }}">Main blog</a>
            </div>
            <ul class="list-group list-group-flush">
                @forelse ($recentPosts as $post)
                    <li class="list-group-item d-flex justify-content-between gap-3">
                        <a href="{{ route('blog.edit', $post) }}">{{ $post->title }}</a>
                        <span class="badge text-bg-light">{{ $post->channel === 'travel' ? 'Travel' : 'Main' }} · {{ $post->status }}</span>
                    </li>
                @empty
                    <li class="list-group-item text-secondary">No blog posts yet.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
