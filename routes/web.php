<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Home;
use App\Livewire\MovieDetails;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', Home::class)
    ->middleware(['web', 'api.auth'])
    ->name('dashboard');

Route::middleware(['web', 'api.auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('movie/details', MovieDetails::class)->name('movie.details');
});

// Route::middleware('api.auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::get('movie/details', MovieDetails::class)->name('movie.details');
// });

require __DIR__ . '/auth.php';
