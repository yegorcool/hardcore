@extends('layouts.page')
@section('title')
    {{ __('Buyer Centre') }}
@endsection

@section('content')
    <section class="max-w-7xl container-fluid  px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">Фан зона</span>
                    <h3 class="my-4 text-gray-100 text-2xl font-bold leading-tight">
                        Привет Фанат!
                    </h3>
                </div>
            </div>
            <div class="my-4">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <p>Это твоя фан зона...</p>
                    </div>
                </div>
            </div>
        </div>
        @include('landing.blocks.service-area')
    </section>
@endsection

