<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Home;
use App\Livewire\MovieDetails;
use App\Livewire\SerendipityPage;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::post('/chat', [ChatController::class, 'chat']);



require __DIR__ . '/auth.php';
