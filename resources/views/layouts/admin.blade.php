<!doctype html>
<html lang="en" data-bs-theme="light">

<!-- Mirrored from templates.g5plus.net/glowing-bootstrap-5/dashboard/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:52:16 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/admin') }}/images/others/favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendors/lightgallery/css/lightgallery-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendors/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/vendors/mapbox-gl/mapbox-gl.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/cdn.jsdelivr.net/npm/bootstrap-icons%401.9.1/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/css/theme.css">
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/cdn.jsdelivr.net/npm/select2%404.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/cdn.jsdelivr.net/npm/select2-bootstrap-5-theme%401.3.0/dist/select2-bootstrap-5-theme.min.css" />
    @yield('css')
</head>

<body>
    <div class="wrapper dashboard-wrapper">
        <div class="d-flex flex-wrap flex-xl-nowrap">
            @include('admins.blocks.sidebar')
            <div class="page-content">
                @include('admins.blocks.header')
                <main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
                    @yield('content')
                    @include('admins.blocks.footer')
                </main>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin') }}/cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/admin') }}/cdn.jsdelivr.net/npm/select2%404.0.13/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/chartjs/chart.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/clipboard/clipboard.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/vanilla-lazyload/lazyload.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/lightgallery/lightgallery.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/lightgallery/plugins/zoom/lg-zoom.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/lightgallery/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/lightgallery/plugins/video/lg-video.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/lightgallery/plugins/vimeoThumbnail/lg-vimeo-thumbnail.min.js">
    </script>
    <script src="{{ asset('assets/admin') }}/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/slick/slick.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/gsap/gsap.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/gsap/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/gsap/ScrollTrigger.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendors/mapbox-gl/mapbox-gl.js"></script>
    <script src="{{ asset('assets/admin') }}/js/dashboard.min.js"></script>
    @yield('js')
    @include('admins.blocks.svg')
    <div class="position-fixed z-index-10 bottom-0 end-0 p-10">
        <a href="#"
            class="gtf-back-to-top text-decoration-none bg-body text-primary bg-primary-hover text-light-hover shadow square p-0 rounded-circle d-flex align-items-center justify-content-center"
            title="Back To Top" style="--square-size: 48px"><i class="fa-solid fa-arrow-up"></i></a>
    </div>
</body>

<!-- Mirrored from templates.g5plus.net/glowing-bootstrap-5/dashboard/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:52:26 GMT -->

</html>
