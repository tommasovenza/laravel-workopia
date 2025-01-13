<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

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

// Index Route 
Route::get("/jobs/index", [ListingController::class, "index"])->name("index");
Route::get('/jobs/create', [ListingController::class, "create"])->name("create");
Route::post('/jobs/store', [ListingController::class, "store"])->name("store");
Route::get('/job/{id}/show', [ListingController::class, "show"])->name("show");
