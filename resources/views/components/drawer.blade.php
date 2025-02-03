@props(['name', 'show' => false, 'position' => 'right', 'size' => 'md'])

@php
    $size = [
        'sm' => 'w-32',
        'md' => 'w-64',
        'lg' => 'lg:w-96 w-72',
    ][$size];
@endphp

<div x-data="{ show: @js($show) }" x-show="show"
    x-on:open-drawer.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-drawer.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:keydown.escape.window="show = false" class="fixed inset-0 z-50 overflow-hidden" style="display: none;">
    {{-- Overlay --}}
    <div x-show="show" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-25" @click="show = false">
    </div>

    {{-- Drawer --}}
    <div x-show="show"
        x-transition:enter="transform transition ease-in-out duration-300 {{ $position === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
        x-transition:enter-start="{{ $position === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-300 {{ $position === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="{{ $position === 'left' ? '-translate-x-full' : 'translate-x-full' }}"
        class="fixed inset-y-0 {{ $position === 'left' ? 'left-0' : 'right-0' }} flex flex-col {{ $size }} max-w-sm bg-white px-4">
        <div class="flex items-center justify-between h-16">
            <x-button variant="ghost" @click="show = false" class="{{ $position === 'left' ? 'mr-auto' : 'ml-auto' }}">
                <x-icons.cancel class="w-5 h-5" />
            </x-button>
        </div>

        {{ $slot }}
    </div>
</div>

