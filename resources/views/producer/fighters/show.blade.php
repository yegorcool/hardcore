@extends('layouts.page')
@section('title')
    {{ __('Информация о бойце') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.fighters.index')  }}" class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid  bg-gray-300 px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="p-4">
            <div class="row border-b-2 mb-4">
                <div class="col-lg-6">
                    <span class="site-title-tagline">Профиль</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Основные данные</h3>
                </div>
            </div>
            {{--ID--}}
            <div class="border-b py-1 mb-2">
                <x-input-label class="w-1/5 inline-block" for="fighterId" :value="__('ID бойца: ')"/>
                <span class="text-gray-900 text-xl ">{{ $fighter->id }}</span>
            </div>
            {{--Имя--}}
            <div class="border-b py-1 mb-2">
                <x-input-label class="w-1/5 inline-block" for="name" :value="__('Имя')"/>
                <span class="text-gray-900 text-xl ">{{ $fighter->name }}</span>
            </div>
            <!-- Email Address -->
            <div class="border-b  py-1 mb-2">
                <x-input-label class="w-1/5 inline-block" for="email" :value="__('Электронная почта')"/>
                <span class="text-gray-900 text-xl ">{{ $fighter->email }}</span>
            </div>
            <div class="border-b lg:flex  py-1 mb-2">
                <!-- City -->
                <div class=" w-full lg:w-1/2 mr-10">
                    <x-input-label class="w-2/5 inline-block" for="city" :value="__('Город')"/>
                    <span class="text-gray-900 text-xl ">{{ $fighter->city }}</span>
                </div>
                <!-- role -->
                <div class=" w-full lg:w-1/2">
                    <x-input-label class="w-2/5 inline-block" for="role" :value="__('Роль')"/>
                    <span class="text-gray-900 text-xl ">{{ $fighter->role }}</span>
                </div>
            </div>
            <div class="border-b  py-1 lg:flex mb-2">
                <!-- height -->
                <div class="  w-full lg:w-1/2 mr-10">
                    <x-input-label class="w-2/5 inline-block" for="height" :value="__('Рост')"/>
                    <span class="text-gray-900 text-xl ">{{ $fighter->height }} см</span>
                </div>
                <!-- weight -->
                <div class=" w-full lg:w-1/2">
                    <x-input-label class="w-2/5 inline-block" for="weight" :value="__('Вес')"/>
                    <span class="text-gray-900 text-xl ">{{ $fighter->weight }} кг</span>
                </div>
            </div>
            <div class="border-b  py-2 lg:flex flex-wrap mb-2">
                <div class="w-full lg:w-auto mr-4 mb-2">
                    <x-input-label class=" inline-block" for="avatar" :value="__('Аватар')"/>
                    <img class="w-auto h-[150px]  m-1" src="{{ asset($fighter->avatar) }}" alt="Аватар">
                </div>
                <div class="w-full lg:w-auto  mr-4 mb-2">
                    <x-input-label class="inline-block" for="hero_image" :value="__('Фото фона')"/>
                    <img class="w-auto h-[150px]  m-1" src="{{ asset($fighter->hero_image) }}" alt="Фото фона">
                </div>
                <div class="w-full lg:w-auto  mr-4 mb-2">
                    <x-input-label class="inline-block" for="hero_image" :value="__('Галерея')"/>
                    <div class="flex flex-wrap">
                        @forelse($fighter->gallery_images as $image)
                            <img class="w-auto h-[150px] m-1" src="{{ asset($image) }}" alt="Фото фона">
                        @empty
                            <p>В галерее нет фото</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- description -->
            <div class="border-b  py-1 mb-2">
                <x-input-label class="w-1/5 inline-block" for="description" :value="__('Описание')"/>
                <p class="block mt-1 w-full text-gray-900 text-xl ">{{$fighter->description}}</p>
            </div>
            <div class="flex ">
                <button type="submit" class="w-1/2 md:w-1/4 inline-block theme-btn w-4/5 text-centre my-6">
                    <i class="far fa-paper-plane mr-1"></i>
                    Изменить
                </button>
            </div>
        </div>
        <div class="p-2 md:p-4">
            <div class="md:flex md:justify-between items-center border-b-2  mb-2">
                <div class="mb-2 ">
                    <span class="site-title-tagline">Карьера</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Этапы карьеры</h3>
                </div>
                <div class="theme-btn mx-3 mb-2">
                    <a class="text-white hover:text-gray-100" href="{{ route('producer.career_events.create', ['fighter' => $fighter]) }}" class=""><i
                            class="fa fa-plus mr-2"></i>
                        {{ __(' Добавить раздел карьеры') }}
                    </a>
                </div>
            </div>
            @include('producer.career_events.list')
        </div>
    </section>
@endsection
