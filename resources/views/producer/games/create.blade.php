@extends('layouts.page')
@section('title')
    {{ __('Добавление боя') }}
@endsection

@section('titlebutton')
    <div class="theme-btn  ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.games.index')  }}" class=""><i class="fa fa-plus mr-2"></i>
            {{ __(' Вернуться к списку') }}
        </a>
    </div>
@endsection

@section('content')
    <section class="container-fluid  bg-black shadow-xl shadow-white/30 text-gray-400  px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3  ">
            <div class="row">

            </div>
            <div class="my-4">
                <form method="POST" action="{{ route('producer.games.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{--Дата боя--}}
                    <div>
                        <x-input-label for="game_date" :value="__('Дата боя')"/>
                        <x-text-input id="game_date" class="block mt-1 w-full" type="datetime-local" name="datetime"
                                      :value="old('datetime')" required/>
                        <x-input-error :messages="$errors->get('datetime')" class="mt-2"/>
                    </div>
                    {{--Боец 1--}}
                    <div class="mt-4">
                        <x-input-label for="member_one_id" :value="__('Имя первого участника')"/>
                        <select name="member_one_id" id="member_one" class="mt-1  shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                            <option value="">Выбрать</option>
                            @foreach($fighters as $key=>$name)
                                <option value="{{ $key }}">{{$name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('member_one_id')" class="mt-2"/>
                    </div>
                    {{--Боец 2--}}
                    <div class="mt-4">
                        <x-input-label for="member_two_id" :value="__('Имя второго участника')"/>
                        <select name="member_two_id" id="member_two" class="mt-1  shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500">
                            <option value="">Выбрать</option>
                            @foreach($fighters as $key=>$name)
                                <option value="{{ $key }}">{{$name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('member_one_id')" class="mt-2"/>
                    </div>
                    <!-- Place -->
                    <div>
                        <x-input-label for="place" :value="__('Место')"/>
                        <x-text-input id="place" class="block mt-1 w-full" type="text" name="place"
                                      :value="old('place')"/>
                        <x-input-error :messages="$errors->get('place')" class="mt-2"/>
                    </div>
                    <!-- City -->
                    <div>
                        <x-input-label for="city" :value="__('Город')"/>
                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"/>
                        <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                    </div>
                    <!-- description -->
                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Описание')"/>
                        <textarea id="description" class="block mt-1 w-full mt-1  shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-500" rows="3" cols="30" name="description"
                                  :value="old('description')"
                        >{{old('description')}}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>
{{--File upload--}}
                    <div>
                        <x-input-label for="head_image_create" ><span class=" block mb-2">{{__('Обложка страницы боя: ')}}<span class="text-base font-normal text-gray-400">горизонтальное фото 1920px по длинной стороне</span></span>
                            <div class="preview-btn ml-2">{{__('Выберите файл')}}</div>
                        </x-input-label>
                        <input id="head_image_create" class="hidden" type="file" name="head_image"/>
                        <x-input-error :messages="$errors->get('head_image')" class="mt-2"/>
                        <div class="row review-span"><span id="output-head" class="preview h-150"></span></div>
                    </div>

                    <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                        <x-theme-button class="bg-themeRed">
                            {{ __('Сохранить') }}
                        </x-theme-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function handleHeadImageSelectSingle(evt) {
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
                    document.getElementById('output-head').innerHTML = "";
                    document.getElementById('output-head').insertBefore(span, null);
                };
            })(f);
            reader.readAsDataURL(f);
        }
        document.getElementById('head_image_create').addEventListener('change', handleHeadImageSelectSingle, false);
    </script>
@endsection
