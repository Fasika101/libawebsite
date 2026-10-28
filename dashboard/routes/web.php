<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BrandingController;
use App\Http\Controllers\ContactBoxController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
    Route::put('/contacts/{contact}', [ContactSubmissionController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');

    Route::get('/contact-boxes', [ContactBoxController::class, 'edit'])->name('contact-boxes.edit');
    Route::put('/contact-boxes', [ContactBoxController::class, 'update'])->name('contact-boxes.update');

    Route::redirect('/blog', '/blog/main');
    Route::get('/blog/{channel}', [BlogPostController::class, 'index'])->whereIn('channel', ['main', 'travel'])->name('blog.channel');
    Route::put('/blog/{channel}/page', [BlogPostController::class, 'updatePage'])->whereIn('channel', ['main', 'travel'])->name('blog.page');
    Route::post('/blog/{channel}/generate', [BlogPostController::class, 'generate'])->whereIn('channel', ['main', 'travel'])->name('blog.generate');
    Route::get('/blog/{channel}/create', [BlogPostController::class, 'create'])->whereIn('channel', ['main', 'travel'])->name('blog.create');

    Route::get('/visitors', [VisitController::class, 'index'])->name('visits.index');
    Route::delete('/visitors', [VisitController::class, 'destroy'])->name('visits.destroy');

    Route::get('/branding', [BrandingController::class, 'edit'])->name('branding.edit');
    Route::post('/branding', [BrandingController::class, 'update'])->name('branding.update');
    Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
    Route::get('/blog/{post}/edit', [BlogPostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{post}', [BlogPostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{post}', [BlogPostController::class, 'destroy'])->name('blog.destroy');
});
