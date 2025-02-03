@extends('layouts.base')

@section('body')
    <div class="relative">
        <x-layouts.navigation />

        <div class="max-w-5xl mx-auto mt-0 lg:mt-28">
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection

