@extends('layouts.page')
@section('title')
    {{ __('Редактирование данных пользователя') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('support.users.index')  }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <x-form.section>
        <form method="POST" action="{{ route('support.users.update', $user) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="producer_id" value="{{auth()->id()}}">
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
                <x-form.input-label for="edit-user-role" :value="__('Роль')"/>
                <select name="role" id="edit-user-role"
                        class="shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                    <option value="">Выбрать</option>
                    @foreach(\App\Role\UserRole::getRoleList() as $key=>$role)
                        <option value="{{ $key }}"
                                @if($key == $user->role) selected @endif>{{$role}}</option>
                    @endforeach
                </select>
                <x-form.input-error :messages="$errors->get('role')" class="mt-2"/>
            </div>
            <!-- producer for fighter -->
            <div class="lg:w-2/3 mt-2 hidden" id="chooseProducer">
                @if(!empty($producersOfFighter) && count($producersOfFighter) === 1)
                <x-form.input-label for="selectProducer" :value="__('Продюсер')"/>
                <select name="producer_id" id="selectProducer"
                        class="shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                    <option value="">Выбрать</option>
                    @foreach($producers as $key => $producer)
                        <option value="{{ $key }}"
                                @if($key == array_key_first($producersOfFighter)) selected @endif>{{$producer}}</option>
                    @endforeach
                </select>
                <x-form.input-error :messages="$errors->get('role')" class="mt-2"/>
                @else
                    <span>У бойца несколько продюсеров ({{ count($producersOfFighter) }})</span>
                    {{--@todo сделать мультиселект --}}
                @endif
            </div>
            <div class=" lg:flex">
                <!-- height -->
                <div class="mt-2 w-1/2 mr-10">
                    <x-form.input-label for="height" :value="__('Рост')"/>
                    <x-form.text-input id="height" class="block mt-1"
                                       type="number" step="1" min="50" max="280" name="height"
                                       :value="$user->height"/>
                    <x-form.input-error :messages="$errors->get('height')" class="mt-2"/>
                </div>
                <!-- weight -->
                <div class="mt-2 w-1/2">
                    <x-form.input-label for="weight" :value="__('Вес')"/>
                    <x-form.text-input id="weight" class="block mt-1"
                                       type="number" step="0.010" name="weight" min="5" max="250"
                                       :value="$user->weight"/>
                    <x-form.input-error :messages="$errors->get('weight')" class="mt-2"/>
                </div>
            </div>
            <!-- description -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="description" :value="__('Описание')"/>
                <textarea id="description"
                          class="block mt-1 w-full shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500"
                          rows="5" cols="30"
                          :value="old('description')" name="description">{{$user->description}}</textarea>
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
            {{--File Upload--}}
            <div class="py-2  mb-2">
                <div class="border-b  md:flex ">
                    <div class="w-full md:w-auto mr-4 mb-2">
                        <div class="block font-medium text-lg  mb-2">
                            {{ __('Аватар') }}
                        </div>
                        <span id="output_edit_avatar">
                            <img class="w-auto h-[150px]  m-1"
                                         src="@if($user->avatar){{ asset($user->avatar) }} @else /images/avatar1.jpg @endif "
                                         alt="Аватар">
                        </span>
                    </div>
                <div>
                        <x-form.input-label for="avatar_edit">
                            <span class="block mb-2">{{__('Заменить аватар: ')}}<span
                                            class="text-base  font-normal text-gray-400">квадратное фото max 250px * 250px</span></span>
                            <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                        </x-form.input-label>
                        <x-form.text-input id="avatar_edit" class="hidden" type="file" name="avatar"
                                           :value="old('avatar')"/>
                        <x-form.input-error :messages="$errors->get('avatar')" class="mt-2"/>
                    </div>
                </div>
                <div class="border-b  md:flex ">
                    <div class="w-full md:w-auto mr-4 mb-2">
                        <div class="block font-medium text-lg  mb-2">
                            {{ __('Портрет') }}
                        </div>
                        <span id="output_edit_portrait">
                            <img class="w-auto h-[150px]  m-1"
                                         src="@if($user->portrait) {{ asset($user->portrait) }} @else /images/portrait1.jpg @endif "
                                         alt="Портрет">
                        </span>
                    </div>
                    <div>
                        <x-form.input-label for="portrait_edit">
                                    <span class="block mb-2">{{__('Заменить портрет: ')}}<span
                                            class="text-base  font-normal text-gray-400">вертикальное фото в пропорции 2 : 3</span></span>
                            <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                        </x-form.input-label>
                        <x-form.text-input id="portrait_edit" class="hidden" type="file" name="portrait"
                                           :value="old('portrait')"/>
                        <x-form.input-error :messages="$errors->get('portrait')" class="mt-2"/>
                    </div>
                </div>
                <div class="border-b  md:flex ">
                    <div class="w-full md:w-auto  mr-4 mb-2">
                        <div class="block font-medium text-lg  mb-2">
                            {{ __('Фото фона') }}
                        </div>
                        <span id="output_edit_hero">
                                    <img class="w-auto h-[150px]  m-1"
                                         src="@if($user->hero_image) {{ asset($user->hero_image) }} @else /images/slider-3.jpg @endif "
                                         alt="Фото фона">
                                </span>
                    </div>
                    <div>
                        <x-form.input-label for="hero_image_edit"><span
                                class=" block mb-2">{{__('Заменить фото фона: ')}}</span>
                            <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                        </x-form.input-label>
                        <x-form.text-input id="hero_image_edit" class="hidden" type="file" name="hero_image"
                                           :value="old('hero_image')"/>
                        <x-form.input-error :messages="$errors->get('hero_hero')" class="mt-2"/>
                        <div class="row review-span"><span id="output-hero" class="preview h-150"></span></div>
                    </div>
                </div>

                <div class="w-full lg:w-auto  mr-4 mb-2">
                    <div class="w-full lg:w-auto  mr-4 mb-2">
                        <div class="block font-medium text-lg  mb-2">
                            {{ __('Галерея') }}
                        </div>
                        <div id="output_edit_gallery" class="flex flex-wrap">
                            @if($user->gallery_images)
                                <div class="flex flex-wrap">
                                    @forelse($user->gallery_images as $image)
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
                        <x-form.input-label for="gallery_images_edit"><span
                                class=" block mb-2">{{__('Заменить фото галереи: ')}}</span>
                            <div class="preview-btn ml-2">{{__('Выберите файлы')}}</div>
                        </x-form.input-label>
                        <x-form.text-input id="gallery_images_edit" class="hidden" type="file" multiple
                                           name="gallery_images[]" :value="old('gallery_images')"/>
                        <x-form.input-error :messages="$errors->get('gallery_images')" class="mt-2"/>
                    </div>
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
@section('js')
    <script>
        const editUserRole = document.getElementById('edit-user-role');
        const selectProducer = document.getElementById('chooseProducer');
        let role = '{{ $user->role }}';
        function showField() {
            if (role === 'fighter') {
                selectProducer.classList.remove('hidden')
            }
        }
        showField();
        function showFieldForSelected() {
            Object.values(editUserRole.options).forEach((option) => {
                if (option.selected) {
                    role = option.value;
                    if (role === 'fighter') {
                        selectProducer.classList.remove('hidden')
                    } else {
                        selectProducer.classList.add('hidden')
                    }
                }
            })
        }
        editUserRole.addEventListener('change', showFieldForSelected, false);

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
