@extends('layouts.guest-page')

@section('content')

    @include('pages.blocks.heading')
    @include('pages.blocks.fighter-about')
    <div class="max-w-7xl mx-auto">

        @include('pages.blocks.history')
        <div class="my-20">
            @include('pages.blocks.skills')
        </div>
    </div>

@endsection
