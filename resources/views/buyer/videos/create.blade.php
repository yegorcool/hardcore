@extends('layouts.page')
@section('title')
    {{ __('Загрузка видео') }}
@endsection

@section('titlebutton')
    <div class="theme-btn mt-3 md:mt-0">
        <a class="text-white hover:text-gray-100" href="{{ route('buyer.videos.index')  }}" class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться к списку ') }}
        </a>
    </div>
@endsection

@section('content')
    <x-form.section>
        <form method="POST" action="{{ route('buyer.videos.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="fighter_id" value="{{ $recipient->id }}">
            <input type="hidden" name="buyer_id" value="{{ $buyer->id }}">
            {{--                @todo сделать список статусов и механизм установки--}}
            <input type="hidden" name="status" value="отправлено">
            <div class="py-4">
                <div class="row border-b-2 mb-4">
                    <div class="col-8 col-lg-6">
                        <span class="site-title-tagline">{{ __('Медиа') }}</span>
                        <h3 class=" text-black text-2xl font-bold leading-tight">{{ __('Загрузить видео') }}</h3>
                    </div>
                </div>
                {{--Имя получателя--}}
                <div class="border-b py-1 mb-2">
                    <label class="md:w-2/5 inline-block font-medium w-1/3 text-lg text-gray-100 mb-2">
                        {{__('Отправить видео бойцу  ')}}
                    </label>
                    <h4 class="text-gray-100 text-2xl inline-block">{{ $recipient->name }}</h4>
                </div>
                <!-- title -->
                <div class="lg:w-2/3 mt-2">
                    <x-form.input-label for="title" :value="__('Название')"/>
                    <x-form.text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                       :value="old('title')"/>
                    <x-form.input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>
                {{--File Upload--}}
                <div>
                    <x-form.input-label for="video_create"><span class=" block mb-2">{{__('Видео: ')}} <span
                                class="text-base  font-normal text-gray-400">видео в формате .mp4</span></span>
                        <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                    </x-form.input-label>
                    <x-form.text-input id="video_create" class="hidden" type="file" name="video_file"
                                       :value="old('video_file')"/>
                    <x-form.input-error :messages="$errors->get('video_file')" class="mt-2"/>
                    <div class="row review-span"><span id="output-video" class="preview h-150"></span></div>
                </div>
                <!-- comment -->
                <div class="lg:w-2/3 mt-2">
                    <x-form.input-label for="comment" :value="__('Ваше пожелание бойцу ')"/>
                    <x-form.text-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                                       :value="old('comment')" placeholder="Новых побед и наград!"/>
                    <x-form.input-error :messages="$errors->get('comment')" class="mt-2"/>
                </div>
            </div>
            <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                <x-theme-button class="bg-themeRed">
                    {{ __('Отправить') }}
                </x-theme-button>
            </div>
        </form>
    </x-form.section>
@endsection
