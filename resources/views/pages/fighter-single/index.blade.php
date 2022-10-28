@extends('layouts.guest-page')

@section('content')
    {{--Header photo title--}}
    @include('pages.fighter-single.blocks.heading')
    {{--About photo--}}
    @include('pages.fighter-single.blocks.fighter-about')

    {{--History--}}
    @include('pages.fighter-single.blocks.history')
    @include('pages.fighter-single.blocks.counter')
    {{--    <div class="my-20">--}}
{{--            @include('pages.fighter-single.blocks.skills')--}}
    {{--    </div>--}}
    @include('pages.fighter-single.blocks.gallery')
@endsection
