@extends('layouts.page')
@section('title')
    {{ __('Producer Centre') }}
@endsection

@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.fighters.create') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Добавить бойца') }}
        </a>
    </div>
@endsection

@section('content')
    @include('producer.fighters.index')
@endsection
