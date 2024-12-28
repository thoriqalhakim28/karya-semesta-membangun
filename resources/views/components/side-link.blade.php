@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'relative w-full inline-flex items-center gap-2 text-sm leading-5 rounded-lg border px-4 py-1.5 transition-all duration-300 ease-in-out border-gray-300 before:content-[""] before:bg-blue-600 before:absolute before:h-3/4 before:w-1 before:-left-4 before:hover:opacity-100 before:rounded-r-md'
            : 'relative w-full inline-flex items-center gap-2 text-sm leading-5 rounded-lg border border-transparent px-4 py-1.5 transition-all duration-300 ease-in-out hover:border-gray-300 before:content-[""] before:bg-blue-600 before:absolute before:h-3/4 before:w-1 before:-left-4 before:opacity-0 before:hover:opacity-100 before:rounded-r-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

