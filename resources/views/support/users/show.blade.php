@extends('layouts.page')
@section('title')
    {{ __('Информация о бойце') }}
@endsection

@section('titlebutton')
    <div class="theme-btn inline-block bg-white/30 mr-3 my-1">
        <a class="text-white hover:text-gray-100" href="{{ route('support.users.edit', $user) }}" class=""><i
                class="far fa-paper-plane mr-1"></i>
            {{ __(' Изменить') }}
        </a>
    </div>
    <div class="theme-btn inline-block my-1">
        <a class="text-white hover:text-gray-100" href="{{ route('support.users.index')  }}" class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid bg-black text-gray-400 ">
        <div class="py-4">
            <div class="md:flex  justify-between items-center border-b-2 pb-4 mb-2">
                <div class="w-2/3 lg:w-1/2">
                    <span class="site-title-tagline">Профиль</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Основные данные</h3>
                </div>
            </div>
            {{--ID--}}
            <div class="border-b py-1 mb-2">
                <x-form.input-label class="w-1/5 inline-block" for="fighterId" :value="__('ID бойца: ')"/>
                <span class="text-xl ">{{ $user->id }}</span>
            </div>
            {{--Имя--}}
            <div class="border-b py-1 mb-2">
                <x-form.input-label class="w-1/5 inline-block" for="name" :value="__('Имя')"/>
                <span class="text-xl ">{{ $user->name }}</span>
            </div>
            <!-- Email Address -->
            <div class="border-b  py-1 mb-2">
                <x-form.input-label class="w-1/5 inline-block" for="email" :value="__('Электронная почта')"/>
                <span class="text-xl ">{{ $user->email }}</span>
            </div>
            <div class="border-b lg:flex  py-1 mb-2">
                <!-- City -->
                <div class=" w-full lg:w-1/2 mr-10">
                    <x-form.input-label class="w-2/5 inline-block" for="city" :value="__('Город')"/>
                    <span class="text-xl ">{{ $user->city }}</span>
                </div>
                <!-- role -->
                <div class=" w-full lg:w-1/2">
                    <x-form.input-label class="w-2/5 inline-block" for="role" :value="__('Роль')"/>
                    <span class="text-xl ">{{ $user->role }}</span>
                </div>
            </div>
            <div class="border-b  py-1 lg:flex mb-2">
                <!-- height -->
                <div class="  w-full lg:w-1/2 mr-10">
                    <x-form.input-label class="w-2/5 inline-block" for="height" :value="__('Рост')"/>
                    <span class="text-xl ">{{ $user->height }} см</span>
                </div>
                <!-- weight -->
                <div class=" w-full lg:w-1/2">
                    <x-form.input-label class="w-2/5 inline-block" for="weight" :value="__('Вес')"/>
                    <span class="text-xl ">{{ $user->weight }} кг</span>
                </div>
            </div>
            <!-- Photos -->
            <div class="border-b  py-2 lg:flex flex-wrap mb-2">
                <div class="w-full lg:w-auto min-w-[150px] mr-4 mb-2">
                    <x-form.input-label class=" inline-block" for="avatar" :value="__('Аватар')"/>
                    @if($user->avatar)
                        <img class="w-auto h-[150px]  m-1" src="{{ asset($user->avatar) }}" alt="Аватар">
                    @endif
                </div>
                <div class="w-full lg:w-auto min-w-[150px] mr-4 mb-2">
                    <x-form.input-label class="inline-block" for="portrait" :value="__('Портрет')"/>
                    @if($user->portrait)
                        <img class="w-auto h-[150px]  m-1" src="{{ asset($user->portrait) }}" alt="Портрет">
                    @endif
                </div>
                <div class="w-full lg:w-auto min-w-[150px]  mr-4 mb-2">
                    <x-form.input-label class="inline-block" for="hero_image" :value="__('Фото фона')"/>
                    @if($user->hero_image)
                        <img class="w-auto h-[150px]  m-1" src="{{ asset($user->hero_image) }}" alt="Фото фона">
                    @endif
                </div>
                <div class="w-full lg:w-auto min-w-[150px]  mr-4 mb-2">
                    <x-form.input-label class="inline-block" for="hero_image" :value="__('Галерея')"/>
                    @if($user->gallery_images)
                        <div class="flex flex-wrap">
                            @forelse($user->gallery_images as $image)
                                <img class="w-auto h-[150px] m-1" src="{{ asset($image) }}" alt="Фото фона">
                            @empty
                                <p>В галерее нет фото</p>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
            <!-- description -->
            <div class="border-b  py-1 mb-4">
                <x-form.input-label class="w-1/5 inline-block" for="description" :value="__('Описание')"/>
                <p class="block mt-1 w-full text-xl ">{{$user->description}}</p>
            </div>
            <div class="">
                <div class="md:flex md:justify-between items-center border-b-2  mb-2">
                    <div class="mb-2 ">
                        <h3 class=" text-gray-100 text-2xl font-bold leading-tight">{{ __('Социальные сети') }}</h3>
                    </div>
                </div>

                <div class="my-4 border-b ">
                    <ul>
                        @foreach($user->socials as $network)
                            <li class="block font-medium text-base mb-2">
                                <span><i class="text-gray-100 mr-3 fab fa-{{$network->lang_key}}"></i></span>
                                <span class="text-gray-100 inline-block min-w-[150px]">{{ $network->title }}</span>
                                @if($network->pivot)
                                    <span class="min-w-[150px]">{{ $network->pivot->link }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
{{--        <div class="py-2 md:py-4">--}}
{{--            <div class="md:flex md:justify-between items-center border-b-2  mb-2">--}}
{{--                <div class="mb-2 ">--}}
{{--                    <span class="site-title-tagline">Карьера</span>--}}
{{--                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Этапы карьеры</h3>--}}
{{--                </div>--}}
{{--                <div class="theme-btn mb-2 mr-2">--}}
{{--                    <a class="text-white hover:text-gray-100"--}}
{{--                       href="{{ route('fighter.career_events.create', ['fighter' => $user]) }}" class=""><i--}}
{{--                            class="fa fa-plus mr-2"></i>--}}
{{--                        {{ __(' Добавить раздел карьеры') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @include('support.career_events.list')--}}
{{--        </div>--}}
    </section>
@endsection
