@php
    use App\Http\Controllers\LandingController;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official Website Aftershine">
    <!-- Title -->
    <title> {{ $settings->brand_name ?? 'Aftershine' }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $settings->logo_url ?? asset('assets/images/AFTERSHINE_LOGOGRAM_WHITE.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/bootstrap.min.css') }}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/select2.min.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/slick.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/magnific-popup.css') }}">
    <!-- jquery-ui -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/jquery-ui.css') }}">
    <!-- plyr Css -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/plyr.css') }}">
    <!-- Editor js Toolbar Start -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/editor-quill.css') }}">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/animate.css') }}">
    <!-- dataTables.dataTables -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/dataTables.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/aos.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/landing_v2/css/main.css') }}">
    <style>
      @font-face {
        font-family: 'JMH Typewriter';
        src: url('{{ asset('assets/JMH Typewriter.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
      }
      :root {
        --body-font: 'JMH Typewriter', monospace;
      }
      body { 
        font-family: 'JMH Typewriter', monospace; 
        background-color: #000000;
        color: #e2e8f0;
      }
      html { scroll-behavior: smooth; }
      .header { transition: all 0.3s ease; background-color: #000000 !important; padding: 15px 0 !important; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
      .nav-link, .navbar-brand, h1, h2, h3, h4, h5, h6, .section-heading h2, .footer-item__title { font-family: "Open Sans", sans-serif !important; }
      .nav-link { font-weight: 600; text-transform: uppercase; letter-spacing: 1.5px; position: relative; padding-bottom: 5px; }
      .nav-link::after { content: ''; position: absolute; width: 0; height: 2px; bottom: 0; left: 50%; background-color: #ffb83c; transition: all 0.3s ease; transform: translateX(-50%); }
      .nav-link:hover::after { width: 100%; }
      .nav-link:hover { color: #ffb83c !important; }
      .banner-img {
        height: 80vh;
        background-color: #000000;
      }
      @media (max-width: 768px) {
        .banner-img {
          height: 40vh;
        }
      }
    </style>
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <!-- <div class="preloader">
    <img src="assets/landing_v2/images/icons/preloader.gif" alt="">
  </div> -->
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    <!-- ========================= Banner Section Start =============================== -->
    <header class="header position-fixed w-100" style="top: 0; left: 0; padding: 15px 0; z-index: 9999;">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-0">
          <a class="navbar-brand" href="#home">
            <img src="assets/images/logo-light.png" alt="Logo" style="max-height: 40px; object-fit: contain;">
          </a>
          <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-2 gap-lg-5" style="font-size: 13px;">
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#profile">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#personel">Personel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#music">Originals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#events">Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#awards">Awards</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#merchant">Merchant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="#contact_us">Contact Us</a>
              </li>
            </ul>
          </div>
          <div class="d-none d-lg-flex align-items-center gap-3">
              <!-- <a href="#" class="text-white hover-text-main-600 transition-1"><i class="ph ph-user" style="font-size: 24px;"></i></a> -->
          </div>
        </nav>
      </div>
    </header>
    <!-- ========================= Banner SEction End =============================== -->

    <!-- ========================== Brand Section Start =========================== -->
    <section id="home" class="banner" style="background-color: #000000;">
        <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @forelse($activeBackground as $item)
            <div class="carousel-item @if($item->is_active) active @endif">
              <img src="{{ asset('storage/' . $item->image_path) }}" class="d-block w-100 object-fit-cover banner-img" alt="Banner 2">
            </div>
            @empty
            <div class="carousel-item active">
              <img src="{{ asset('assets/landing_v2/images/AFTERSHINE_MAIN LOGO_BLACK.png') }}" class="d-block w-100 object-fit-cover banner-img" alt="Banner 2">
            </div>
            @endforelse
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </section>
    <!-- ========================== Brand Section End =========================== -->

    <!-- ============================= Features Section Start ============================== -->
    <section id="profile" class="choose-us pt-120 position-relative z-1" style="background-image: url('{{ asset('assets/landing_v2/images/bg/abous_us.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
      <div class="container">
        <div class="row gy-5 align-items-center">
          <!-- Gambar di bagian kiri -->
          <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
            <div class="position-relative d-inline-block">
              <img src="{{ asset('assets/landing_v2/images/8.png') }}" alt="Aftershine" class="img-fluid rounded-16" style="width: 550px; z-index: 2;">
              <!-- <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE-3.png') }}" alt="Logogram" class="position-absolute" style="top: 0; left: 0; transform: translate(-45%, -45%); width: 150px; z-index: 2;"> -->
            </div>
          </div>
          <!-- Teks di bagian kanan -->
          <div class="col-lg-6">
            <div class="testimonials__content">
              <div class="section-heading style-left" style="margin-top: -20px;">
                <p>About Us</p>
                <h1 class="mb-24 wow bounceIn" style="color: #ffb83c">
                  Aftershine
                </h1>
              </div>

              <div class="testimonials__slider">
                <div class="testimonials-item">
                  <p
                    class="text-white"
                    data-aos="fade-left"
                    data-aos-duration="1200"
                    style="line-height: 1.8; color: #e2e8f0 !important;"
                  >
                    Hi, salam kenal, sebelum melangkah lebih jauh, izinkan kami menyapa. 
                    <br>
                    <br>
                    Perkenalkan kami Afetrshine. lahir didesa dari jalan kecil yang lebih sering diselimuti suara jangkrik daripada sorot lampu kota.
                    Kami tumbuh bersama debu sawah, tongkrongan sederhana, dan mimpi-mimpi besar yang diam-diam dipelihara di kepala.
                    Membawa warna pop Jawa, kami meramu lirik-lirik yang dekat dengan hidup banyak orang, tentang patah hati, pulang, kelangan, hingga harapan yang tetap dipaksa hidup meski keadaan sempit.
                    Musik kami bukan sekadar hiburan, tapi surat dari kampung kecil yang kami sisipkan untuk siapa saja yang sedang berjuang di luar sana.
                    Dari desa, kami datang tanpa banyak gaduh dan perlahan menjelma jadi suara yang dinyanyikan banyak orang.
                    <br>
                    <br>
                    Best Regrads,
                    Aftershine
                  </p>
                </div>
              </div>
              <div class="flex-align gap-16 mt-40"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ============================= Features Section End ============================== -->

    <section class="image-separator py-60" style="background-color: #000000;">
      <div class="container-fluid px-0" data-aos="fade-up" data-aos-duration="500">
        <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE-8-white.png') }}" alt="Aftershine Asset" class="w-100 object-fit-cover" style="filter: brightness(0.8);">
      </div>
    </section>

    <!-- ================================= testimonials Section Start ========================================= -->
    <section id="personel" class="testimonials py-120 position-relative z-1" style="background-image: url('{{ asset('assets/landing_v2/images/bg/the_personel.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="container">

            <div class="section-heading text-center">
                <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE-5.png') }}" alt="Aftershine Asset" class="w-100 object-fit-cover">
            </div>

            <div class="tutor-slider">
                @forelse($personils as $personil)
                    <div class="px-12" data-aos="fade-up" data-aos-duration="200">
                        <div class="overflow-hidden mb-24">
                            <img src="{{ asset('storage/' . $personil->photo_path) }}"
                                class="w-100" style="aspect-ratio: 1/1; object-fit: cover;">
                        </div>
                        <div class="text-start">
                            <h4 class="mb-12" style="color: #ffffff; font-weight: 700;">{{ $personil->name }}</h4>
                            <p class="mb-8" style="color: #cbd5e1; font-size: 14px;">{{ $personil->position }}</p>
                            <!-- <p class="mb-8" style="color: #333; font-size: 14px;">{{ $personil->phone }}</p> -->
                            
                            <div class="d-flex gap-16">
                                @if($personil->instagram_url)
                                    <a href="{{ $personil->instagram_url }}" target="_blank" class="text-white transition-1 text-xl">
                                        <i class="ph-bold ph-instagram-logo"></i>
                                    </a>
                                @endif
                                @if($personil->tiktok_url)
                                    <a href="{{ $personil->tiktok_url }}" target="_blank" class="text-white transition-1 text-xl">
                                        <i class="ph-bold ph-tiktok-logo"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center p-5 w-100">
                        <p>Belum ada personil yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>

            <div class="flex-center gap-16 mt-40">
                <button type="button" id="tutor-prev"
                    class="slick-prev slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-black transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="tutor-next"
                    class="slick-next slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-black transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- ================================= testimonials Section End ========================================= -->

    <!-- ================================= Blog Section Start ========================================= -->
    <section id="music" class="choose-us pt-120 position-relative z-1" style="background-color: #050505;">
        <style>
            .video-card {
                box-shadow: 0 4px 12px rgba(0,0,0,0.03);
                transition: all 0.3s ease;
            }
            .video-card:hover {
                box-shadow: 0 12px 24px rgba(0,0,0,0.1);
            }
            .video-card img {
                transition: transform 0.5s ease;
            }
            .video-card:hover img {
                transform: scale(1.05);
            }
            .video-card .play-btn {
                transition: all 0.3s ease;
            }
            .video-card:hover .play-btn {
                background-color: #0f172a !important;
                transform: translate(-50%, -50%) scale(1.1) !important;
            }
            .video-card:hover .play-btn i {
                color: #ffffff !important;
            }
        </style>
        <div class="container">
            <!-- Header Section -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-40" data-aos="fade-up">
                <div class="mb-3 mb-md-0">
                    <span style="color: #cbd5e1; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 8px;">Dari Youtube</span>
                    <h2 class="mb-0" style="font-weight: 900; font-size: 32px; color: #ffffff; text-transform: uppercase; letter-spacing: -0.5px;">Video Lainnya</h2>
                </div>
                <a href="https://www.youtube.com/@AFTERSHINE" target="_blank" class="btn rounded-pill btn-outline-white flex-align gap-8 fw-bold transition-2 text-white" style="background-color: #111111; color: #ffffff; padding: 12px 28px; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">
                    Tonton di Youtube <i class="ph-bold ph-caret-right text-lg"></i>
                </a>
            </div>

            <div class="row gy-4">
                <!-- Card 1 -->
                @forelse($songs as $song)
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
                    @php
                        $ytUrl = $song->youtube_url ?? '';
                        $ytId = '';
                        if (preg_match('/youtu\.be\/([^?&\/]+)/', $ytUrl, $m)) {
                            $ytId = $m[1];
                        } elseif (preg_match('/[?&]v=([^&]+)/', $ytUrl, $m)) {
                            $ytId = $m[1];
                        }
                        
                        $cleanYtUrl = $ytId ? "https://www.youtube.com/watch?v={$ytId}" : $ytUrl;
                        $thumbSrc = $ytId
                            ? "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg"
                            : "https://img.youtube.com/hqdefault.jpg";
                    @endphp
                    <a href="{{ $cleanYtUrl }}" class="popup-youtube d-block text-decoration-none h-100">
                        <div class="bg-dark h-100 d-flex flex-column border-0 video-card" style="cursor: pointer;">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ $thumbSrc }}" alt="{{ $song->title }}" class="w-100" style="aspect-ratio: 16/9; object-fit: cover;">
                                <div class="play-btn position-absolute top-50 start-50 translate-middle bg-white rounded-circle flex-center" style="width: 48px; height: 48px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                                    <i class="ph-fill ph-play" style="font-size: 24px; color: #0f172a; margin-left: 4px;"></i>
                                </div>
                            </div>
                            <div class="p-20 d-flex flex-column flex-grow-1" style="background-color: #111;">
                                <h5 class="mb-16 text-line-3" style="font-size: 15px; font-weight: 700; color: #ffffff; line-height: 1.5;">{{ $song->title }}</h5>
                                <div class="mt-auto">
                                    <span style="color: #94a3b8; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">{{ \Carbon\Carbon::parse($song->release_date)->format('d F Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                    <div class="text-center p-5 w-100">
                        <p>Belum ada lagu yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Tombol Liat Semua -->
            <div class="text-center mt-40 mb-40" data-aos="fade-up">
                <a href="{{ route('originals') }}" class="btn rounded-pill btn-outline-white fw-bold transition-2 text-white" style="background-color: #111111; color: #ffffff; padding: 14px 40px; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">
                    Liat Semua <i class="ph-bold ph-caret-right text-lg"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- ================================= Blog Section End ========================================= -->
    <section id="albums" class="py-120 position-relative z-1" style="background-image: url('{{ asset('assets/landing_v2/images/bg/event.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <style>
            .album-card {
                cursor: pointer;
                border-radius: 12px;
                overflow: hidden;
                position: relative;
                transition: transform 0.35s ease, box-shadow 0.35s ease;
            }
            .album-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 20px 50px rgba(0,0,0,0.55);
            }
            .album-card__cover {
                width: 100%;
                aspect-ratio: 1 / 1;
                object-fit: cover;
                display: block;
                border-radius: 12px;
                filter: brightness(0.82);
                transition: filter 0.35s ease;
            }
            .album-card:hover .album-card__cover { filter: brightness(0.55); }
            .album-card__no-cover {
                width: 100%;
                aspect-ratio: 1 / 1;
                background: #1a1a1a;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .album-card__overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 55%);
                border-radius: 12px;
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                align-items: center;
                padding: 18px 14px 16px;
            }
            .album-card__play-icon {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -60%);
                opacity: 0;
                transition: opacity 0.3s ease, transform 0.3s ease;
                font-size: 44px;
                color: #ffb83c;
                filter: drop-shadow(0 2px 10px rgba(0,0,0,0.8));
            }
            .album-card:hover .album-card__play-icon {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
            .album-card__name {
                font-family: "Open Sans", sans-serif;
                font-size: 15px;
                font-weight: 700;
                color: #ffffff;
                text-align: center;
                letter-spacing: 0.4px;
                text-shadow: 0 2px 8px rgba(0,0,0,0.8);
                line-height: 1.3;
            }
            .album-card__count {
                font-size: 11px;
                color: #ffb83c;
                text-align: center;
                margin-top: 5px;
                letter-spacing: 1px;
                text-transform: uppercase;
            }
            /* Modal Styling */
            #albumDetailModal .modal-content {
                background-color: #111111;
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 16px;
                color: #ffffff;
            }
            #albumDetailModal .modal-header {
                border-bottom: 1px solid rgba(255,255,255,0.08);
                padding: 24px 24px 20px;
                display: flex;
                flex-direction: column;
            }
            @media (min-width: 576px) {
                #albumDetailModal .modal-header {
                    flex-direction: row;
                    align-items: flex-start;
                }
            }
            #albumDetailModal .modal-body { padding: 0 24px 24px; }
            #albumDetailModal .album-modal-cover {
                width: 100px;
                height: 100px;
                object-fit: cover;
                border-radius: 10px;
                flex-shrink: 0;
                box-shadow: 0 8px 24px rgba(0,0,0,0.5);
                margin-bottom: 16px;
            }
            @media (min-width: 576px) {
                #albumDetailModal .album-modal-cover {
                    width: 110px;
                    height: 110px;
                    margin-bottom: 0;
                    margin-right: 20px;
                }
            }
            #albumDetailModal .album-modal-title {
                font-family: "Open Sans", sans-serif;
                font-size: 20px;
                font-weight: 700;
                color: #ffffff;
                margin-bottom: 6px;
                line-height: 1.3;
            }
            #albumDetailModal .album-modal-desc {
                font-size: 13px;
                color: #94a3b8;
                line-height: 1.6;
                margin-bottom: 0;
            }
            #albumDetailModal .album-modal-badge {
                display: inline-block;
                background: rgba(255,184,60,0.15);
                color: #ffb83c;
                font-size: 11px;
                font-weight: 700;
                letter-spacing: 1px;
                text-transform: uppercase;
                padding: 3px 12px;
                border-radius: 20px;
                margin-top: 10px;
            }
            .album-tracks-table { width: 100%; border-collapse: collapse; margin-top: 16px; }
            .album-tracks-table thead th {
                font-size: 10px;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                color: #475569;
                padding: 0 12px 12px 12px;
                border-bottom: 1px solid rgba(255,255,255,0.06);
            }
            .album-tracks-table thead th:last-child { text-align: center; }
            .album-tracks-table tbody tr {
                border-bottom: 1px solid rgba(255,255,255,0.04);
                transition: background 0.2s;
            }
            .album-tracks-table tbody tr:last-child { border-bottom: none; }
            .album-tracks-table tbody tr:hover { background: rgba(255,255,255,0.04); }
            .album-tracks-table tbody td {
                padding: 11px 12px;
                font-size: 13px;
                color: #e2e8f0;
                vertical-align: middle;
            }
            .album-tracks-table .t-num { color: #475569; font-size: 12px; width: 32px; }
            .album-tracks-table .t-title { font-weight: 600; color: #f1f5f9; }
            .album-tracks-table .t-artist { color: #94a3b8; font-size: 12px; }
            .album-tracks-table .t-link { text-align: center; }
            .btn-spotify-link {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                background: #1DB954;
                color: #ffffff !important;
                font-size: 11px;
                font-weight: 700;
                padding: 5px 14px;
                border-radius: 20px;
                text-decoration: none;
                transition: background 0.2s, transform 0.2s;
                letter-spacing: 0.3px;
                white-space: nowrap;
            }
            .btn-spotify-link:hover { background: #17a349; transform: scale(1.04); }
            .tracks-empty-msg {
                text-align: center;
                padding: 32px 0;
                color: #475569;
                font-size: 13px;
            }
            /* responsive table for mobile */
            @media (max-width: 576px) {
                .album-tracks-table tbody td {
                    padding: 8px 4px;
                    font-size: 12px;
                }
                .btn-spotify-link {
                    padding: 4px 8px;
                    font-size: 10px;
                }
                .btn-spotify-link svg {
                    width: 10px;
                    height: 10px;
                }
            }
        </style>

        <div class="container">
            <div class="section-heading text-center">
                <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE (6).png') }}" alt="Aftershine Asset" class="w-100 object-fit-cover">
            </div>

            @if(isset($albums) && $albums->count() > 0)
                {{-- Album Slider --}}
                <div class="album-slider mt-40">
                    @foreach($albums as $album)
                        <div class="px-12" data-aos="fade-up" data-aos-duration="200">
                            <div class="album-card"
                                 data-album-name="{{ $album->name }}"
                                 data-album-desc="{{ $album->description ?? '' }}"
                                 data-album-cover="{{ $album->cover_path ? asset('storage/' . $album->cover_path) : '' }}"
                                 data-album-tracks="{{ $album->tracks }}">

                                @if($album->cover_path)
                                    <img src="{{ asset('storage/' . $album->cover_path) }}"
                                         alt="{{ $album->name }}"
                                         class="album-card__cover">
                                @else
                                    <div class="album-card__no-cover">
                                        <i class="ph-bold ph-music-notes" style="font-size: 52px; color: #374151;"></i>
                                    </div>
                                @endif

                                <i class="ph-bold ph-play-circle album-card__play-icon"></i>

                                <div class="album-card__overlay">
                                    <div class="album-card__name">{{ $album->name }}</div>
                                    <div class="album-card__count">{{ $album->tracks->count() }} lagu</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Navigation arrows --}}
                <div class="flex-center gap-16 mt-40">
                    <button type="button" id="album-prev"
                        class="slick-prev slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-black transition-1 w-48 h-48 text-white">
                        <i class="ph ph-caret-left"></i>
                    </button>
                    <button type="button" id="album-next"
                        class="slick-next slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-black transition-1 w-48 h-48 text-white">
                        <i class="ph ph-caret-right"></i>
                    </button>
                </div>
            @endif
        </div>

        {{-- ===== Album Detail Popup ===== --}}
        <div id="albumDetailPopup" class="mfp-hide album-popup-container" style="max-width: 800px; margin: 40px auto; position: relative;">
            <div class="modal-content" style="background-color: #111111; border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; color: #ffffff;">
                <div class="modal-header position-relative" style="border-bottom: 1px solid rgba(255,255,255,0.08); padding: 24px 24px 20px;">
                    <div class="d-flex align-items-start gap-10 w-100 me-4">
                        <img id="modal-album-cover" src="" alt="" class="album-modal-cover" style="width: 90px; height: 90px; object-fit: cover; border-radius: 8px; flex-shrink: 0;">
                        <div class="text-start">
                            <p style="font-size: 10px; color: #64748b; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 4px; font-family: 'Open Sans', sans-serif;">Album</p>
                            <h1 class="album-modal-title mb-2" id="albumDetailModalLabel" style="font-size: 28px; font-weight: 800; color: #ffffff; line-height: 1.2;">—</h1>
                            <p class="album-modal-desc mb-2" id="modal-album-desc" style="font-size: 13px; color: #94a3b8; line-height: 1.5;"></p>
                            <span class="album-modal-badge" id="modal-album-count"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-body" style="padding: 0 24px 24px;">
                    <div class="table-responsive" style="max-height: 60vh; overflow-y: auto;">
                        <table class="album-tracks-table">
                            <thead>
                                <tr>
                                    <th class="t-num">#</th>
                                    <th>Judul Lagu</th>
                                    <th>Artist</th>
                                    <th style="text-align:center; padding-right:12px;">Spotify</th>
                                </tr>
                            </thead>
                            <tbody id="modal-tracks-body">
                                <tr><td colspan="4" class="tracks-empty-msg">Memuat...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <style>
                #albumDetailPopup .mfp-close {
                    color: #ffffff !important;
                    font-size: 32px;
                    opacity: 0.7;
                    top: 10px;
                    right: 10px;
                }
                #albumDetailPopup .mfp-close:hover {
                    opacity: 1;
                }
            </style>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                if ($('.album-slider').length > 0) {
                    $('.album-slider').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: false,
                        speed: 900,
                        dots: false,
                        infinite: true,
                        arrows: true,
                        draggable: true,
                        nextArrow: '#album-next',
                        prevArrow: '#album-prev',
                        responsive: [
                            { breakpoint: 1200, settings: { slidesToShow: 3, arrows: false } },
                            { breakpoint: 992,  settings: { slidesToShow: 2, arrows: false } },
                            { breakpoint: 576,  settings: { slidesToShow: 1, arrows: false } }
                        ]
                    });
                }

                $('.album-card').on('click', function(e) {
                    e.preventDefault();
                    var card   = $(this);
                    var name   = card.data('album-name')  || '—';
                    var desc   = card.data('album-desc')  || '';
                    var cover  = card.data('album-cover') || '';
                    var tracksRaw = card.data('album-tracks');
                    var tracks = [];
                    if (typeof tracksRaw === 'string') {
                        try {
                            tracks = JSON.parse(tracksRaw);
                        } catch(err) {}
                    } else if (Array.isArray(tracksRaw)) {
                        tracks = tracksRaw;
                    }

                    if (cover) {
                        $('#modal-album-cover').attr('src', cover).attr('alt', name).show();
                    } else {
                        $('#modal-album-cover').hide();
                    }
                    $('#albumDetailModalLabel').text(name);
                    $('#modal-album-desc').text(desc);
                    $('#modal-album-count').text(tracks.length + ' lagu');

                    var tbody = $('#modal-tracks-body');
                    tbody.empty();

                    if (!tracks || tracks.length === 0) {
                        tbody.append('<tr><td colspan="4" class="tracks-empty-msg">Belum ada lagu dalam album ini.</td></tr>');
                    } else {
                        $.each(tracks, function (i, track) {
                            var artistCell = track.artist
                                ? '<span class="t-artist">' + track.artist + '</span>'
                                : '<span style="color:#475569">—</span>';

                            var spotifyBtn = track.spotify_url
                                ? '<a href="' + track.spotify_url + '" target="_blank" rel="noopener" class="btn-spotify-link">'
                                  + '<svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0zm5.56 17.32c-.22.36-.7.47-1.06.25-2.9-1.77-6.55-2.17-10.85-1.19-.41.09-.82-.17-.91-.59-.09-.41.17-.82.59-.91 4.7-1.07 8.73-.6 11.98 1.38.36.22.47.7.25 1.06zm1.48-3.3c-.28.45-.87.59-1.32.31C14.78 12.32 10.68 11.8 7 12.9c-.5.15-1.02-.13-1.17-.63-.15-.5.13-1.02.63-1.17C10.84 9.93 15.35 10.5 18.72 12.7c.45.28.59.87.32 1.32zm.13-3.43c-3.46-2.06-9.17-2.25-12.47-1.24-.53.16-1.09-.14-1.25-.67-.16-.53.14-1.09.67-1.25 3.79-1.15 10.09-.93 14.07 1.44.48.28.64.9.35 1.38-.28.48-.9.64-1.37.34z"/></svg>'
                                  + ' Dengarkan</a>'
                                : '<span style="color:#475569;font-size:12px">—</span>';

                            tbody.append(
                                '<tr>'
                                + '<td class="t-num">' + (i + 1) + '</td>'
                                + '<td class="t-title">' + track.title + '</td>'
                                + '<td>' + artistCell + '</td>'
                                + '<td class="t-link">' + spotifyBtn + '</td>'
                                + '</tr>'
                            );
                        });
                    }
                    
                    $.magnificPopup.open({
                        items: {
                            src: '#albumDetailPopup'
                        },
                        type: 'inline',
                        mainClass: 'mfp-fade',
                        removalDelay: 160,
                        closeBtnInside: true
                    });
                });
            });
        </script>
    </section>
    <!-- ================================= testimonials Section Start ========================================= -->
    <section id="events" class="py-120 position-relative z-1" style="background-image: url('{{ asset('assets/landing_v2/images/bg/event.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <style>
            .events-table thead th {
                font-size: 11px;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                color: #ffffff;
                padding: 0 16px 20px 16px;
                border: none;
                white-space: nowrap;
                text-align: center;
                vertical-align: middle;
            }
            .events-table tbody td {
                padding: 20px 16px;
                border: none;
                border-top: 1px solid #334155;
                vertical-align: middle;
                text-align: center;
            }
            .events-table tbody tr:first-child td {
                border-top: 1px solid #334155;
            }
            .events-table .show-name {
                font-size: 14px;
                font-weight: 700;
                color: #ffffff;
                line-height: 1.4;
            }
            .events-table .show-city {
                font-size: 12px;
                color: #94a3b8;
                font-weight: 500;
                margin-top: 2px;
            }
            .events-table .show-time {
                font-size: 13px;
                color: #cbd5e1;
                white-space: nowrap;
            }
            .events-table .show-location {
                font-size: 13px;
                color: #cbd5e1;
            }
            .btn-more-info {
                font-size: 11px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.8px;
                color: #ffffff;
                border: 1.5px solid #ffffff;
                border-radius: 50px;
                padding: 6px 18px;
                background: transparent;
                transition: all 0.25s ease;
                white-space: nowrap;
                text-decoration: none;
                display: inline-block;
            }
            .btn-more-info:hover {
                background: #ffffff;
                color: #000000;
            }
            .event-past td {
                opacity: 0.35;
            }
            .event-past .show-name,
            .event-past .show-time,
            .event-past .show-location {
                color: #64748b !important;
            }
            .badge-done {
                font-size: 10px;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1px;
                color: #64748b;
                border: 1.5px solid #475569;
                border-radius: 50px;
                padding: 4px 12px;
                background: transparent;
                white-space: nowrap;
                display: inline-block;
            }
        </style>
        <div class="container">
            <div class="section-heading text-center">
                <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE-9.png') }}" alt="Aftershine Asset" class="w-100 object-fit-cover">
            </div>

            <div class="table-responsive" data-aos="fade-up">
                <table class="events-table table table-dark table-borderless w-100" style="background-color: transparent;">
                    <thead>
                        <tr>
                            <th class="text-center">Show</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Show Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        @php $isPast = $event->date && \Carbon\Carbon::parse($event->date)->startOfDay()->isPast(); @endphp
                        <tr style="background-color: transparent;" class="{{ $isPast ? 'event-past' : '' }}">
                            <td style="background-color: transparent;" class="text-center">
                                <div class="show-name">{{ $event->name }}</div>
                            </td>
                            <td style="background-color: transparent;" class="text-center"><span class="show-time">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span></td>
                            <td style="background-color: transparent;" class="text-center"><span class="show-location">{{ $event->location }}</span></td>
                            <td style="background-color: transparent;" class="text-center">
                                @if($isPast)
                                    <span class="badge-done">Done</span>
                                @else
                                    <a href="https://www.instagram.com/aftershine.official?utm_source=ig_web_button_share_sheet" target="_blank" class="btn-more-info">More Info</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr style="background-color: transparent;">
                                <td colspan="4" class="text-center p-5 w-100" style="background-color: transparent;">
                                    <p class="text-white mb-0">Belum ada event yang ditambahkan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- ================================= testimonials Section Start ========================================= -->

    <!-- ================================= Blog Section Start ========================================= -->
    <section id="awards" class="py-120 bg-dark position-relative" style="background-image: url('{{ asset('assets/landing_v2/images/bg/merchant.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <style>
            .award-card {
                position: relative;
                overflow: hidden;
                cursor: pointer;
            }
            .award-card img {
                width: 100%;
                aspect-ratio: 1/1;
                object-fit: cover;
                display: block;
                transition: transform 0.5s ease;
            }
            .award-card:hover img {
                transform: scale(1.05);
            }
            .award-card__overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                padding: 28px 20px 20px;
                background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, transparent 100%);
            }
            .award-card__place {
                font-size: 22px;
                font-weight: 800;
                color: #ffffff;
                line-height: 1.2;
                margin-bottom: 4px;
                font-family: "Open Sans", sans-serif;
            }
            .award-card__name {
                font-size: 13px;
                color: rgba(255,255,255,0.85);
                font-weight: 400;
            }
        </style>
        <div class="container">
            <div class="section-heading text-center">
                <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE-10.png') }}" alt="Aftershine Asset" class="w-100 object-fit-cover">
            </div>

            <div class="award-slider px-12">
                <!-- Card 1 -->
                @forelse($awards as $award)
                <div class="px-8">
                    <div class="award-card">
                        <img src="{{ asset('storage/' . $award->image_path) }}" alt="{{ $award->name }}">
                        <div class="award-card__overlay">
                            <div class="award-card__place">{{ $award->name }}</div>
                            <div class="award-card__name">{{ $award->description }}</div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="text-center p-5 w-100">
                        <p>Belum ada Award yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>

            <div class="flex-center gap-16 mt-40">
                <button type="button" id="award-prev"
                    class="slick-prev slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="award-next"
                    class="slick-next slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- ==================== Merchant Start Here ==================== -->
     <section id="merchant" class="testimonials py-120 position-relative z-1" style="background-image: url('{{ asset('assets/landing_v2/images/bg/awards.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="container">

            <div class="section-heading text-center">
                <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE-11.png') }}" alt="Aftershine Asset" class="w-100 object-fit-cover">
            </div>

            <div class="merchant-slider">
                <div class="section-heading text-center">
                    <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE (5).png') }}" alt="Aftershine Asset" class="w-100 object-fit-cover">
                </div>
                <!-- @forelse($personils as $personil)
                    <div class="px-12" data-aos="fade-up" data-aos-duration="200">
                        <div class="overflow-hidden mb-24">
                            <img src="{{ asset('storage/' . $personil->photo_path) }}"
                                class="w-100" style="aspect-ratio: 1/1; object-fit: cover;">
                        </div>
                        <div class="text-start">
                            <h4 class="mb-12" style="color: #ffffff; font-weight: 700;">{{ $personil->name }}</h4>
                            <p class="mb-8" style="color: #cbd5e1; font-size: 14px;">{{ $personil->position }}</p>
                            <p class="mb-8" style="color: #333; font-size: 14px;">{{ $personil->phone }}</p>
                            
                            <div class="d-flex gap-16">
                                @if($personil->instagram_url)
                                    <a href="{{ $personil->instagram_url }}" target="_blank" class="text-white transition-1 text-xl">
                                        <i class="ph-bold ph-instagram-logo"></i>
                                    </a>
                                @endif
                                @if($personil->tiktok_url)
                                    <a href="{{ $personil->tiktok_url }}" target="_blank" class="text-white transition-1 text-xl">
                                        <i class="ph-bold ph-tiktok-logo"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center p-5 w-100">
                        <p>Belum ada Merchant yang ditambahkan.</p>
                    </div>
                @endforelse -->
            </div>

            <!-- <div class="flex-center gap-16 mt-40">
                <button type="button" id="merchant-prev"
                    class="slick-prev slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-black transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="merchant-next"
                    class="slick-next slick-arrow flex-center rounded-circle border border-gray-600 hover-border-main-600 text-xl hover-bg-main-600 hover-text-black transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div> -->
        </div>
    </section>
    <!-- ==================== Merchant end ==================== -->

    <!-- ==================== Footer Start Here ==================== -->
    <footer id="contact_us" class="footer position-relative z-1" style="background-image: url('{{ asset('assets/landing_v2/images/bg/contact_us.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <!-- <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape four animation-scalation visible-mobile-devices">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape two animation-scalation visible-mobile-devices"> -->

        <div class="py-120 ">
            <div class="container container-two">
                <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-5">
                    <div class="col" data-aos="fade-up" data-aos-duration="300">
                        <div class="footer-item">
                            <div class="footer-item__logo">
                                <br>
                                <br>
                                <a href="#">
                                    <img src="{{ asset('assets/landing_v2/images/logo-light.png') }}" alt="Logo">
                                </a>
                            </div>
                            <!-- <p class="my-32">EduAll exceeded all my expectations! The instructors were not only experts</p> -->
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-duration="800">
                        <div class="footer-item">
                            <h4 class="footer-item__title mb-32" style="color: #ffb83c">Contact Us</h4>
                            @if(isset($settings->phone_number))
                                <div class="flex-align gap-20 mb-24">
                                    <span class="icon d-flex text-32 text-main-600"><i
                                            class="ph ph-whatsapp-logo text-white"></i></span>
                                    <div class="">
                                        <a href="{{ LandingController::getWhatsAppLink($settings->phone_number) }}"
                                            target="_blank"
                                            class="text-white d-block hover-text-main-600 mb-4">{{ $settings->phone_number }}</a>
                                    </div>
                                </div>
                            @endif

                            @if(isset($settings->email))
                                <div class="flex-align gap-20 mb-24">
                                    <span class="icon d-flex text-32 text-main-600"><i
                                            class="ph ph-envelope-open text-white"></i></span>
                                    <div class="">
                                        <a href="mailto:{{ $settings->email }}"
                                            class="text-white d-block hover-text-main-600 mb-4">{{ $settings->email }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if(isset($settings->facebook_url) || isset($settings->twitter_url))
                        <div class="col" data-aos="fade-up" data-aos-duration="800">
                            <div class="footer-item">
                                <h4 class="footer-item__title mb-32"><br></h4>
                                @if(isset($settings->facebook_url))
                                    <div class="flex-align gap-20 mb-24">
                                        <span class="icon d-flex text-32 text-main-600"><i
                                                class="ph-bold ph-facebook-logo text-white"></i></span>
                                        <div class="">
                                            <a href="{{ $settings->facebook_url }}" target="_blank"
                                                class="text-white d-block hover-text-main-600 mb-4">Facebook</a>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($settings->instagram_url))
                                    <div class="flex-align gap-20 mb-24">
                                        <span class="icon d-flex text-32 text-main-600"><i
                                                class="ph-bold ph-instagram-logo text-white"></i></span>
                                        <div class="">
                                            <a href="{{ $settings->instagram_url }}" target="_blank"
                                                class="text-white d-block hover-text-main-600 mb-4">Instagram</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if(isset($settings->instagram_url) || isset($settings->tiktok_url))
                        <div class="col" data-aos="fade-up" data-aos-duration="800">
                            <div class="footer-item">
                                <h4 class="footer-item__title mb-32"><br></h4>
                                @if(isset($settings->tiktok_url))
                                    <div class="flex-align gap-20 mb-24">
                                        <span class="icon d-flex text-32 text-main-600"><i
                                                class="ph-bold ph-tiktok-logo text-white"></i></span>
                                        <div class="">
                                            <a href="{{ $settings->tiktok_url }}" target="_blank"
                                                class="text-white d-block hover-text-main-600 mb-4">TikTok</a>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($settings->twitter_url))
                                    <div class="flex-align gap-20 mb-24">
                                        <span class="icon d-flex text-32 text-main-600"><i class="ph-bold ph-x-logo text-white"></i></span>
                                        <div class="">
                                            <a href="{{ $settings->twitter_url }}" target="_blank"
                                                class="text-white d-block hover-text-main-600 mb-4">X (Twitter)</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <!-- bottom Footer -->
            <div class="bottom-footer border-top border-dashed border-main-100 border-0 py-32" style="border-color: #333 !important;">
                <div class="container container-two">
                    <div class="bottom-footer__inner flex-between gap-3 flex-wrap">
                        <p class="bottom-footer__text text-white"> Copyright &copy; {{ date('Y') }} <span
                                class="fw-semibold">{{ $settings->brand_name ?? 'Aftershine' }}</span> All Rights
                            Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==================== Footer End Here ==================== -->

    <!-- ==================== Floating Spotify Start ==================== -->
    <div class="floating-spotify shadow-lg">
        <div class="spotify-header collapsed" id="spotifyHeader">
            <div class="d-flex align-items-center gap-2">
                <i class="ph-fill ph-spotify-logo text-white" style="font-size: 24px;"></i>
                <span class="text-white fw-bold" style="font-size: 14px;">Listen on Spotify</span>
            </div>
            <button id="toggleSpotify" class="btn btn-sm text-white p-0 border-0 shadow-none">
                <i class="ph ph-caret-up text-white" id="spotifyIcon" style="font-size: 18px;"></i>
            </button>
        </div>
        <div class="spotify-body collapsed" id="spotifyBody">
            <!-- Ganti src iframe dibawah dengan link embed spotify yang diinginkan -->
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/artist/6daEl3JyMDgK52fKuqPelL?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>

    <style>
        .floating-spotify {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 340px;
            background-color: #000000;
            border-radius: 16px;
            z-index: 9999;
            transition: all 0.3s ease;
            border: 1px solid #333;
        }
        .spotify-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            cursor: pointer;
            background-color: #000000; /* Spotify Green */
            border-radius: 15px 15px 0 0;
            transition: all 0.3s ease;
        }
        .spotify-header.collapsed {
            border-radius: 15px;
        }
        .spotify-body {
            padding: 12px;
            transition: max-height 0.3s ease-out, padding 0.3s ease, opacity 0.3s ease;
            max-height: 200px;
            opacity: 1;
            overflow: hidden;
        }
        .spotify-body.collapsed {
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
            opacity: 0;
        }
        @media (max-width: 768px) {
            .floating-spotify {
                width: calc(100% - 40px);
                bottom: 20px;
                left: 20px;
                right: 20px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const spotifyHeader = document.getElementById('spotifyHeader');
            const spotifyBody = document.getElementById('spotifyBody');
            const spotifyIcon = document.getElementById('spotifyIcon');

            spotifyHeader.addEventListener('click', function() {
                spotifyBody.classList.toggle('collapsed');
                spotifyHeader.classList.toggle('collapsed');
                if (spotifyBody.classList.contains('collapsed')) {
                    spotifyIcon.classList.remove('ph-caret-down');
                    spotifyIcon.classList.add('ph-caret-up');
                } else {
                    spotifyIcon.classList.remove('ph-caret-up');
                    spotifyIcon.classList.add('ph-caret-down');
                }
            });
        });
    </script>
    <!-- ==================== Floating Spotify End ==================== -->

    <!-- Jquery js -->
    <!-- <script src="assets/landing_v2/js/jquery-3.7.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="{{ asset('assets/landing_v2/js/boostrap.bundle.min.js') }}"></script>
    <!-- select2 Js -->
    <script src="{{ asset('assets/landing_v2/js/select2.min.js') }}"></script>
    <!-- Phosphor Icon Js -->
    <script src="{{ asset('assets/landing_v2/js/phosphor-icon.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/landing_v2/js/slick.min.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/landing_v2/js/counter.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/landing_v2/js/magnific-popup.min.js') }}"></script>
    <!-- Jquery Ui js -->
    <script src="{{ asset('assets/landing_v2/js/jquery-ui.js') }}"></script>
    <!-- marquee js -->
    <script src="{{ asset('assets/landing_v2/js/marquee.min.js') }}"></script>
    <!-- react charts-->
    <script src="{{ asset('assets/landing_v2/js/apexcharts.js') }}"></script>
    <!-- plyr Js -->
    <script src="{{ asset('assets/landing_v2/js/plyr.js') }}"></script>
    <!-- vanilla Tilt -->
    <!-- Editor js Toolbar Start -->
    <script src="{{ asset('assets/landing_v2/js/editor-quill.js') }}"></script>
    <!-- dataTables -->
    <script src="{{ asset('assets/landing_v2/js/dataTables.min.js') }}"></script>
    <!-- Tilt -->
    <script src="{{ asset('assets/landing_v2/js/vanilla-tilt.min.js') }}"></script>
    <!-- wow -->
    <script src="{{ asset('assets/landing_v2/js/wow.min.js') }}"></script>

    <script src="{{ asset('assets/landing_v2/js/aos.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('assets/landing_v2/js/main.js') }}"></script>
    <script>
      $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
          $('.header').addClass('scrolled');
        } else {
          $('.header').removeClass('scrolled');
        }
      });
    </script>
    <script>
        $(document).ready(function() {
            $('.popup-youtube').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
    </script>

</body>

</html>