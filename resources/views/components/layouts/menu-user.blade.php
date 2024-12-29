<div>
    <p class="text-sm font-medium text-gray-600">Main menu</p>
    <div class="mt-2 space-y-2">
        <x-side-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            <x-icons.dashboard class="w-5 h-5" />
            Beranda
        </x-side-link>
        <x-side-link>
            <x-icons.program class="w-5 h-5" />
            Program
        </x-side-link>
        <x-side-link>
            <x-icons.investment class="w-5 h-5" />
            Investasi
        </x-side-link>
    </div>
    <p class="mt-6 text-sm font-medium text-gray-600">Lainnya</p>
    <div class="mt-2 space-y-2">
        <x-side-link>
            <x-icons.settings class="w-5 h-5" />
            Pengaturan Akun
        </x-side-link>
        <x-side-link>
            <x-icons.user class="w-5 h-5" />
            Profile
        </x-side-link>
    </div>
</div>

