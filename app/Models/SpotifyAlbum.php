<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotifyAlbum extends Model
{
    protected $table = 'spotify_albums';

    protected $fillable = [
        'name',
        'description',
        'cover_path',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Relasi: album memiliki banyak track
     */
    public function tracks()
    {
        return $this->hasMany(SpotifyTrack::class)->orderBy('display_order');
    }

    /**
     * Scope: hanya album yang aktif
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
        return $query->orderBy('display_order')->orderBy('name');
    }

    /**
     * Accessor: URL lengkap cover album
     */
    public function getCoverUrlAttribute()
    {
        if ($this->cover_path) {
            return asset('storage/' . $this->cover_path);
        }
        return asset('assets/images/default-album.png');
    }
}
