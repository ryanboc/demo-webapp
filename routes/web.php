<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdamamController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Edamam Nutrition Test Routes
Route::get('/test-nutrition', [EdamamController::class, 'showForm'])->name('nutrition.form');
Route::post('/test-nutrition', [EdamamController::class, 'analyze'])->name('nutrition.analyze');

require __DIR__.'/auth.php';
