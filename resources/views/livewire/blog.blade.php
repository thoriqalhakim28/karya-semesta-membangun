<div>
    <div class="flex justify-between h-12 border-b">
        <div class="flex items-center gap-4">
            <button class="h-12 text-sm border-b border-black">Latest</button>
            <button class="text-sm">Oldest</button>
        </div>
        <div>
            <x-input wire:model="search" type="text" placeholder="Cari blog" />
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        <div class="grid gap-6 lg:grid-cols-3">
            @forelse ($blogs as $item)
                <a href="" class="w-full">
                    <img src="{{ Storage::url($item->thumbnail) }}" alt="thumbnail" class="object-cover w-full h-48">
                    <h2 class="mt-2 text-xl font-semibold">{{ $item->title }}</h2>
                </a>
            @empty
                <div class="col-span-3 text-xl font-semibold text-center">Tidak ada blog</div>
            @endforelse
        </div>
    </div>
</div>

