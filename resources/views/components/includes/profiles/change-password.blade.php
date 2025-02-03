<div class="p-4 border rounded-lg lg:p-6">
    <h3 class="text-lg font-semibold">Ubah password</h3>
    @if (session()->has('messagePassword'))
        <div class="mt-2 text-sm text-green-600">
            {{ session('messagePassword') }}
        </div>
    @endif
    <div class="mt-4">
        <form wire:submit.prevent="updatePassword">
            <div class="mt-4 lg:w-1/2">
                <x-label for="current_password" value="Kata sandi lama" />
                <x-input wire:model.lazy="passwordForm.currentPassword" id="current_password" type="password"
                    name="current_password" />
                @error('passwordForm.currentPassword')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4 lg:w-1/2">
                <x-label for="new_password" value="Kata sandi baru" />
                <x-input wire:model.lazy="passwordForm.newPassword" id="new_password" type="password"
                    name="new_password" />
                @error('passwordForm.newPassword')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4 lg:w-1/2">
                <x-label for="new_password_confirmation" value="Konfirmasi kata sandi" />
                <x-input wire:model.lazy="passwordForm.newPasswordConfirmation" id="new_password_confirmation"
                    type="password" name="new_password_confirmation" />
                @error('passwordForm.email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-button type="submit">
                    Simpan perubahan
                </x-button>
            </div>
        </form>
    </div>
</div>

