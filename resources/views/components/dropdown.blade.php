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
        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
            type="button"
            class="relative inline-flex items-center justify-center gap-2 px-3 text-sm font-medium transition-colors border rounded-md whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 border-input bg-background hover:bg-accent hover:text-accent-foreground h-9">
            Filter data
        </button>

        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')" x-cloak
            class="absolute left-0 z-10 p-4 mt-2 origin-top-left bg-white border border-gray-300 rounded-lg shadow-sm outline-none min-w-48">
            {{ $slot }}
        </div>
    </div>
</div>

