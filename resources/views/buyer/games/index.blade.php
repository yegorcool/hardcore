@extends('layouts.page')
@section('title')
    {{ __('Турниры') }}
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">Турниры</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список боёв</h3>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                <th scope="col">Дата</th>
                <th scope="col" class="min-w-20">Боец 1</th>
                <th scope="col" class="min-w-20">Боец 2</th>
                <th scope="col">Место</th>
                <th scope="col">Город</th>
                <th scope="col">Описание</th>
                <th scope="col">Действие</th>
            </x-slot>

            @forelse($games as $game )
                <tr>
                    <td>{{$game->datetime->format('d.m.Y H:i')}}</td>
                    <td class="min-w-20">
                        <a href="{{ route('buyer.fighter', $game->member_one_id) }}"
                           class="hover:text-themeOrange">
                            {{$game->members[0]->name}}, {{$game->members[0]->city}}
                        </a>
                    </td>
                    <td class="min-w-20">
                        <a href="{{ route('buyer.fighter', $game->member_two_id) }}"
                           class="hover:text-themeOrange">
                            {{$game->members[1]->name}}, {{$game->members[1]->city}}
                        </a>
                    </td>
                    <td>{{$game->place}}</td>
                    <td>{{$game->city}}</td>
                    <td class="min-w-[300px] max-w-[500px]">{{mb_strimwidth($game->description,0, 30, "...")}}</td>
                    <td>
                        <a href="#" class="theme-btn mr-2">Подробнее</a>
                    </td>
                </tr>
            @empty
                <p>No users</p>
            @endforelse
        </x-list.table>

        <x-slot name="paginate_link">
            {{ $games->links() }}
        </x-slot>
    </x-list.section>
@endsection
