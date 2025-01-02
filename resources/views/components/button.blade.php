@props(['variant' => 'default', 'size' => 'sm'])

@php
    $variant = [
        'default' => 'bg-primary text-primary-foreground hover:bg-primary/90',
        'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80',
        'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
    ][$variant];

    $size = [
        'default' => 'h-10 py-2 px-4',
        'sm' => 'h-9 rounded-md px-3',
        'lg' => 'h-11 rounded-md px-8',
    ][$size];
@endphp

<button
    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center gap-2 justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 ' .
            $variant .
            ' ' .
            $size,
        'type' => 'submit',
    ]) }}>
    {{ $slot }}
</button>

