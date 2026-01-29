<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personil extends Model
{
    protected $table = 'personils';

    protected $fillable = [
        'name',
        'position',
        'photo_path',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'tiktok_url',
        'bio',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk mendapatkan personil yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk mengurutkan berdasarkan display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }

    /**
     * Mendapatkan URL foto lengkap
     */
    public function getPhotoUrlAttribute()
    {
        return asset('storage/' . $this->photo_path);
    }

    /**
     * Cek apakah personil memiliki social media
     */
    public function hasSocialMedia()
    {
        return $this->facebook_url || $this->instagram_url || $this->twitter_url || $this->tiktok_url;
    }
}
