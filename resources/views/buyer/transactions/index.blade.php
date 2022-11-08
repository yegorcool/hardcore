@extends('layouts.page')
@section('title')
    {{ __('Платежи') }}
@endsection

@section('content')
    <section class="container-fluid  px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">{{ __('Финансы') }}</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">{{ __('Список транзакций') }}</h3>
                </div>
            </div>
            <div class="my-4 overflow-x-auto">
                <table
                    class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[900px] ">
                    <thead class="table-group-divider border-top-color-themeRed">
                    <tr class="uppercase text-themeRed font-semibold">
                        <th scope="col">Дата-Время платежа</th>
                        <th scope="col" class="min-w-20">Боец</th>
                        <th scope="col">Тема</th>
                        <th scope="col">Сумма,&nbsp;Руб.</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Комментарий</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @forelse($transactions as $transaction )

                        <tr>
                            <td>{{$transaction->datetime->format('d.m.Y H:i')}}</td>
                            <td class="min-w-20">
                                <a href="{{ route('buyer.fighter', $transaction->fighter_id) }}"
                                   class="hover:text-themeOrange">
                                    {{$transaction->recipient->name}},
                                    {{$transaction->recipient->city}}
                                </a>
                            </td>
                            <td>{{$transaction->topic}}</td>
                            <td>{{$transaction->amount}}</td>
                            <td>{{$transaction->status}}</td>
                            <td class="max-w-[300px]">{{mb_strimwidth($transaction->comment,0, 30, "...")}}</td>
                            <td>
                                <a href="{{ route('buyer.transaction', $transaction) }}" class="theme-btn">Подробнее</a>
                            </td>
                        </tr>
                    @empty
                        <p>{{ __('Вы еще не сделали ни одного платежа...') }}</p>
                    @endforelse
                    </tbody>
                    <tfoot class="bg-white/10"></tfoot>
                </table>
            </div>
            {{--            <div class="bg-black text-themeOrange "> {{ $transaction->links() }}</div>--}}
        </div>
    </section>
@endsection
