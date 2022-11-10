@extends('layouts.page')
@section('title')
    {{ __('Карьера бойца') }}
@endsection
@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('fighter.career_events.create') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Добавить раздел карьеры') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="px-3">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">Карьера</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Этапы карьеры</h3>
                </div>
            </div>
            @include('fighter.career_events.list')
        </div>
        {{--            <div class="bg-black text-themeOrange "> {{ $fighters->links() }}</div>--}}
    </section>
@endsection
