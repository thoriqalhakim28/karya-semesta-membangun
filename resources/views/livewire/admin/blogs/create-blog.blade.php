<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold leading-7">Posting Blog</h1>
            <p class="text-sm font-medium text-gray-600">
                Buatlah blog yang menarik untuk komunitas anda.
            </p>
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <x-label for="thumbnail" value="Thumbnail" />
                    <x-input wire:model.lazy="thumbnail" id="thumbnail" name="thumbnail" type="file" required />
                    @error('thumbnail')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <div>
                        <x-label for="title" value="Judul" />
                        <x-input wire:model.lazy="form.title" id="title" name="title" type="text" required
                            autofocus />
                        @error('form.title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label for="Category" value="Kategori" />
                        <x-input wire:model.lazy="form.category" id="category" name="category" type="text" required
                            autofocus />
                        @error('form.category')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label for="content" value="Konten" />
                        <div id="quill-editor" class="h-auto"></div>
                        <textarea wire:model.lazy="content" rows="3" class="hidden" name="content" id="quill-editor-area"></textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <x-button class="w-1/4">
                    Posting
                </x-button>
            </div>
        </form>
    </div>
</div>

