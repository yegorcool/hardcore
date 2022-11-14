@extends('layouts.page')
@section('title')
    {{ __('Информация о платеже') }}
@endsection

@section('titlebutton')
    <div class="theme-btn mt-3 md:mt-0">
        <a class="text-white hover:text-gray-100" href="{{ route('buyer.transactions')  }}" class=""><i
                class="fa fa-arrow-left mr-2"></i>
            {{ __(' Вернуться к списку ') }}
        </a>
    </div>
@endsection

@section('content')
    <x-form.section>
        <form method="POST" action="{{ route('buyer.transactions.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="topic" value="{{ $topic }}">
            <input type="hidden" name="fighter_id" value="{{ $recipient->id }}">
            <input type="hidden" name="buyer_id" value="{{ $buyer->id }}">
            {{--                @todo сделать список статусов и механизм установки--}}
            <input type="hidden" name="status" value="оплачен">
            <div class="py-4">
                <div class="row border-b-2 mb-4">
                    <div class="col-8 col-lg-6">
                        <span class="site-title-tagline">{{ __('Транзакция') }}</span>
                        <h3 class=" text-black text-2xl font-bold leading-tight">{{ __('Сделать платеж') }}</h3>
                    </div>
                </div>
                {{--Имя получателя--}}
                <div class="border-b py-1 mb-2">
                    <label class="md:w-2/5 inline-block font-medium w-1/3 text-lg text-gray-100 mb-2" for="name">
                        @if($topic == 'Победа')
                            {{__('Поздравить с победой  ')}}
                        @elseif($topic == 'День рождения')
                            {{__('Поздравить с Днем рождения  ')}}
                        @else
                            {{__('Поддержить бойца  ')}}
                        @endif</label>
                    <h4 class="text-gray-400 text-2xl inline-block">{{ $recipient->name }}</h4>
                </div>
                <div class="mt-2 w-full flex items-center ">
                    <div class="font-medium w-1/3 text-lg text-gray-100 mb-2">
                        {{ __('Выбрать сумму ') }}
                    </div>
                    <div class=" w-2/3 flex  items-center">
                        <div class="m-4">
                            <input id="amount-5000"
                                   class="peer input-sum hidden"
                                   name="amount"
                                   type="radio"
                                   value="5000"
                                   checked/>
                            <label for="amount-5000" class="theme-btn label-sum">
                                5000 ₽
                            </label>

                        </div>
                        <div class="m-4">
                            <input id="amount-1000"
                                   class="input-sum hidden"
                                   name="amount"
                                   type="radio"
                                   value="1000"/>
                            <label for="amount-1000"
                                   class="theme-btn label-sum">
                                1000 ₽
                            </label>
                        </div>
                    </div>
                    <x-form.input-error :messages="$errors->get('amount')" class="mt-2"/>
                </div>
                <!-- comment -->
                <div class="lg:w-2/3 mt-2">
                    <x-form.input-label for="comment" :value="__('Ваше пожелание бойцу ')"/>
                    <x-form.text-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                                       :value="old('comment')" placeholder="Новых побед и наград!"/>
                    <x-form.input-error :messages="$errors->get('comment')" class="mt-2"/>
                </div>
            </div>
            <div class="w-auto  md:ml-0 md:w-1/3 lg:x-1/4 lg:text-left">
                <x-theme-button class="bg-themeRed">
                    {{ __('Оплатить') }}
                </x-theme-button>
            </div>
        </form>
    </x-form.section>
@endsection
