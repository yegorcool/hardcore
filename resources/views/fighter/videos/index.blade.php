@extends('layouts.page')
@section('title')
    {{ __('Видео') }}
@endsection

@section('content')
    <section class="container-fluid  px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">Медиа</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список видеозаписей</h3>
                </div>
            </div>
            <div class="my-4 overflow-x-auto">
                <table
                    class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[900px] ">
                    <thead class="table-group-divider border-top-color-themeRed">
                    <tr class="uppercase text-themeRed font-semibold">
                        <th scope="col">Дата записи</th>
                        <th scope="col" class="min-w-20">Заголовок</th>
                        <th scope="col">Отправитель</th>
                        <th scope="col">Комментарий</th>
                        <th scope="col">Открыть</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @forelse($videos as $video )
                        <tr>
                            <td>{{$video->created_at->format('d.m.Y')}}</td>
                            <td>
                                <a href="{{ route('fighter.video', $video) }}"
                                   class="hover:text-themeOrange">
                                    {{$video->title}}
                                </a>
                            </td>

                            <td class="min-w-20">
                                    {{$video->videoMaker->name}}
                            </td>
                            <td class="max-w-[300px]">{{mb_strimwidth($video->comment,0, 30, "...")}}</td>
                            <td><a href="{{ route('fighter.video', $video) }}"
                                   class="theme-btn bg-white/50 mx-2 text-sm">Подробнее</a></td>
                        </tr>
                    @empty
                        <p>Вы еще на загрузили ни одного видео</p>
                    @endforelse
                    </tbody>
                    <tfoot class="bg-white/10"></tfoot>
                </table>
            </div>
            <div class="bg-black text-themeOrange "> {{ $videos->links() }}</div>
        </div>
    </section>
@endsection
