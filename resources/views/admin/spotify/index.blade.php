@extends('admin.layout.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Info Card --}}
    <div class="card mb-5">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <iconify-icon icon="mdi:spotify" class="text-success text-2xl me-2"></iconify-icon>
                <span class="fw-semibold">Kelola album dan lagu Spotify. Tambah album terlebih dahulu, kemudian tambahkan lagu ke dalam album.</span>
            </div>
        </div>
    </div>

    <div class="row gy-4">

        {{-- ============================================================ --}}
        {{-- FORM TAMBAH ALBUM --}}
        {{-- ============================================================ --}}
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0 p-24"
                    data-bs-toggle="collapse" data-bs-target="#collapseAlbumForm"
                    aria-expanded="false" aria-controls="collapseAlbumForm"
                    style="cursor: pointer;">
                    <h6 class="text-md text-primary-light mb-0">
                        <iconify-icon icon="mdi:folder-music" class="me-1"></iconify-icon>
                        Tambah Album Baru
                    </h6>
                    <iconify-icon icon="mdi:chevron-down" class="text-xl transition-transform" id="albumFormIcon"></iconify-icon>
                </div>
                <div class="collapse" id="collapseAlbumForm">
                    <div class="card-body p-24 pt-0">
                        <form action="{{ route('spotify.album.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- Nama Album --}}
                                <div class="col-md-6 mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Nama Album <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" class="form-control radius-8"
                                        placeholder="Masukkan nama album" required>
                                </div>

                                {{-- Urutan --}}
                                <div class="col-md-3 mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Urutan Tampil
                                    </label>
                                    <input type="number" name="display_order" class="form-control radius-8"
                                        placeholder="0" value="0" min="0">
                                </div>

                                {{-- Upload Cover --}}
                                <div class="col-12 mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Gambar Cover Album <span class="text-danger">*</span>
                                    </label>
                                    <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                        <div class="uploaded-img-album d-none position-relative h-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50"
                                            style="width: 120px;">
                                            <button type="button"
                                                class="uploaded-img__remove-album position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                                <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>
                                            </button>
                                            <img id="uploaded-img__preview-album" class="w-100 h-100 object-fit-cover" src="" alt="preview">
                                        </div>
                                        <label class="upload-file-album h-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1 cursor-pointer"
                                            for="upload-album-cover" style="width: 120px;">
                                            <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light text-xs">Upload Cover</span>
                                            <input id="upload-album-cover" name="cover" type="file" accept="image/*" hidden required>
                                        </label>
                                    </div>
                                    <small class="text-muted">Format: JPEG, PNG, JPG, WEBP. Maksimal 5MB. Disarankan rasio 1:1 (square).</small>
                                </div>

                                {{-- Deskripsi --}}
                                <div class="col-12 mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Deskripsi Album <span class="text-muted">(Opsional)</span>
                                    </label>
                                    <textarea name="description" class="form-control radius-8" rows="3"
                                        placeholder="Deskripsi singkat tentang album ini"></textarea>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-3 mt-3">
                                <button type="reset"
                                    class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                    Reset
                                </button>
                                <button type="submit"
                                    class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                    <iconify-icon icon="mdi:folder-plus" class="me-1"></iconify-icon>
                                    Tambah Album
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============================================================ --}}
        {{-- DAFTAR ALBUM --}}
        {{-- ============================================================ --}}
        @if($albums->count() > 0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-24">
                        <h6 class="text-md text-primary-light mb-16">
                            <iconify-icon icon="mdi:spotify" class="text-success me-1"></iconify-icon>
                            Daftar Album ({{ $albums->count() }} album)
                        </h6>

                        <div class="table-responsive">
                            <table class="table bordered-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" width="60">Cover</th>
                                        <th scope="col">Nama Album</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col" class="text-center" width="80">Lagu</th>
                                        <th scope="col" class="text-center" width="180">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($albums as $album)
                                        {{-- Row Album --}}
                                        <tr class="album-row" id="album-row-{{ $album->id }}">
                                            <td>
                                                @if($album->cover_path)
                                                    <img src="{{ asset('storage/' . $album->cover_path) }}"
                                                        alt="{{ $album->name }}"
                                                        class="rounded"
                                                        style="width:50px; height:50px; object-fit:cover;">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center bg-neutral-100 rounded"
                                                        style="width:50px; height:50px;">
                                                        <iconify-icon icon="mdi:music-box" class="text-secondary-light text-2xl"></iconify-icon>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="fw-semibold text-primary-600">{{ $album->name }}</span>
                                                @if(!$album->is_active)
                                                    <span class="badge text-xs fw-semibold text-danger-600 bg-danger-100 px-8 py-4 radius-4 ms-1">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-sm text-secondary-light">
                                                    {{ $album->description ? Str::limit($album->description, 80) : '-' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge text-sm fw-semibold text-success-600 bg-success-100 px-12 py-6 radius-4">
                                                    {{ $album->tracks->count() }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                                    {{-- Toggle tracks dropdown --}}
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-success toggle-tracks-btn"
                                                        data-album="{{ $album->id }}"
                                                        title="{{ $album->tracks->count() > 0 ? 'Lihat Lagu' : 'Belum ada lagu' }}"
                                                        {{ $album->tracks->count() == 0 ? 'disabled' : '' }}>
                                                        <iconify-icon icon="mdi:music-note-plus" id="tracks-icon-{{ $album->id }}"></iconify-icon>
                                                    </button>

                                                    {{-- Tambah Lagu --}}
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#addTrackModal"
                                                        data-album-id="{{ $album->id }}"
                                                        data-album-name="{{ $album->name }}"
                                                        title="Tambah Lagu">
                                                        <iconify-icon icon="mdi:plus"></iconify-icon>
                                                    </button>

                                                    {{-- Edit Album --}}
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editAlbumModal{{ $album->id }}"
                                                        title="Edit Album">
                                                        <iconify-icon icon="mdi:pencil"></iconify-icon>
                                                    </button>

                                                    {{-- Hapus Album --}}
                                                    <form action="{{ route('spotify.album.destroy', $album->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirmDeleteAlbum(event, {{ $album->tracks->count() }})">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Album">
                                                            <iconify-icon icon="mdi:delete"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Sub-rows: Daftar Lagu dalam Album --}}
                                        <tr class="tracks-container d-none" id="tracks-container-{{ $album->id }}">
                                            <td colspan="5" class="p-0">
                                                <div class="bg-neutral-50 border-start border-4 border-success px-24 py-16">
                                                    @if($album->tracks->count() > 0)
                                                        <div class="d-flex align-items-center justify-content-between mb-12">
                                                            <span class="text-sm fw-semibold text-success-600">
                                                                <iconify-icon icon="mdi:music-note" class="me-1"></iconify-icon>
                                                                Lagu dalam album "{{ $album->name }}"
                                                            </span>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th width="40">#</th>
                                                                        <th>Judul Lagu</th>
                                                                        <th>Artis</th>
                                                                        <th width="120">Durasi</th>
                                                                        <th>URL Spotify</th>
                                                                        <th class="text-center" width="120">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($album->tracks as $i => $track)
                                                                        <tr>
                                                                            <td class="text-muted text-sm">{{ $i + 1 }}</td>
                                                                            <td class="fw-medium">{{ $track->title }}</td>
                                                                            <td class="text-secondary-light text-sm">{{ $track->artist ?? '-' }}</td>
                                                                            <td class="text-sm text-muted">{{ $track->duration ?? '-' }}</td>
                                                                            <td>
                                                                                <a href="{{ $track->spotify_url }}" target="_blank"
                                                                                    class="badge text-sm fw-semibold text-success-600 bg-success-100 px-10 py-5 radius-4 text-decoration-none">
                                                                                    <iconify-icon icon="mdi:spotify" class="me-1"></iconify-icon>
                                                                                    Spotify
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                                                    {{-- Edit Track --}}
                                                                                    <button type="button"
                                                                                        class="btn btn-sm btn-outline-warning"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#editTrackModal{{ $track->id }}"
                                                                                        title="Edit Lagu">
                                                                                        <iconify-icon icon="mdi:pencil"></iconify-icon>
                                                                                    </button>

                                                                                    {{-- Hapus Track --}}
                                                                                    <form action="{{ route('spotify.track.destroy', $track->id) }}" method="POST"
                                                                                        class="d-inline"
                                                                                        onsubmit="return confirm('Hapus lagu \"{{ $track->title }}\"?')">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                                                            <iconify-icon icon="mdi:delete"></iconify-icon>
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <p class="text-muted text-sm mb-0">Belum ada lagu dalam album ini.</p>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Edit Album Modal --}}
                                        <div class="modal fade" id="editAlbumModal{{ $album->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            <iconify-icon icon="mdi:folder-edit" class="me-1 text-warning"></iconify-icon>
                                                            Edit Album
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('spotify.album.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-8 mb-3">
                                                                    <label class="form-label">Nama Album <span class="text-danger">*</span></label>
                                                                    <input type="text" name="name" class="form-control"
                                                                        value="{{ $album->name }}" required>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <label class="form-label">Urutan Tampil</label>
                                                                    <input type="number" name="display_order" class="form-control"
                                                                        value="{{ $album->display_order }}" min="0">
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label">Cover Saat Ini</label>
                                                                    @if($album->cover_path)
                                                                        <div class="mb-2">
                                                                            <img src="{{ asset('storage/' . $album->cover_path) }}"
                                                                                class="rounded"
                                                                                style="width:80px; height:80px; object-fit:cover;">
                                                                        </div>
                                                                    @else
                                                                        <p class="text-muted text-sm">Tidak ada gambar</p>
                                                                    @endif
                                                                    <label class="form-label">Ganti Cover (Opsional)</label>
                                                                    <input type="file" name="cover" class="form-control" accept="image/*">
                                                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah cover.</small>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label">Deskripsi</label>
                                                                    <textarea name="description" class="form-control" rows="3">{{ $album->description }}</textarea>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="is_active" value="1"
                                                                            id="album_active_{{ $album->id }}"
                                                                            {{ $album->is_active ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="album_active_{{ $album->id }}">
                                                                            Aktifkan album
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Edit Track Modals --}}
                                        @foreach($album->tracks as $track)
                                            <div class="modal fade" id="editTrackModal{{ $track->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                <iconify-icon icon="mdi:music-note-edit" class="me-1 text-warning"></iconify-icon>
                                                                Edit Lagu
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="{{ route('spotify.track.update', $track->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12 mb-3">
                                                                        <label class="form-label">Pindah ke Album</label>
                                                                        <select name="spotify_album_id" class="form-select" required>
                                                                            @foreach($albums as $a)
                                                                                <option value="{{ $a->id }}" {{ $track->spotify_album_id == $a->id ? 'selected' : '' }}>
                                                                                    {{ $a->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 mb-3">
                                                                        <label class="form-label">URL Spotify <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="spotify_url" class="form-control edit-spotify-url-input"
                                                                                data-track-id="{{ $track->id }}"
                                                                                value="{{ $track->spotify_url }}" required
                                                                                placeholder="https://open.spotify.com/track/...">
                                                                            <button type="button" class="btn btn-outline-success fetch-track-btn-edit"
                                                                                data-track-id="{{ $track->id }}"
                                                                                title="Ambil info lagu dari Spotify">
                                                                                <iconify-icon icon="mdi:download" class="me-1"></iconify-icon>
                                                                                <span>Auto-Fill</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="fetch-status-edit-{{ $track->id }} mt-1"></div>
                                                                    </div>
                                                                    <div class="col-md-8 mb-3">
                                                                        <label class="form-label">Judul Lagu <span class="text-danger">*</span></label>
                                                                        <input type="text" name="title" class="form-control edit-title-{{ $track->id }}"
                                                                            value="{{ $track->title }}" required>
                                                                    </div>
                                                                    <div class="col-md-4 mb-3">
                                                                        <label class="form-label">Durasi</label>
                                                                        <input type="text" name="duration" class="form-control edit-duration-{{ $track->id }}"
                                                                            value="{{ $track->duration }}" placeholder="3:45">
                                                                    </div>
                                                                    <div class="col-md-8 mb-3">
                                                                        <label class="form-label">Artis</label>
                                                                        <input type="text" name="artist" class="form-control edit-artist-{{ $track->id }}"
                                                                            value="{{ $track->artist }}" placeholder="Nama artis">
                                                                    </div>
                                                                    <div class="col-md-4 mb-3">
                                                                        <label class="form-label">Urutan</label>
                                                                        <input type="number" name="display_order" class="form-control"
                                                                            value="{{ $track->display_order }}" min="0">
                                                                    </div>
                                                                    <div class="col-12 mb-3">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="is_active" value="1"
                                                                                id="track_active_{{ $track->id }}"
                                                                                {{ $track->is_active ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="track_active_{{ $track->id }}">
                                                                                Aktifkan lagu
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-24 text-center">
                        <iconify-icon icon="mdi:spotify" class="text-5xl text-secondary-light mb-3"></iconify-icon>
                        <p class="text-secondary-light">Belum ada album yang ditambahkan. Buat album terlebih dahulu di atas.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- ============================================================ --}}
    {{-- MODAL: TAMBAH LAGU --}}
    {{-- ============================================================ --}}
    <div class="modal fade" id="addTrackModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <iconify-icon icon="mdi:music-note-plus" class="me-1 text-success"></iconify-icon>
                        Tambah Lagu ke Album
                        <span id="addTrackAlbumName" class="text-success fw-bold"></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('spotify.track.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- Album (hidden, auto-filled) --}}
                            <div class="col-12 mb-3">
                                <label class="form-label">Album <span class="text-danger">*</span></label>
                                <select name="spotify_album_id" id="addTrackAlbumId" class="form-select" required>
                                    @foreach($albums as $album)
                                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- URL Spotify --}}
                            <div class="col-12 mb-3">
                                <label class="form-label">URL Spotify <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="spotify_url" id="addSpotifyUrl" class="form-control"
                                        placeholder="https://open.spotify.com/track/..." required>
                                    <button type="button" class="btn btn-outline-success" id="fetchTrackBtn">
                                        <iconify-icon icon="mdi:download" class="me-1"></iconify-icon>
                                        Auto-Fill
                                    </button>
                                </div>
                                <div id="fetchTrackStatus" class="mt-1"></div>
                                <small class="text-muted">Paste URL Spotify lagu, lalu klik <strong>Auto-Fill</strong> untuk mengisi judul & artis otomatis.</small>
                            </div>

                            {{-- Judul & Durasi --}}
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Judul Lagu <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="addTrackTitle" class="form-control"
                                    placeholder="Judul lagu akan terisi otomatis" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Durasi <span class="text-muted">(Opsional)</span></label>
                                <input type="text" name="duration" id="addTrackDuration" class="form-control" placeholder="3:45">
                            </div>

                            {{-- Artis & Urutan --}}
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Artis <span class="text-muted">(Opsional)</span></label>
                                <input type="text" name="artist" id="addTrackArtist" class="form-control"
                                    placeholder="Nama artis akan terisi otomatis">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Urutan dalam Album</label>
                                <input type="number" name="display_order" class="form-control" placeholder="0" value="0" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">
                            <iconify-icon icon="mdi:music-note-plus" class="me-1"></iconify-icon>
                            Tambah Lagu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // ============================================================
    //  Album Form Collapse Icon
    // ============================================================
    const collapseAlbumForm = document.getElementById('collapseAlbumForm');
    const albumFormIcon     = document.getElementById('albumFormIcon');
    if (collapseAlbumForm && albumFormIcon) {
        collapseAlbumForm.addEventListener('show.bs.collapse', () => {
            albumFormIcon.setAttribute('icon', 'mdi:chevron-up');
        });
        collapseAlbumForm.addEventListener('hide.bs.collapse', () => {
            albumFormIcon.setAttribute('icon', 'mdi:chevron-down');
        });
    }

    // ============================================================
    //  Upload Cover Preview (Form Tambah Album)
    // ============================================================
    const albumCoverInput     = document.getElementById('upload-album-cover');
    const albumCoverPreview   = document.getElementById('uploaded-img__preview-album');
    const albumCoverContainer = document.querySelector('.uploaded-img-album');
    const albumCoverRemoveBtn = document.querySelector('.uploaded-img__remove-album');

    if (albumCoverInput) {
        albumCoverInput.addEventListener('change', (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                albumCoverPreview.src = src;
                albumCoverContainer.classList.remove('d-none');
            }
        });
    }
    if (albumCoverRemoveBtn) {
        albumCoverRemoveBtn.addEventListener('click', () => {
            albumCoverPreview.src = '';
            albumCoverContainer.classList.add('d-none');
            albumCoverInput.value = '';
        });
    }

    // ============================================================
    //  Toggle track rows (dropdown per album)
    // ============================================================
    document.querySelectorAll('.toggle-tracks-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const albumId   = this.dataset.album;
            const container = document.getElementById('tracks-container-' + albumId);
            const icon      = document.getElementById('tracks-icon-' + albumId);

            if (container) {
                const isHidden = container.classList.contains('d-none');
                container.classList.toggle('d-none', !isHidden);
                icon.setAttribute('icon', isHidden ? 'mdi:music-note-off' : 'mdi:music-note-plus');
            }
        });
    });

    // ============================================================
    //  Modal Tambah Lagu: Set album ID & name
    // ============================================================
    const addTrackModal = document.getElementById('addTrackModal');
    if (addTrackModal) {
        addTrackModal.addEventListener('show.bs.modal', function (event) {
            const btn       = event.relatedTarget;
            const albumId   = btn ? btn.dataset.albumId : null;
            const albumName = btn ? btn.dataset.albumName : '';

            const albumSelect = document.getElementById('addTrackAlbumId');
            if (albumSelect && albumId) {
                albumSelect.value = albumId;
            }

            const albumNameEl = document.getElementById('addTrackAlbumName');
            if (albumNameEl) {
                albumNameEl.textContent = albumName ? `– ${albumName}` : '';
            }

            // Reset form fields
            document.getElementById('addSpotifyUrl').value  = '';
            document.getElementById('addTrackTitle').value  = '';
            document.getElementById('addTrackArtist').value = '';
            document.getElementById('addTrackDuration').value = '';
            document.getElementById('fetchTrackStatus').innerHTML = '';
        });
    }

    // ============================================================
    //  Auto-fill Track Info dari Spotify URL (Form Tambah)
    // ============================================================
    const fetchTrackBtn    = document.getElementById('fetchTrackBtn');
    const fetchTrackStatus = document.getElementById('fetchTrackStatus');

    if (fetchTrackBtn) {
        fetchTrackBtn.addEventListener('click', function () {
            const url = document.getElementById('addSpotifyUrl').value.trim();
            if (!url) {
                showFetchStatus(fetchTrackStatus, 'Masukkan URL Spotify terlebih dahulu.', 'warning');
                return;
            }
            fetchSpotifyTrackInfo(url, {
                titleEl:    document.getElementById('addTrackTitle'),
                artistEl:   document.getElementById('addTrackArtist'),
                statusEl:   fetchTrackStatus,
                btnEl:      fetchTrackBtn,
            });
        });
    }

    // ============================================================
    //  Auto-fill Track Info dari Spotify URL (Form Edit)
    // ============================================================
    document.querySelectorAll('.fetch-track-btn-edit').forEach(btn => {
        btn.addEventListener('click', function () {
            const trackId  = this.dataset.trackId;
            const urlInput = document.querySelector(`.edit-spotify-url-input[data-track-id="${trackId}"]`);
            const url      = urlInput ? urlInput.value.trim() : '';

            if (!url) {
                showFetchStatus(
                    document.querySelector(`.fetch-status-edit-${trackId}`),
                    'Masukkan URL Spotify terlebih dahulu.', 'warning'
                );
                return;
            }

            fetchSpotifyTrackInfo(url, {
                titleEl:    document.querySelector(`.edit-title-${trackId}`),
                artistEl:   document.querySelector(`.edit-artist-${trackId}`),
                statusEl:   document.querySelector(`.fetch-status-edit-${trackId}`),
                btnEl:      this,
            });
        });
    });

    // ============================================================
    //  Helper: Fetch track info
    //  Step 1: Backend validates URL & returns oembed_url
    //  Step 2: Browser calls Spotify oEmbed API directly (CORS supported)
    // ============================================================
    async function fetchSpotifyTrackInfo(url, { titleEl, artistEl, statusEl, btnEl }) {
        btnEl.disabled = true;
        btnEl.innerHTML = '<iconify-icon icon="mdi:loading" class="spin me-1"></iconify-icon> Mengambil...';
        showFetchStatus(statusEl, '', '');

        try {
            // Step 1: validasi URL via backend & dapatkan oembed_url
            const validateRes = await fetch(`{{ route('spotify.fetch.track.info') }}?url=${encodeURIComponent(url)}`);
            const validateData = await validateRes.json();

            if (!validateData.success) {
                showFetchStatus(statusEl,
                    `<iconify-icon icon="mdi:alert" class="me-1"></iconify-icon> ${validateData.message}`,
                    'danger');
                return;
            }

            // Step 2: browser call Spotify oEmbed langsung (no CORS issue)
            const oembedRes = await fetch(validateData.oembed_url);

            if (!oembedRes.ok) {
                throw new Error('oEmbed request failed: ' + oembedRes.status);
            }

            const oembedData = await oembedRes.json();

            // Isi title dari oEmbed
            if (titleEl && oembedData.title) {
                titleEl.value = oembedData.title;
            }

            // Coba extract artist dari field "html" (iframe title attribute)
            // Format: title="Spotify – {Title} by {Artist}"
            let artist = '';
            if (oembedData.html) {
                const byMatch = oembedData.html.match(/by\s+([^"]+?)(?:\s*on\s|\s*")/i);
                if (byMatch) {
                    artist = byMatch[1].trim();
                }
            }
            // Fallback: coba dari thumbnail_url (sometimes contains artist info in path)
            if (!artist && oembedData.provider_name === 'Spotify') {
                // oEmbed title is just the track title — artist field left for user to fill
                artist = '';
            }

            if (artistEl && artist) {
                artistEl.value = artist;
            }

            showFetchStatus(statusEl,
                `<iconify-icon icon="mdi:check-circle" class="me-1"></iconify-icon> Info berhasil diambil! Periksa dan lengkapi field artis jika perlu.`,
                'success');

        } catch (err) {
            showFetchStatus(statusEl,
                `<iconify-icon icon="mdi:alert" class="me-1"></iconify-icon> Gagal mengambil info: ${err.message}`,
                'danger');
        } finally {
            btnEl.disabled = false;
            btnEl.innerHTML = '<iconify-icon icon="mdi:download" class="me-1"></iconify-icon> Auto-Fill';
        }
    }

    function showFetchStatus(el, message, type) {
        if (!el) return;
        if (!message) { el.innerHTML = ''; return; }
        const colorMap = { success: 'text-success-600', danger: 'text-danger-600', warning: 'text-warning-600' };
        el.innerHTML = `<small class="${colorMap[type] || ''}">${message}</small>`;
    }

    // ============================================================
    //  Konfirmasi hapus album
    // ============================================================
    function confirmDeleteAlbum(event, trackCount) {
        if (trackCount > 0) {
            event.preventDefault();
            alert(`Album tidak dapat dihapus karena masih memiliki ${trackCount} lagu.\nHapus semua lagu terlebih dahulu.`);
            return false;
        }
        return confirm('Apakah Anda yakin ingin menghapus album ini?');
    }

    // ============================================================
    //  Auto dismiss alerts
    // ============================================================
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            try { new bootstrap.Alert(alert).close(); } catch(e) {}
        });
    }, 5000);
</script>

<style>
    .spin {
        display: inline-block;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to   { transform: rotate(360deg); }
    }
    .tracks-container td {
        background: transparent;
    }
</style>
@endpush
