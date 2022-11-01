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
    <section class="container-fluid  bg-gray-100 px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3  ">
            <div class="my-4 lg:col-8">
                <form method="POST" action="{{ route('producer.socials.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Название')"/>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                                      required autofocus/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>
                    <!-- Lang key -->
                    <div>
                        <x-input-label for="lang_key" :value="__('На латинице')"/>
                        <x-text-input id="lang_key" class="block mt-1 w-full" type="text" name="lang_key" :value="old('lang_key')"
                                      required />
                        <x-input-error :messages="$errors->get('lang_key')" class="mt-2"/>
                    </div>
                    <!-- Comment -->
                    <div>
                        <x-input-label for="comment-social" :value="__('Комментарий')"/>
                        <x-text-input id="comment-social" class="block mt-1 w-full" type="text" name="comment" :value="old('comment')"/>
                        <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
                    </div>
                    <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                        <x-theme-button class="bg-themeRed">
                            {{ __('Сохранить') }}
                        </x-theme-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
