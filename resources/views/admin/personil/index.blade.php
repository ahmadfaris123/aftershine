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
                <span class="fw-semibold">Kelola data personil band beserta informasi social media mereka</span>
            </div>
        </div>
    </div>

    {{-- Form Tambah Personil --}}
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0 p-24" data-bs-toggle="collapse" data-bs-target="#collapseUploadForm" aria-expanded="false" aria-controls="collapseUploadForm" style="cursor: pointer;">
                    <h6 class="text-md text-primary-light mb-0">Tambah Personil Baru</h6>
                    <iconify-icon icon="mdi:chevron-down" class="text-xl transition-transform" id="uploadFormIcon"></iconify-icon>
                </div>
                <div class="collapse" id="collapseUploadForm">
                    <div class="card-body p-24 pt-0">
                    
                        <form action="{{ route('personil.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Nama --}}
                            <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control radius-8" 
                                       placeholder="Masukkan nama lengkap personil" required>
                            </div>
                            
                            {{-- Posisi --}}
                            <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Posisi <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="position" class="form-control radius-8" 
                                       placeholder="Contoh: Vocalist, Guitarist, Drummer" required>
                            </div>
                            
                            {{-- Photo Upload --}}
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Foto Personil <span class="text-danger">*</span>
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
                                        <span class="fw-semibold text-secondary-light">Upload Foto</span>
                                        <input id="upload-file-new" name="photo" type="file" accept="image/*" hidden required>
                                    </label>
                                </div>
                                <small class="text-muted">Format: JPEG, PNG, JPG, WEBP. Maksimal 5MB</small>
                            </div>
                            
                            {{-- Bio --}}
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Bio <span class="text-muted">(Opsional)</span>
                                </label>
                                <textarea name="bio" class="form-control radius-8" rows="3" 
                                          placeholder="Deskripsi singkat tentang personil"></textarea>
                            </div>
                            
                            {{-- Social Media Links --}}
                            <div class="col-12 mb-3">
                                <h6 class="text-md text-primary-light mb-12">
                                    <iconify-icon icon="mdi:link-variant" class="me-1"></iconify-icon>
                                    Social Media Links <span class="text-muted">(Opsional)</span>
                                </h6>
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label text-sm mb-8">
                                    <iconify-icon icon="mdi:facebook" class="text-primary"></iconify-icon>
                                    Facebook
                                </label>
                                <input type="url" name="facebook_url" class="form-control radius-8" 
                                       placeholder="https://facebook.com/username">
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label text-sm mb-8">
                                    <iconify-icon icon="mdi:instagram" class="text-danger"></iconify-icon>
                                    Instagram
                                </label>
                                <input type="url" name="instagram_url" class="form-control radius-8" 
                                       placeholder="https://instagram.com/username">
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label text-sm mb-8">
                                    <iconify-icon icon="mdi:twitter" class="text-info"></iconify-icon>
                                    Twitter / X
                                </label>
                                <input type="url" name="twitter_url" class="form-control radius-8" 
                                       placeholder="https://twitter.com/username">
                            </div>
                            
                            <div class="col-md-6 mb-20">
                                <label class="form-label text-sm mb-8">
                                    <iconify-icon icon="ic:baseline-tiktok" class="text-dark"></iconify-icon>
                                    TikTok
                                </label>
                                <input type="url" name="tiktok_url" class="form-control radius-8" 
                                       placeholder="https://tiktok.com/@username">
                            </div>
                            
                            {{-- Display Order --}}
                            <!-- <div class="col-md-6 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Urutan Tampil
                                </label>
                                <input type="number" name="display_order" class="form-control radius-8" 
                                       placeholder="0" value="0" min="0">
                            </div>
                            
                            {{-- Status --}}
                            <div class="col-md-6 mb-20 d-flex align-items-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" 
                                        id="is_active_new" checked>
                                    <label class="form-check-label" for="is_active_new">
                                        Aktifkan personil
                                    </label>
                                </div>
                            </div> -->
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-center gap-3 mt-3">
                            <button type="reset"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                Reset
                            </button>
                            <button type="submit"
                                class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                <iconify-icon icon="mdi:account-plus" class="me-1"></iconify-icon>
                                Tambah Personil
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- List Personil --}}
        @if($personils && $personils->count() > 0)
        <div class="col-12">
            <div class="card">
                <div class="card-body p-24">
                    <h6 class="text-md text-primary-light mb-16">Daftar Personil</h6>
                    
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Social Media</th>
                                    <!-- <th scope="col">Urutan</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($personils as $personil)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $personil->photo_path) }}" 
                                             alt="{{ $personil->name }}" 
                                             class="w-60-px h-60-px object-fit-cover radius-8">
                                    </td>
                                    <td class="fw-semibold">{{ $personil->name }}</td>
                                    <td>
                                        <span class="badge bg-primary-100 text-primary-600 px-12 py-6 radius-4">
                                            {{ $personil->position }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            @if($personil->facebook_url)
                                                <a href="{{ $personil->facebook_url }}" target="_blank" class="text-primary" title="Facebook">
                                                    <iconify-icon icon="mdi:facebook" width="20"></iconify-icon>
                                                </a>
                                            @endif
                                            @if($personil->instagram_url)
                                                <a href="{{ $personil->instagram_url }}" target="_blank" class="text-danger" title="Instagram">
                                                    <iconify-icon icon="mdi:instagram" width="20"></iconify-icon>
                                                </a>
                                            @endif
                                            @if($personil->twitter_url)
                                                <a href="{{ $personil->twitter_url }}" target="_blank" class="text-info" title="Twitter">
                                                    <iconify-icon icon="mdi:twitter" width="20"></iconify-icon>
                                                </a>
                                            @endif
                                            @if($personil->tiktok_url)
                                                <a href="{{ $personil->tiktok_url }}" target="_blank" class="text-dark" title="TikTok">
                                                    <iconify-icon icon="ic:baseline-tiktok" width="20"></iconify-icon>
                                                </a>
                                            @endif
                                            @if(!$personil->hasSocialMedia())
                                                <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                    </td>
                                    <!-- <td>{{ $personil->display_order }}</td> -->
                                    <td>
                                        @if($personil->is_active)
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
                                            <!-- <form action="{{ route('personil.toggle', $personil->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-{{ $personil->is_active ? 'warning' : 'success' }}" 
                                                        title="{{ $personil->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                    <iconify-icon icon="{{ $personil->is_active ? 'mdi:eye-off' : 'mdi:eye' }}"></iconify-icon>
                                                </button>
                                            </form> -->
                                            
                                            {{-- Edit Button --}}
                                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editModal{{ $personil->id }}"
                                                    title="Edit">
                                                <iconify-icon icon="mdi:pencil"></iconify-icon>
                                            </button>
                                            
                                            {{-- Delete --}}
                                            <form action="{{ route('personil.destroy', $personil->id) }}" method="POST" 
                                                  class="d-inline" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus personil ini?')">
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
                                <div class="modal fade" id="editModal{{ $personil->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Personil</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ route('personil.update', $personil->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                                            <input type="text" name="name" class="form-control" value="{{ $personil->name }}" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Posisi <span class="text-danger">*</span></label>
                                                            <input type="text" name="position" class="form-control" value="{{ $personil->position }}" required>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label">Foto Saat Ini</label>
                                                            <div class="mb-2">
                                                                <img src="{{ asset('storage/' . $personil->photo_path) }}" 
                                                                     class="img-fluid radius-8" 
                                                                     style="max-height: 150px;">
                                                            </div>
                                                            <label class="form-label">Upload Foto Baru (Opsional)</label>
                                                            <input type="file" name="photo" class="form-control" accept="image/*">
                                                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label">Bio</label>
                                                            <textarea name="bio" class="form-control" rows="3">{{ $personil->bio }}</textarea>
                                                        </div>
                                                        
                                                        <div class="col-12 mb-2"><h6 class="text-sm">Social Media Links</h6></div>
                                                        
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">
                                                                <iconify-icon icon="mdi:facebook" class="text-primary"></iconify-icon> Facebook
                                                            </label>
                                                            <input type="url" name="facebook_url" class="form-control" value="{{ $personil->facebook_url }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">
                                                                <iconify-icon icon="mdi:instagram" class="text-danger"></iconify-icon> Instagram
                                                            </label>
                                                            <input type="url" name="instagram_url" class="form-control" value="{{ $personil->instagram_url }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">
                                                                <iconify-icon icon="mdi:twitter" class="text-info"></iconify-icon> Twitter / X
                                                            </label>
                                                            <input type="url" name="twitter_url" class="form-control" value="{{ $personil->twitter_url }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">
                                                                <iconify-icon icon="ic:baseline-tiktok" class="text-dark"></iconify-icon> TikTok
                                                            </label>
                                                            <input type="url" name="tiktok_url" class="form-control" value="{{ $personil->tiktok_url }}">
                                                        </div>
                                                        
                                                        <!-- <div class="col-md-6 mb-3">
                                                            <label class="form-label">Urutan Tampil</label>
                                                            <input type="number" name="display_order" class="form-control" value="{{ $personil->display_order }}" min="0">
                                                        </div>
                                                        <div class="col-md-6 mb-3 d-flex align-items-end">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="is_active" value="1" 
                                                                       id="is_active_{{ $personil->id }}" {{ $personil->is_active ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="is_active_{{ $personil->id }}">
                                                                    Aktif
                                                                </label>
                                                            </div>
                                                        </div> -->
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
                    <iconify-icon icon="mdi:account-off" class="text-5xl text-secondary-light mb-3"></iconify-icon>
                    <p class="text-secondary-light">Belum ada personil yang ditambahkan</p>
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
        
        fileInputNew.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreviewNew.src = src;
                uploadedImgContainerNew.classList.remove('d-none');
            }
        });
        
        removeButtonNew.addEventListener("click", () => {
            imagePreviewNew.src = "";
            uploadedImgContainerNew.classList.add('d-none');
            fileInputNew.value = "";
        });
        
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