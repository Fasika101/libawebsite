@extends('layouts.admin')

@section('title', 'Visitors')
@section('heading', 'Visitors')

@section('content')
<p class="text-secondary">Each row is a visit to the main site or Liba Travel. Times are shown in Addis Ababa.</p>
<form method="POST" action="{{ route('visits.destroy') }}" onsubmit="return confirm('Delete the selected visits?');">
    @csrf
    @method('DELETE')
    @error('ids')<div class="alert alert-danger">Select at least one visit to delete.</div>@enderror
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-secondary">{{ $visits->total() }} saved {{ $visits->total() === 1 ? 'visit' : 'visits' }}</span>
        <button class="btn btn-outline-danger btn-sm" type="submit">Delete selected</button>
    </div>
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 2.5rem;"><input class="form-check-input" type="checkbox" id="select-all" aria-label="Select all visits on this page"></th>
                        <th>From</th>
                        <th>IP address</th>
                        <th>Page</th>
                        <th>Date and time</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($visits as $visit)
                    <tr>
                        <td><input class="form-check-input visit-check" type="checkbox" name="ids[]" value="{{ $visit->id }}" aria-label="Select visit {{ $visit->id }}"></td>
                        <td>
                            <span class="d-inline-flex align-items-center gap-2">
                                @if ($visit->country_code)
                                    <img src="https://flagcdn.com/24x18/{{ strtolower($visit->country_code) }}.png" width="24" height="18" alt="">
                                @endif
                                <span>{{ $visit->country_name ?: 'Unknown' }}</span>
                            </span>
                        </td>
                        <td class="font-monospace">{{ $visit->ip }}</td>
                        <td>
                            <div>{{ $visit->page }}</div>
                            <div class="small text-secondary">{{ $visit->site === 'travel' ? 'Liba Travel' : 'Main site' }}</div>
                        </td>
                        <td>{{ $visit->created_at?->timezone('Africa/Addis_Ababa')->format('M j, Y g:i A') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-secondary p-4">No visits yet.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</form>
<div class="mt-3">{{ $visits->links() }}</div>
<script>
    document.getElementById('select-all')?.addEventListener('change', function () {
        document.querySelectorAll('.visit-check').forEach(function (box) {
            box.checked = this.checked;
        }, this);
    });
</script>
@endsection
