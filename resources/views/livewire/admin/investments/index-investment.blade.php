<div>
    <div class="items-center justify-between lg:flex">
        <div>
            <h1 class="text-2xl font-semibold leading-7">Jenis Investasi</h1>
            <p class="text-sm font-medium text-gray-600">
                Daftar jenis investasi yang tersedia di komunitas anda.
            </p>
        </div>
        <x-button class="mt-4 lg:mt-0" x-data="" x-on:click="$dispatch('open-modal', 'create-investment')">
            Tambah jenis investasi
        </x-button>
        <x-modal name="create-investment" focusable>
            <h1 class="text-2xl font-semibold">Tambah Jenis Investasi</h1>
            <p class="text-sm font-medium text-gray-600">Masukan informasi jenis investasi baru.</p>
            <div class="mt-4 lg:mt-6">
                <form wire:submit.prevent="submit">
                    <div>
                        <x-label for="name" value="Nama jenis investasi" />
                        <x-input wire:model.blur="form.name" id="name" name="name" type="text" required
                            autofocus />
                        @error('form.name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-4">
                        <x-button class="w-full">
                            Simpan
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>
    </div>
    <div class="p-4 mt-4 border rounded-lg lg:mt-6 lg:p-6">
        <div class="items-center justify-between lg:flex">
            <x-input wire:model.live.debounce.300ms="search" type="search" placeholder="Cari jenis investasi..."
                class="lg:w-96" />
        </div>
        <div class="grid gap-6 mt-4 lg:grid-cols-3 lg:mt-6">
            @forelse ($investments as $item)
                <a wire:key="investment-{{ $item->id }}"
                    class="p-4 transition duration-300 ease-in-out border rounded-lg hover:shadow-md"
                    href="{{ route('admin.investment.show', $item->id) }}">
                    <h2 class="font-medium leading-7">{{ $item->name }}</h2>
                </a>
            @empty
                <div class="col-span-3 text-center">
                    <p class="text-sm font-medium text-gray-800">Tidak ada jenis investasi</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

