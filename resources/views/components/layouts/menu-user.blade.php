<div>
    <p class="text-sm font-medium text-gray-600">Menu</p>
    <div class="mt-2 space-y-2">
        <x-side-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
            <x-icons.dashboard class="w-5 h-5" />
            Beranda
        </x-side-link>
        <x-side-link :href="route('user.program.index')" :active="request()->routeIs('user.program.*')">
            <x-icons.program class="w-5 h-5" />
            Program
        </x-side-link>
        <x-side-link :href="route('user.investment.index')" :active="request()->routeIs('user.investment.*')">
            <x-icons.investment class="w-5 h-5" />
            Investasi
        </x-side-link>
    </div>
    <p class="mt-6 text-sm font-medium text-gray-600">Lainnya</p>
    <div class="mt-2 space-y-2">
        <x-side-link :href="route('user.account-settings')" :active="request()->routeIs('user.account-settings')">
            <x-icons.settings class="w-5 h-5" />
            Pengaturan Akun
        </x-side-link>
        <x-side-link :href="route('user.profile')" :active="request()->routeIs('user.profile')">
            <x-icons.user class="w-5 h-5" />
            Profile
        </x-side-link>
    </div>
</div>

