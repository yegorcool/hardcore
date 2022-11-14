@extends('layouts.page')
@section('title')
    {{ __('Редактирование данных бойца') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('admin.users.index')  }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <x-form.section>
        <form method="POST" action="{{ route('admin.users.update', $user) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            @method('PUT')
            <div class="w-1/3">
                <x-form.input-label class="inline-block" for="fighterId" :value="__('ID бойца: ')"/>
                <span class="font-semibold text-xl">{{ $user->id }}</span>
                <x-form.input-error :messages="$errors->get('id')" class="mt-2"/>
            </div>
            <div class="lg:w-2/3">
                <x-form.input-label for="name" :value="__('Имя')"/>
                <x-form.text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                   :value="$user->name" required
                                   autofocus/>
                <x-form.input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <!-- Email Address -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="email" :value="__('Электронная почта')"/>
                <x-form.text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                   :value="$user->email"
                                   required/>
                <x-form.input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <!-- City -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="city" :value="__('Город')"/>
                <x-form.text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                   :value="$user->city"/>
                <x-form.input-error :messages="$errors->get('city')" class="mt-2"/>
            </div>
            <!-- role -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="role" :value="__('Роль')"/>
                <select name="role" id="role"
                        class="shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                    <option value="">Выбрать</option>
                    @foreach(\App\Role\UserRole::getRoleList() as $key=>$role)
                        <option value="{{ $key }}"
                                @if($key == $user->role) selected @endif>{{$role}}</option>
                    @endforeach
                </select>
                <x-form.input-error :messages="$errors->get('role')" class="mt-2"/>
            </div>
               <!-- description -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="description" :value="__('Описание')"/>
                <textarea id="description"
                          class="block mt-1 w-full shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500"
                          rows="5" cols="30"
                          :value="old('description')" name="description">
                            {{$user->description}}
                        </textarea>
                <x-form.input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>
            {{--Social Networks--}}
            <div class="py-4">
                <div class="md:flex md:justify-between items-center border-b-2  mb-2">
                    <div class="mb-2 ">
                        <h3 class=" text-gray-100 text-2xl font-bold leading-tight">{{ __('Социальные сети') }}</h3>
                    </div>
                </div>

                <div class="my-4 border-b ">
                    <ul>
                        @foreach($socialNetworks as $network)
                            <li class="block font-medium text-base text-gray-400 mb-2">
                                        <span><i
                                                class="text-gray-100 inline-block min-w-[20px] mr-3 fab fa-{{$network->lang_key}}"></i></span>
                                <span class="text-gray-100 inline-block min-w-[150px]">{{ $network->title }}</span>

                                <input id="city"
                                       class="inline-block mt-1 w-1/2 shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500"
                                       type="text"
                                       name="social_user[{{ $network->lang_key }}]"
                                       value="@if(!array_key_exists($network->lang_key, $socialLinks))@else {{ $socialLinks[$network->lang_key] }}@endif   "/>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="w-auto  md:ml-0 md:w-1/3 lg:text-left">
                <x-theme-button class="bg-themeRed">
                    {{ __('Сохранить изменения') }}
                </x-theme-button>
            </div>
        </form>
    </x-form.section>
@endsection

