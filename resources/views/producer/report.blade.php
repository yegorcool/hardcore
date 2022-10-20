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
        <p class=" text-center text-3xl text-yellow-300">
            Здесь будет статистика у продюсера
        </p>
    </div>
@endsection
