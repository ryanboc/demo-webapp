<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Todo;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    // Delete todos older than 1 hour
    $deleted = Todo::where('created_at', '<', now()->subHour())->delete();
    
    // Optional: Log it so you can see it working in storage/logs/laravel.log
    if ($deleted > 0) {
        logger("Auto-Pruning: Deleted {$deleted} old tasks.");
    }
})->dailyAt('17:00')->timezone('Australia/Brisbane');