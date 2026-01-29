<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'brand_name',
        'logo_path',
        'email',
        'phone_number',
        'facebook_url',
        'instagram_url',
        'tiktok_url',
        'twitter_url'
    ];

    /**
     * Mendapatkan URL logo lengkap
     */
    public function getLogoUrlAttribute()
    {
        if (!$this->logo_path) {
            return asset('assets/images/logo.png'); // default logo
        }
        return asset('storage/' . $this->logo_path);
    }

    /**
     * Cek apakah memiliki social media
     */
    public function hasSocialMedia()
    {
        return $this->facebook_url || $this->instagram_url || $this->tiktok_url || $this->twitter_url;
    }

    /**
     * Get instance settings (singleton pattern)
     */
    public static function getInstance()
    {
        return self::first() ?? new self();
    }
}
