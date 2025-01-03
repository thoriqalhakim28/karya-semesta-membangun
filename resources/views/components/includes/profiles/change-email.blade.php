<div class="p-4 border rounded-lg lg:p-6">
    <h3 class="text-lg font-semibold">Email</h3>
    @if (session()->has('message'))
        <div class="mt-2 text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <div class="mt-2">
        <form wire:submit.prevent="updateEmail">
            <div class="flex items-center gap-4">
                <div class="w-1/2">
                    <x-input wire:model.live="form.email" id="email" type="email" name="email" />
                    @error('form.email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                @if ($hasChanges)
                    <x-button type="button" x-data=""
                        x-on:click="$dispatch('open-modal', 'update-email')">Simpan perubahan</x-button>
                @endif
            </div>
        </form>
    </div>
</div>

<x-modal name="update-email" focusable>
    <form wire:submit.prevent="updateEmail" class="p-6">
        <h2 class="text-lg font-semibold">Konfirmasi perubahan email</h2>
        <p class="text-sm text-gray-600">
            Masukkan password Anda untuk mengonfirmasi perubahan email.
        </p>

        <div class="mt-4">
            <x-label for="password" value="Password" />
            <x-input wire:model="form.password" id="password" type="password" name="password"
                autocomplete="current-password" />
            @error('form.password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-4 mt-4">
            <x-button type="submit">
                Konfirmasi
            </x-button>
        </div>
    </form>
</x-modal>

