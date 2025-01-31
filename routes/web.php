<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Home Route
Route::get('/', [ListingController::class, 'show_home'])->name('home');

// Job Crud Routes
Route::get('/jobs/index', [ListingController::class, 'index'])->name('index');
Route::get('/jobs/create', [ListingController::class, 'create'])->name('create');
Route::post('/jobs/store', [ListingController::class, 'store'])->name('store');
Route::get('/jobs/{id}/edit', [ListingController::class, 'edit'])->name('edit');
Route::put('/jobs/{id}/update', [ListingController::class, 'update'])->name('update');
Route::delete('/jobs/{id}', [ListingController::class, 'destroy'])->name('destroy');
Route::get('/job/{id}/show', [ListingController::class, 'show'])->name('show');

// Register Routes
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-user', [RegisterController::class, 'store'])->name('store.register');

// Login Routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/auth-user', [LoginController::class, 'authenticate'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
