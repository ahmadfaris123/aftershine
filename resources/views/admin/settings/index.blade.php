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

    <div class="row">
        <div class="col-lg-6">
            <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="pb-24 ms-16 mb-24 me-16 mt-50">
                        <div class="text-center">
                            <h6 class="mb-0 mt-16">Logo Brand</h6>
                        </div>
                        <div class="text-center mt-3">
                            <div class="position-relative d-inline-block">
                                <img id="logoPreview"
                                    src="{{ $setting->logo_url ?? asset('assets/images/user-grid/user-grid-img14.png') }}"
                                    alt="Logo" class="w-200-px h-200-px rounded-circle object-fit-cover">
                                <label for="logoInput" class="position-absolute bottom-0 end-0 mb-12 me-12 cursor-pointer">
                                    <span
                                        class="bg-primary-600 text-white w-40-px h-40-px rounded-circle d-flex align-items-center justify-content-center">
                                        <iconify-icon icon="solar:camera-outline" class="text-xl"></iconify-icon>
                                    </span>
                                </label>
                                <input type="file" id="logoInput" name="logo" accept="image/*" class="d-none">
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">Klik icon kamera untuk mengubah logo. Rasio 1:1 (bulat)
                                    recommended</small>
                            </div>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Informasi Brand</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Nama Brand <span
                                            class="text-danger">*</span></span>
                                    <input type="text" name="brand_name" class="form-control"
                                        value="{{ old('brand_name', $setting->brand_name ?? '') }}"
                                        placeholder="Nama brand Anda" required>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Email</span>
                                    <div class="input-group">
                                        <span class="input-group-text bg-base">
                                            <iconify-icon icon="ic:outline-email"></iconify-icon>
                                        </span>
                                        <input type="email" name="email" class="form-control flex-grow-1"
                                            value="{{ old('email', $setting->email ?? '') }}"
                                            placeholder="info@example.com">
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Phone Number</span>
                                    <div class="input-group">
                                        <span class="input-group-text bg-base">
                                            <iconify-icon icon="ic:baseline-whatsapp"></iconify-icon>
                                        </span>
                                        <input type="text" name="phone_number" class="form-control flex-grow-1"
                                            value="{{ old('phone_number', $setting->phone_number ?? '') }}"
                                            placeholder="08123456789">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Social Media</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Facebook</span>
                                    <div class="input-group">
                                        <span class="input-group-text bg-base">
                                            <iconify-icon icon="mdi:facebook"></iconify-icon>
                                        </span>
                                        <input type="url" name="facebook_url" class="form-control flex-grow-1"
                                            value="{{ old('facebook_url', $setting->facebook_url ?? '') }}"
                                            placeholder="https://facebook.com/username">
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Instagram</span>
                                    <div class="input-group">
                                        <span class="input-group-text bg-base">
                                            <iconify-icon icon="mdi:instagram"></iconify-icon>
                                        </span>
                                        <input type="url" name="instagram_url" class="form-control flex-grow-1"
                                            value="{{ old('instagram_url', $setting->instagram_url ?? '') }}"
                                            placeholder="https://instagram.com/username">
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Tiktok</span>
                                    <div class="input-group">
                                        <span class="input-group-text bg-base">
                                            <iconify-icon icon="ic:baseline-tiktok"></iconify-icon>
                                        </span>
                                        <input type="url" name="tiktok_url" class="form-control flex-grow-1"
                                            value="{{ old('tiktok_url', $setting->tiktok_url ?? '') }}"
                                            placeholder="https://tiktok.com/@username">
                                    </div>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">X (Twitter)</span>
                                    <div class="input-group">
                                        <span class="input-group-text bg-base">
                                            <iconify-icon icon="prime:twitter"></iconify-icon>
                                        </span>
                                        <input type="url" name="twitter_url" class="form-control flex-grow-1"
                                            value="{{ old('twitter_url', $setting->twitter_url ?? '') }}"
                                            placeholder="https://x.com/username">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-success">
                                <iconify-icon icon="mdi:content-save" class="me-1"></iconify-icon>
                                Simpan Settings
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Preview logo when selected
        document.getElementById('logoInput').addEventListener('change', function (e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('logoPreview').src = e.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
            }
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