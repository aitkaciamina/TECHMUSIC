<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Track;

use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/tracks', [AdminController::class, 'store'])->name('admin.tracks.store');
Route::delete('/admin/tracks/{track}', [AdminController::class, 'destroy'])->name('admin.tracks.destroy');

Route::get('/', function () {
    // Fetch tracks alongside artist data from MariaDB
    $tracks = Track::with('artist')->latest()->get();
    
    // Inertia will find 'Home.jsx' inside your Pages folder and send the array as a prop
    return Inertia::render('Home', [
        'tracks' => $tracks
    ]);
});

/*
Route::get('/', function () {
    // TEMPORARY DEBUG LINE: See exactly what maximum size PHP is reporting to Laravel
    dd([
        'post_max_size' => ini_get('post_max_size'),
        'upload_max_filesize' => ini_get('upload_max_filesize')
    ]);

    $tracks = Track::with('artist')->latest()->get();
    return Inertia::render('Home', ['tracks' => $tracks]);
});*/