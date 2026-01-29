<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Menampilkan halaman settings
     */
    public function index()
    {
        $data = [
            'title' => 'Settings',
            'setting' => Setting::getInstance()
        ];

        return view('admin.settings.index', $data);
    }

    /**
     * Simpan atau update settings
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // max 5MB
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
        ], [
            'brand_name.required' => 'Nama brand wajib diisi',
            'logo.image' => 'File harus berupa gambar',
            'logo.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'logo.max' => 'Ukuran gambar maksimal 5MB',
            'email.email' => 'Format email tidak valid',
            'facebook_url.url' => 'Format URL Facebook tidak valid',
            'instagram_url.url' => 'Format URL Instagram tidak valid',
            'tiktok_url.url' => 'Format URL TikTok tidak valid',
            'twitter_url.url' => 'Format URL Twitter tidak valid',
        ]);

        try {
            // Get existing setting or create new
            $setting = Setting::first();

            // Handle logo upload
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($setting && $setting->logo_path && Storage::disk('public')->exists($setting->logo_path)) {
                    Storage::disk('public')->delete($setting->logo_path);
                }

                // Upload new logo
                $logo = $request->file('logo');
                $fileName = 'logo_' . time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();
                $path = $logo->storeAs('settings', $fileName, 'public');

                $validated['logo_path'] = $path;
            }

            // Update or create settings
            if ($setting) {
                $setting->update($validated);
                $message = 'Settings berhasil diupdate';
            } else {
                Setting::create($validated);
                $message = 'Settings berhasil disimpan';
            }

            return redirect()->back()->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
