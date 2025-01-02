<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-start justify-between">
        <h3 class="text-lg font-semibold">Informasi kontak</h3>
        <x-button variant="outline" x-data="" x-on:click="$dispatch('open-modal', 'edit-contact')"
            class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>
    </div>
    <div class="grid gap-4 mt-2 lg:mt-4 lg:grid-cols-2">
        <div>
            <p class="text-sm font-medium text-gray-600">Nomor telepon</p>
            <p class="font-semibold">{{ $user->contact->phone_number ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Email</p>
            <p class="font-semibold">{{ $user->email ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Rekening Mandiri</p>
            <p class="font-semibold">{{ $user->contact->mandiri_account_number ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Rekening BTN</p>
            <p class="font-semibold">{{ $user->contact->btn_account_number ?? '-' }}</p>
        </div>
    </div>
</div>

<x-modal name="edit-contact" focusable>
    <h3 class="text-lg font-semibold">Edit Kontak</h3>
    <div class="mt-6">
        <form wire:submit.prevent="submitContact">
            <div>
                <x-label for="phone_number" :value="__('Nomor telepon')" />
                <x-input wire:model.lazy="contact.phoneNumber" id="phone_number" name="phone_number" type="number" />
                @error('contact.phoneNumber')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="mandiri_account_number" :value="__('Rekening Mandiri')" />
                <x-input wire:model.lazy="contact.mandiriAccountNumber" id="mandiri_account_number"
                    name="mandiri_account_number" type="number" />
                @error('contact.mandiriAccountNumber')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="btn_account_number" :value="__('Rekening BTN')" />
                <x-input wire:model.lazy="contact.btnAccountNumber" id="btn_account_number" name="btn_account_number"
                    type="number" />
                @error('contact.btnAccountNumber')
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

