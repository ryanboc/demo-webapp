<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdamamController;
use App\Http\Controllers\HomelabController;
use App\Http\Controllers\ServerAutomationController;

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
Route::post('/test-nutrition', [EdamamController::class, 'analyze'])->name('nutrition.analyze')->middleware('throttle:5,1');

//Homelab Routes
Route::get('/homelab',[HomelabController::class,'index'])->name('homelab.index');

//Server Automation Routes
Route::get('/server-automation',[ServerAutomationController::class,'index'])->name('serverautomation.index');

require __DIR__.'/auth.php';
