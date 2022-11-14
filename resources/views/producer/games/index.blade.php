@extends('layouts.page')
@section('title')
    {{ __('Турниры') }}
@endsection

@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.games.create') }}" class=""><i
                class="fa fa-plus"></i>
            {{ __(' Добавить бой') }}
        </a>
    </div>
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">Турниры</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список боёв</h3>
        </x-slot>

        <x-slot name="help_button">
            <a href="{{ route('welcome') }}/#timetable"
               class="inline-block theme-btn bg-white/20 text-sm ">
                Просмотр Расписания боев для Гостей</a>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                {{--заголовки колонок--}}
                <th scope="col">Id</th>
                <th scope="col">Дата</th>
                <th scope="col" class="min-w-20">Боец 1</th>
                <th scope="col" class="min-w-20">Боец 2</th>
                <th scope="col">Место</th>
                <th scope="col">Город</th>
                {{-- <th scope="col">Описание</th>--}}
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </x-slot>

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
                    {{-- <td class="min-w-[300px] max-w-[500px]">{{$game->description}}</td>--}}
                    <td><a href="{{ route('producer.games.edit', $game) }}"
                           class="theme-btn bg-white/50 text-sm">Редактировать</a></td>
                    <td>
                        <form action="{{ route('producer.games.destroy', $game) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="theme-btn ml-2 text-sm bg-themeRed">Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <p class="text-white">Список боев пустой</p>
            @endforelse
        </x-list.table>

        <x-slot name="paginate_link">
            {{ $games->links() }}
        </x-slot>
    </x-list.section>
@endsection
