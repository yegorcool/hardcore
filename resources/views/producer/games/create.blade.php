@extends('layouts.page')
@section('title')
    {{ __('Добавление боя') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.report')  }}" class=""><i class="fa fa-plus mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid  bg-gray-100 px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3  ">
            <div class="row">

            </div>
            <div class="my-4 lg:col-8">
                <form method="POST" action="{{ route('producer.games.store') }}">
                    @csrf

                    <div>
                        <x-input-label for="game_date" :value="__('Дата боя')"/>

                        <x-text-input id="game_date" class="block mt-1 w-full" type="datetime-local" name="datetime" :value="old('datetime')" required/>

                        <x-input-error :messages="$errors->get('datetime')" class="mt-2"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="member_one_id" :value="__('Имя первого участника')"/>

                        <select name="member_one_id" id="member_one">
                            <option value="">Выбрать</option>
                            @foreach($fighters as $key=>$name)
                                <option value="{{ $key }}" >{{$name}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('member_one_id')" class="mt-2"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="member_two_id" :value="__('Имя второго участника')"/>

                        <select name="member_two_id" id="member_two">
                            <option value="">Выбрать</option>
                            @foreach($fighters as $key=>$name)
                                <option value="{{ $key }}" >{{$name}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('member_one_id')" class="mt-2"/>
                    </div>

                    <!-- Place -->
                    <div>
                        <x-input-label for="place" :value="__('Место')"/>

                        <x-text-input id="place" class="block mt-1 w-full" type="text" name="place" :value="old('place')"/>

                        <x-input-error :messages="$errors->get('place')" class="mt-2"/>
                    </div>
                    <!-- City -->
                    <div>
                        <x-input-label for="city" :value="__('Город')"/>

                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"/>

                        <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                    </div>

                    <!-- description -->
                    <div>
                        <x-input-label for="description" :value="__('Описание')"/>

                        <textarea id="description" class="block mt-1 w-full" rows="3" cols="30" name="description" :value="old('description')"
                                   ></textarea>

                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left" >
                        <x-theme-button class="bg-themeRed" >
                            {{ __('Сохранить') }}
                        </x-theme-button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
