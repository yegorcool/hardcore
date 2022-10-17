{{-- Главная тема https://live.themewild.com/gymland/ --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Hardcore') }}</title>

@include('layouts.assets.external-css')

        <!-- Scripts -->
        @vite(['resources/assets/scss/app.scss', 'resources/js/app.js'])
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

        @guest()
            @include('landing.blocks.cta-area')
        @endguest

    </main>

@include('landing.footer')

    <a href="#" id="scroll-top"><i class="far fa-long-arrow-up"></i></a>

@include('layouts.assets.external-js')

    </body>
</html>
