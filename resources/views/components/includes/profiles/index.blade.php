<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-600">Nama lengkap</p>
            <p class="font-semibold">{{ $user->name }}</p>
        </div>
        <x-button variant="outline" x-data="" x-on:click="$dispatch('open-modal', 'edit-profile')"
            class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>

    </div>
</div>

<x-modal name="edit-profile" focusable>
    <h3 class="text-lg font-semibold">Edit Profile</h3>
    <div class="mt-6">
        <form wire:submit.prevent="submitUser">
            <div>
                <x-label for="name" :value="__('Nama lengkap')" />
                <x-input wire:model.lazy="form.name" id="name" type="text" required autofocus />
                @error('form.name')
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

