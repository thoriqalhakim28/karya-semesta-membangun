<div>
    <p class="text-sm font-medium text-gray-600">Menu</p>
    <div class="mt-2 space-y-2">
        <x-side-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            <x-icons.dashboard class="w-5 h-5" />
            Beranda
        </x-side-link>
        <x-side-link>
            <x-icons.user-group class="w-5 h-5" />
            Pengguna
        </x-side-link>
        <x-side-link>
            <x-icons.program class="w-5 h-5" />
            Program
        </x-side-link>
        <x-side-link>
            <x-icons.investment class="w-5 h-5" />
            Investasi
        </x-side-link>
        <x-side-link>
            <x-icons.transaction class="w-5 h-5" />
            Transaksi
        </x-side-link>
        <x-side-link>
            <x-icons.blog class="w-5 h-5" />
            Blog
        </x-side-link>
    </div>
</div>

