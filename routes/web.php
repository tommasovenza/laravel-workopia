<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BookmarkController;

// Home Route
Route::get('/', [JobController::class, 'show_home'])->name('home');
Route::get('/jobs/index', [JobController::class, 'index'])->name('index');
Route::get('/jobs/{job}/show', [JobController::class, 'show'])->name('show');

// Auth Middleware
Route::middleware('auth')->group(function () {
    // Auth Job Crud Routes
    Route::get('/job/create', [JobController::class, 'create'])->name('create');
    Route::post('/job/store', [JobController::class, 'store'])->name('store');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('edit');
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('destroy');
    Route::get('/saved-jobs', [JobController::class, 'showSavedJobs'])->name('saved-jobs');

    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index');
    Route::put('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    // Bookmark Store Route
    Route::post('/bookmark/store/{job}', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/bookmark/delete/{job}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
});

// Register Routes
Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register-user', [RegisterController::class, 'store'])->name('store.register')->middleware('guest');

// Login Routes
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/auth-user', [LoginController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Job Application's Routes
Route::post('/applicant-store/{job}', [ApplicantController::class, 'store'])->name('applicant.store')->middleware('auth');
Route::delete('/applicant-delete/{applicant}', [ApplicantController::class, 'destroy'])->name('applicant.destroy')->middleware('auth');

// Test Route
Route::get('/test', [TestController::class, 'test']);
