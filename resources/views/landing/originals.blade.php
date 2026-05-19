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
                <a class="nav-link text-white transition-1" href="{{ route('landing.v2') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="{{ route('landing.v2') }}">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="{{ route('landing.v2') }}">Personel</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white transition-1" href="#">Originals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="{{ route('landing.v2') }}">Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white transition-1" href="{{ route('landing.v2') }}">Awards</a>
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
                    <a href="{{ $song->youtube_url }}" class="popup-youtube d-block text-decoration-none h-100">
                        <div class="bg-dark h-100 d-flex flex-column border-0 video-card" style="cursor: pointer;">
                            <div class="position-relative overflow-hidden">
                                @php
                                    $ytUrl = $song->youtube_url ?? '';
                                    $ytId = '';
                                    if (preg_match('/youtu\.be\/([^?&\/]+)/', $ytUrl, $m)) {
                                        $ytId = $m[1];
                                    } elseif (preg_match('/[?&]v=([^&]+)/', $ytUrl, $m)) {
                                        $ytId = $m[1];
                                    }
                                    $thumbSrc = $ytId
                                        ? "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg"
                                        : Storage::url($song->thumbnail_path);
                                @endphp
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
            </div>
        </div>
    </section>
    <!-- ================================= Blog Section End ========================================= -->

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