@extends('layouts.page')
@section('title')
    {{ __('Бойцы') }}
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">Бойцы</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список бойцов</h3>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                <th scope="col" class="min-w-20">Имя</th>
                <th scope="col">Город</th>
                <th scope="col">Рост, см</th>
                <th scope="col" class="min-w-20">Вес, кг</th>
                <th scope="col">Описание</th>
                <th scope="col">Открыть</th>
            </x-slot>

            @forelse($fighters as $fighter )
                <tr>
                    <td class="min-w-20"><a href="{{ route('buyer.fighter', $fighter) }}"
                                            class="font-bold text-gray-50 hover:text-themeOrange">{{$fighter->name}}</a>
                    </td>
                    <td>{{$fighter->city}}</td>
                    <td class="text-center min-w-20">{{$fighter->height}}</td>
                    <td class="text-center min-w-20">{{$fighter->weight}}</td>
                    <td class="min-w-[300px] max-w-[500px]">{{mb_strimwidth($fighter->description,0, 40, "...")}}</td>
                    <td><a href="{{ route('buyer.fighter', $fighter) }}"
                           class="theme-btn bg-white/50 mx-2 text-sm">Профиль</a></td>
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
