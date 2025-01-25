@props(['align' => 'right', 'size' => 'md'])

@php
    $align = [
        'right' => 'origin-top-right left-0',
        'left' => 'origin-top-left right-0',
    ][$align];
    $size = [
        'sm' => 'min-w-32',
        'md' => 'min-w-48',
        'lg' => 'min-w-64',
    ][$size];
@endphp

<div class="flex justify-center">
    <div x-data="{
        open: false,
        toggle() {
            if (this.open) {
                return this.close()
            }

            this.$refs.button.focus()

            this.open = true
        },
        close(focusAfter) {
            if (!this.open) return

            this.open = false

            focusAfter && focusAfter.focus()
        }
    }" x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']" class="relative">
        <div x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')">
            {{ $trigger }}
        </div>
        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')" x-cloak
            class="absolute {{ $align }} {{ $size }} z-10 p-4 mt-2 bg-white border border-gray-300 rounded-lg shadow-sm outline-none">
            {{ $content }}
        </div>
    </div>
</div>

