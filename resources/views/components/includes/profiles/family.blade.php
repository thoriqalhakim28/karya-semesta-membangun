<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-start justify-between">
        <h3 class="text-lg font-semibold">Informasi pribadi</h3>
        <x-button variant="outline" x-data="" x-on:click="$dispatch('open-modal', 'edit-family')"
            class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>
    </div>
    <div class="grid gap-4 mt-2 lg:mt-4 lg:grid-cols-2">
        <div>
            <p class="text-sm font-medium text-gray-600">Nama ayah</p>
            <p class="font-semibold">{{ $user->family->father_name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Nama ibu</p>
            <p class="font-semibold">{{ $user->family->mother_name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Status keluarga</p>
            <p class="font-semibold capitalize">{{ $user->family->family_status ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Jumlah anak</p>
            <p class="font-semibold">{{ $user->family->number_of_children ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Kepemilikan hunian</p>
            <p class="font-semibold capitalize">{{ $user->family->residential_ownership ?? '-' }}</p>
        </div>
    </div>
</div>

<x-modal name="edit-family" focusable>
    <h3 class="text-lg font-semibold">Edit Informasi Keluarga</h3>
    <div class="mt-6">
        <form wire:submit.prevent="submitFamily">
            <div>
                <x-label for="father_name" :value="__('Nama ayah')" />
                <x-input wire:model.lazy="family.fatherName" id="father_name" name="father_name" type="text" />
                @error('family.fatherName')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="mother_name" :value="__('Nama ibu')" />
                <x-input wire:model.lazy="family.motherName" id="mother_name" name="mother_name" type="text" />
                @error('family.motherName')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="family_status" :value="__('Status keluarga')" />
                <x-select wire:model.lazy="family.familyStatus" id="family_status" name="family_status">
                    <option value="" selected>Pilih status keluarga</option>
                    <option value="ayah">Ayah</option>
                    <option value="ibun">Ibu</option>
                    <option value="anak">Anak</option>
                </x-select>
                @error('family.familyStatus')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="number_of_children" :value="__('Jumlah anak')" />
                <x-input wire:model.lazy="family.numberOfChildren" id="number_of_children" name="number_of_children"
                    type="number" />
                @error('family.numberOfChildren')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="residential_ownership" :value="__('Kepemilikan hunian')" />
                <x-select wire:model.lazy="family.residentialOwnership" id="residential_ownership"
                    name="residential_ownership">
                    <option value="" selected>Pilih kepemilikan hunian</option>
                    <option value="milik">Milik</option>
                    <option value="sewa">Sewa</option>
                </x-select>
                @error('family.residentialOwnership')
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

