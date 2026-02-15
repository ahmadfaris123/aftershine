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
    <section class="banner py-80 position-relative overflow-hidden" style="background-color: #0046bf">

        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-12">
                    <div class="banner-thumb position-relative text-center">
                        <img src="{{ asset('assets/landing_v2/images/thumbs/banner-img.png') }}" alt="" class="banner-thumb__img rounded-12 wow bounceIn" data-wow-duration="3s" data-wow-delay=".5s" data-tilt data-tilt-max="12" data-tilt-speed="500" data-tilt-perspective="5000" data-tilt-full-page-listening data-tilt-scale="1.02">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= Banner SEction End =============================== -->

    <!-- ========================== Brand Section Start =========================== -->
    <div class="brand" style="background-color: #0046bf">
        <div class="container container--lg">
            <div class="brand-box py-80 px-16 bg-main-25 border border-neutral-30 rounded-16">
                <h5 class="mb-40 text-center text-neutral-500">Contact Us</h5>
                <div class="container">
                    <div class="text-center">
                        <a href="" target="_blank"
                            class="text-neutral-500 d-block hover-text-main-600 mb-4">
                            <i class="ph-bold ph-whatsapp-logo"></i> XXXXXXXX
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================== Brand Section End =========================== -->

    <!-- ============================= Features Section Start ============================== -->
    <section class="features py-120 position-relative overflow-hidden" style="background-color: #0046bf">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape two animation-scalation visible-mobile-devices">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-12">
                    <div class="testimonials__content">
                        <div class="section-heading style-left">
                            <h2 class="mb-24 wow bounceIn" style="color: #ffb83c">What is Aftershine</h2>
                        </div>

                        <div class="testimonials__slider">
                            <div class="testimonials-item">
                                <p class="text-white" data-aos="fade-left" data-aos-duration="1200">Adalah band
                                    pop Jawa modern dengan karakter emosional, elegan, tanpa menghilangkan cita rasa
                                    jawa. Musiknya memadukan unsur pop, romansa, dan identitas lokal yang mudah diterima
                                    banyak kalangan</p>
                            </div>
                        </div>
                        <div class="flex-align gap-16 mt-40">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= Features Section End ============================== -->

    <!-- ============================= Features Section Start ============================== -->
    <section class="features py-120 position-relative overflow-hidden" style="background-color: #0046bf">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="testimonials__thumbs-slider pe-lg-5 me-xxl-5">
                        <div class="testimonials__thumbs wow bounceIn" data-tilt data-tilt-max="15"
                            data-tilt-speed="500" data-tilt-perspective="5000" data-tilt-full-page-listening>
                            <img src="{{ asset('assets/images/logo-light.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonials__content">
                        <div class="section-heading style-left">
                            <h2 class="mb-24 wow bounceIn" style="color: #ffb83c">Main Logo Philosophy</h2>
                        </div>

                        <div class="testimonials__slider">
                            <div class="testimonials-item">
                                <p class="text-white" data-aos="fade-left" data-aos-duration="1200">Logo baru ini
                                    menggunakan font bergaya serif agar terkesan lebih santai & elegan, ditambah dengan
                                    adanya lambang matahari di atasnya melambangkan sumber cahaya dan energi</p>
                            </div>
                        </div>
                        <div class="flex-align gap-16 mt-40">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= Features Section End ============================== -->

    <!-- =========================== CHoose Us Section Start ================================ -->
    <section class="choose-us pt-120 position-relative z-1 mash-bg-main mash-bg-main-two" style="background-color: #0046bf">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape four animation-scalation visible-mobile-devices">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape two animation-scalation visible-mobile-devices">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-6">
                    <div class="choose-us__content">
                        <div class="mb-40">
                            <h2 class="mb-24  wow bounceIn" style="color: #ffb83c">Logogram Philosophy.</h2>
                            <p class="text-white text-line-5  wow bounceInUp">Menggambarkan Siluet Matahari dengan
                                huruf A di tengahnya yang memiliki Makna secara universal melambangkan sumber energi,
                                pencerahan, dan harapan, dan setiap perjalanan besar selalu dimulai dari satu langkah
                                kecil. Huruf A mengingatkan kita bahwa untuk mencapai Z (tujuan akhir), kita harus
                                berani memulai dari A (titik awal). Tidak ada kesuksesan tanpa keberanian untuk memulai.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="choose-us__thumbs position-relative">
                        <div class="text-end" data-aos="zoom-out">
                            <div class="d-sm-inline-block d-block position-relative">
                                <img src="{{ asset('assets/landing_v2/images/logo-gram.png') }}" alt=""
                                    class="choose-us__img rounded-12" data-tilt data-tilt-max="16" data-tilt-speed="500"
                                    data-tilt-perspective="5000" data-tilt-full-page-listening>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================== CHoose Us Section End ================================ -->

    <!-- ================================= testimonials Section Start ========================================= -->
    <section class="testimonials py-120 position-relative z-1" style="background-color: #0046bf">
        <div class="container">

            <div class="section-heading text-center">
                <h2 class="mb-24 wow bounceIn" style="color: #ffb83c">The Personnel</h2>
            </div>

            <div class="tutor-slider">
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100 border border-neutral-20" data-aos="fade-up"
                    data-aos-duration="200">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <img src="{{ asset('assets/landing_v2/images/thumbs/instructor-img1.png') }}" alt=""
                            class="scale-hover-item__img rounded-12 cover-img transition-2">
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <div class="">
                            <h4 class="mb-16">
                                <span class="link text-line-2">Name</span>
                            </h4>
                            <div class="mt-24 flex-between gap-16 flex-wrap">
                                <h4 class="mb-0 text-main-two-600">
                                    position
                                </h4>
                            </div>
                            <div
                                class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-24 border-dashed border-0">
                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-facebook-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-instagram-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-tiktok-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-x-logo"></i></a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100 border border-neutral-20" data-aos="fade-up"
                    data-aos-duration="200">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <img src="{{ asset('assets/landing_v2/images/thumbs/instructor-img1.png') }}" alt=""
                            class="scale-hover-item__img rounded-12 cover-img transition-2">
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <div class="">
                            <h4 class="mb-16">
                                <span class="link text-line-2">Name</span>
                            </h4>
                            <div class="mt-24 flex-between gap-16 flex-wrap">
                                <h4 class="mb-0 text-main-two-600">
                                    position
                                </h4>
                            </div>
                            <div
                                class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-24 border-dashed border-0">
                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-facebook-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-instagram-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-tiktok-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-x-logo"></i></a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100 border border-neutral-20" data-aos="fade-up"
                    data-aos-duration="200">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <img src="{{ asset('assets/landing_v2/images/thumbs/instructor-img1.png') }}" alt=""
                            class="scale-hover-item__img rounded-12 cover-img transition-2">
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <div class="">
                            <h4 class="mb-16">
                                <span class="link text-line-2">Name</span>
                            </h4>
                            <div class="mt-24 flex-between gap-16 flex-wrap">
                                <h4 class="mb-0 text-main-two-600">
                                    position
                                </h4>
                            </div>
                            <div
                                class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-24 border-dashed border-0">
                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-facebook-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-instagram-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-tiktok-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-x-logo"></i></a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100 border border-neutral-20" data-aos="fade-up"
                    data-aos-duration="200">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <img src="{{ asset('assets/landing_v2/images/thumbs/instructor-img1.png') }}" alt=""
                            class="scale-hover-item__img rounded-12 cover-img transition-2">
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <div class="">
                            <h4 class="mb-16">
                                <span class="link text-line-2">Name</span>
                            </h4>
                            <div class="mt-24 flex-between gap-16 flex-wrap">
                                <h4 class="mb-0 text-main-two-600">
                                    position
                                </h4>
                            </div>
                            <div
                                class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-24 border-dashed border-0">
                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-facebook-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-instagram-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-tiktok-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-x-logo"></i></a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="scale-hover-item bg-white rounded-16 p-12 h-100 border border-neutral-20" data-aos="fade-up"
                    data-aos-duration="200">
                    <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                        <img src="{{ asset('assets/landing_v2/images/thumbs/instructor-img1.png') }}" alt=""
                            class="scale-hover-item__img rounded-12 cover-img transition-2">
                    </div>
                    <div class="pt-32 pb-24 px-16 position-relative">
                        <div class="">
                            <h4 class="mb-16">
                                <span class="link text-line-2">Name</span>
                            </h4>
                            <div class="mt-24 flex-between gap-16 flex-wrap">
                                <h4 class="mb-0 text-main-two-600">
                                    position
                                </h4>
                            </div>
                            <div
                                class="flex-between gap-8 pt-24 border-top border-neutral-50 mt-24 border-dashed border-0">
                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-facebook-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-instagram-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-tiktok-logo"></i></a></span>
                                </div>

                                <div class="flex-align">
                                    <span class="text-2xl text-main-600 d-flex"><a href=""
                                            target="_blank"><i class="ph-bold ph-x-logo"></i></a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-center gap-16 mt-40">
                <button type="button" id="tutor-prev"
                    class="slick-prev slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-left"></i>
                </button>
                <button type="button" id="tutor-next"
                    class="slick-next slick-arrow flex-center rounded-circle border border-gray-100 hover-border-main-600 text-xl hover-bg-main-600 hover-text-white transition-1 w-48 h-48 text-white">
                    <i class="ph ph-caret-right"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- ================================= testimonials Section End ========================================= -->

    <!-- ================================= Blog Section Start ========================================= -->
    <section class="blog py-120 mash-bg-main mash-bg-main-two position-relative" style="background-color: #0046bf">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape two animation-scalation visible-mobile-devices">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape four animation-scalation visible-mobile-devices">

        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24 wow bounceIn" style="color: #ffb83c">Our Originals.</h2>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
                    <div class="blog-item scale-hover-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30">
                        <div class="rounded-12 overflow-hidden position-relative">
                            <a href="" target="_blank" class="w-100 h-100">
                                <img src="{{ asset('assets/landing_v2/images/thumbs/blog-img1.png') }}" alt=""
                                    class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="p-24 pt-32">
                            <div class="">
                                <span
                                    class="px-20 py-8 bg-main-two-600 rounded-8 text-white fw-medium mb-20">Aftershine</span>
                                <h4 class="mb-28">
                                    <span class="link text-line-2">Judul</span>
                                </h4>
                                <div class="flex-align gap-14 flex-wrap my-20">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-500 text-2xl d-flex"><i
                                                class="ph ph-calendar-dot"></i></span>
                                        <span class="text-neutral-500 text-lg">
                                            1 Januari 2026
                                        </span>
                                    </div>
                                </div>
                                <p class="text-neutral-500 text-line-5">Deskripsi</p>
                            </div>
                            <div class="pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="" target="_blank"
                                    class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold"
                                    tabindex="0">
                                    See on Youtube
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
                    <div class="blog-item scale-hover-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30">
                        <div class="rounded-12 overflow-hidden position-relative">
                            <a href="" target="_blank" class="w-100 h-100">
                                <img src="{{ asset('assets/landing_v2/images/thumbs/blog-img1.png') }}" alt=""
                                    class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="p-24 pt-32">
                            <div class="">
                                <span
                                    class="px-20 py-8 bg-main-two-600 rounded-8 text-white fw-medium mb-20">Aftershine</span>
                                <h4 class="mb-28">
                                    <span class="link text-line-2">Judul</span>
                                </h4>
                                <div class="flex-align gap-14 flex-wrap my-20">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-500 text-2xl d-flex"><i
                                                class="ph ph-calendar-dot"></i></span>
                                        <span class="text-neutral-500 text-lg">
                                            1 Januari 2026
                                        </span>
                                    </div>
                                </div>
                                <p class="text-neutral-500 text-line-5">Deskripsi</p>
                            </div>
                            <div class="pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="" target="_blank"
                                    class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold"
                                    tabindex="0">
                                    See on Youtube
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-up" data-aos-duration="200">
                    <div class="blog-item scale-hover-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30">
                        <div class="rounded-12 overflow-hidden position-relative">
                            <a href="" target="_blank" class="w-100 h-100">
                                <img src="{{ asset('assets/landing_v2/images/thumbs/blog-img1.png') }}" alt=""
                                    class="scale-hover-item__img rounded-12 cover-img transition-2">
                            </a>
                        </div>
                        <div class="p-24 pt-32">
                            <div class="">
                                <span
                                    class="px-20 py-8 bg-main-two-600 rounded-8 text-white fw-medium mb-20">Aftershine</span>
                                <h4 class="mb-28">
                                    <span class="link text-line-2">Judul</span>
                                </h4>
                                <div class="flex-align gap-14 flex-wrap my-20">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-500 text-2xl d-flex"><i
                                                class="ph ph-calendar-dot"></i></span>
                                        <span class="text-neutral-500 text-lg">
                                            1 Januari 2026
                                        </span>
                                    </div>
                                </div>
                                <p class="text-neutral-500 text-line-5">Deskripsi</p>
                            </div>
                            <div class="pt-24 border-top border-neutral-50 mt-28 border-dashed border-0">
                                <a href="" target="_blank"
                                    class="flex-align gap-8 text-main-600 hover-text-decoration-underline transition-1 fw-semibold"
                                    tabindex="0">
                                    See on Youtube
                                    <i class="ph ph-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================= Blog Section End ========================================= -->

    <!-- ================================= testimonials Section Start ========================================= -->
    <section class="testimonials py-120 position-relative z-1" style="background-color: #0046bf">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24 wow bounceIn" style="color: #ffb83c">Events</h2>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-categories" role="tabpanel"
                    aria-labelledby="pills-categories-tab" tabindex="0">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-aos="fade-up" data-aos-duration="200">
                            <div class="course-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                                <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                                    <a href="#" class="w-100 h-100">
                                        <img src="{{ asset('assets/landing_v2/images/thumbs/course-img1.png') }}" alt=""
                                            class="course-item__img rounded-12 cover-img transition-2">
                                    </a>
                                </div>
                                <div class="course-item__content position-relative">
                                    <div class="">
                                        <h4 class="mb-28">
                                            <span class="link text-line-2">Event Name</span>
                                        </h4>
                                        <div class="flex-align gap-28 flex-wrap mb-16">
                                            <div class="flex-align gap-8">
                                                <span class="text-neutral-500 text-2xl d-flex"><i
                                                        class="ph ph-calendar-dot"></i></span>
                                                <span class="text-neutral-500 text-lg">
                                                    1 Januari 2026
                                                </span>
                                            </div>
                                            <div class="flex-align gap-8">
                                                <p class="text-neutral-500 text-line-5">Event Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-aos="fade-up" data-aos-duration="200">
                            <div class="course-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                                <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                                    <a href="#" class="w-100 h-100">
                                        <img src="{{ asset('assets/landing_v2/images/thumbs/course-img1.png') }}" alt=""
                                            class="course-item__img rounded-12 cover-img transition-2">
                                    </a>
                                </div>
                                <div class="course-item__content position-relative">
                                    <div class="">
                                        <h4 class="mb-28">
                                            <span class="link text-line-2">Event Name</span>
                                        </h4>
                                        <div class="flex-align gap-28 flex-wrap mb-16">
                                            <div class="flex-align gap-8">
                                                <span class="text-neutral-500 text-2xl d-flex"><i
                                                        class="ph ph-calendar-dot"></i></span>
                                                <span class="text-neutral-500 text-lg">
                                                    1 Januari 2026
                                                </span>
                                            </div>
                                            <div class="flex-align gap-8">
                                                <p class="text-neutral-500 text-line-5">Event Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-aos="fade-up" data-aos-duration="200">
                            <div class="course-item bg-white rounded-16 p-12 h-100 box-shadow-md">
                                <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                                    <a href="#" class="w-100 h-100">
                                        <img src="{{ asset('assets/landing_v2/images/thumbs/course-img1.png') }}" alt=""
                                            class="course-item__img rounded-12 cover-img transition-2">
                                    </a>
                                </div>
                                <div class="course-item__content position-relative">
                                    <div class="">
                                        <h4 class="mb-28">
                                            <span class="link text-line-2">Event Name</span>
                                        </h4>
                                        <div class="flex-align gap-28 flex-wrap mb-16">
                                            <div class="flex-align gap-8">
                                                <span class="text-neutral-500 text-2xl d-flex"><i
                                                        class="ph ph-calendar-dot"></i></span>
                                                <span class="text-neutral-500 text-lg">
                                                    1 Januari 2026
                                                </span>
                                            </div>
                                            <div class="flex-align gap-8">
                                                <p class="text-neutral-500 text-line-5">Event Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================= testimonials Section Start ========================================= -->

    <!-- ================================= Blog Section Start ========================================= -->
    <section class="blog py-120 mash-bg-main mash-bg-main-two position-relative" style="background-color: #0046bf">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mb-24 wow bounceIn" style="color: #ffb83c">Awards</h2>
            </div>

            <div class="row gy-4">
                <div class="col-12">
                    <div class="course-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30 list-view">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <div class="w-100 h-100">
                                <img src="{{ asset('assets/landing_v2/images/thumbs/course-img1.png') }}" alt=""
                                    class="course-item__img rounded-12 cover-img transition-2">
                            </div>
                        </div>
                        <div class="course-item__content">
                            <div class="">
                                <h4 class="mb-28">
                                    <h4 class="link text-line-2">Award Name</h4>
                                </h4>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-500 text-2xl d-flex"><i
                                                class="ph ph-calendar-dot"></i></span>
                                        <span class="text-neutral-500 text-lg">
                                            1 Januari 2026
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <p class="text-neutral-500 text-line-5">Award Deskripsi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="course-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30 list-view">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <div class="w-100 h-100">
                                <img src="{{ asset('assets/landing_v2/images/thumbs/course-img1.png') }}" alt=""
                                    class="course-item__img rounded-12 cover-img transition-2">
                            </div>
                        </div>
                        <div class="course-item__content">
                            <div class="">
                                <h4 class="mb-28">
                                    <h4 class="link text-line-2">Award Name</h4>
                                </h4>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-500 text-2xl d-flex"><i
                                                class="ph ph-calendar-dot"></i></span>
                                        <span class="text-neutral-500 text-lg">
                                            1 Januari 2026
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <p class="text-neutral-500 text-line-5">Award Deskripsi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="course-item bg-main-25 rounded-16 p-12 h-100 border border-neutral-30 list-view">
                        <div class="course-item__thumb rounded-12 overflow-hidden position-relative">
                            <div class="w-100 h-100">
                                <img src="{{ asset('assets/landing_v2/images/thumbs/course-img1.png') }}" alt=""
                                    class="course-item__img rounded-12 cover-img transition-2">
                            </div>
                        </div>
                        <div class="course-item__content">
                            <div class="">
                                <h4 class="mb-28">
                                    <h4 class="link text-line-2">Award Name</h4>
                                </h4>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <span class="text-neutral-500 text-2xl d-flex"><i
                                                class="ph ph-calendar-dot"></i></span>
                                        <span class="text-neutral-500 text-lg">
                                            1 Januari 2026
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-between gap-8 flex-wrap mb-16">
                                    <div class="flex-align gap-8">
                                        <p class="text-neutral-500 text-line-5">Award Deskripsi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ==================== Footer Start Here ==================== -->
    <footer class="footer position-relative z-1" style="background-color: #0046bf">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape four animation-scalation visible-mobile-devices">
        <img src="{{ asset('assets/landing_v2/images/shapes/shape_after_light.png') }}" alt=""
            class="shape two animation-scalation visible-mobile-devices">

        <div class="py-120 ">
            <div class="container container-two">
                <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-5">
                    <div class="col" data-aos="fade-up" data-aos-duration="300">
                        <div class="footer-item">
                            <div class="footer-item__logo">
                                <br>
                                <br>
                                <a href="#">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="Logo">
                                </a>
                            </div>
                            <!-- <p class="my-32">EduAll exceeded all my expectations! The instructors were not only experts</p> -->
                        </div>
                    </div>
                    <div class="col" data-aos="fade-up" data-aos-duration="800">
                        <div class="footer-item">
                            <h4 class="footer-item__title mb-32" style="color: #ffb83c">Contact Us</h4>
                            <div class="flex-align gap-20 mb-24">
                                <span class="icon d-flex text-32 text-main-600"><i
                                        class="ph ph-whatsapp-logo text-white"></i></span>
                                <div class="">
                                    <a href=""
                                        target="_blank"
                                        class="text-white d-block hover-text-main-600 mb-4">XXXXXXXX</a>
                                </div>
                            </div>

                            <div class="flex-align gap-20 mb-24">
                                <span class="icon d-flex text-32 text-main-600"><i
                                        class="ph ph-envelope-open text-white"></i></span>
                                <div class="">
                                    <a href=""
                                        class="text-white d-block hover-text-main-600 mb-4">mail@mail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" data-aos="fade-up" data-aos-duration="800">
                        <div class="footer-item">
                            <h4 class="footer-item__title mb-32"><br></h4>
                            <div class="flex-align gap-20 mb-24">
                                <span class="icon d-flex text-32 text-main-600"><i
                                        class="ph-bold ph-facebook-logo text-white"></i></span>
                                <div class="">
                                    <a href="" target="_blank"
                                        class="text-white d-block hover-text-main-600 mb-4">Facebook</a>
                                </div>
                            </div>

                            <div class="flex-align gap-20 mb-24">
                                <span class="icon d-flex text-32 text-main-600"><i class="ph-bold ph-x-logo text-white"></i></span>
                                <div class="">
                                    <a href="" target="_blank"
                                        class="text-white d-block hover-text-main-600 mb-4">X (Twitter)</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" data-aos="fade-up" data-aos-duration="800">
                        <div class="footer-item">
                            <h4 class="footer-item__title mb-32"><br></h4>
                            <div class="flex-align gap-20 mb-24">
                                <span class="icon d-flex text-32 text-main-600"><i
                                        class="ph-bold ph-instagram-logo text-white"></i></span>
                                <div class="">
                                    <a href="" target="_blank"
                                        class="text-white d-block hover-text-main-600 mb-4">Instagram</a>
                                </div>
                            </div>

                            <div class="flex-align gap-20 mb-24">
                                <span class="icon d-flex text-32 text-main-600"><i
                                        class="ph-bold ph-tiktok-logo text-white"></i></span>
                                <div class="">
                                    <a href="" target="_blank"
                                        class="text-white d-block hover-text-main-600 mb-4">TikTok</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="background-color: #0046bf">
            <!-- bottom Footer -->
            <div class="bottom-footer border-top border-dashed border-main-100 border-0 py-32">
                <div class="container container-two">
                    <div class="bottom-footer__inner flex-between gap-3 flex-wrap">
                        <p class="bottom-footer__text text-white"> Copyright &copy; 2026 <span
                                class="fw-semibold">Aftershine</span> All Rights
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

</body>

</html>