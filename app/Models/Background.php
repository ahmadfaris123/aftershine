<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $table = 'backgrounds';

    protected $fillable = [
        'title',
        'image_path',
        'description',
        'is_active',
        'display_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk mendapatkan background yang aktif
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
     * Mendapatkan background yang sedang aktif
     * Hanya akan ada satu background yang aktif
     */
    public static function getActiveBackground()
    {
        return self::where('is_active', true)->first();
    }
}
