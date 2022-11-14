@extends('layouts.page')
@section('title')
    {{ __('Платежи') }}
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">{{ __('Финансы') }}</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">{{ __('Список транзакций') }}</h3>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                <th scope="col">Дата-Время платежа</th>
                <th scope="col" class="min-w-20">Боец</th>
                <th scope="col">Тема</th>
                <th scope="col">Сумма,&nbsp;Руб.</th>
                <th scope="col">Статус</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Действие</th>
            </x-slot>

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
                    <td class="max-w-[250px]">{{mb_strimwidth($transaction->comment,0, 30, "...")}}</td>
                    <td>
                        <a href="{{ route('buyer.transaction', $transaction) }}" class="theme-btn mr-2">Подробнее</a>
                    </td>
                </tr>
            @empty
                <p>{{ __('Вы еще не сделали ни одного платежа...') }}</p>
            @endforelse
        </x-list.table>

        <x-slot name="paginate_link">
            {{ $transactions->links() }}
        </x-slot>
    </x-list.section>
@endsection
