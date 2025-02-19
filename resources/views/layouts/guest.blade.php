@extends('layouts.base')

@section('body')
    <div class="relative">
        <x-layouts.navigation />

        <div class="max-w-5xl px-4 mx-auto mt-28 lg:px-0">
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection

