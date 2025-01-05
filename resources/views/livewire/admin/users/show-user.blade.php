<div>
    <div class="items-center justify-between lg:flex">
        <div>
            <h1 class="text-2xl font-semibold leading-7">{{ $user->name }}</h1>
            <p class="text-sm font-medium text-gray-600">
                Anggota komunitas
            </p>
        </div>
        <x-button class="mt-4 lg:mt-0" variant="destructive" wire:click="delete({{ $user->id }})"
            x-on:click="confirm('Apakah anda yakin ingin menghapus pengguna ini?')">
            Hapus pengguna
        </x-button>
    </div>
    <div class="mt-4 lg:mt-6">
        <div class="grid gap-6 lg:grid-cols-3">
            <div>
                <x-includes.users.user-information :user="$user" />
            </div>
            <div class="space-y-6 lg:col-span-2">
                <x-includes.users.program :user="$user" />
                <x-includes.users.investment :user="$user" />
            </div>
        </div>
    </div>
</div>

