<div>
    <h1 class="text-2xl font-semibold leading-7">Tambah Program</h1>
    <p class="text-sm font-medium text-gray-600">
        Masukan informasi program baru.
    </p>
    <div class="w-full mx-auto mt-6 lg:w-1/2">
        <form wire:submit.prevent="submit">
            <div>
                <x-label for="name" value="Nama program" />
                <x-input wire:model.blur="form.name" id="name" name="name" type="text" required autofocus />
                @error('form.name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="description" value="Deskripsi singkat" />
                <x-input wire:model.blur="form.description" id="description" name="description" type="text"
                    required />
                @error('form.description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="target" value="Target/orang" />
                <x-input wire:model.blur="form.target" id="target" name="target" type="number"
                    placeholder="e.g Rp. 1.000.000" required />
                @error('form.target')
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
</div>

