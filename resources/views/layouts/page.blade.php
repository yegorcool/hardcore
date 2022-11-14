<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hardcore') }}-PageTitle</title>

    @include('layouts.assets.external-css')
    <!-- Scripts -->
    @vite(['resources/assets/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased home-3">

<div class=" min-h-screen bg-black relative">

    @include('landing.header')

    <!-- Page Content -->
    <main class=" pt-[85px] lg:pt-0 bg-black min-h-[calc(100vh-85px)] flex flex-col justify-between">
        <div class="container-fluid px-lg-5">
            <div class="container-fluid   text-gray-100 font-semibold text-xl leading-tight mb-3 py-3 bg-black border-top border-bottom">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="mb-2 md:mb-0">
                        <h1 class="mb-2 text-gray-100 text-3xl ">@yield('title')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-black p-0 mb-0">
                                <li class="text-themeRed breadcrumb-item hover:text-themeOrange "><a class="hover:text-themeOrange" href="/">{{ __('Главная') }}</a></li>
                                <li class="text-themeRed breadcrumb-item active" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    @hasSection('titlebutton')
                        <div class="flex justify-center items-center">
                            @yield('titlebutton')
                        </div>
                    @endIf
                </div>
            </div>
        </div>
        <div class="container-fluid mx-auto px-lg-5">
            <div class="xl:max-w-[1200px] mx-auto">
                @include('widgets.alerts')
                @yield('content')
            </div>
        </div>

        @include('landing.footer')
    </main>
    <a href="#" id="scroll-top-page"><i class="far fa-long-arrow-up"></i></a>
</div>
@yield('js')

{{--@include('layouts.assets.external-js')--}}
{{--<script src="js/wow.min.js"></script>--}}
{{--<script>--}}
{{--    new WOW().init();--}}
{{--</script>--}}

</body>
</html>
