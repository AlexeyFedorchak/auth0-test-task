<?php

use App\Http\Controllers\{
    CountryController,
    ProfileController
};
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('countries')
        : redirect()->route('main.login');
});

Route::get('/auth/login', function () {
    return Inertia::render('Auth');
})->name('main.login');

Route::middleware('auth')->group(function () {
    Route::get('/countries', [CountryController::class, 'index'])->name('countries');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


