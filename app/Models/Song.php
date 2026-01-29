<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Song extends Model
{
    protected $table = 'songs';

    protected $fillable = [
        'artist_name',
        'title',
        'release_date',
        'thumbnail_path',
        'description',
        'youtube_url',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'release_date' => 'date',
    ];

    /**
     * Scope untuk mendapatkan song yang aktif
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
     * Scope untuk mengurutkan berdasarkan tanggal rilis terbaru
     */
    public function scopeLatestRelease($query)
    {
        return $query->orderBy('release_date', 'desc');
    }

    /**
     * Mendapatkan URL thumbnail lengkap
     */
    public function getThumbnailUrlAttribute()
    {
        return asset('storage/' . $this->thumbnail_path);
    }

    /**
     * Mendapatkan YouTube embed URL
     */
    public function getYoutubeEmbedUrlAttribute()
    {
        // Extract video ID from YouTube URL
        $videoId = $this->extractYoutubeVideoId($this->youtube_url);
        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }

    /**
     * Extract YouTube video ID dari URL
     */
    private function extractYoutubeVideoId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Format tanggal rilis
     */
    public function getFormattedReleaseDateAttribute()
    {
        if (!$this->release_date) {
            return '-';
        }
        return $this->release_date instanceof \Carbon\Carbon
            ? $this->release_date->format('d F Y')
            : \Carbon\Carbon::parse($this->release_date)->format('d F Y');
    }

    /**
     * Format tanggal rilis untuk input
     */
    public function getReleaseDateInputAttribute()
    {
        if (!$this->release_date) {
            return '';
        }
        return $this->release_date instanceof \Carbon\Carbon
            ? $this->release_date->format('Y-m-d')
            : \Carbon\Carbon::parse($this->release_date)->format('Y-m-d');
    }
}
