@extends('layouts.base')

@section('body')
    <div class="max-w-5xl mx-auto">
        <x-layouts.navigation />

        <div class="mt-4 lg:mt-6">
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection

