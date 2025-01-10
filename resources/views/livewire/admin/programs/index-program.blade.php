<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold leading-7">Program</h1>
            <p class="text-sm font-medium text-gray-600">
                Daftar program yang tersedia di komunitas anda.
            </p>
        </div>
        <x-link variant="button" :href="route('admin.program.create')" class="mt-4 lg:mt-0">
            Tambah program
        </x-link>
    </div>
    <div class="p-4 mt-4 border rounded-lg lg:mt-6 lg:p-6">
        <div class="items-center justify-between lg:flex">
            <x-input wire:model.live.debounce.300ms="search" type="search" placeholder="Cari program..."
                class="lg:w-96" />
        </div>
        <div class="grid gap-6 mt-4 lg:grid-cols-3 lg:mt-6">
            @forelse ($programs as $item)
                <a wire:key="program-{{ $item->id }}"
                    class="p-4 transition duration-300 ease-in-out border rounded-lg hover:shadow-md"
                    href="{{ route('admin.program.show', $item->id) }}">
                    <h2 class="font-medium leading-7">{{ $item->name }}</h2>
                    <p class="text-sm text-gray-600">{{ $item->description }}</p>
                    <div class="mt-4 space-y-1">
                        <div class="inline-flex items-center justify-between w-full">
                            <p class="text-sm font-medium">Target/orang</p>
                            <p class="text-sm">{{ $item->target }}</p>
                        </div>
                        <div class="inline-flex items-center justify-between w-full">
                            <p class="text-sm font-medium">Terkumpul</p>
                            <p class="text-sm">{{ 'Rp' . number_format($item->totalTransactionAmount(), 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center">
                    <p class="text-sm font-medium text-gray-800">Tidak ada program</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

