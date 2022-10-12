
@extends('layouts.page')
@section('title')
    {{ __('Добавление бойца') }}
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
                <form method="POST" action="{{ route('producer.fighters.store') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Имя')"/>

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                                      autofocus/>

                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Электронная почта')"/>

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                      required/>

                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                    <!-- City -->
                    <div>
                        <x-input-label for="city" :value="__('Город')"/>

                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                                      />

                        <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Пароль')"/>

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                    <!-- role -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Роль')"/>

                        <select name="role" id="role">
                            <option value="">Выбрать</option>
                            @foreach(\App\Role\UserRole::getRoleList() as $key=>$role)
                                <option value="{{ $key }}" @if($key == 'fighter') selected @endif>{{$role}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('role')" class="mt-2"/>
                    </div>
                    <div class=" lg:flex">
                        <!-- height -->
                        <div class="mt-4 w-1/2 mr-10">
                        <x-input-label for="height" :value="__('Рост')"/>

                        <x-text-input id="height" class="block mt-1"
                                      type="number" step="1" min="50" max="280" name="height" :value="old('height')"
                        />

                        <x-input-error :messages="$errors->get('height')" class="mt-2"/>
                    </div>
                        <!-- weight -->
                        <div class="mt-4 w-1/2">
                        <x-input-label for="weight" :value="__('Вес')"/>

                        <x-text-input id="weight" class="block mt-1"
                                      type="number" step="0.010" name="weight" min="5" max="250" :value="old('weight')"
                        />

                        <x-input-error :messages="$errors->get('weight')" class="mt-2"/>
                    </div>
                    </div>
                    <!-- description -->
                    <div>
                        <x-input-label for="description" :value="__('Описание')"/>

                        <textarea id="description" class="block mt-1 w-full" rows="3" cols="30" name="description" :value="old('description')" required
                                   ></textarea>

                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left" >
                        <x-theme-button class="bg-themeRed" >
                            {{ __('Сохранить') }}
                        </x-theme-button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
