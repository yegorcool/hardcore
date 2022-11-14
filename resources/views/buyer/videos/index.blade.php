@extends('layouts.page')
@section('title')
    {{ __('Видео') }}
@endsection

@section('content')
    <x-list.section>
        <x-slot name="site_title">
            <span class="site-title-tagline">Медиа</span>
            <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список видеозаписей</h3>
        </x-slot>

        <x-list.table>
            <x-slot name="th_content">
                <th scope="col">Дата записи</th>
                <th scope="col" class="min-w-20">Заголовок</th>
                <th scope="col">Адресат</th>
                <th scope="col">Статус</th>
                <th scope="col">Комментарий</th>
                <th scope="col">Открыть</th>
            </x-slot>

            @forelse($videos as $video )
                <tr>
                    <td>{{$video->created_at->format('d.m.Y')}}</td>
                    <td>
                        <a href="{{ route('buyer.videos.show', $video) }}"
                           class="hover:text-themeOrange">
                            {{$video->title}}
                        </a>
                    </td>

                    <td class="min-w-20">
                        <a href="{{ route('buyer.fighter', $video->fighter_id) }}"
                           class="hover:text-themeOrange">
                            {{$video->videoRecipient->name}},
                            {{$video->videoRecipient->city}}
                        </a>
                    </td>
                    <td>{{$video->status}}</td>
                    <td class="max-w-[300px]">{{mb_strimwidth($video->comment,0, 30, "...")}}</td>
                    <td><a href="{{ route('buyer.videos.show', $video) }}"
                           class="theme-btn bg-white/50 mx-2 text-sm">Подробнее</a></td>
                </tr>
            @empty
                <p>Вы еще на загрузили ни одного видео</p>
            @endforelse
        </x-list.table>

        <x-slot name="paginate_link">
            {{ $videos->links() }}
        </x-slot>
    </x-list.section>
@endsection
