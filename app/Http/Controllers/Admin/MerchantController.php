<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MerchantController extends Controller
{
    /**
     * Menampilkan halaman index dengan list merchant
     */
    public function index()
    {
        $data = [
            'title'     => 'Merchant',
            'merchants' => Merchant::latest()->get(),
        ];

        return view('admin.merchant.index', $data);
    }

    /**
     * Menyimpan merchant baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'link_url' => 'nullable|url|max:255',
            'is_active' => 'nullable|in:0,1',
        ], [
            'name.required'  => 'Nama produk wajib diisi',
            'image.image'    => 'File harus berupa gambar',
            'image.mimes'    => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max'      => 'Ukuran gambar maksimal 5MB',
            'link_url.url'   => 'Link URL tidak valid',
        ]);

        try {
            $imagePath = null;

            if ($request->hasFile('image')) {
                $image      = $request->file('image');
                $fileName   = 'merchant_' . time() . '_' . Str::random(10) . '.webp';
                $storagePath = storage_path('app/public/merchants');

                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0755, true);
                }

                $manager = new ImageManager(new Driver());
                $manager->decode($image->path())
                    ->encode(new \Intervention\Image\Encoders\WebpEncoder(quality: 75))
                    ->save($storagePath . '/' . $fileName);

                $imagePath = 'merchants/' . $fileName;
            }

            Merchant::create([
                'name'      => $validated['name'],
                'image_path' => $imagePath,
                'link_url'  => $validated['link_url'] ?? null,
                'is_active' => $request->input('is_active', 1),
            ]);

            return redirect()->back()->with('success', 'Produk merchant berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update merchant yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $merchant = Merchant::findOrFail($id);

        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'link_url'  => 'nullable|url|max:255',
            'is_active' => 'nullable|in:0,1',
        ], [
            'name.required' => 'Nama produk wajib diisi',
            'image.image'   => 'File harus berupa gambar',
            'image.mimes'   => 'Format gambar harus jpeg, png, jpg, atau webp',
            'image.max'     => 'Ukuran gambar maksimal 5MB',
            'link_url.url'  => 'Link URL tidak valid',
        ]);

        try {
            $imagePath = $merchant->image_path;

            if ($request->hasFile('image')) {
                // Hapus gambar lama
                if ($merchant->image_path && Storage::disk('public')->exists($merchant->image_path)) {
                    Storage::disk('public')->delete($merchant->image_path);
                }

                $image      = $request->file('image');
                $fileName   = 'merchant_' . time() . '_' . Str::random(10) . '.webp';
                $storagePath = storage_path('app/public/merchants');

                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0755, true);
                }

                $manager = new ImageManager(new Driver());
                $manager->decode($image->path())
                    ->encode(new \Intervention\Image\Encoders\WebpEncoder(quality: 75))
                    ->save($storagePath . '/' . $fileName);

                $imagePath = 'merchants/' . $fileName;
            }

            $merchant->update([
                'name'       => $validated['name'],
                'image_path' => $imagePath,
                'link_url'   => $validated['link_url'] ?? null,
                'is_active'  => $request->input('is_active', 1),
            ]);

            return redirect()->back()->with('success', 'Produk merchant berhasil diupdate');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus merchant
     */
    public function destroy($id)
    {
        try {
            $merchant = Merchant::findOrFail($id);

            if ($merchant->image_path && Storage::disk('public')->exists($merchant->image_path)) {
                Storage::disk('public')->delete($merchant->image_path);
            }

            $merchant->delete();

            return redirect()->back()->with('success', 'Produk merchant berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status aktif merchant
     */
    public function toggleActive($id)
    {
        try {
            $merchant = Merchant::findOrFail($id);
            $merchant->is_active = !$merchant->is_active;
            $merchant->save();

            return redirect()->back()->with('success', 'Status merchant berhasil diubah');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
