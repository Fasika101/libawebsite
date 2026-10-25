<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->string('status')->toString();
        $allowed = ['new', 'read', 'replied', 'archived'];

        $contacts = ContactSubmission::query()
            ->when(in_array($status, $allowed, true), fn ($query) => $query->where('status', $status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('contacts.index', [
            'contacts' => $contacts,
            'status' => $status,
            'counts' => [
                'all' => ContactSubmission::count(),
                'new' => ContactSubmission::where('status', 'new')->count(),
                'read' => ContactSubmission::where('status', 'read')->count(),
                'replied' => ContactSubmission::where('status', 'replied')->count(),
                'archived' => ContactSubmission::where('status', 'archived')->count(),
            ],
        ]);
    }

    public function show(ContactSubmission $contact)
    {
        if ($contact->status === 'new') {
            $contact->update(['status' => 'read']);
        }

        return view('contacts.show', ['contact' => $contact]);
    }

    public function update(Request $request, ContactSubmission $contact)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,read,replied,archived'],
            'admin_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $contact->update($data);

        return redirect()
            ->route('contacts.show', $contact)
            ->with('status', 'Contact updated.');
    }

    public function destroy(ContactSubmission $contact)
    {
        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with('status', 'Contact removed.');
    }
}
