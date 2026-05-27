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
        Schema::create('spotify_tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spotify_album_id')->constrained('spotify_albums')->onDelete('restrict');
            $table->string('title');
            $table->string('artist')->nullable();
            $table->string('spotify_url');
            $table->string('spotify_embed_url')->nullable();
            $table->string('duration')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spotify_tracks');
    }
};
