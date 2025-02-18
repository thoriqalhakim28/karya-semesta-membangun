<div>
    <h1 class="text-2xl font-semibold leading-7">Jenis Investasi</h1>
    <p class="text-sm font-medium text-gray-600">
        Daftar jenis investasi yang tersedia untuk anda.
    </p>
    <div class="mt-4 lg:mt-6">
        <div class="items-center gap-12 border-b lg:h-14 lg:flex">
            <div>
                <x-input wire:model.live.debounce.300ms="search" type="search" placeholder="Cari investment..."
                    class="lg:w-96" />
            </div>
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        <div class="grid gap-6 mt-4 lg:grid-cols-4 lg:mt-6">
            @forelse ($investments as $item)
                <a href="{{ route('user.investment.show', $item->id) }}"
                    class="p-4 transition duration-300 ease-in-out border rounded-lg hover:shadow-md" wire:navigate>
                    <h2 class="font-medium leading-7">{{ $item->name }}</h2>
                </a>
            @empty
                <div class="col-span-4 text-center">
                    <p class="text-sm font-medium text-gray-800">Tidak ada investment</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

