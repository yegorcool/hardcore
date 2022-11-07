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
    <section class="container-fluid  bg-gray-300 px-lg-2 mx-auto sm:px-6 lg:px-8 row">
        <div class="col-lg-9">
            <div class="p-4">
                <div class="row border-b-2 mb-4">
                    <div class="col-8 col-lg-6">
                        <span class="site-title-tagline">{{ __('Транзакция') }}</span>
                        <h3 class=" text-black text-2xl font-bold leading-tight">{{ __('Основные данные платежа') }}</h3>
                    </div>
                </div>
                {{--Имя получателя--}}
                <div class="border-b py-1 mb-2">
                    <x-input-label class="w-1/5 inline-block" for="name" :value="__('Кому: ')"/>
                    <span class="text-gray-900 text-xl ">{{ $transaction->recipient->name }}</span>
                </div>
                <!-- Дата платежа -->
                <div class="border-b  py-1 mb-2">
                    <x-input-label class="w-1/5 inline-block" :value="__('Дата платежа: ')"/>
                    <span class="text-gray-900 text-xl ">{{$transaction->datetime->format('d.m.Y H:i')}}</span>
                </div>
                <div class="border-b lg:flex  py-1 mb-2">
                    <!-- amount -->
                    <div class=" w-full lg:w-1/2 mr-10">
                        <x-input-label class="w-2/5 inline-block" for="city" :value="__('Сумма: ')"/>
                        <span class="text-gray-900 text-xl ">{{ $transaction->amount }} руб.</span>
                    </div>
                    <!-- status -->
                    <div class=" w-full lg:w-1/2">
                        <x-input-label class="w-2/5 inline-block" for="role" :value="__('Статус: ')"/>
                        <span class="text-gray-900 text-xl ">{{$transaction->status}}</span>
                    </div>
                </div>
                <div class="border-b  py-1 lg:flex mb-2">
                    <!-- topic -->
                    <div class="  w-full lg:w-1/2 mr-10">
                        <x-input-label class="w-2/5 inline-block" :value="__('Назначение: ')"/>
                        <span class="text-gray-900 text-xl ">{{ $transaction->topic }}</span>
                    </div>

                </div>
                <!-- description -->
                <div class="border-b  py-1 mb-4">
                    <x-input-label class="w-1/5 inline-block" :value="__('Комментарий: ')"/>
                    <p class="block mt-1 w-full text-gray-900 text-xl ">{{$transaction->comment}}</p>
                </div>
            </div>
        </div>
     </section>
@endsection
