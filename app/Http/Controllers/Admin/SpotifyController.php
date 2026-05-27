<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpotifyAlbum;
use App\Models\SpotifyTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SpotifyController extends Controller
{
    /**
     * Menampilkan halaman Spotify Music dengan daftar album & lagu
     */
    public function index()
    {
        $albums = SpotifyAlbum::ordered()->with(['tracks' => function ($q) {
            $q->orderBy('display_order');
        }])->get();

        return view('admin.spotify.index', [
            'title'  => 'Spotify Music',
            'albums' => $albums,
        ]);
    }

    // =========================================================
    //  ALBUM CRUD
    // =========================================================

    /**
     * Simpan album baru
     */
    public function storeAlbum(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'cover'         => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'display_order' => 'nullable|integer|min:0',
        ], [
            'name.required'   => 'Nama album wajib diisi',
            'cover.required'  => 'Gambar cover album wajib diupload',
            'cover.image'     => 'File harus berupa gambar',
            'cover.mimes'     => 'Format gambar harus jpeg, png, jpg, atau webp',
            'cover.max'       => 'Ukuran gambar maksimal 5MB',
        ]);

        try {
            $coverPath = null;

            if ($request->hasFile('cover')) {
                $coverPath = $this->uploadCover($request->file('cover'));
            }

            SpotifyAlbum::create([
                'name'          => $validated['name'],
                'description'   => $validated['description'] ?? null,
                'cover_path'    => $coverPath,
                'display_order' => $validated['display_order'] ?? 0,
                'is_active'     => true,
            ]);

            return redirect()->back()->with('success', 'Album berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update album
     */
    public function updateAlbum(Request $request, $id)
    {
        $album = SpotifyAlbum::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'cover'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'display_order' => 'nullable|integer|min:0',
            'is_active'     => 'boolean',
        ], [
            'name.required' => 'Nama album wajib diisi',
            'cover.image'   => 'File harus berupa gambar',
            'cover.mimes'   => 'Format gambar harus jpeg, png, jpg, atau webp',
            'cover.max'     => 'Ukuran gambar maksimal 5MB',
        ]);

        try {
            $updateData = [
                'name'          => $validated['name'],
                'description'   => $validated['description'] ?? null,
                'display_order' => $validated['display_order'] ?? $album->display_order,
                'is_active'     => $request->boolean('is_active', true),
            ];

            // Jika ada cover baru, hapus lama & upload baru
            if ($request->hasFile('cover')) {
                if ($album->cover_path && Storage::disk('public')->exists($album->cover_path)) {
                    Storage::disk('public')->delete($album->cover_path);
                }
                $updateData['cover_path'] = $this->uploadCover($request->file('cover'));
            }

            $album->update($updateData);

            return redirect()->back()->with('success', 'Album berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus album – hanya jika tidak ada lagu di dalamnya
     */
    public function destroyAlbum($id)
    {
        try {
            $album = SpotifyAlbum::findOrFail($id);

            // Cegah hapus jika masih ada lagu
            if ($album->tracks()->count() > 0) {
                return redirect()->back()->with('error',
                    'Album tidak dapat dihapus karena masih memiliki ' . $album->tracks()->count() . ' lagu. Hapus semua lagu terlebih dahulu.');
            }

            // Hapus gambar cover dari storage
            if ($album->cover_path && Storage::disk('public')->exists($album->cover_path)) {
                Storage::disk('public')->delete($album->cover_path);
            }

            $album->delete();

            return redirect()->back()->with('success', 'Album berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // =========================================================
    //  TRACK CRUD
    // =========================================================

    /**
     * Simpan lagu baru ke album
     */
    public function storeTrack(Request $request)
    {
        $validated = $request->validate([
            'spotify_album_id' => 'required|exists:spotify_albums,id',
            'title'            => 'required|string|max:255',
            'artist'           => 'nullable|string|max:255',
            'spotify_url'      => 'required|string|max:500',
            'duration'         => 'nullable|string|max:20',
            'display_order'    => 'nullable|integer|min:0',
        ], [
            'spotify_album_id.required' => 'Pilih album untuk lagu ini',
            'spotify_album_id.exists'   => 'Album tidak ditemukan',
            'title.required'            => 'Judul lagu wajib diisi',
            'spotify_url.required'      => 'URL Spotify wajib diisi',
        ]);

        try {
            $embedUrl = SpotifyTrack::generateEmbedUrl($validated['spotify_url']);

            SpotifyTrack::create([
                'spotify_album_id'  => $validated['spotify_album_id'],
                'title'             => $validated['title'],
                'artist'            => $validated['artist'] ?? null,
                'spotify_url'       => $validated['spotify_url'],
                'spotify_embed_url' => $embedUrl,
                'duration'          => $validated['duration'] ?? null,
                'display_order'     => $validated['display_order'] ?? 0,
                'is_active'         => true,
            ]);

            return redirect()->back()->with('success', 'Lagu berhasil ditambahkan ke album');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update lagu (termasuk pindah album)
     */
    public function updateTrack(Request $request, $id)
    {
        $track = SpotifyTrack::findOrFail($id);

        $validated = $request->validate([
            'spotify_album_id' => 'required|exists:spotify_albums,id',
            'title'            => 'required|string|max:255',
            'artist'           => 'nullable|string|max:255',
            'spotify_url'      => 'required|string|max:500',
            'duration'         => 'nullable|string|max:20',
            'display_order'    => 'nullable|integer|min:0',
            'is_active'        => 'boolean',
        ], [
            'spotify_album_id.required' => 'Pilih album untuk lagu ini',
            'spotify_album_id.exists'   => 'Album tidak ditemukan',
            'title.required'            => 'Judul lagu wajib diisi',
            'spotify_url.required'      => 'URL Spotify wajib diisi',
        ]);

        try {
            $embedUrl = SpotifyTrack::generateEmbedUrl($validated['spotify_url']);

            $track->update([
                'spotify_album_id'  => $validated['spotify_album_id'],
                'title'             => $validated['title'],
                'artist'            => $validated['artist'] ?? null,
                'spotify_url'       => $validated['spotify_url'],
                'spotify_embed_url' => $embedUrl,
                'duration'          => $validated['duration'] ?? null,
                'display_order'     => $validated['display_order'] ?? $track->display_order,
                'is_active'         => $request->boolean('is_active', true),
            ]);

            return redirect()->back()->with('success', 'Lagu berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus lagu
     */
    public function destroyTrack($id)
    {
        try {
            $track = SpotifyTrack::findOrFail($id);
            $track->delete();

            return redirect()->back()->with('success', 'Lagu berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // =========================================================
    //  FETCH TRACK INFO (Auto-fill dari Spotify oEmbed)
    // =========================================================

    /**
     * Validasi URL Spotify dan kembalikan track ID + embed URL.
     * Fetch metadata (title, artist) dilakukan di frontend via Spotify oEmbed API
     * untuk menghindari keterbatasan koneksi keluar dari server.
     */
    public function fetchTrackInfo(Request $request)
    {
        $request->validate([
            'url' => 'required|string',
        ]);

        $spotifyUrl = $request->input('url');
        $trackId    = SpotifyTrack::extractTrackId($spotifyUrl);

        if (!$trackId) {
            return response()->json([
                'success' => false,
                'message' => 'URL Spotify tidak valid. Gunakan format: https://open.spotify.com/track/...',
            ], 422);
        }

        return response()->json([
            'success'   => true,
            'track_id'  => $trackId,
            'embed_url' => 'https://open.spotify.com/embed/track/' . $trackId,
            'clean_url' => 'https://open.spotify.com/track/' . $trackId,
            'oembed_url' => 'https://open.spotify.com/oembed?url=' . urlencode('https://open.spotify.com/track/' . $trackId) . '&format=json',
        ]);
    }

    // =========================================================
    //  HELPER
    // =========================================================

    /**
     * Upload dan kompres gambar cover album
     */
    private function uploadCover($file): string
    {
        $fileName    = 'album_' . time() . '_' . Str::random(10) . '.webp';
        $storagePath = storage_path('app/public/spotify-albums');

        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        // Kompres ke WebP quality 80 menggunakan ImageManager langsung
        $manager = new ImageManager(new Driver());
        $manager->decode($file->path())
            ->encode(new \Intervention\Image\Encoders\WebpEncoder(quality: 80))
            ->save($storagePath . '/' . $fileName);

        return 'spotify-albums/' . $fileName;
    }
}
