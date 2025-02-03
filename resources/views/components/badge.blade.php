@props([])

<div {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium capitalize']) }}>
    {{ $slot }}
</div>
