@extends('layouts.page')
@section('title')
    {{ __('Информация о бойце') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.report')  }}" class=""><i class="fa fa-plus mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <p class=" text-center text-3xl text-green-600">
        Здесь будет просмотр бойца у продюсера
    </p>
@endsection
