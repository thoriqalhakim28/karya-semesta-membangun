@extends('layouts.base')

@section('body')
    <div class="relative h-screen hero">
        <x-layouts.navigation />
        <div class="relative z-10 max-w-5xl mx-auto">
            <div class="flex flex-col items-center justify-center min-h-screen space-y-6">
                <p
                    class="text-6xl font-bold transition duration-500 ease-in-out transform text-gradient font-display hover:scale-105">
                    Stronger Together, <br>
                    Brighter Tomorrow!
                </p>
                <p class="text-[27px] font-semibold text-gray-600/80 backdrop-blur-sm px-4 py-2 rounded-lg">
                    Karya Semesta Membangun
                </p>
                <a href="">
                    <x-button size="lg"
                        class="transition-all duration-300 transform bg-blue-600 hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/25 hover:scale-105">
                        Get Started
                    </x-button>
                </a>
                <p class="px-3 py-1 mt-4 text-sm text-gray-600 rounded backdrop-blur-sm">
                    Join us and be part of a community that makes a difference!
                </p>
            </div>
        </div>
    </div>
@endsection
