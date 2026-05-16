<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Track;

class MusicDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. First Artist
        $artist1 = Artist::create([
            'name' => 'Daft Punk', 
            'bio' => 'German folksong.',
            'image_path' => '/images/55.jpg' 
        ]);

        Track::create([
            'title' => '55 Days at ', 
            'audio_path' => '/audio/55tagen.mp4', 
            'duration_seconds' => 240, 
            'artist_id' => $artist1->id,
        ]);

        // 2. Second Artist
        $artist2 = Artist::create([
            'name' => 'alan_walker', 
            'bio' => 'artist.',
            'image_path' => '/images/Poland.jpg'
        ]);

        Track::create([
            'title' => 'Faded', 
            'audio_path' => '/audio/faded.mp4', 
            'duration_seconds' => 180,
            'artist_id' => $artist2->id,
        ]);
    }
}