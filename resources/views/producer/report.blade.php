@extends('layouts.page')
@section('title')
    {{ __('Producer Centre') }}
@endsection

@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.report') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __('Кнопка действия') }}
        </a>
    </div>
@endsection

@section('content')
    <div class="section__wrapper max-w-7xl mx-auto">
        <div class="">
            <h5 class="text-white ">
                <a class="inline-block p-2 border-b border-b-gray-600 hover:text-themeOrange">
{{--                   href="{{ route('producer.users') }}">--}}
                    <i class="far fa-users mr-2"></i>
                    {{ __('Управление пользователями') }}</a>
            </h5>
        </div>
        <div class="">
            <h5 class="text-white ">
                <a class="inline-block p-2 border-b border-b-gray-600 hover:text-themeOrange"
                   href="{{ route('producer.socials.index') }}">
                    <i class="far fa-paper-plane mr-2"></i>
                    {{ __('Управление социальными сетями') }}</a>
            </h5>
        </div>
        <p class="my-10 text-center text-xl text-gray-300">
            Здесь будет статистика у продюсера
        </p>
    </div>
@endsection
