<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Menampilkan halaman index dengan list events
     */
    public function index()
    {
        $data = [
            'title' => 'Events',
            'events' => Event::ordered()->get()
        ];

        return view('admin.events.index', $data);
    }

    /**
     * Menyimpan event baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            // 'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Nama event wajib diisi',
            'date.required' => 'Tanggal event wajib diisi',
            'date.date' => 'Format tanggal event tidak valid',
            // 'image.image' => 'File harus berupa gambar',
            // 'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            // 'image.max' => 'Ukuran gambar maksimal 5MB'
        ]);

        try {
            $path = null;
            
            // Upload dan simpan gambar
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');

            //     // Generate nama file unik
            //     $fileName = 'event_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

            //     // Simpan ke storage/app/public/events
            //     $path = $image->storeAs('events', $fileName, 'public');
            // }

            // Simpan data ke database
            Event::create([
                'name' => $validated['name'],
                'date' => $validated['date'],
                // 'image_path' => $path,
                'description' => $validated['description'] ?? null,
                // 'display_order' => $validated['display_order'] ?? 0,
                'is_active' => $validated['is_active'] ?? true
            ]);

            return redirect()->back()->with('success', 'Event berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update event yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
            // 'display_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Nama event wajib diisi',
            'date.required' => 'Tanggal event wajib diisi',
            'date.date' => 'Format tanggal event tidak valid',
            // 'image.image' => 'File harus berupa gambar',
            // 'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp',
            // 'image.max' => 'Ukuran gambar maksimal 5MB'
        ]);

        try {
            // Jika ada gambar baru, upload dan hapus yang lama
            // if ($request->hasFile('image')) {
            //     // Hapus gambar lama
            //     if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            //         Storage::disk('public')->delete($event->image_path);
            //     }

            //     // Upload gambar baru
            //     $image = $request->file('image');
            //     $fileName = 'event_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            //     $path = $image->storeAs('events', $fileName, 'public');

            //     $validated['image_path'] = $path;
            // }

            // Update data
            $event->update($validated);

            return redirect()->back()->with('success', 'Event berhasil diupdate');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus event
     */
    public function destroy($id)
    {
        try {
            $event = Event::findOrFail($id);

            // Hapus file gambar
            // if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            //     Storage::disk('public')->delete($event->image_path);
            // }

            // Hapus dari database
            $event->delete();

            return redirect()->back()->with('success', 'Event berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status aktif event
     */
    public function toggleActive($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->is_active = !$event->is_active;
            $event->save();

            return redirect()->back()->with('success', 'Status event berhasil diubah');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
