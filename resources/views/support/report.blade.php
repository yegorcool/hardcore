@extends('layouts.page')
@section('title')
    {{ __('Support Centre') }}
@endsection

@section('content')
    <section class="max-w-7xl container-fluid  px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">Служба поддержки</span>
                    <h3 class="my-4 text-gray-100 text-2xl font-bold leading-tight">
                        Привет Support!
                    </h3>
                </div>
            </div>
            <div class="my-4">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <p>Это твоя работа... Действуй!</p>
                    </div>
                </div>
            </div>
        </div>
        @include('landing.blocks.team-area')
    </section>
@endsection
