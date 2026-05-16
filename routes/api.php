<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TrackController;

// This defines the network path: http://127.0.0.1:8000/api/tracks
Route::get('/tracks', [TrackController::class, 'index']);

