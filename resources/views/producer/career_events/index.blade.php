@extends('layouts.page')
@section('title')
    {{ __('Карьера бойца') }}
@endsection
@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.career_events.create') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Добавить раздел карьеры') }}
        </a>
    </div>
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">Карьера</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Этапы карьеры</h3>
        </x-slot>

        @include('producer.career_events.list')

    </x-list.section>
@endsection
