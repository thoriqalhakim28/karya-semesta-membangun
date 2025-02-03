@props(['orientation' => 'horizontal'])

@php
    $orientation = [
        'horizontal' => 'h-[1px] w-full',
        'vertical' => 'h-full w-[1px]',
    ][$orientation];
@endphp

<div {{ $attributes->merge(['class' => 'shrink-0 bg-border ' . $orientation]) }}></div>

