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
<body class="font-sans antialiased  home-3">

<div class="min-h-screen bg-black relative mx-auto">

    @include('landing.header')

    <!-- Page Content -->
    <main class="bg-black pt-[85px] lg:pt-0 min-h-[calc(100vh-85px)] flex flex-col justify-between">
        <div class="container-fluid p-0">
            @yield('content')
        </div>

        @include('landing.footer')
    </main>
</div>

@include('layouts.assets.external-js')

</body>
</html>
