<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PersonilController extends Controller
{
    /**
     * Menampilkan halaman index dengan list personil
     */
    public function index()
    {
        $data = [
            'title' => 'Personil',
            'personils' => Personil::ordered()->get()
        ];

        return view('admin.personil.index', $data);
    }

    /**
     * Menyimpan personil baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // max 5MB
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Nama personil wajib diisi',
            'position.required' => 'Posisi personil wajib diisi',
            'photo.required' => 'Foto personil wajib diupload',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'photo.max' => 'Ukuran gambar maksimal 5MB',
            'facebook_url.url' => 'URL Facebook tidak valid',
            'instagram_url.url' => 'URL Instagram tidak valid',
            'twitter_url.url' => 'URL Twitter tidak valid',
            'tiktok_url.url' => 'URL TikTok tidak valid'
        ]);

        try {
            // Upload dan simpan foto
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');

                // Generate nama file unik
                $fileName = 'personil_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();

                // Simpan ke storage/app/public/personils
                $path = $photo->storeAs('personils', $fileName, 'public');

                // Simpan data ke database
                Personil::create([
                    'name' => $validated['name'],
                    'position' => $validated['position'],
                    'photo_path' => $path,
                    'facebook_url' => $validated['facebook_url'] ?? null,
                    'instagram_url' => $validated['instagram_url'] ?? null,
                    'twitter_url' => $validated['twitter_url'] ?? null,
                    'tiktok_url' => $validated['tiktok_url'] ?? null,
                    'bio' => $validated['bio'] ?? null,
                    'display_order' => $validated['display_order'] ?? 0,
                    'is_active' => $validated['is_active'] ?? true
                ]);

                return redirect()->back()->with('success', 'Personil berhasil ditambahkan');
            }

            return redirect()->back()->with('error', 'Gagal mengupload foto');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update personil yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $personil = Personil::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Nama personil wajib diisi',
            'position.required' => 'Posisi personil wajib diisi',
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'photo.max' => 'Ukuran gambar maksimal 5MB',
            'facebook_url.url' => 'URL Facebook tidak valid',
            'instagram_url.url' => 'URL Instagram tidak valid',
            'twitter_url.url' => 'URL Twitter tidak valid',
            'tiktok_url.url' => 'URL TikTok tidak valid'
        ]);

        try {
            // Jika ada foto baru, upload dan hapus yang lama
            if ($request->hasFile('photo')) {
                // Hapus foto lama
                if ($personil->photo_path && Storage::disk('public')->exists($personil->photo_path)) {
                    Storage::disk('public')->delete($personil->photo_path);
                }

                // Upload foto baru
                $photo = $request->file('photo');
                $fileName = 'personil_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('personils', $fileName, 'public');

                $validated['photo_path'] = $path;
            }

            // Update data
            $personil->update($validated);

            return redirect()->back()->with('success', 'Personil berhasil diupdate');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus personil
     */
    public function destroy($id)
    {
        try {
            $personil = Personil::findOrFail($id);

            // Hapus file foto
            if ($personil->photo_path && Storage::disk('public')->exists($personil->photo_path)) {
                Storage::disk('public')->delete($personil->photo_path);
            }

            // Hapus dari database
            $personil->delete();

            return redirect()->back()->with('success', 'Personil berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status aktif personil
     */
    public function toggleActive($id)
    {
        try {
            $personil = Personil::findOrFail($id);
            $personil->is_active = !$personil->is_active;
            $personil->save();

            return redirect()->back()->with('success', 'Status personil berhasil diubah');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
