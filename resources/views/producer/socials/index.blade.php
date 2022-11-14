@extends('layouts.page')
@section('title')
    {{ __('Социальные сети') }}
@endsection
@section('titlebutton')
    <div class="theme-btn ">
        <a class="text-white hover:text-gray-100" href="{{ route('producer.socials.create') }}" class=""><i
                class="fa fa-plus mr-2"></i>
            {{ __(' Добавить социальную сеть') }}
        </a>
    </div>
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">{{ __('Общение') }}</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">{{ __('Социальные сети') }}</h3>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                <th scope="col">Id</th>
                <th scope="col" class="min-w-20">Название</th>
                <th scope="col" class="min-w-20">Иконка</th>
                <th scope="col">Комментарий</th>
                {{-- <th scope="col">Изменить</th>--}}
                <th scope="col">Удалить</th>
            </x-slot>

            @forelse($socials as $item )
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td class="min-w-20">{{$item->title}}</td>
                    <td class="min-w-20"><span><i class="fab fa-{{$item->lang_key}}"></i></span></td>
                    <td>{{$item->comment}}</td>
                    {{--<td><a href="{{ route('producer.socials.edit', $item) }}"--}}
                    {{--    class="theme-btn bg-white/50 mx-2 text-sm py-2">Редактировать</a></td>--}}
                    <td>
                        <form action="{{ route('producer.socials.destroy', $item) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="theme-btn mx-2 text-sm bg-themeRed py-2">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p class="text-gray-500 text-xl mb-2 pl-3">Ни одной социальной сети еще не добавлено...</p>
            @endforelse
        </x-list.table>

    </x-list.section>
@endsection
