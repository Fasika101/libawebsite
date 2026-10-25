<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ContactSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'newContacts' => ContactSubmission::where('status', 'new')->count(),
            'totalContacts' => ContactSubmission::count(),
            'publishedPosts' => BlogPost::published()->count(),
            'draftPosts' => BlogPost::where('status', 'draft')->count(),
            'recentContacts' => ContactSubmission::latest()->limit(6)->get(),
            'recentPosts' => BlogPost::latest()->limit(5)->get(),
        ]);
    }
}
