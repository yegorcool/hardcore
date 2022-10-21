@extends('layouts.page')
@section('title')
    {{ __('Добавление этапа карьеры бойца') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100"
           href="{{ route('producer.fighters.show', $fighter->id )  }}"
           class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться в профиль') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid  bg-gray-100 px-lg-5 mx-auto sm:px-6 lg:px-8 py-2">
        <div class="w-full lg:w-2/3  ">
            <div class="">
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
                <div class="border-b py-1 mb-2">
                    <x-input-label class="w-1/5 inline-block" for="eventId" :value="__('ID этапа: ')"/>
                    <span class="text-gray-900 text-xl ">{{ $careerEvent->id }}</span>
                </div>
            </div>
            <div class="my-4 lg:col-8">
                <form method="POST" action="{{ route('producer.career_events.update', $careerEvent) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Name -->
                    <input type="hidden" name="user_id" value="{{ $fighter->id }}">
                    <div>
                        <x-input-label for="title" :value="__('Заголовок')"/>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$careerEvent->title"
                                      required autofocus/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>

                    <div>
                        <x-input-label for="date_start" :value="__('Дата начала этапа')"/>

                        <x-text-input id="date_start" class="block mt-1 w-full" type="datetime-local" name="date_start" :value="$careerEvent->date_start" required/>

                        <x-input-error :messages="$errors->get('date_start')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="date_end" :value="__('Дата окончания этапа')"/>

                        <x-text-input id="date_end" class="block mt-1 w-full" type="datetime-local" name="date_end" :value="$careerEvent->date_end"/>

                        <x-input-error :messages="$errors->get('date_end')" class="mt-2"/>
                    </div>

                    <!-- description -->
                    <div>
                        <x-input-label for="description" :value="__('Описание')"/>
                        <textarea id="description" class="block mt-1 w-full" rows="3" cols="30" name="description"
                                  :value="" required
                        >{{ $careerEvent->description }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>
                    <!-- Comment -->
                    <div>
                        <x-input-label for="comment" :value="__('Комментарий')"/>
                        <x-text-input id="comment" class="block mt-1 w-full" type="text" name="comment" :value="$careerEvent->comment"/>
                        <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
                    </div>
                    <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                        <p class="text-themeOrange text-2xl">Редактирование еще не готово</p>
{{--                        <x-theme-button class="bg-themeRed">--}}
{{--                            {{ __('Сохранить') }}--}}
{{--                        </x-theme-button>--}}
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
