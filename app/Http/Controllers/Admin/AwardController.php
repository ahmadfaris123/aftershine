<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class AwardController extends Controller
{
    /**
     * Menampilkan halaman index dengan list awards
     */
    public function index()
    {
        $data = [
            'title' => 'Awards',
            'awards' => Award::ordered()->get()
        ];

        return view('admin.award.index', $data);
    }

    /**
     * Menyimpan award baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // max 5MB
            'award_date' => 'required|date',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Nama award wajib diisi',
            'image.required' => 'Gambar award wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max' => 'Ukuran gambar maksimal 5MB',
            'award_date.required' => 'Tanggal award wajib diisi',
            'award_date.date' => 'Format tanggal tidak valid'
        ]);

        try {
            // Upload dan simpan gambar
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Generate nama file unik (selalu simpan sebagai webp)
                $fileName = 'award_' . time() . '_' . Str::random(10) . '.webp';
                $storagePath = storage_path('app/public/awards');

                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0755, true);
                }

                // Kompres gambar dengan quality 75% tanpa mengubah resolusi
                Image::read($image)
                    ->toWebp(quality: 75)
                    ->save($storagePath . '/' . $fileName);

                $path = 'awards/' . $fileName;

                // Simpan data ke database
                Award::create([
                    'name' => $validated['name'],
                    'image_path' => $path,
                    'award_date' => $validated['award_date'],
                    'description' => $validated['description'] ?? null,
                    'display_order' => $validated['display_order'] ?? 0,
                    'is_active' => $validated['is_active'] ?? true
                ]);

                return redirect()->back()->with('success', 'Award berhasil ditambahkan');
            }

            return redirect()->back()->with('error', 'Gagal mengupload gambar');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update award yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $award = Award::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'award_date' => 'required|date',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Nama award wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max' => 'Ukuran gambar maksimal 5MB',
            'award_date.required' => 'Tanggal award wajib diisi',
            'award_date.date' => 'Format tanggal tidak valid'
        ]);

        try {
            // Jika ada gambar baru, upload dan hapus yang lama
            if ($request->hasFile('image')) {
                // Hapus gambar lama
                if ($award->image_path && Storage::disk('public')->exists($award->image_path)) {
                    Storage::disk('public')->delete($award->image_path);
                }

                // Upload gambar baru (selalu simpan sebagai webp)
                $image = $request->file('image');
                $fileName = 'award_' . time() . '_' . Str::random(10) . '.webp';
                $storagePath = storage_path('app/public/awards');

                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0755, true);
                }

                // Kompres gambar dengan quality 75% tanpa mengubah resolusi
                Image::read($image)
                    ->toWebp(quality: 75)
                    ->save($storagePath . '/' . $fileName);

                $validated['image_path'] = 'awards/' . $fileName;
            }

            // Update data
            $award->update($validated);

            return redirect()->back()->with('success', 'Award berhasil diupdate');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus award
     */
    public function destroy($id)
    {
        try {
            $award = Award::findOrFail($id);

            // Hapus file gambar
            if ($award->image_path && Storage::disk('public')->exists($award->image_path)) {
                Storage::disk('public')->delete($award->image_path);
            }

            // Hapus dari database
            $award->delete();

            return redirect()->back()->with('success', 'Award berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status aktif award
     */
    public function toggleActive($id)
    {
        try {
            $award = Award::findOrFail($id);
            $award->is_active = !$award->is_active;
            $award->save();

            return redirect()->back()->with('success', 'Status award berhasil diubah');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
