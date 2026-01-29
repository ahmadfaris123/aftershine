<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = 'awards';

    protected $fillable = [
        'name',
        'image_path',
        'award_date',
        'description',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'award_date' => 'date',
    ];

    /**
     * Scope untuk mendapatkan award yang aktif
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
     * Scope untuk mengurutkan berdasarkan tanggal award terbaru
     */
    public function scopeLatestAward($query)
    {
        return $query->orderBy('award_date', 'desc');
    }

    /**
     * Mendapatkan URL gambar lengkap
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    /**
     * Format tanggal award
     */
    public function getFormattedAwardDateAttribute()
    {
        if (!$this->award_date) {
            return '-';
        }
        return $this->award_date instanceof \Carbon\Carbon
            ? $this->award_date->format('d F Y')
            : \Carbon\Carbon::parse($this->award_date)->format('d F Y');
    }

    /**
     * Format tanggal award untuk input
     */
    public function getAwardDateInputAttribute()
    {
        if (!$this->award_date) {
            return '';
        }
        return $this->award_date instanceof \Carbon\Carbon
            ? $this->award_date->format('Y-m-d')
            : \Carbon\Carbon::parse($this->award_date)->format('Y-m-d');
    }
}
