@props(['variant' => 'default'])

@php
    $variant = [
        'default' => '',
        'button' =>
            'inline-flex items-center gap-2 justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3',
        'ghost' =>
            'inline-flex items-center gap-2 justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 rounded-md px-3 hover:bg-accent hover:text-accent-foreground',
    ][$variant];
@endphp

<a {{ $attributes->merge(['class' => ' ' . $variant]) }} wire:navigate>
    {{ $slot }}
</a>

    