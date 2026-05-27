<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotifyTrack extends Model
{
    protected $table = 'spotify_tracks';

    protected $fillable = [
        'spotify_album_id',
        'title',
        'artist',
        'spotify_url',
        'spotify_embed_url',
        'duration',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Relasi: track milik satu album
     */
    public function album()
    {
        return $this->belongsTo(SpotifyAlbum::class, 'spotify_album_id');
    }

    /**
     * Scope: hanya track yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: urutkan berdasarkan display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }

    /**
     * Generate Spotify embed URL dari URL biasa
     * Mendukung format:
     * - https://open.spotify.com/track/TRACK_ID
     * - https://open.spotify.com/track/TRACK_ID?si=...
     * - spotify:track:TRACK_ID
     */
    public static function generateEmbedUrl(?string $spotifyUrl): ?string
    {
        if (!$spotifyUrl) {
            return null;
        }

        // Format: spotify:track:ID
        if (preg_match('/^spotify:track:([a-zA-Z0-9]+)$/', $spotifyUrl, $matches)) {
            return 'https://open.spotify.com/embed/track/' . $matches[1];
        }

        // Format: open.spotify.com/track/ID
        if (preg_match('/open\.spotify\.com\/track\/([a-zA-Z0-9]+)/', $spotifyUrl, $matches)) {
            return 'https://open.spotify.com/embed/track/' . $matches[1];
        }

        return null;
    }

    /**
     * Extract Spotify Track ID dari URL
     */
    public static function extractTrackId(?string $spotifyUrl): ?string
    {
        if (!$spotifyUrl) {
            return null;
        }

        // Format: spotify:track:ID
        if (preg_match('/^spotify:track:([a-zA-Z0-9]+)$/', $spotifyUrl, $matches)) {
            return $matches[1];
        }

        // Format: open.spotify.com/track/ID
        if (preg_match('/open\.spotify\.com\/track\/([a-zA-Z0-9]+)/', $spotifyUrl, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
