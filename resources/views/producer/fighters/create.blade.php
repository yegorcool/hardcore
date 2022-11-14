@extends('layouts.page')
@section('title')
    {{ __('Добавление бойца') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.fighters.index')  }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <x-form.section>
        <form method="POST" action="{{ route('producer.fighters.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="lg:w-2/3">
                <x-form.input-label for="name" :value="__('Имя')"/>
                <x-form.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                              required autofocus/>
                <x-form.input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div  class="lg:w-2/3 mt-2">
                <x-form.input-label for="email" :value="__('Электронная почта')"/>
                <x-form.text-input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email')" required/>
                <x-form.input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- City -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="city" :value="__('Город')"/>
                <x-form.text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"/>
                <x-form.input-error :messages="$errors->get('city')" class="mt-2"/>
            </div>
            <!-- Password -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="password" :value="__('Пароль')"/>
                <x-form.text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>
                <x-form.input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>
            <!-- role -->
            <div  class="lg:w-2/3 mt-2">
                <x-form.input-label for="role" :value="__('Роль')"/>
                <select name="role" id="role" class="mt-1  shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                    <option value="">Выбрать</option>
                    @foreach(\App\Role\UserRole::getRoleList() as $key=>$role)
                        <option value="{{ $key }}" @if($key == 'fighter') selected @endif>{{$role}}</option>
                    @endforeach
                </select>
                <x-form.input-error :messages="$errors->get('role')" class="mt-2"/>
            </div>
            <div  class="lg:flex">
                <!-- height -->
                <div class="mt-2 w-1/2 mr-10">
                    <x-form.input-label for="height" :value="__('Рост')"/>

                    <x-form.text-input id="height" class="block mt-1"
                                  type="number" step="1" min="50" max="280" name="height"
                                  :value="old('height')"/>
                    <x-form.input-error :messages="$errors->get('height')" class="mt-2"/>
                </div>
                <!-- weight -->
                <div class="mt-2 w-1/2">
                    <x-form.input-label for="weight" :value="__('Вес')"/>
                    <x-form.text-input id="weight" class="block mt-1"
                                  type="number" step="0.010" name="weight" min="5" max="250"
                                  :value="old('weight')"/>
                    <x-form.input-error :messages="$errors->get('weight')" class="mt-2"/>
                </div>
            </div>
            <!-- description -->
            <div  class="lg:w-2/3 mt-2">
                <x-form.input-label for="description" :value="__('Описание')"/>
                <textarea id="description" class="block mt-1 w-full shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500" rows="3" cols="30" name="description"
                          :value="old('description')" required
                ></textarea>
                <x-form.input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>
            {{--File Upload--}}
            <div>
                <x-form.input-label for="avatar_create" ><span class=" block mb-2">{{__('Аватар: ')}} <span class="text-base  font-normal text-gray-400">квадратное фото max 250px * 250px</span></span>
                    <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                </x-form.input-label>
                <x-form.text-input id="avatar_create" class="hidden" type="file" name="avatar" :value="old('avatar')"/>
                <x-form.input-error :messages="$errors->get('avatar')" class="mt-2"/>
                <div class="row review-span"><span id="output-avatar" class="preview h-150"></span></div>
            </div>
            <div>
                <x-form.input-label for="portrait_create" ><span class=" block mb-2">{{__('Портрет: ')}} <span class="text-base font-normal text-gray-400">вертикальное фото в пропорции 2 : 3</span></span>
                    <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                </x-form.input-label>
                <x-form.text-input id="portrait_create" class="hidden" type="file" name="portrait" :value="old('portrait')"/>
                <x-form.input-error :messages="$errors->get('portrait')" class="mt-2"/>
                <div class="row review-span"><span id="output-portrait" class="preview h-150"></span></div>
            </div>
            <div>
                <x-form.input-label for="hero_image_create" ><span class=" block mb-2">{{__('Обложка личной страницы: ')}}<span class="text-base font-normal text-gray-400">горизонтальное фото 1920px по длинной стороне</span></span>
                    <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                </x-form.input-label>
                <x-form.text-input id="hero_image_create" class="hidden" type="file" name="hero_image" :value="old('hero_image')"/>
                <x-form.input-error :messages="$errors->get('hero_image')" class="mt-2"/>
                <div class="row review-span"><span id="output-hero" class="preview h-150"></span></div>
            </div>

            <div>
                <x-form.input-label for="gallery_images_create" ><span class=" block mb-2">{{__('Галерея: ')}}</span>
                    <div class="preview-btn ml-2">{{__('Выберите файлы')}}</div>
                </x-form.input-label>
                <x-form.text-input id="gallery_images_create" class="hidden" type="file" multiple name="gallery_images[]" :value="old('gallery_images')"/>
                <x-form.input-error :messages="$errors->get('gallery_images')" class="mt-2"/>
                <div class="row"><span id="output-gallery" class="preview h-150"></span></div>
            </div>
            {{--Social Networks--}}
            <div class="">
                <div class="md:flex md:justify-between items-center border-b-2  mb-2">
                    <div class="mb-2 ">
                        <h3 class=" text-gray-100 text-2xl font-bold leading-tight">{{ __('Социальные сети') }}</h3>
                    </div>
                </div>

                <div class="my-4 border-b ">
                    <ul>
                        @foreach($socialNetworks as $network)
                            <li class="block font-medium text-base text-gray-400 mb-2">
                                <span><i class="text-gray-100 inline-block min-w-[20px] mr-3 fab fa-{{$network->lang_key}}"></i></span>
                                <span class="text-gray-100 inline-block min-w-[150px]">{{ $network->title }}</span>
                                <input id="city" class="bg inline-block mt-1 w-1/2 placeholder:text-gray-300  shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500" type="text" name="social_user[{{ $network->lang_key }}]" value="{{ old('user_social['. $network->lang_key .']') }}" placeholder="https:// ..."/>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                <x-theme-button class="bg-themeRed">
                    {{ __('Сохранить') }}
                </x-theme-button>
            </div>
        </form>
    </x-form.section>

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
                    document.getElementById('output-avatar').innerHTML = "";
                    document.getElementById('output-avatar').insertBefore(span, null);
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
                    document.getElementById('output-portrait').innerHTML = "";
                    document.getElementById('output-portrait').insertBefore(span, null);
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
                    document.getElementById('output-hero').innerHTML = "";
                    document.getElementById('output-hero').insertBefore(span, null);
                };
            })(f);
            reader.readAsDataURL(f);
        }
        function handleFileSelectMulti(evt) {
            let files = evt.target.files;
            console.log(files)
            document.getElementById('output-gallery').innerHTML = "";
            for (let i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    alert("Только изображения....");
                }
                let reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        let span = document.createElement('span');
                        span.classList.add('preview');
                        span.innerHTML = ['<img class="img-thumbnail" src="', e.target.result,
                            '" title="', theFile.name, '"/>'].join('');
                        document.getElementById('output-gallery').insertBefore(span, null);
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }

        document.getElementById('avatar_create').addEventListener('change', handleAvatarSelectSingle, false);
        document.getElementById('portrait_create').addEventListener('change', handlePortraitSelectSingle, false);
        document.getElementById('hero_image_create').addEventListener('change', handleHeroSelectSingle, false);
        document.getElementById('gallery_images_create').addEventListener('change', handleFileSelectMulti, false);
    </script>
@endsection
