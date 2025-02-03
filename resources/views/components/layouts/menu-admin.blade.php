<div>
    <p class="text-sm font-medium text-gray-600">Menu</p>
    <div class="mt-2 space-y-2">
        <x-side-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate>
            <x-icons.dashboard class="w-5 h-5" />
            Beranda
        </x-side-link>
        <x-side-link :href="route('admin.user.index')" :active="request()->routeIs('admin.user.*')" wire:navigate>
            <x-icons.user-group class="w-5 h-5" />
            Pengguna
        </x-side-link>
        <x-side-link :href="route('admin.program.index')" :active="request()->routeIs('admin.program.*')" wire:navigate>
            <x-icons.program class="w-5 h-5" />
            Program
        </x-side-link>
        <x-side-link :href="route('admin.investment.index')" :active="request()->routeIs('admin.investment.*')" wire:navigate>
            <x-icons.investment class="w-5 h-5" />
            Investasi
        </x-side-link>
        <x-side-link :href="route('admin.transaction.index')" :active="request()->routeIs('admin.transaction.*')" wire:navigate>
            <x-icons.transaction class="w-5 h-5" />
            Transaksi
        </x-side-link>
        <x-side-link :href="route('admin.blog.index')" :active="request()->routeIs('admin.blog.*')" wire:navigate>
            <x-icons.blog class="w-5 h-5" />
            Blog
        </x-side-link>
    </div>
</div>

