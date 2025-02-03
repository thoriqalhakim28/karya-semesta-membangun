<div class="max-w-3xl p-4 mx-auto lg:p-0">
    <div class="justify-between border-b lg:h-12 lg:flex">
        <div class="w-full lg:w-1/2">
            <x-input wire:model.live.debounce.300ms="search" type="text"
                placeholder="Cari informasi, artikel, atau berita..." />
        </div>
        <div class="flex items-center gap-4">
            <button wire:click="setFilter('all')"
                class="h-12 text-sm {{ $filter === 'all' ? 'border-b border-black' : 'text-gray-600' }}">Semua</button>
            <button wire:click="setFilter('informasi')"
                class="h-12 text-sm {{ $filter === 'informasi' ? 'border-b border-black' : 'text-gray-600' }}">Informasi</button>
            <button wire:click="setFilter('artikel')"
                class="h-12 text-sm {{ $filter === 'artikel' ? 'border-b border-black' : 'text-gray-600' }}">Artikel</button>
            <button wire:click="setFilter('berita')"
                class="h-12 text-sm {{ $filter === 'berita' ? 'border-b border-black' : 'text-gray-600' }}">Berita</button>
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        @forelse ($blogs as $item)
            <div class="w-full h-48 gap-6 lg:flex">
                <img src="{{ Storage::url($item->thumbnail) }}" alt="thumbnail"
                    class="hidden object-cover h-48 lg:block w-60">
                <div class="flex flex-col justify-between h-full">
                    <h2 class="text-2xl font-semibold">{{ $item->title }}</h2>
                    <div class="text-sm text-justify line-clamp-4">
                        {{ strip_tags($item->content) }}
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <x-badge
                                class="{{ $item->category == 'artikel' ? 'bg-blue-100 text-blue-800 border-blue-800' : ($item->category == 'informasi' ? 'bg-green-100 text-green-800 border-green-800' : 'bg-yellow-100 text-yellow-800 border-yellow-800') }}">{{ $item->category }}</x-badge>
                            <span>{{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</span>
                        </div>
                        <a href="{{ route('blog.show', $item->slug) }}" class="text-sm underline">Baca selanjutnya</a>
                    </div>
                </div>
            </div>
            <x-separator class="my-6" />
        @empty
            <div class="col-span-3 text-xl font-semibold text-center">Tidak ada blog</div>
        @endforelse
        <div>{{ $blogs->links() }}</div>
    </div>
</div>

