<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Background;
use App\Models\Setting;
use App\Models\Personil;
use App\Models\Song;
use App\Models\Event;
use App\Models\Award;

class LandingController extends Controller
{
    /**
     * Display landing page v2
     */
    public function index()
    {
        // Get active background (is_active = 1)
        $activeBackground = Background::get();

        // Get settings (singleton)
        $settings = Setting::first();

        // Get all active personils ordered by display_order
        $personils = Personil::active()->ordered()->get();

        // Get all active songs ordered by display_order (latest first if you want newest songs first)
        $songs = Song::active()->ordered()->get();

        // Get all active events ordered by display_order
        $events = Event::active()->ordered()->get();

        // Get all active awards ordered by display_order
        $awards = Award::active()->ordered()->get();

        $data = [
            'activeBackground' => $activeBackground,
            'settings' => $settings,
            'personils' => $personils,
            'songs' => $songs,
            'events' => $events,
            'awards' => $awards,
        ];

        return view('landing.index_v2', $data);
    }

    /**
     * Helper untuk generate WhatsApp link dari nomor telepon
     */
    public static function getWhatsAppLink($phoneNumber)
    {
        if (!$phoneNumber) {
            return '#';
        }

        // Hapus semua karakter non-numeric
        $cleanNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Jika diawali dengan 0, ganti dengan 62
        if (substr($cleanNumber, 0, 1) === '0') {
            $cleanNumber = '62' . substr($cleanNumber, 1);
        }

        // Jika belum diawali dengan 62, tambahkan
        if (substr($cleanNumber, 0, 2) !== '62') {
            $cleanNumber = '62' . $cleanNumber;
        }

        return 'https://wa.me/' . $cleanNumber;
    }

    public function originals()
    {
        // Get all active songs ordered by display_order (latest first if you want newest songs first)
        $songs = Song::active()->ordered()->get();

        // Get settings (singleton)
        $settings = Setting::first();

        $data = [
            'settings' => $settings,
            'songs' => $songs,
        ];

        return view('landing.originals', $data);
    }
}
