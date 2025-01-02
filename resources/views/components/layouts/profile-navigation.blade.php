<div>
    <div class="flex items-center w-full gap-4 lg:space-y-2 lg:mt-2 lg:block">
        <x-side-link variant="secondary" :href="route('user.profile')" :active="request()->routeIs('user.profile')">
            <x-icons.user class="w-5 h-5" />
            Profile
        </x-side-link>
        <x-side-link variant="secondary" :href="route('user.account-settings')" :active="request()->routeIs('user.account-settings')">
            <x-icons.settings class="w-5 h-5" />
            Pengaturan Akun
        </x-side-link>
    </div>
</div>

