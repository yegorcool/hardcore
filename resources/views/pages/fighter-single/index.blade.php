@extends('layouts.guest-page')

@section('content')

    @include('pages.fighter-single.blocks.heading')
    @include('pages.fighter-single.blocks.fighter-about')
    <div class="max-w-7xl mx-auto">

        @include('pages.fighter-single.blocks.history')
        <div class="my-20">
            @include('pages.fighter-single.blocks.skills')
        </div>
    </div>

@endsection
