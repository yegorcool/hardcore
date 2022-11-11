@extends('layouts.page')
@section('title')
    {{ __('Бойцы') }}
@endsection
@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.fighters.create') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Добавить бойца') }}
        </a>
    </div>
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">Бойцы</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список бойцов</h3>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                <th scope="col">Id</th>
                <th scope="col" class="min-w-20">Имя</th>
                <th scope="col">Е-почта</th>
                <th scope="col">Город</th>
                <th scope="col">Рост, см</th>
                <th scope="col" class="min-w-20">Вес, кг</th>
                {{-- <th scope="col">Описание</th>--}}
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </x-slot>

            @forelse($fighters as $fighter )
                <tr>
                    <th scope="row">{{$fighter->id}}</th>
                    <td class="min-w-20"><a href="{{ route('guest.fighter', $fighter) }}"
                                            class="hover:text-themeOrange">{{$fighter->name}}</a></td>
                    <td><a href="{{ route('producer.fighters.show', $fighter) }}"
                           class="hover:text-themeOrange">{{$fighter->email}}</a></td>
                    <td>{{$fighter->city}}</td>
                    <td class="text-center min-w-20">{{$fighter->height}}</td>
                    <td class="text-center min-w-20">{{$fighter->weight}}</td>
                    {{-- <td class="min-w-[300px] max-w-[500px]">{{$fighter->description}}</td>--}}
                    <td><a href="{{ route('producer.fighters.edit', $fighter) }}"
                           class="theme-btn bg-white/50 mx-2 text-sm">Редактировать</a></td>
                    <td>
                        <form action="{{ route('producer.fighters.destroy', $fighter) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="theme-btn mx-2 text-sm bg-themeRed">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p>No users</p>
            @endforelse
        </x-list.table>

        <x-slot name="paginate_link">
            {{ $fighters->links() }}
        </x-slot>
    </x-list.section>
@endsection
