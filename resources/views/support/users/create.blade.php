@extends('layouts.page')
@section('title')
    {{ __('Добавление бойца') }}
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
        <form method="POST" action="{{ route('support.users.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="producer_id" value="{{auth()->id()}}">
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

            <!-- Password -->
            <div class="lg:w-2/3 mt-2">
                <x-form.input-label for="password" :value="__('Пароль')"/>
                <x-form.text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <x-form.input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>
            <!-- role -->
            <div  class="lg:w-2/3 mt-2">
                <x-form.input-label for="create-user-role" :value="__('Роль')"/>
                <select name="role" id="create-user-role" class="mt-1  shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                    <option value="">Выбрать</option>
                    @foreach(\App\Role\UserRole::getRoleList() as $key=>$role)
                        <option value="{{ $key }}" @if($key == old('role')) selected @endif>{{$role}}</option>
                    @endforeach
                </select>
                <x-form.input-error :messages="$errors->get('role')" class="mt-2"/>
            </div>
            <!-- producer for fighter -->
            <div class="lg:w-2/3 mt-2 hidden" id="chooseProducer">
                <x-form.input-label for="selectProducer" :value="__('Продюсер')"/>
                <select name="producer_id" id="selectProducer"
                        class="shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                    <option value="">Выбрать</option>
                    @foreach($producers as $key => $producer)
                        <option value="{{ $key }}"
                                @if($key == old('producer_id')) selected @endif>{{$producer}}</option>
                    @endforeach
                </select>
                <x-form.input-error :messages="$errors->get('role')" class="mt-2"/>
            </div>
            <!-- description -->
            <div  class="lg:w-2/3 mt-2">
                <x-form.input-label for="description" :value="__('Описание')"/>
                <textarea id="description" class="block mt-1 w-full shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500" rows="3" cols="30" name="description"
                          :value="old('description')" required>{{ old('description') }}</textarea>
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
        const createUserRole = document.getElementById('create-user-role');
        const selectProducer = document.getElementById('chooseProducer');
        let role = '{{ old('role') }}';
        function showField() {
            if (role === 'fighter') {
                selectProducer.classList.remove('hidden')
            }
        }
        showField();
        function showFieldForSelected() {
            Object.values(createUserRole.options).forEach((option) => {
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
        createUserRole.addEventListener('change', showFieldForSelected, false);

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

        document.getElementById('avatar_create').addEventListener('change', handleAvatarSelectSingle, false);
    </script>
@endsection
