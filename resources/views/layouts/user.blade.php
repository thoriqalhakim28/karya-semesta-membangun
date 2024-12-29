@extends('layouts.base')

@section('body')
    <div class="flex min-h-screen">
        <div class="hidden bg-white w-[18%] lg:block">
            <x-layouts.sidebar>
                <x-layouts.menu-user />
            </x-layouts.sidebar>
        </div>
        <div class="w-full lg:w-[82%] lg:border rounded-xl lg:m-4">
            <x-layouts.navbar />

            <div class="p-4 lg:p-6">
                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>
        </div>
    </div>
@endsection

