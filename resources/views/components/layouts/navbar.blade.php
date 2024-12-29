<div class="flex items-center h-16 border-b">
    <div class="flex items-center justify-between w-full px-4 lg:px-6">
        <div class="space-y-1">
            <p class="font-semibold leading-5">Hi, {{ Auth::user()->name }}!</p>
            <p class="text-sm font-medium text-gray-600">
                {{ Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
            </p>
        </div>
        <div class="lg:hidden">
            <x-button variant="ghost" x-data="" x-on:click="$dispatch('open-drawer', 'menu-mobile')">
                <x-icons.menu class="w-5 h-5" />
            </x-button>

            {{-- Menu mobile --}}
            <x-drawer name="menu-mobile" position="left" size="lg">
                @if (Auth::user()->hasRole('admin'))
                    <x-layouts.menu-admin />
                @else
                    <x-layouts.menu-user />
                @endif

                <div class="mt-2">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="relative w-full inline-flex items-center gap-2 text-sm leading-5 rounded-lg border border-transparent px-4 py-1.5 transition-all duration-300 ease-in-out hover:border-red-600 hover:bg-red-100/50 before:content-[''] before:bg-red-600 before:absolute before:h-3/4 before:w-1 before:-left-4 before:opacity-0 before:hover:opacity-100 before:rounded-r-md">
                        <x-icons.logout class="w-5 h-5 text-red-500" />
                        <span class="text-red-500">Keluar</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </x-drawer>
        </div>
    </div>
</div>

