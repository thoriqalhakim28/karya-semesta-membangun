<div>
    <div class="items-center justify-between lg:flex">
        <div>
            <h1 class="text-2xl font-semibold leading-7">{{ $user->name }}</h1>
            <p class="text-sm font-medium text-gray-600">
                Anggota komunitas
            </p>
        </div>
        <x-button variant="destructive" x-on:click="confirm('Apakah anda yakin ingin menghapus pengguna ini?')">
            Hapus pengguna
        </x-button>
    </div>
</div>

