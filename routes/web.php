<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\MemoryController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('diaries', DiaryController::class);
    Route::resource('memories', MemoryController::class);
    Route::resource('goals', GoalController::class);
    Route::post('goals/{goal}/toggle', [GoalController::class, 'toggleComplete'])->name('goals.toggleComplete');
    Route::patch('goals/{goal}/toggle', [GoalController::class, 'toggleComplete'])->name('goals.toggle');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
