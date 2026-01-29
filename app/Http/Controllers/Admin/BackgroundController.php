<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Background;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BackgroundController extends Controller
{
    /**
     * Menampilkan halaman index dengan list background
     */
    public function index()
    {
        $data = [
            'title' => 'Background',
            'backgrounds' => \App\Models\Background::ordered()->get()
        ];

        return view('admin.background.index', $data);
    }

    /**
     * Menyimpan background image baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // max 5MB
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer'
        ], [
            'image.required' => 'Gambar background wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max' => 'Ukuran gambar maksimal 5MB'
        ]);

        try {
            // Upload dan simpan gambar
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Generate nama file unik
                $fileName = 'background_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Simpan ke storage/app/public/backgrounds
                $path = $image->storeAs('backgrounds', $fileName, 'public');

                $isActive = $validated['is_active'] ?? true;

                // Jika background baru akan diaktifkan, nonaktifkan semua background lain
                if ($isActive) {
                    \App\Models\Background::where('is_active', true)->update(['is_active' => false]);
                }

                // Simpan data ke database
                \App\Models\Background::create([
                    'title' => $validated['title'] ?? 'Background Image',
                    'image_path' => $path,
                    'description' => $validated['description'] ?? null,
                    'is_active' => $isActive,
                    'display_order' => $validated['display_order'] ?? 0
                ]);

                return redirect()->back()->with('success', 'Background berhasil diupload');
            }

            return redirect()->back()->with('error', 'Gagal mengupload gambar');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update background yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $background = \App\Models\Background::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer'
        ], [
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max' => 'Ukuran gambar maksimal 5MB'
        ]);

        try {
            // Jika ada gambar baru, upload dan hapus yang lama
            if ($request->hasFile('image')) {
                // Hapus gambar lama
                if ($background->image_path && Storage::disk('public')->exists($background->image_path)) {
                    Storage::disk('public')->delete($background->image_path);
                }

                // Upload gambar baru
                $image = $request->file('image');
                $fileName = 'background_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('backgrounds', $fileName, 'public');

                $validated['image_path'] = $path;
            }

            // Jika background akan diaktifkan, nonaktifkan semua background lain
            if (isset($validated['is_active']) && $validated['is_active']) {
                \App\Models\Background::where('id', '!=', $id)
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            }

            // Update data
            $background->update($validated);

            return redirect()->back()->with('success', 'Background berhasil diupdate');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus background
     */
    public function destroy($id)
    {
        try {
            $background = \App\Models\Background::findOrFail($id);

            // Hapus file gambar
            if ($background->image_path && Storage::disk('public')->exists($background->image_path)) {
                Storage::disk('public')->delete($background->image_path);
            }

            // Hapus dari database
            $background->delete();

            return redirect()->back()->with('success', 'Background berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status aktif background
     */
    public function toggleActive($id)
    {
        try {
            $background = \App\Models\Background::findOrFail($id);

            // Jika akan mengaktifkan, nonaktifkan semua background lain terlebih dahulu
            if (!$background->is_active) {
                \App\Models\Background::where('id', '!=', $id)
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            }

            $background->is_active = !$background->is_active;
            $background->save();

            return redirect()->back()->with('success', 'Status background berhasil diubah');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}