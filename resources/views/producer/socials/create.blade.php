@extends('layouts.page')
@section('title')
    {{ __('Добавление социальной сети') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100"
           href="{{ route('producer.socials.index')  }}"
           class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <x-form.section>
        <form method="POST" action="{{ route('producer.socials.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <div class="my-2 lg:w-2/3">
                <x-form.input-label for="title" :value="__('Название социальной')"/>
                <x-form.text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                                   placeholder="Твиттер"
                                   required autofocus/>
                <x-form.input-error :messages="$errors->get('title')" class="mt-2"/>
            </div>
            <!-- Lang key -->
            <div class="my-2">
                <x-form.input-label for="lang_key" :value="__('Имя иконки из Font-Awesome на латинице')"/>
                <div class="lg:flex items-center">
                    <x-form.text-input id="lang_key" class=" lg:w-2/3 block mt-1 w-full" type="text" name="lang_key"
                                       :value="old('lang_key')" placeholder="twitter"
                                       required/>
                    <span class="theme-btn bg-white/10 text-sm py-1 hover:bg-gray-200 text-gray-400 lg:ml-6"><a
                            class="hover:text-gray-100" href="https://fontawesome.com/search?f=brands&o=r"
                            target="_blank">посмотреть названия иконок</a></span>
                </div>
                <x-form.input-error :messages="$errors->get('lang_key')" class="mt-2"/>
            </div>
            <!-- Comment -->
            <div class="my-2 lg:w-2/3">
                <x-form.input-label for="comment-social" :value="__('Комментарий')"/>
                <x-form.text-input id="comment-social" class="block mt-1 w-full" type="text" name="comment"
                                   :value="old('comment')"/>
                <x-form.input-error :messages="$errors->get('comment')" class="mt-2"/>
            </div>
            <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                <x-theme-button class="bg-themeRed">
                    {{ __('Сохранить') }}
                </x-theme-button>
            </div>
        </form>
    </x-form.section>
@endsection
