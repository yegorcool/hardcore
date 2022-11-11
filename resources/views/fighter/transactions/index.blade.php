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
                <th scope="col" class="min-w-20">Фанат</th>
                <th scope="col">Тема</th>
                <th scope="col">Сумма,&nbsp;Руб.</th>
                <th scope="col">Статус</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Открыть</th>
            </x-slot>

            @forelse($transactions as $transaction )
                <tr>
                    <td>{{$transaction->datetime->format('d.m.Y H:i')}}</td>
                    <td class="min-w-20">
                        {{$transaction->buyer->name}}
                    </td>
                    <td>{{$transaction->topic}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td>{{$transaction->status}}</td>
                    <td class="max-w-[300px]">{{mb_strimwidth($transaction->comment,0, 30, "...")}}</td>
                    <td>
                        <a href="{{ route('fighter.transaction', $transaction) }}" class="theme-btn">Подробнее</a>
                    </td>
                </tr>
            @empty
                <p>{{ __('Вы еще не получили ни одного платежа...') }}</p>
            @endforelse
        </x-list.table>

        <x-slot name="paginate_link">
            {{ $transactions->links() }}
        </x-slot>
    </x-list.section>
@endsection
