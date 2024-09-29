<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Url-shortener
    Route::get('/dashboard', [UrlController::class, 'dashboard'])->name('urls.dashboard');
    Route::delete('/delete-urls', [UrlController::class, 'destroy'])->name('urls.destroy');
});

// Url-shortener
Route::get('/', [UrlController::class, 'index'])->name('dashboard');
Route::post('/urls', [UrlController::class, 'store'])->name('urls.store'); // Create new short Link
Route::get('/{shortCode}', [UrlController::class, 'show'])->name('urls.show'); // Redirect to long Link
