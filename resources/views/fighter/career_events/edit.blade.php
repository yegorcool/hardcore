@extends('layouts.page')
@section('title')
    {{ __('Редактирование этапа карьеры бойца') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100"
           href="{{ route('fighter.profile', auth()->id() )  }}"
           class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться в профиль') }}
        </a>
    </div>
@endsection

@section('content')
    <x-form.section>
        <div class="">
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
            <div class="border-b py-1 mb-2">
                <x-form.input-label class="w-1/5 inline-block" for="eventId" :value="__('ID этапа: ')"/>
                <span class=" text-xl ">{{ $careerEvent->id }}</span>
            </div>
        </div>
        <div class="my-4 lg:col-8">
            <form method="POST" action="{{ route('fighter.career_events.update', $careerEvent) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name -->
                <input type="hidden" name="user_id" value="{{ $fighter->id }}">
                <div>
                    <x-form.input-label for="title" :value="__('Заголовок')"/>
                    <x-form.text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                       :value="$careerEvent->title"
                                       required autofocus/>
                    <x-form.input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>

                <div>
                    <x-form.input-label for="date_start" :value="__('Дата начала этапа')"/>

                    <x-form.text-input id="date_start" class="block mt-1 w-full" type="datetime-local" name="date_start"
                                       :value="$careerEvent->date_start" required/>

                    <x-form.input-error :messages="$errors->get('date_start')" class="mt-2"/>
                </div>
                <div>
                    <x-form.input-label for="date_end" :value="__('Дата окончания этапа')"/>

                    <x-form.text-input id="date_end" class="block mt-1 w-full" type="datetime-local" name="date_end"
                                       :value="$careerEvent->date_end"/>

                    <x-form.input-error :messages="$errors->get('date_end')" class="mt-2"/>
                </div>

                <!-- description -->
                <div>
                    <x-form.input-label for="description" :value="__('Описание')"/>
                    <textarea id="description"
                              class="block mt-1 w-full shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500"
                              rows="5" cols="30"
                              name="description"
                              required>{{ $careerEvent->description }}</textarea>
                    <x-form.input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <!-- Comment -->
                <div>
                    <x-form.input-label for="comment" :value="__('Комментарий')"/>
                    <x-form.text-input id="comment" class="block mt-1 w-full " type="text" name="comment"
                                       :value="$careerEvent->comment"/>
                    <x-form.input-error :messages="$errors->get('comment')" class="mt-2"/>
                </div>
                <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                    <x-theme-button class="bg-themeRed">
                        {{ __('Сохранить') }}
                    </x-theme-button>
                </div>
            </form>
        </div>
    </x-form.section>
@endsection
