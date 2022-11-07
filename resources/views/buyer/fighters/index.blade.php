@extends('layouts.page')
@section('title')
    {{ __('Бойцы') }}
@endsection
{{--@section('titlebutton')--}}
{{--    <div class="theme-btn  ">--}}
{{--        <a class="text-white hover:text-gray-100" href="{{ route('buyer.fighters')  }}" class="">--}}
{{--            <i class="far fa-arrow-left mr-2"></i>--}}
{{--            {{ __(' Вернуться к списку') }}--}}
{{--        </a>--}}
{{--    </div>--}}
{{--@endsection--}}
@section('content')
    <section class="container-fluid  px-lg-5 mx-auto sm:px-6 lg:px-8">
        <div class="w-full ">
            <div class="row">
                <div class="col-lg-6">
                    <span class="site-title-tagline">Бойцы</span>
                    <h3 class=" text-gray-100 text-2xl font-bold leading-tight">Список бойцов</h3>
                </div>
            </div>
            <div class="my-4 overflow-x-auto">
                <table
                    class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[900px] ">
                    <thead class="table-group-divider border-top-color-themeRed">
                    <tr class="uppercase text-themeRed font-semibold">
                        <th scope="col" class="min-w-20">Имя</th>
                        <th scope="col">Город</th>
                        <th scope="col">Рост, см</th>
                        <th scope="col" class="min-w-20">Вес, кг</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Открыть</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @forelse($fighters as $fighter )
                        <tr>
                            <td class="min-w-20"><a href="{{ route('buyer.fighter', $fighter) }}" class="font-bold text-gray-50 hover:text-themeOrange">{{$fighter->name}}</a></td>
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
                    </tbody>
                    <tfoot class="bg-white/10"></tfoot>
                </table>
            </div>
            <div class="bg-black text-themeOrange "> {{ $fighters->links() }}</div>
        </div>
    </section>
@endsection
