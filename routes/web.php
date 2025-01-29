<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [ListingController::class, 'show_home']);

Route::get('/test', function () {
    return "Hello World!";
});

Route::match(['get', 'post'], '/submit', function () {
    return "Submitted!";
});

Route::get('/test-api', function () {

    // return JSON Data
    return [
        'Nome' => 'Tommaso',
        'Cognome' => 'Venza',
    ];
});

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
