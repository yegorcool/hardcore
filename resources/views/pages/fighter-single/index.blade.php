@extends('layouts.guest-page')

@section('content')
    {{--Header photo title--}}
    @include('pages.fighter-single.blocks.heading')
    {{--About photo--}}
    @include('pages.fighter-single.blocks.fighter-about')

    {{--History--}}
    @include('pages.fighter-single.blocks.history')
    <div class="my-20">
        {{--Skills--}}
        @include('pages.fighter-single.blocks.skills')
    </div>

@endsection
