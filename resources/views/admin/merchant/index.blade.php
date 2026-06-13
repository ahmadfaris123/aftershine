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
                <iconify-icon icon="mdi:information-outline" class="text-primary text-2xl me-2"></iconify-icon>
                <span class="fw-semibold">Kelola katalog produk merchant beserta gambar dan link pembelian</span>
            </div>
        </div>
    </div>

    {{-- Form Tambah Produk --}}
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0 p-24"
                    data-bs-toggle="collapse" data-bs-target="#collapseUploadForm"
                    aria-expanded="false" aria-controls="collapseUploadForm" style="cursor: pointer;">
                    <h6 class="text-md text-primary-light mb-0">Tambah Produk Baru</h6>
                    <iconify-icon icon="mdi:chevron-down" class="text-xl transition-transform" id="uploadFormIcon"></iconify-icon>
                </div>
                <div class="collapse" id="collapseUploadForm">
                    <div class="card-body p-24 pt-0">

                        <form action="{{ route('merchant.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Nama Produk --}}
                            <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Nama Produk <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control radius-8"
                                       placeholder="Masukkan nama produk" value="{{ old('name') }}" required>
                            </div>

                            {{-- Link URL --}}
                            <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Link URL <span class="text-muted">(Opsional)</span>
                                </label>
                                <input type="url" name="link_url" class="form-control radius-8"
                                       placeholder="https://shopee.co.id/produk" value="{{ old('link_url') }}">
                            </div>

                            {{-- Image Upload --}}
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Gambar Produk <span class="text-muted">(Opsional)</span>
                                </label>
                                <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                    <div class="uploaded-img-new d-none position-relative h-150-px w-150-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                        <button type="button"
                                            class="uploaded-img__remove-new position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                            <iconify-icon icon="radix-icons:cross-2"
                                                class="text-xl text-danger-600"></iconify-icon>
                                        </button>
                                        <img id="uploaded-img__preview-new"
                                            class="w-100 h-100 object-fit-cover"
                                            src="" alt="preview">
                                    </div>

                                    <label
                                        class="upload-file-new h-150-px w-150-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1 cursor-pointer"
                                        for="upload-file-new">
                                        <iconify-icon icon="solar:camera-outline"
                                            class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Upload Gambar</span>
                                        <input id="upload-file-new" name="image" type="file" accept="image/*" hidden>
                                    </label>
                                </div>
                                <small class="text-muted">Format: JPEG, PNG, JPG, WEBP. Maksimal 5MB. Gambar akan dikompres otomatis.</small>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Status
                                </label>
                                <select name="is_active" class="form-select radius-8">
                                    <option value="1" selected>Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-3 mt-3">
                            <button type="reset"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                Reset
                            </button>
                            <button type="submit"
                                class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                <iconify-icon icon="mdi:store-plus" class="me-1"></iconify-icon>
                                Tambah Produk
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- List Merchant --}}
        @if($merchants && $merchants->count() > 0)
        <div class="col-12">
            <div class="card">
                <div class="card-body p-24">
                    <h6 class="text-md text-primary-light mb-16">Daftar Produk Merchant</h6>

                    <div class="table-responsive">
                        <table class="table bordered-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Link URL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($merchants as $merchant)
                                <tr>
                                    <td>
                                        @if($merchant->image_path)
                                            <img src="{{ asset('storage/' . $merchant->image_path) }}"
                                                 alt="{{ $merchant->name }}"
                                                 class="w-60-px h-60-px object-fit-cover radius-8">
                                        @else
                                            <div class="w-60-px h-60-px radius-8 bg-neutral-100 d-flex align-items-center justify-content-center">
                                                <iconify-icon icon="mdi:image-off" class="text-secondary-light text-2xl"></iconify-icon>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $merchant->name }}</td>
                                    <td>
                                        @if($merchant->link_url)
                                            <a href="{{ $merchant->link_url }}" target="_blank"
                                               class="text-primary d-flex align-items-center gap-1">
                                                <iconify-icon icon="mdi:open-in-new" width="16"></iconify-icon>
                                                <span class="text-truncate" style="max-width: 200px;">{{ $merchant->link_url }}</span>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($merchant->is_active)
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
                                            <form action="{{ route('merchant.toggle', $merchant->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-{{ $merchant->is_active ? 'warning' : 'success' }}"
                                                        title="{{ $merchant->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                    <iconify-icon icon="{{ $merchant->is_active ? 'mdi:eye-off' : 'mdi:eye' }}"></iconify-icon>
                                                </button>
                                            </form>

                                            {{-- Edit Button --}}
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $merchant->id }}"
                                                    title="Edit">
                                                <iconify-icon icon="mdi:pencil"></iconify-icon>
                                            </button>

                                            {{-- Delete --}}
                                            <form action="{{ route('merchant.destroy', $merchant->id) }}" method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
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
                                <div class="modal fade" id="editModal{{ $merchant->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Produk Merchant</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ route('merchant.update', $merchant->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        {{-- Nama Produk --}}
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                                            <input type="text" name="name" class="form-control" value="{{ $merchant->name }}" required>
                                                        </div>

                                                        {{-- Link URL --}}
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Link URL</label>
                                                            <input type="url" name="link_url" class="form-control"
                                                                   value="{{ $merchant->link_url }}"
                                                                   placeholder="https://shopee.co.id/produk">
                                                        </div>

                                                        {{-- Gambar saat ini --}}
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label">Gambar Saat Ini</label>
                                                            @if($merchant->image_path)
                                                                <div class="mb-2">
                                                                    <img src="{{ asset('storage/' . $merchant->image_path) }}"
                                                                         class="img-fluid radius-8"
                                                                         style="max-height: 150px;">
                                                                </div>
                                                            @else
                                                                <p class="text-muted small">Belum ada gambar</p>
                                                            @endif
                                                            <label class="form-label">Upload Gambar Baru (Opsional)</label>
                                                            <input type="file" name="image" class="form-control" accept="image/*">
                                                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                                        </div>

                                                        {{-- Status --}}
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select name="is_active" class="form-select">
                                                                <option value="1" {{ $merchant->is_active ? 'selected' : '' }}>Aktif</option>
                                                                <option value="0" {{ !$merchant->is_active ? 'selected' : '' }}>Nonaktif</option>
                                                            </select>
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
                    <iconify-icon icon="mdi:store-off" class="text-5xl text-secondary-light mb-3"></iconify-icon>
                    <p class="text-secondary-light">Belum ada produk merchant yang ditambahkan</p>
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
