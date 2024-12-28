@extends('layouts.base')

@section('body')
    <div class="flex min-h-screen">
        <div class="hidden bg-white w-[18%] lg:block">
            <x-layouts.sidebar>
                <x-layouts.menu-admin />
            </x-layouts.sidebar>
        </div>
        <div class="w-full lg:w-[82%] lg:border rounded-xl my-4 mx-4 lg:p-4">
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
@endsection

