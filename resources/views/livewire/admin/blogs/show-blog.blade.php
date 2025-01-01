<div>
    <div class="items-center justify-between lg:flex">
        <div class="w-32">
            <x-label for="status" value="Status" />
            <x-select wire:model="status">
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </x-select>
        </div>
        <div class="flex items-center gap-4 mt-4 lg:mt-0">
            <x-link variant="button" href="{{ route('admin.blog.edit', 1) }}">
                Edit blog
            </x-link>
            <x-button variant="destructive" x-on:click="confirm('Apakah anda yakin ingin menghapus program ini?')">
                Hapus blog
            </x-button>
        </div>
    </div>
    <div class="max-w-2xl mx-auto mt-4 lg:mt-6">
        <h1 class="text-4xl font-bold capitalize">{{ $blog->title }}</h1>
        <div class="mt-4 blog-content lg:mt-6">{!! $blog->content !!}</div>
    </div>
</div>

