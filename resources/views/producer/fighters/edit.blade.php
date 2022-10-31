@extends('layouts.page')
@section('title')
    {{ __('Редактирование данных бойца') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.fighters.index')  }}" class=""><i class="fa fa-plus mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid  bg-gray-100 px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="row"></div>
            <div class="my-4">
                <form method="POST" action="{{ route('producer.fighters.update', $fighter) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$fighter->id}}">
                    @method('PUT')
                    <div class="w-1/3">
                        <x-input-label class="inline-block" for="fighterId" :value="__('ID бойца: ')"/>
                        <span class="font-semibold">{{ $fighter->id }}</span>
                        <x-input-error :messages="$errors->get('id')" class="mt-2"/>
                    </div>
                    <div class="lg:w-2/3">
                        <x-input-label for="name" :value="__('Имя')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$fighter->name" required
                                      autofocus/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <!-- Email Address -->
                    <div class="lg:w-2/3 mt-2">
                        <x-input-label for="email" :value="__('Электронная почта')"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$fighter->email"
                                      required/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                    <!-- City -->
                    <div class="lg:w-2/3 mt-2">
                        <x-input-label for="city" :value="__('Город')"/>
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$fighter->city"/>
                        <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                    </div>
                    <!-- role -->
                    <div class="lg:w-2/3 mt-2">
                        <x-input-label for="role" :value="__('Роль')"/>
                        <select name="role" id="role">
                            <option value="">Выбрать</option>
                            @foreach(\App\Role\UserRole::getRoleList() as $key=>$role)
                                <option value="{{ $key }}"@if($key == $fighter->role) selected @endif>{{$role}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2"/>
                    </div>
                    <div class=" lg:flex">
                        <!-- height -->
                        <div class="mt-2 w-1/2 mr-10">
                            <x-input-label for="height" :value="__('Рост')"/>
                            <x-text-input id="height" class="block mt-1"
                                          type="number" step="1" min="50" max="280" name="height" :value="$fighter->height"/>
                            <x-input-error :messages="$errors->get('height')" class="mt-2"/>
                        </div>
                        <!-- weight -->
                        <div class="mt-2 w-1/2">
                            <x-input-label for="weight" :value="__('Вес')"/>
                            <x-text-input id="weight" class="block mt-1"
                                          type="number" step="0.010" name="weight" min="5" max="250" :value="$fighter->weight"/>
                            <x-input-error :messages="$errors->get('weight')" class="mt-2"/>
                        </div>
                    </div>
                    <!-- description -->
                    <div class="lg:w-2/3 mt-2">
                        <x-input-label for="description" :value="__('Описание')"/>
                        <textarea id="description" class="block mt-1 w-full" rows="5" cols="30" :value="old('description')" name="description">
                            {{$fighter->description}}
                        </textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>
                    {{--File Upload--}}
                    <div class="py-2  mb-2">
                        <div class="border-b  md:flex ">
                            <div class="w-full md:w-auto mr-4 mb-2">
                                <div class="block font-medium text-lg text-gray-900 mb-2">
                                    {{ __('Аватар') }}
                                </div>
                                <span id="output_edit_avatar">
                                    <img class="w-auto h-[150px]  m-1" src="@if($fighter->avatar){{ asset($fighter->avatar) }} @else /images/avatar1.jpg @endif " alt="Аватар">
                                </span>
                            </div>
                            <div>
                                <x-input-label for="avatar_edit">
                                    <span class="block mb-2">{{__('Заменить аватар: ')}}<span class="text-base  font-normal text-gray-400">квадратное фото max 250px * 250px</span></span>
                                    <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                                </x-input-label>
                                <x-text-input id="avatar_edit" class="hidden" type="file" name="avatar"
                                              :value="old('avatar')"/>
                                <x-input-error :messages="$errors->get('avatar')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="border-b  md:flex ">
                            <div class="w-full md:w-auto mr-4 mb-2">
                                <div class="block font-medium text-lg text-gray-900 mb-2">
                                    {{ __('Портрет') }}
                                </div>
                                <span id="output_edit_portrait">
                                    <img class="w-auto h-[150px]  m-1" src="@if($fighter->portrait) {{ asset($fighter->portrait) }} @else /images/portrait1.jpg @endif " alt="Портрет">
                                </span>
                            </div>
                            <div>
                                <x-input-label for="portrait_edit">
                                    <span class="block mb-2">{{__('Заменить портрет: ')}}<span class="text-base  font-normal text-gray-400">вертикальное фото в пропорции 2 : 3</span></span>
                                    <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                                </x-input-label>
                                <x-text-input id="portrait_edit" class="hidden" type="file" name="portrait"
                                              :value="old('portrait')"/>
                                <x-input-error :messages="$errors->get('portrait')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="border-b  md:flex ">
                            <div class="w-full md:w-auto  mr-4 mb-2">
                                <div class="block font-medium text-lg text-gray-900 mb-2">
                                    {{ __('Фото фона') }}
                                </div>
                                <span id="output_edit_hero">
                                    <img class="w-auto h-[150px]  m-1" src="@if($fighter->hero_image) {{ asset($fighter->hero_image) }} @else /images/slider-3.jpg @endif "
                                         alt="Фото фона">
                                </span>
                            </div>
                            <div>
                                <x-input-label for="hero_image_edit"><span
                                        class=" block mb-2">{{__('Заменить фото фона: ')}}</span>
                                    <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                                </x-input-label>
                                <x-text-input id="hero_image_edit" class="hidden" type="file" name="hero_image"
                                              :value="old('hero_image')"/>
                                <x-input-error :messages="$errors->get('hero_hero')" class="mt-2"/>
                                <div class="row review-span"><span id="output-hero" class="preview h-150"></span></div>
                            </div>
                        </div>

                        <div class="w-full lg:w-auto  mr-4 mb-2">
                            <div class="w-full lg:w-auto  mr-4 mb-2">
                                <div class="block font-medium text-lg text-gray-900 mb-2">
                                    {{ __('Галерея') }}
                                </div>
                                <div id="output_edit_gallery" class="flex flex-wrap">
                                    @if($fighter->gallery_images)
                                        <div class="flex flex-wrap">
                                            @forelse($fighter->gallery_images as $image)
                                                <img class="w-auto h-[150px] m-1" src="{{ asset($image) }}"
                                                     alt="Фото фона">
                                            @empty
                                                <p>В галерее нет фото</p>
                                            @endforelse
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <x-input-label for="gallery_images_edit" ><span class=" block mb-2">{{__('Заменить фото галереи: ')}}</span>
                                    <div class="preview-btn ml-2">{{__('Выберите файлы')}}</div>
                                </x-input-label>
                                <x-text-input id="gallery_images_edit" class="hidden" type="file" multiple name="gallery_images[]" :value="old('gallery_images')"/>
                                <x-input-error :messages="$errors->get('gallery_images')" class="mt-2"/>
                            </div>
                        </div>
                    </div>

                    <div class="w-auto  md:ml-0 md:w-1/3 lg:text-left">
                        <x-theme-button class="bg-themeRed">
                            {{ __('Сохранить изменения') }}
                        </x-theme-button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function handleAvatarSelectSingle(evt) {
            let file = evt.target.files;
            let f = file[0]
            if (!f.type.match('image.*')) {
                alert("Только изображения....");
            }
            let reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    let span = document.createElement('span');
                    span.classList.add('preview-image')
                    span.innerHTML = ['<img class="img-thumbnail" src="', e.target.result,
                        '" title="', theFile.name, '"/>'].join('');
                    document.getElementById('output_edit_avatar').innerHTML = "";
                    document.getElementById('output_edit_avatar').insertBefore(span, null);
                };
            })(f);
            reader.readAsDataURL(f);
        }
        function handlePortraitSelectSingle(evt) {
            let file = evt.target.files;
            let f = file[0]
            if (!f.type.match('image.*')) {
                alert("Только изображения....");
            }
            let reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    let span = document.createElement('span');
                    span.classList.add('preview-image')
                    span.innerHTML = ['<img class="img-thumbnail" src="', e.target.result,
                        '" title="', theFile.name, '"/>'].join('');
                    document.getElementById('output_edit_portrait').innerHTML = "";
                    document.getElementById('output_edit_portrait').insertBefore(span, null);
                };
            })(f);
            reader.readAsDataURL(f);
        }
        function handleHeroSelectSingle(evt) {
            let file = evt.target.files;
            let f = file[0]
            if (!f.type.match('image.*')) {
                alert("Только изображения....");
            }
            let reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    let span = document.createElement('span');
                    span.classList.add('preview-image')
                    span.innerHTML = ['<img class="img-thumbnail" src="', e.target.result,
                        '" title="', theFile.name, '"/>'].join('');
                    document.getElementById('output_edit_hero').innerHTML = "";
                    document.getElementById('output_edit_hero').insertBefore(span, null);
                };
            })(f);
            reader.readAsDataURL(f);
        }

        function handleFileSelectMulti(evt) {
            let files = evt.target.files;
            console.log(files)
            document.getElementById('output_edit_gallery').innerHTML = "";
            for (let i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    alert("Только изображения....");
                }
                let reader = new FileReader();
                reader.onload = (function (theFile) {
                    return function (e) {
                        let span = document.createElement('span');
                        span.classList.add('preview');
                        span.innerHTML = ['<img class="img-thumbnail" src="', e.target.result,
                            '" title="', theFile.name, '"/>'].join('');
                        document.getElementById('output_edit_gallery').insertBefore(span, null);
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }

        document.getElementById('avatar_edit').addEventListener('change', handleAvatarSelectSingle, false);
        document.getElementById('portrait_edit').addEventListener('change', handlePortraitSelectSingle, false);
        document.getElementById('hero_image_edit').addEventListener('change', handleHeroSelectSingle, false);
        document.getElementById('gallery_images_edit').addEventListener('change', handleFileSelectMulti, false);

    </script>
@endsection
