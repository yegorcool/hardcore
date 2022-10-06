{{-- Главная тема https://live.themewild.com/gymland/ --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Hardcore') }}</title>

        <link rel="shortcut icon" href="/hardcore-fight-icon.png" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/all-fontawesome.min.css">
        <link rel="stylesheet" href="/css/flaticon.css">
        <link rel="stylesheet" href="/css/animate.min.css">
        <link rel="stylesheet" href="/css/magnific-popup.min.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="home-3">

    <div class="preloader">
        <div class="loader"></div>
    </div>

@include('landing.header')
@include('landing.search-popup')

    <main class="main">

        @include('landing.blocks.hero')

        @include('landing.blocks.feature-area')

        @include('landing.blocks.about-area')

        @include('landing.blocks.counter-area')

        @include('landing.blocks.service-area')

        @include('landing.blocks.timetable')

        @include('landing.blocks.video-area')

        @include('landing.blocks.team-area')

        @include('landing.blocks.cta-area')

    </main>

@include('landing.footer')

    <a href="#" id="scroll-top"><i class="far fa-long-arrow-up"></i></a>


    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/modernizr.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/imagesloaded.pkgd.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/isotope.pkgd.min.js"></script>
    <script src="/js/jquery.appear.min.js"></script>
    <script src="/js/jquery.easing.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/counter-up.js"></script>
    <script src="/js/masonry.pkgd.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/main.js"></script>
    </body>
</html>
