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
                <iconify-icon icon="mdi:calendar-star" class="text-primary text-2xl me-2"></iconify-icon>
                <span class="fw-semibold">Kelola daftar event dengan gambar dan keterangan. Upload gambar dengan rasio 16:9
                    untuk hasil terbaik.</span>
            </div>
        </div>
    </div>

    {{-- Form Tambah Event --}}
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0 p-24" data-bs-toggle="collapse" data-bs-target="#collapseUploadForm" aria-expanded="false" aria-controls="collapseUploadForm" style="cursor: pointer;">
                    <h6 class="text-md text-primary-light mb-0">Tambah Event Baru</h6>
                    <iconify-icon icon="mdi:chevron-down" class="text-xl transition-transform" id="uploadFormIcon"></iconify-icon>
                </div>
                <div class="collapse" id="collapseUploadForm">
                    <div class="card-body p-24 pt-0">

                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Name --}}
                            <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Nama Event <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control radius-8"
                                    placeholder="Masukkan nama event" required>
                            </div>

                            {{-- Location --}}
                            <div class="col-md-3 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Lokasi <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="location" class="form-control radius-8"
                                    placeholder="Contoh: Jakarta" required>
                            </div>

                            {{-- Date --}}
                            <div class="col-md-3 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Tanggal Event <span class="text-danger">*</span>
                                </label>
                                <input type="date" name="date" class="form-control radius-8" required>
                            </div>

                            {{-- Display Order --}}
                            <!-- <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Urutan Tampil
                                </label>
                                <input type="number" name="display_order" class="form-control radius-8" placeholder="0"
                                    value="0" min="0">
                            </div> -->

                            {{-- Image Upload --}}
                            <!-- <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Gambar Event (Rasio 16:9) <span class="text-danger">*</span>
                                </label>
                                <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                    <div
                                        class="uploaded-img-new d-none position-relative h-120-px w-213-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                        <button type="button"
                                            class="uploaded-img__remove-new position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                            <iconify-icon icon="radix-icons:cross-2"
                                                class="text-xl text-danger-600"></iconify-icon>
                                        </button>
                                        <img id="uploaded-img__preview-new" class="w-100 h-100 object-fit-cover" src=""
                                            alt="preview">
                                    </div>

                                    <label
                                        class="upload-file-new h-120-px w-213-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1 cursor-pointer"
                                        for="upload-file-new">
                                        <iconify-icon icon="solar:camera-outline"
                                            class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Upload Gambar</span>
                                        <span class="text-xs text-muted">16:9 Recommended</span>
                                        <input id="upload-file-new" name="image" type="file" accept="image/*" hidden
                                            required>
                                    </label>
                                </div>
                                <small class="text-muted">Format: JPEG, PNG, JPG, WEBP. Maksimal 5MB. Rasio 16:9 (contoh:
                                    1920x1080)</small>
                            </div> -->

                            {{-- Description --}}
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Keterangan <span class="text-muted">(Opsional)</span>
                                </label>
                                <textarea name="description" class="form-control radius-8" rows="4"
                                    placeholder="Deskripsi singkat tentang event ini"></textarea>
                            </div>

                            {{-- Status --}}
                            <div class="col-12 mb-20">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active_new" checked>
                                    <label class="form-check-label" for="is_active_new">
                                        Aktifkan event
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-3 mt-3">
                            <button type="reset"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                Reset
                            </button>
                            <button type="submit"
                                class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                <iconify-icon icon="mdi:calendar-plus" class="me-1"></iconify-icon>
                                Tambah Event
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- List Events --}}
        @if($events && $events->count() > 0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-24">
                        <h6 class="text-md text-primary-light mb-16">Daftar Event</h6>

                        <div class="table-responsive">
                            <table class="table bordered-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Event</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Keterangan</th>
                                        <!-- <th scope="col">Urutan</th> -->
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td class="fw-semibold text-primary-600">{{ $event->name }}</td>
                                            <td>
                                                @if($event->date)
                                                    <span class="text-sm">{{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMM Y') }}</span>
                                                @else
                                                    <span class="text-sm text-muted fst-italic">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-sm fw-medium text-primary-600">{{ $event->location ?? '-' }}</span>
                                            </td>
                                            <td>
                                                @if($event->description)
                                                    <span class="text-sm text-secondary-light">{{ Str::limit($event->description, 100) }}</span>
                                                @else
                                                    <span class="text-sm text-muted fst-italic">Tidak ada keterangan</span>
                                                @endif
                                            </td>
                                            <!-- <td>{{ $event->display_order }}</td> -->
                                            <td>
                                                @if($event->is_active)
                                                    <span class="badge text-sm fw-semibold text-success-600 bg-success-100 px-20 py-9 radius-4">
                                                        Aktif
                                                    </span>
                                                @else
                                                    <span class="badge text-sm fw-semibold text-danger-600 bg-danger-100 px-20 py-9 radius-4">
                                                        Nonaktif
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    {{-- Toggle Active --}}
                                                    <form action="{{ route('events.toggle', $event->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-{{ $event->is_active ? 'warning' : 'success' }}"
                                                            title="{{ $event->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                            <iconify-icon icon="{{ $event->is_active ? 'mdi:eye-off' : 'mdi:eye' }}"></iconify-icon>
                                                        </button>
                                                    </form>

                                                    {{-- Edit Button --}}
                                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $event->id }}"
                                                        title="Edit">
                                                        <iconify-icon icon="mdi:pencil"></iconify-icon>
                                                    </button>

                                                    {{-- Delete --}}
                                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                            <iconify-icon icon="mdi:delete"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- Edit Modal --}}
                                        <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Event</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('events.update', $event->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Nama Event <span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="name" class="form-control"
                                                                        value="{{ $event->name }}" required>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                                                                    <input type="text" name="location" class="form-control"
                                                                        value="{{ $event->location }}" required>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <label class="form-label">Tanggal Event <span class="text-danger">*</span></label>
                                                                    <input type="date" name="date" class="form-control"
                                                                        value="{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('Y-m-d') : '' }}" required>
                                                                </div>
                                                                <!-- <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Urutan Tampil</label>
                                                                    <input type="number" name="display_order" class="form-control"
                                                                        value="{{ $event->display_order }}" min="0">
                                                                </div> -->
                                                                <!-- <div class="col-12 mb-3">
                                                                    <label class="form-label">Gambar Saat Ini</label>
                                                                    <div class="mb-2">
                                                                        @if($event->image_path)
                                                                            <img src="{{ asset('storage/' . $event->image_path) }}"
                                                                                class="img-fluid radius-8"
                                                                                style="max-height: 200px; aspect-ratio: 16/9; object-fit: cover;">
                                                                        @else
                                                                            <span class="text-muted">Tidak ada gambar</span>
                                                                        @endif
                                                                    </div>
                                                                    <label class="form-label">Upload Gambar Baru (Opsional)</label>
                                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.
                                                                        Rasio 16:9 recommended</small>
                                                                </div> -->
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label">Keterangan</label>
                                                                    <textarea name="description" class="form-control"
                                                                        rows="4">{{ $event->description }}</textarea>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="is_active"
                                                                            value="1" id="is_active_{{ $event->id }}" {{ $event->is_active ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="is_active_{{ $event->id }}">
                                                                            Aktif
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                        <iconify-icon icon="mdi:calendar-remove" class="text-5xl text-secondary-light mb-3"></iconify-icon>
                        <p class="text-secondary-light">Belum ada event yang ditambahkan</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        // Preview untuk form tambah baru
        const fileInputNew = document.getElementById("upload-file-new");
        const imagePreviewNew = document.getElementById("uploaded-img__preview-new");
        const uploadedImgContainerNew = document.querySelector(".uploaded-img-new");
        const removeButtonNew = document.querySelector(".uploaded-img__remove-new");

        if (fileInputNew) {
            fileInputNew.addEventListener("change", (e) => {
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    imagePreviewNew.src = src;
                    uploadedImgContainerNew.classList.remove('d-none');
                }
            });
        }

        if (removeButtonNew) {
            removeButtonNew.addEventListener("click", () => {
                imagePreviewNew.src = "";
                uploadedImgContainerNew.classList.add('d-none');
                fileInputNew.value = "";
            });
        }

        // Auto dismiss alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Form collapse icon handler
        const collapseUploadForm = document.getElementById('collapseUploadForm');
        const uploadFormIcon = document.getElementById('uploadFormIcon');
        
        if (collapseUploadForm && uploadFormIcon) {
            collapseUploadForm.addEventListener('show.bs.collapse', event => {
                uploadFormIcon.setAttribute('icon', 'mdi:chevron-up');
            });
            collapseUploadForm.addEventListener('hide.bs.collapse', event => {
                uploadFormIcon.setAttribute('icon', 'mdi:chevron-down');
            });
        }
    </script>
@endpush