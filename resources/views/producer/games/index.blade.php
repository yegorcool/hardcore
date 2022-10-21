@extends('layouts.page')
@section('title')
    {{ __('Турниры') }}
@endsection

@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.games.create') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Добавить бой') }}
        </a>
    </div>
@endsection
@section('content')
    <section class="px-3">
            <div class="w-full ">
                <div class="row justify-between">
                    <div class="col-lg-6">
                        <span class="site-title-tagline">Турниры</span>
                        <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список боёв</h3>
                    </div>
                    <div class="col-lg-6 text-right flex justify-end items-center">
                        <a href="{{ route('welcome') }}/#timetable"
                           class="block theme-btn bg-white/20 mx-2 text-sm ">
                            Просмотр Расписания боев для Гостей</a>
                    </div>
                </div>
                <div class="my-4 overflow-x-auto">
                    <table
                        class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[900px] ">
                        <thead class="table-group-divider border-top-color-themeRed">
                        <tr class="uppercase text-themeRed font-semibold">
                            <th scope="col">Id</th>
                            <th scope="col">Дата</th>
                            <th scope="col" class="min-w-20">Боец 1</th>
                            <th scope="col" class="min-w-20">Боец 2</th>
                            <th scope="col">Место</th>
                            <th scope="col">Город</th>
{{--                            <th scope="col">Описание</th>--}}
                            <th scope="col">Изменить</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @forelse($games as $game )
                            <tr>
                                <th scope="row"><a href="{{ route('guest.game', $game) }}"
                                                   class="hover:text-themeOrange">{{$game->id}}</a></th>
                                <td>{{$game->datetime->format('d.m.Y H:i')}}</td>
                                <td class="min-w-20"><a href="{{ route('guest.fighter', $game->member_one_id) }}"
                                                        class="hover:text-themeOrange">#{{$game->member_one_id}} </a>
                                    {{$game->members[0]->name}}, {{$game->members[0]->city}}
                                </td>
                                <td class="min-w-20"><a href="{{ route('guest.fighter', $game->member_two_id) }}"
                                                        class="hover:text-themeOrange">#{{$game->member_two_id}} </a>
                                    {{$game->members[1]->name}}, {{$game->members[1]->city}}</td>
                                <td>{{$game->place}}</td>
                                <td>{{$game->city}}</td>
{{--                                <td class="min-w-[300px] max-w-[500px]">{{$game->description}}</td>--}}
                                <td><a href="{{ route('producer.games.edit', $game) }}"
                                       class="theme-btn bg-white/50 mx-2 text-sm">Редактировать</a></td>
                                <td>
                                    <form action="{{ route('producer.games.destroy', $game) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="theme-btn mx-2 text-sm bg-themeRed">Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p class="text-white">Список боев пустой</p>
                        @endforelse
                        </tbody>
                        <tfoot class="bg-white/10"></tfoot>
                    </table>
                </div>
                {{--            <div class="bg-black text-themeOrange "> {{ $game->links() }}</div>--}}
            </div>
    </section>
@endsection
