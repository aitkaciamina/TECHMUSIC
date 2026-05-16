<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('tracks', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Song title
        $table->string('audio_path'); // Path to the actual storage MP3 file
        $table->integer('duration_seconds')->default(0); // For the audio player timeline
        
        // Relationships
        $table->foreignId('artist_id')->constrained()->onDelete('cascade'); // Must have an artist
        $table->foreignId('album_id')->nullable()->constrained()->onDelete('set null'); // Optional album
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
