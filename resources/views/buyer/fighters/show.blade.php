@extends('layouts.page')
@section('title')
    {{ __('Информация о бойце') }}
@endsection

@section('titlebutton')
    <div class="theme-btn mt-3 md:mt-0">
        <a class="text-white hover:text-gray-100" href="{{ route('buyer.fighters')  }}" class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться к списку ') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid bg-black text-gray-400 mx-auto row">
        <div class="col-lg-9">
            <div class="py-4">
                <div class=" border-b-2 mb-4">
                        <span class="site-title-tagline">Профиль</span>
                        <h3 class=" text-black text-2xl font-bold leading-tight">Основные данные</h3>
                </div>
                {{--ID--}}
                <div class="border-b py-1 mb-2">
                    <x-form.input-label class="w-1/5 inline-block" for="fighterId" :value="__('ID бойца: ')"/>
                    <span class=" text-xl ">{{ $fighter->id }}</span>
                </div>
                {{--Имя--}}
                <div class="border-b py-1 mb-2">
                    <x-form.input-label class="w-1/5 inline-block" for="name" :value="__('Имя')"/>
                    <span class=" text-xl ">{{ $fighter->name }}</span>
                </div>
                <!-- Email Address -->
                <div class="border-b  py-1 mb-2">
                    <x-form.input-label class="w-1/5 inline-block" for="email" :value="__('Электронная почта')"/>
                    <span class=" text-xl ">{{ $fighter->email }}</span>
                </div>
                <div class="border-b lg:flex  py-1 mb-2">
                    <!-- City -->
                    <div class=" w-full lg:w-1/2 mr-10">
                        <x-form.input-label class="w-2/5 inline-block" for="city" :value="__('Город')"/>
                        <span class=" text-xl ">{{ $fighter->city }}</span>
                    </div>
                    <!-- role -->
                    <div class=" w-full lg:w-1/2">
                        <x-form.input-label class="w-2/5 inline-block" for="role" :value="__('Роль')"/>
                        <span class=" text-xl ">{{ $fighter->role }}</span>
                    </div>
                </div>
                <div class="border-b  py-1 lg:flex mb-2">
                    <!-- height -->
                    <div class="  w-full lg:w-1/2 mr-10">
                        <x-form.input-label class="w-2/5 inline-block" for="height" :value="__('Рост')"/>
                        <span class=" text-xl ">{{ $fighter->height }} см</span>
                    </div>
                    <!-- weight -->
                    <div class=" w-full lg:w-1/2">
                        <x-form.input-label class="w-2/5 inline-block" for="weight" :value="__('Вес')"/>
                        <span class=" text-xl ">{{ $fighter->weight }} кг</span>
                    </div>
                </div>
                <div class="border-b  py-2 lg:flex flex-wrap mb-2">
                    <div class="w-full lg:w-auto min-w-[150px] mr-4 mb-2">
                        <x-form.input-label class=" inline-block" for="avatar" :value="__('Аватар')"/>
                        @if($fighter->avatar)
                            <img class="w-auto h-[150px]  m-1" src="{{ asset($fighter->avatar) }}" alt="Аватар">
                        @endif
                    </div>
                    <div class="w-full lg:w-auto min-w-[150px] mr-4 mb-2">
                        <x-form.input-label class="inline-block" for="portrait" :value="__('Портрет')"/>
                        @if($fighter->portrait)
                            <img class="w-auto h-[150px]  m-1" src="{{ asset($fighter->portrait) }}" alt="Портрет">
                        @endif
                    </div>
                    <div class="w-full lg:w-auto min-w-[150px]  mr-4 mb-2">
                        <x-form.input-label class="inline-block" for="hero_image" :value="__('Фото фона')"/>
                        @if($fighter->hero_image)
                            <img class="w-auto h-[150px]  m-1" src="{{ asset($fighter->hero_image) }}" alt="Фото фона">
                        @endif
                    </div>
                    <div class="w-full lg:w-auto min-w-[150px]  mr-4 mb-2">
                        <x-form.input-label class="inline-block" for="hero_image" :value="__('Галерея')"/>
                        @if($fighter->gallery_images)
                            <div class="flex flex-wrap">
                                @forelse($fighter->gallery_images as $image)
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
                    <p class="block mt-1 w-full  text-xl ">{{$fighter->description}}</p>
                </div>
                <div class="">
                    <div class="md:flex md:justify-between items-center border-b-2  mb-2">
                        <div class="mb-2 ">
                            <h3 class=" text-black text-2xl font-bold leading-tight">{{ __('Социальные сети') }}</h3>
                        </div>
                    </div>

                    <div class="my-4 border-b ">
                        <ul>
                            @foreach($fighter->socials as $network)
                                <li class="block font-medium text-base  mb-2">
                                    <span><i class="mr-3 fab fa-{{$network->lang_key}}"></i></span>
                                    <span class="inline-block min-w-[150px]">{{ $network->title }}</span>
                                    @if($network->pivot)
                                        <a href="{{ $network->pivot->link }}" target="_blank">
                                            <span
                                                class="min-w-[150px] hover:text-themeOrange">{{ $network->pivot->link }}</span>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            @if(count($careerEvents) > 0)
                <div class="p-2 md:p-4">
                    <div class="md:flex md:justify-between items-center border-b-2  mb-2">
                        <div class="mb-2 ">
                            <span class="site-title-tagline">Карьера</span>
                            <h3 class=" text-black text-2xl font-bold leading-tight">Этапы карьеры</h3>
                        </div>
                    </div>
                    <div class="my-4 overflow-x-auto">
                        <table
                            class="table table-responsive table-dark table-sm bg-black/80 align-middle text-gray-200 min-w-[900px] ">
                            <thead class="table-group-divider border-top-color-themeRed">
                            <tr class="uppercase text-themeRed font-semibold">
                                <th scope="col">Начало</th>
                                <th scope="col">Окончание</th>
                                <th scope="col" class="min-w-20">Заголовок</th>
                                <th scope="col">Описание</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">

                            @forelse($careerEvents as $event )
                                <tr>
                                    <td>{{$event->date_start->format('d.m.Y')}}</td>
                                    <td>@if($event->date_end)
                                            {{$event->date_end->format('d.m.Y')}}
                                        @else @endif</td>
                                    <td class="min-w-20">{{$event->title}}</td>
                                    <td class="min-w-[300px] max-w-[500px]">{{$event->description}}</td>
                                </tr>
                            @empty
                                <p class="text-gray-500 text-xl mb-2 pl-3">Ни одного этапа еще не добавлено...</p>
                            @endforelse
                            </tbody>
                            <tfoot class="bg-white/10"></tfoot>
                        </table>
                    </div>
                </div>
            @endif
        </div>
        <div class="sm:flex flex-wrap justify-between lg:block col-lg-3 py-4">
            <div class="p-3 w-full sm:w-1/2 lg:w-[90%] mb-4">
                <a href="{{ route('buyer.videos.create', ['recipient' => $fighter]) }}" class="theme-btn w-full">
                    <div class="service-icon">
                        <i class="flaticon-play-button"></i>
                    </div>
                    Записать видео
                </a>
            </div>
            <div class="p-3  sm:w-1/2 lg:w-[90%] mb-4">
                <a href="{{ route('buyer.transactions.create', ['recipient' => $fighter, 'topic' => 'Поддержать']) }}" class="theme-btn  w-full">
                    <div class="service-icon">
                        <i class="flaticon-sports"></i>
                    </div>
                    Поддержать бойца
                </a>
            </div>
            <div class="p-3  sm:w-1/2 lg:w-[90%] mb-4">
                <a href="{{ route('buyer.transactions.create', ['recipient' => $fighter, 'topic' => 'Победа']) }}" class="theme-btn  w-full">
                    <div class="service-icon">
                        <i class="flaticon-award-1"></i>
                    </div>
                    Поздравить <br> с победой
                </a>
            </div>
            <div class="p-3  sm:w-1/2 lg:w-[90%] mb-4">
                <a href="{{ route('buyer.transactions.create', ['recipient' => $fighter, 'topic' => 'День рождения']) }}" class="theme-btn  w-full">
                    <div class="service-icon">
                        <i class="flaticon-money-bag"></i>
                    </div>
                    Поздравить <br> c Днём Рождения
                </a>
            </div>
        </div>
    </section>
@endsection
