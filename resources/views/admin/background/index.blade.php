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

    <div class="card mb-5">
        <div class="card-body">
            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="d-flex align-items-center h-100">
                        <div>
                            <iconify-icon icon="mdi:information-outline" class="text-primary text-2xl me-2"></iconify-icon>
                            <span class="fw-semibold">Harap Upload Gambar Background dengan rasio 16:9</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center h-100">
                        <div>
                            <iconify-icon icon="mdi:alert-circle-outline" class="text-warning text-2xl me-2"></iconify-icon>
                            <span class="fw-semibold text-warning-600">Hanya satu background yang dapat aktif pada satu
                                waktu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gy-4">
        {{-- Form Upload Gambar Baru --}}
        <div class="col-12">
            <div class="card h-100">
                <div class="card-body p-24">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                            aria-labelledby="pills-edit-profile-tab" tabindex="0">
                            <h6 class="text-md text-primary-light mb-16">Upload Background Image Baru</h6>

                            <form action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-20">
                                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Judul <span class="text-muted">(Opsional)</span>
                                            </label>
                                            <input type="text" name="title" class="form-control radius-8"
                                                placeholder="Masukkan judul background">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-20">
                                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Urutan Tampil <span class="text-muted">(Opsional)</span>
                                            </label>
                                            <input type="number" name="display_order" class="form-control radius-8"
                                                placeholder="0" value="0">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-20">
                                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Deskripsi <span class="text-muted">(Opsional)</span>
                                            </label>
                                            <textarea name="description" class="form-control radius-8" rows="3"
                                                placeholder="Masukkan deskripsi background"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-20">
                                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Upload Gambar <span class="text-danger">*</span>
                                            </label>
                                            <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                                <div
                                                    class="uploaded-img d-none position-relative h-120-px w-200-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                                    <button type="button"
                                                        class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                                        <iconify-icon icon="radix-icons:cross-2"
                                                            class="text-xl text-danger-600"></iconify-icon>
                                                    </button>
                                                    <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                                        src="" alt="preview">
                                                </div>

                                                <label
                                                    class="upload-file h-120-px w-200-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                                    for="upload-file">
                                                    <iconify-icon icon="solar:camera-outline"
                                                        class="text-xl text-secondary-light"></iconify-icon>
                                                    <span class="fw-semibold text-secondary-light">Upload</span>
                                                    <input id="upload-file" name="image" type="file" accept="image/*" hidden
                                                        required>
                                                </label>
                                            </div>
                                            <small class="text-muted">Format: JPEG, PNG, JPG, WEBP. Maksimal 5MB</small>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check mb-20">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                                id="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                                Aktifkan setelah upload
                                            </label>
                                            <br>
                                            <small class="text-muted ms-4">
                                                <iconify-icon icon="mdi:information" class="text-info"></iconify-icon>
                                                Background lain akan otomatis dinonaktifkan jika ini diaktifkan
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <button type="reset"
                                        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                        Reset
                                    </button>
                                    <button type="submit"
                                        class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                        Upload Background
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- List Background Images --}}
        @if($backgrounds && $backgrounds->count() > 0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-24">
                        <h6 class="text-md text-primary-light mb-16">Daftar Background Images</h6>

                        <div class="table-responsive">
                            <table class="table bordered-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Urutan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($backgrounds as $background)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $background->image_path) }}"
                                                    alt="{{ $background->title }}"
                                                    class="w-120-px h-80-px object-fit-cover radius-8">
                                            </td>
                                            <td>{{ $background->title ?? '-' }}</td>
                                            <td>{{ Str::limit($background->description ?? '-', 50) }}</td>
                                            <td>{{ $background->display_order }}</td>
                                            <td>
                                                @if($background->is_active)
                                                    <span
                                                        class="badge text-sm fw-semibold text-success-600 bg-success-100 px-20 py-9 radius-4 text-white">
                                                        Aktif
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge text-sm fw-semibold text-danger-600 bg-danger-100 px-20 py-9 radius-4 text-white">
                                                        Nonaktif
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    {{-- Toggle Active --}}
                                                    <form action="{{ route('background.toggle', $background->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-{{ $background->is_active ? 'warning' : 'success' }}"
                                                            title="{{ $background->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                            <iconify-icon
                                                                icon="{{ $background->is_active ? 'mdi:eye-off' : 'mdi:eye' }}"></iconify-icon>
                                                        </button>
                                                    </form>

                                                    {{-- Edit Button --}}
                                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $background->id }}"
                                                        title="Edit">
                                                        <iconify-icon icon="mdi:pencil"></iconify-icon>
                                                    </button>

                                                    {{-- Delete --}}
                                                    <form action="{{ route('background.destroy', $background->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus background ini?')">
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
                                        <div class="modal fade" id="editModal{{ $background->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Background</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('background.update', $background->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Judul</label>
                                                                    <input type="text" name="title" class="form-control"
                                                                        value="{{ $background->title }}">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Urutan Tampil</label>
                                                                    <input type="number" name="display_order" class="form-control"
                                                                        value="{{ $background->display_order }}">
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label">Deskripsi</label>
                                                                    <textarea name="description" class="form-control"
                                                                        rows="3">{{ $background->description }}</textarea>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <label class="form-label">Gambar Saat Ini</label>
                                                                    <div class="mb-2">
                                                                        <img src="{{ asset('storage/' . $background->image_path) }}"
                                                                            class="img-fluid radius-8" style="max-height: 200px;">
                                                                    </div>
                                                                    <label class="form-label">Upload Gambar Baru (Opsional)</label>
                                                                    <input type="file" name="image" class="form-control"
                                                                        accept="image/*">
                                                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah
                                                                        gambar</small>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="is_active" value="1"
                                                                            id="is_active_{{ $background->id }}" {{ $background->is_active ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="is_active_{{ $background->id }}">
                                                                            Aktif
                                                                        </label>
                                                                        <br>
                                                                        <small class="text-muted ms-4">
                                                                            <iconify-icon icon="mdi:information"
                                                                                class="text-info"></iconify-icon>
                                                                            Background lain akan otomatis dinonaktifkan jika ini
                                                                            diaktifkan
                                                                        </small>
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
                        <iconify-icon icon="mdi:image-off" class="text-5xl text-secondary-light mb-3"></iconify-icon>
                        <p class="text-secondary-light">Belum ada background yang diupload</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        const fileInput = document.getElementById("upload-file");
        const imagePreview = document.getElementById("uploaded-img__preview");
        const uploadedImgContainer = document.querySelector(".uploaded-img");
        const removeButton = document.querySelector(".uploaded-img__remove");

        fileInput.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreview.src = src;
                uploadedImgContainer.classList.remove('d-none');
            }
        });

        removeButton.addEventListener("click", () => {
            imagePreview.src = "";
            uploadedImgContainer.classList.add('d-none');
            fileInput.value = "";
        });

        // Auto dismiss alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
@endpush