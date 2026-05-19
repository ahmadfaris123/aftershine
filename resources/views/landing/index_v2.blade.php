@php
    use App\Http\Controllers\LandingController;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <img src="{{ asset('storage/' . $item->image_path) }}" class="d-block w-100 object-fit-cover" alt="Banner 2" style="height: 80vh; background-color: #000000;">
            </div>
            @empty
            <div class="carousel-item active">
              <img src="{{ asset('assets/landing_v2/images/AFTERSHINE_MAIN LOGO_BLACK.png') }}" class="d-block w-100 object-fit-cover" alt="Banner 2" style="height: 80vh; background-color: #000000;">
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
    <section
      id="profile"
      class="choose-us pt-120 position-relative z-1"
      style="background-color: #000000;"
    >
      <div class="container">
        <div class="row gy-5 align-items-center">
          <!-- Gambar di bagian kiri -->
          <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
            <div class="position-relative d-inline-block">
              <img src="{{ asset('assets/landing_v2/images/8.png') }}" alt="Aftershine" class="img-fluid rounded-16">
                  <img src="{{ asset('assets/landing_v2/images/ASSET WEBSITE AFTERSHINE-3.png') }}" alt="Logogram" class="position-absolute" style="top: 0; left: 0; transform: translate(-45%, -45%); width: 150px; z-index: 2;">
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
    <section id="personel" class="testimonials py-120 position-relative z-1">
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
                <a href="https://www.youtube.com/@AFTERSHINE/videos" target="_blank" class="btn rounded-pill btn-outline-white flex-align gap-8 fw-bold transition-2 text-white" style="background-color: #111111; color: #ffffff; padding: 12px 28px; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px;">
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

    <!-- ================================= testimonials Section Start ========================================= -->
    <section id="events" class="py-120 position-relative z-1" style="background-color: #000000;">
        <style>
            .events-table thead th {
                font-size: 11px;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                color: #ffffff;
                padding: 0 16px 20px 0;
                border: none;
                white-space: nowrap;
            }
            .events-table tbody td {
                padding: 20px 16px 20px 0;
                border: none;
                border-top: 1px solid #334155;
                vertical-align: middle;
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
            <div class="section-heading text-center mb-48">
                <h2 class="wow bounceIn" style="color: #ffb83c">Events</h2>
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
                            <td style="background-color: transparent;">
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
    <section id="awards" class="py-120 bg-dark position-relative" style="background-color: #050505 !important;">
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
            <div class="section-heading text-center mb-40">
                <h2 class="wow bounceIn" style="color: #ffb83c">Awards</h2>
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

    <!-- ==================== Footer Start Here ==================== -->
    <footer class="footer position-relative z-1">
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

                    @if(isset($settings->instagram_url) || isset($settings->tiktok_url))
                        <div class="col" data-aos="fade-up" data-aos-duration="800">
                            <div class="footer-item">
                                <h4 class="footer-item__title mb-32"><br></h4>
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