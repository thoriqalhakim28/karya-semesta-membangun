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
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <div>
                        <x-label for="status" value="Status" />
                        <x-select wire:model.lazy="form.status" id="status" name="status" required>
                            <option value="draft" selected>Draft</option>
                            <option value="published" selected>Published</option>
                        </x-select>
                    </div>
                    <div class="mt-4">
                        <x-label for="thumbnail" value="Thumbnail" />
                        <x-input wire:model.lazy="form.thumbnail" id="thumbnail" name="thumbnail" type="file" />
                        @error('form.thumbnail')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if ($form->thumbnail && method_exists($form->thumbnail, 'temporaryUrl'))
                            <div class="mt-4 lg:mt-6">
                                <img src="{{ $form->thumbnail->temporaryUrl() }}" class="w-auto h-auto">
                            </div>
                        @elseif ($form->storedThumbnail)
                            <div class="mt-4 lg:mt-6">
                                <img src="{{ Storage::url($form->storedThumbnail) }}" alt="Preview"
                                    class="w-auto h-auto">
                            </div>
                        @endif
                    </div>
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
                        <div wire:ignore>
                            <div x-data x-ref="editor" x-init="const quill = new Quill($refs.editor, {
                                theme: 'snow'
                            });
                            quill.on('text-change', function() {
                                @this.set('form.content', quill.root.innerHTML);
                            });
                            
                            // Initialize content if exists
                            if (@this.get('form.content')) {
                                quill.root.innerHTML = @this.get('form.content');
                            }">{!! $form->content !!}</div>
                        </div>
                        @error('body')
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

