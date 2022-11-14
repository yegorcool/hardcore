@extends('layouts.page')
@section('title')
    {{ __('Информация о платеже') }}
@endsection

@section('titlebutton')
    <div class="theme-btn mt-3 md:mt-0">
        <a class="text-white hover:text-gray-100" href="{{ route('buyer.videos.index')  }}" class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' К списку видео ') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid bg-black text-gray-400 mx-auto ">
        <div class="py-4">
            <div class="md:flex border-b-2 mb-4">
                <div class=" md:w-3/4 mb-2">
                    <span class="site-title-tagline">{{ __('Медиа') }}</span>
                    <h3 class=" text-black text-2xl font-bold leading-tight">{{ __('Видео') }}</h3>
                </div>
                <div class="md:w-1/4 text-right mb-2">
                    <div class=" theme-btn text-sm bg-white/5 ">
                        <a class="text-white hover:text-gray-100"
                           href="{{ route('buyer.fighter', $video->videoRecipient)  }}"
                           class=""><i class="far fa-paper-plane mr-1"></i>
                            {{ __('В профиль бойца') }}
                        </a>
                    </div>
                </div>
            </div>
            {{--Имя получателя--}}
            <div class="border-b py-1 mb-2">
                <x-form.input-label class="w-1/5 inline-block" for="name" :value="__('Кому: ')"/>
                <span class=" text-xl ">{{ $video->videoRecipient->name }}</span>
            </div>
            <!-- Дата платежа -->
            <div class="border-b  py-1 mb-2">
                <x-form.input-label class="w-1/5 inline-block" :value="__('Дата загрузки: ')"/>
                <span class=" text-xl ">{{$video->created_at->format('d.m.Y H:i')}}</span>
            </div>

            <div class="border-b  py-1 lg:flex mb-2">
                <!-- topic -->
                <div class="  w-full lg:w-1/2 mr-10">
                    <x-form.input-label class="w-2/5 inline-block" :value="__('Название: ')"/>
                    <span class=" text-xl ">{{ $video->title }}</span>
                </div>

            </div>
            <div class="border-b  py-1 lg:flex mb-2">
                <!-- video -->
                <div class="  w-full lg:w-3/4 mr-10">
                    <div class="relative h-[200px] md:h-[400px] flex justify-center items-center">
                        <video width="600" height="400" controls muted >
                        <source src="{{ url($video->video_file) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <!-- description -->
            <div class="border-b  py-1 mb-4">
                <x-form.input-label class="w-1/5 inline-block" :value="__('Комментарий: ')"/>
                <p class="block mt-1 w-full  text-xl ">{{$video->comment}}</p>
            </div>
            <div class="border-b lg:flex  py-1 mb-2">
                <!-- status -->
                <div class=" w-full lg:w-1/2">
                    <x-form.input-label class="w-2/5 inline-block" for="role" :value="__('Статус: ')"/>
                    <span class=" text-xl ">{{$video->status}}</span>
                </div>
            </div>
        </div>
    </section>
@endsection
