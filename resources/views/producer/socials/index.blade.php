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
    <section class="px-3">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">{{ __('Общение') }}</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">{{ __('Социальные сети') }}</h3>
                </div>
            </div>
            <div class="my-4 overflow-x-auto">
                <table
                    class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[600px] ">
                    <thead class="table-group-divider border-top-color-themeRed">
                    <tr class="uppercase text-themeRed font-semibold">
                        <th scope="col">Id</th>
                        <th scope="col" class="min-w-20">Название</th>
                        <th scope="col" class="min-w-20">Иконка</th>
                        <th scope="col">Комментарий</th>
{{--                        <th scope="col">Изменить</th>--}}
                        <th scope="col">Удалить</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @forelse($socials as $item )
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td class="min-w-20">{{$item->title}}</td>
                            <td class="min-w-20"><span><i class="fab fa-{{$item->lang_key}}"></i></span></td>
                            <td >{{$item->comment}}</td>
{{--                            <td><a href="{{ route('producer.socials.edit', $item) }}"--}}
{{--                                   class="theme-btn bg-white/50 mx-2 text-sm py-2">Редактировать</a></td>--}}
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
                    </tbody>
                    <tfoot class="bg-white/10"></tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
