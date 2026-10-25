<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactBoxController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

    Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
    Route::put('/blog/page', [BlogPostController::class, 'updatePage'])->name('blog.page');
    Route::post('/blog/generate', [BlogPostController::class, 'generate'])->name('blog.generate');
    Route::get('/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
    Route::get('/blog/{post}/edit', [BlogPostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{post}', [BlogPostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{post}', [BlogPostController::class, 'destroy'])->name('blog.destroy');
});
