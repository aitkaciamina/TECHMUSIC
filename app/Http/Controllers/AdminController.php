<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Artist;
use Inertia\Inertia;

class AdminController extends Controller
{
    // Render the Admin Panel with a list of all current tracks
    public function index()
    {
        return Inertia::render('Admin', [
            'tracks' => Track::with('artist')->get()
        ]);
    }

    // Process file uploads and save them into the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist_name' => 'required|string|max:255',
            'audio' => 'required|file|mimes:mp3,mp4,wav,mpeg',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5000',
        ]);

        // 1. Find the artist by name, or create a new row if they don't exist
        $artist = Artist::firstOrCreate(
            ['name' => $request->artist_name],
            ['bio' => 'Artist registered via admin dashboard.']
        );

        // 2. Handle Image Upload (Saves straight to public/images/)
        $imageFile = $request->file('image');
        $imageName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path('images'), $imageName);
        
        // Synchronize artist row with the new image link
        $artist->update(['image_path' => '/images/' . $imageName]);

        // 3. Handle Audio Upload (Saves straight to public/audio/)
        $audioFile = $request->file('audio');
        $audioName = time() . '_' . $audioFile->getClientOriginalName();
        $audioFile->move(public_path('audio'), $audioName);

        // 4. Create Track entry linked to the Artist
        Track::create([
            'title' => $request->title,
            'audio_path' => '/audio/' . $audioName,
            'duration_seconds' => 180, // Fallback default length
            'artist_id' => $artist->id,
        ]);

        return redirect()->back();
    }

    // Safely remove a track from the system
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->back();
    }
}