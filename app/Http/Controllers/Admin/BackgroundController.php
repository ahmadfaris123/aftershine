<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Background;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

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

                // Generate nama file unik (selalu simpan sebagai webp)
                $fileName = 'background_' . time() . '_' . Str::random(10) . '.webp';
                $storagePath = storage_path('app/public/backgrounds');

                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0755, true);
                }

                // Kompres gambar dengan quality 75% tanpa mengubah resolusi
                Image::decode($image->path())
                    ->encode(new \Intervention\Image\Encoders\WebpEncoder(quality: 75))
                    ->save($storagePath . '/' . $fileName);

                $path = 'backgrounds/' . $fileName;

                // Simpan data ke database
                \App\Models\Background::create([
                    'title' => $validated['title'] ?? 'Background Image',
                    'image_path' => $path,
                    'description' => $validated['description'] ?? null,
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
            'description' => 'nullable|string'
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

                // Upload gambar baru (selalu simpan sebagai webp)
                $image = $request->file('image');
                $fileName = 'background_' . time() . '_' . Str::random(10) . '.webp';
                $storagePath = storage_path('app/public/backgrounds');

                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0755, true);
                }

                // Kompres gambar dengan quality 75% tanpa mengubah resolusi
                Image::decode($image->path())
                    ->encode(new \Intervention\Image\Encoders\WebpEncoder(quality: 75))
                    ->save($storagePath . '/' . $fileName);

                $validated['image_path'] = 'backgrounds/' . $fileName;
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