<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SongController extends Controller
{
    /**
     * Menampilkan halaman index dengan list songs
     */
    public function index()
    {
        $data = [
            'title' => 'Songs',
            'songs' => Song::ordered()->get()
        ];

        return view('admin.songs.index', $data);
    }

    /**
     * Menyimpan song baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'artist_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // max 5MB
            'description' => 'nullable|string',
            'youtube_url' => 'required|url|max:500',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'artist_name.required' => 'Nama penyanyi wajib diisi',
            'title.required' => 'Judul lagu wajib diisi',
            'release_date.required' => 'Tanggal rilis wajib diisi',
            'release_date.date' => 'Format tanggal tidak valid',
            'thumbnail.required' => 'Thumbnail wajib diupload',
            'thumbnail.image' => 'File harus berupa gambar',
            'thumbnail.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'thumbnail.max' => 'Ukuran gambar maksimal 5MB',
            'youtube_url.required' => 'Link YouTube wajib diisi',
            'youtube_url.url' => 'Format URL YouTube tidak valid'
        ]);

        try {
            // Upload dan simpan thumbnail
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');

                // Generate nama file unik
                $fileName = 'song_' . time() . '_' . Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();

                // Simpan ke storage/app/public/songs
                $path = $thumbnail->storeAs('songs', $fileName, 'public');

                // Simpan data ke database
                Song::create([
                    'artist_name' => $validated['artist_name'],
                    'title' => $validated['title'],
                    'release_date' => $validated['release_date'],
                    'thumbnail_path' => $path,
                    'description' => $validated['description'] ?? null,
                    'youtube_url' => $validated['youtube_url'],
                    'display_order' => $validated['display_order'] ?? 0,
                    'is_active' => $validated['is_active'] ?? true
                ]);

                return redirect()->back()->with('success', 'Lagu berhasil ditambahkan');
            }

            return redirect()->back()->with('error', 'Gagal mengupload thumbnail');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update song yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $song = Song::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'artist_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            'youtube_url' => 'required|url|max:500',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'artist_name.required' => 'Nama penyanyi wajib diisi',
            'title.required' => 'Judul lagu wajib diisi',
            'release_date.required' => 'Tanggal rilis wajib diisi',
            'release_date.date' => 'Format tanggal tidak valid',
            'thumbnail.image' => 'File harus berupa gambar',
            'thumbnail.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            'thumbnail.max' => 'Ukuran gambar maksimal 5MB',
            'youtube_url.required' => 'Link YouTube wajib diisi',
            'youtube_url.url' => 'Format URL YouTube tidak valid'
        ]);

        try {
            // Jika ada thumbnail baru, upload dan hapus yang lama
            if ($request->hasFile('thumbnail')) {
                // Hapus thumbnail lama
                if ($song->thumbnail_path && Storage::disk('public')->exists($song->thumbnail_path)) {
                    Storage::disk('public')->delete($song->thumbnail_path);
                }

                // Upload thumbnail baru
                $thumbnail = $request->file('thumbnail');
                $fileName = 'song_' . time() . '_' . Str::random(10) . '.' . $thumbnail->getClientOriginalExtension();
                $path = $thumbnail->storeAs('songs', $fileName, 'public');

                $validated['thumbnail_path'] = $path;
            }

            // Update data
            $song->update($validated);

            return redirect()->back()->with('success', 'Lagu berhasil diupdate');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus song
     */
    public function destroy($id)
    {
        try {
            $song = Song::findOrFail($id);

            // Hapus file thumbnail
            if ($song->thumbnail_path && Storage::disk('public')->exists($song->thumbnail_path)) {
                Storage::disk('public')->delete($song->thumbnail_path);
            }

            // Hapus dari database
            $song->delete();

            return redirect()->back()->with('success', 'Lagu berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status aktif song
     */
    public function toggleActive($id)
    {
        try {
            $song = Song::findOrFail($id);
            $song->is_active = !$song->is_active;
            $song->save();

            return redirect()->back()->with('success', 'Status lagu berhasil diubah');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
