
@extends('layouts.page')
@section('title')
    {{ __('Редактирование данных бойца') }}
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
{{--                <form method="POST" action="#">--}}
                <form method="POST" action="{{ route('producer.fighters.update', $fighter) }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$fighter->id}}">
                    @method('PUT')
                    <div class="w-1/3">
                        <x-input-label class="inline-block" for="fighterId" :value="__('ID бойца: ')"/> <span class="font-semibold">{{ $fighter->id }}</span>


                        <x-input-error :messages="$errors->get('id')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Имя')"/>

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$fighter->name" required
                                      autofocus/>

                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Электронная почта')"/>

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$fighter->email"
                                      required/>

                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                    <!-- City -->
                    <div>
                        <x-input-label for="city" :value="__('Город')"/>

                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$fighter->city" />

                        <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                    </div>

                    <!-- role -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Роль')"/>

                        <select name="role" id="role">
                            <option value="">Выбрать</option>
                            @foreach(\App\Role\UserRole::getRoleList() as $key=>$role)
                                <option value="{{ $key }}" @if($key == $fighter->role) selected @endif>{{$role}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('role')" class="mt-2"/>
                    </div>
                    <div class=" lg:flex">
                        <!-- height -->
                        <div class="mt-4  w-full lg:w-1/2 mr-10">
                        <x-input-label for="height" :value="__('Рост')"/>

                        <x-text-input id="height" class="block mt-1"
                                      type="number" step="1" min="50" max="280" name="height" :value="$fighter->height"
                        />

                        <x-input-error :messages="$errors->get('height')" class="mt-2"/>
                    </div>
                        <!-- weight -->
                        <div class="mt-4 w-full lg:w-1/2">
                        <x-input-label for="weight" :value="__('Вес')"/>

                        <x-text-input id="weight" class="block mt-1"
                                      type="number" step="0.010" name="weight" min="5" max="250" :value="$fighter->weight"
                        />

                        <x-input-error :messages="$errors->get('weight')" class="mt-2"/>
                    </div>
                    </div>
                    <!-- description -->
                    <div>
                        <x-input-label for="description" :value="__('Описание')"/>

                        <textarea id="description" class="block mt-1 w-full" rows="3" cols="30" :value="old('description')" name="description" >
                            {{$fighter->description}}
                        </textarea>

                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <div class="w-auto  md:ml-0 md:w-1/3 lg:text-left" >
                        <x-theme-button class="bg-themeRed" >
                            {{ __('Сохранить изменения') }}
                        </x-theme-button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
