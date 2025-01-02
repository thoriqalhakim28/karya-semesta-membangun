<div>
    <h1 class="text-2xl font-semibold leading-7">Program</h1>
    <p class="text-sm font-medium text-gray-600">
        Daftar program yang tersedia untuk anda.
    </p>
    <div class="mt-4 lg:mt-6">
        <div class="items-center gap-12 border-b lg:h-14 lg:flex">
            <div>
                <x-input wire:model="search" id="search" name="search" type="text" placeholder="Cari program" />
            </div>
            <div class="flex items-center gap-4 mt-4 border-b h-14 lg:border-none lg:mt-0">
                <button class="text-sm border-b border-black h-14">Terbaru</button>
                <button class="text-sm text-gray-600 h-14">Diikuti</button>
            </div>
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        <div class="grid gap-6 mt-4 lg:grid-cols-4 lg:mt-6">
            @forelse ($investments as $item)
                <a href="{{ route('user.program.show', $item->id) }}"
                    class="p-4 transition duration-300 ease-in-out border rounded-lg hover:shadow-md">
                    <h2 class="font-medium leading-7">{{ $item->name }}</h2>
                </a>
            @empty
            @endforelse
        </div>
    </div>
</div>

