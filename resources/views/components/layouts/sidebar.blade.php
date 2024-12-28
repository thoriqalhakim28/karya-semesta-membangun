<div class="sticky top-0 z-50 flex flex-col justify-between h-screen py-4 pl-4">
    <div class="space-y-6">
        <div class="flex items-center gap-2">
            <div class="w-12 h-12 rounded-lg bg-gradient-to-tr from-blue-200 to-blue-600"></div>
            <div class="flex flex-col">
                <p class="text-2xl font-semibold leading-5 font-myFont">Dashboard</p>
                <p class="text-xs font-medium text-gray-600">Karya Membangun Semesta</p>
            </div>
        </div>

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>

    <div class="flex items-center justify-between p-2 border rounded-lg h-14">
        <div class="flex items-center gap-2">
            <div
                class="inline-flex items-center justify-center w-10 h-10 font-semibold text-center rounded-lg font-myFont bg-accent text-accent-foreground">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <p class="text-sm font-medium leading-5">{{ Auth::user()->name }}</p>
        </div>
        <x-button variant="ghost">
            <x-icons.logout class="w-5 h-5 text-red-500" />
        </x-button>
    </div>
</div>

