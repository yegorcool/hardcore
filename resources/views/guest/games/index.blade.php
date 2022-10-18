@extends('layouts.page')
@section('title')
    {{ __('Турниры') }}
@endsection

@section('content')
    <section class="container-fluid  px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">Турниры</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список боёв</h3>
                </div>
            </div>
            <div class="my-4 overflow-x-auto">
                <table
                    class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[900px] ">
                    <thead class="table-group-divider border-top-color-themeRed">
                    <tr class="uppercase text-themeRed font-semibold">
                        <th scope="col">Дата</th>
                        <th scope="col" class="min-w-20">Боец 1</th>
                        <th scope="col" class="min-w-20">Боец 2</th>
                        <th scope="col">Место</th>
                        <th scope="col">Город</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @forelse($games as $game )
                        <tr>
                            <td>{{$game->datetime->format('d.m.Y H:i')}}</td>
                            <td class="min-w-20">
                                <a href="{{ route('guest.fighter', $game->member_one_id) }}"
                                   class="hover:text-themeOrange">
                                    {{$game->members[0]->name}}, {{$game->members[0]->city}}
                                </a>
                            </td>
                            <td class="min-w-20">
                                <a href="{{ route('guest.fighter', $game->member_two_id) }}"
                                   class="hover:text-themeOrange">
                                    {{$game->members[1]->name}}, {{$game->members[1]->city}}
                                </a>
                            </td>
                            <td>{{$game->place}}</td>
                            <td>{{$game->city}}</td>
                            <td class="min-w-[300px] max-w-[500px]">{{$game->description}}</td>
                            <td>
                                <a href="{{ route('guest.game', $game) }}" class="theme-btn">Подробнее</a>
                            </td>
                        </tr>
                    @empty
                        <p>No users</p>
                    @endforelse
                    </tbody>
                    <tfoot class="bg-white/10"></tfoot>
                </table>
            </div>
            {{--            <div class="bg-black text-themeOrange "> {{ $game->links() }}</div>--}}
        </div>
    </section>
@endsection
