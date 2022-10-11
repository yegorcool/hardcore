<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hardcore') }}-PageTitle</title>

    @include('layouts.assets.external-css')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased home-3">

<div class="min-h-screen bg-black">

    @include('landing.header')

    <!-- Page Content -->
    <main class="bg-black min-h-[calc(100vh-85px)] flex flex-col justify-between">
        <div class="container-fluid px-lg-5">
            <div class="container-fluid text-gray-100 font-semibold text-xl leading-tight mb-3 py-3 bg-black border-top border-bottom">
                <div class="row">
                    <div class="col">
                        <h1 class="mb-2 text-gray-100 text-3xl ">@yield('title')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-black p-0 mb-0">
                                <li class="text-themeRed breadcrumb-item hover:text-themeOrange "><a class="hover:text-themeOrange" href="/">{{ __('Главная') }}</a></li>
                                <li class="text-themeRed breadcrumb-item active" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    @hasSection('titlebutton')
                        <div class="col-auto align-self-center">
                            @yield('titlebutton')
                        </div>
                    @endIf
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @include('widgets.alerts')
            @yield('content')
        </div>

        @include('landing.footer')
    </main>
</div>

@include('layouts.assets.external-js')

</body>
</html>
