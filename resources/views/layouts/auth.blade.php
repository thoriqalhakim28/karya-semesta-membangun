@extends('layouts.base')

@section('body')
    <div class="flex items-center h-screen">
        <div class="hidden h-screen p-8 lg:block lg:w-1/2">
            <div
                class="flex flex-col justify-between h-full gap-2 p-6 bg-gradient-to-r from-slate-900 to-slate-700 rounded-3xl">
                <a href="/" class="text-xl text-white font-display">
                    Karya Semesta Membangun
                </a>
                <div>
                    <p class="font-semibold text-white text-7xl font-display">
                        Get <br />
                        Everything <br />
                        You Want
                    </p>
                    <p class="text-white">
                        You can get everything you want if you work hard.
                        <br />
                        trust the process, and stick to the plan.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center w-full h-screen px-6 lg:w-1/2 lg:px-0">
            <div class="w-full lg:w-1/2">
                @yield('content')

                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>
        </div>
    </div>
@endsection

