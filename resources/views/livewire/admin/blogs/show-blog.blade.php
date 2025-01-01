<div>
    <div class="items-center justify-between lg:flex">
        <div class="w-32">
            <x-label for="status" value="Status" />
            <div
                class="inline-flex items-center h-6 px-3 text-xs font-medium  border rounded-md capitalize {{ $blog->status == 'published' ? 'bg-blue-100 text-blue-800 border-blue-800' : 'bg-green-100 text-green-800 border-green-800' }}">
                {{ $blog->status }}</div>
        </div>
        <div class="flex items-center gap-4 mt-4 lg:mt-0">
            <x-link variant="button" href="{{ route('admin.blog.edit', $blog->slug) }}">
                Edit blog
            </x-link>
            <x-button wire:click="delete({{ $blog->id }})" variant="destructive"
                x-on:click="confirm('Apakah anda yakin ingin menghapus blog ini?')">
                Hapus blog
            </x-button>
        </div>
    </div>
    <div class="max-w-2xl mx-auto mt-4 space-y-4 lg:mt-6">
        <img src="{{ Storage::url($blog->thumbnail) }}" alt="thumbnail">
        <h1 class="text-4xl font-bold capitalize">{{ $blog->title }}</h1>
        <div class="blog-content">{!! $blog->content !!}</div>
    </div>
</div>

