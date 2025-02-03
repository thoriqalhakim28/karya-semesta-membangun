<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-start justify-between">
        <h3 class="text-lg font-semibold">Informasi alamat</h3>
        <x-button variant="outline" x-data="" x-on:click="$dispatch('open-modal', 'edit-address')"
            class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>
    </div>
    <div class="grid gap-4 mt-2 lg:mt-4 lg:grid-cols-2">
        <div class="col-span-2">
            <p class="text-sm font-medium text-gray-600">Tipe alamat</p>
            <p class="font-semibold capitalize">{{ $user->address->type ?? '-' }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-sm font-medium text-gray-600">Alamat</p>
            <p class="font-semibold">{{ $user->address->address ?? '-' }}</p>
        </div>
    </div>
</div>

<x-modal name="edit-address" focusable>
    <h3 class="text-lg font-semibold">Edit Alamat</h3>
    <div class="mt-6">
        <form wire:submit.prevent="submitAddress">
            <div>
                <x-label for="type" :value="__('Tipe alamat')" />
                <x-select wire:model.lazy="address.type" id="type" name="type">
                    <option value="" selected>Pilih tipe alamat</option>
                    <option value="asal">Asal</option>
                    <option value="domisili">Domisili</option>
                    <option value="ktp">KTP</option>
                </x-select>
                @error('address.type')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="alamat" :value="__('Alamat')" />
                <x-input wire:model.lazy="address.alamat" id="alamat" name="address" type="text" />
                @error('address.alamat')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end mt-4">
                <x-button class="w-full" type="submit">
                    Simpan
                </x-button>
            </div>
        </form>
    </div>
</x-modal>

