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
    Schema::create('artists', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Artist name (e.g., Daft Punk)
        $table->text('bio')->nullable(); // Biography description
        $table->string('image_path')->nullable(); // Profile picture filename
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
