@extends('layouts.page')
@section('title')
    {{ __('Пользователи') }}
@endsection
@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('support.users.create') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Добавить пользователя') }}
        </a>
    </div>
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">Участники</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список пользователей</h3>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                <th scope="col">Id</th>
                <th scope="col">Роль</th>
                <th scope="col" class="min-w-20">Имя</th>
                <th scope="col">Е-почта</th>
                <th scope="col">Город</th>
                {{-- <th scope="col">Описание</th>--}}
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </x-slot>

            @forelse($users as $user )
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <th scope="row">{{$user->role}}</th>
                    <td class="min-w-20">{{$user->name}}</td>
                    <td><a href="{{ route('support.users.show', $user) }}"
                           class="hover:text-themeOrange">{{$user->email}}</a></td>
                    <td>{{$user->city}}</td>
                    {{-- <td class="min-w-[300px] max-w-[500px]">{{$fighter->description}}</td>--}}
                    <td><a href="{{ route('support.users.edit', $user) }}"
                           class="theme-btn bg-white/50 mx-2 text-sm">Редактировать</a></td>
                    <td>
                        <form action="{{ route('support.users.destroy', $user) }}" method="post">
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
            {{ $users->links() }}
        </x-slot>
    </x-list.section>
@endsection
