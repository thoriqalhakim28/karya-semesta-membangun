<div>
    <h1 class="text-2xl font-semibold leading-7">Tambah Pengguna</h1>
    <p class="text-sm font-medium text-gray-600">
        Masukan informasi pengguna baru.
    </p>
    <div class="w-full mx-auto mt-6 lg:w-1/2">
        <form wire:submit.prevent="submit">
            <div>
                <x-label for="name" value="Nama lengkap" />
                <x-input wire:model.lazy="name" id="name" name="name" type="text" required autofocus />
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="email" value="Email" />
                <x-input wire:model.lazy="email" id="email" name="email" type="email" required />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="phone_number" value="Nomor telepon" />
                <x-input wire:model.lazy="phoneNumber" id="phone_number" name="phone_number" type="number" required />
                @error('phoneNumber')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="password" value="Kata sandi" />
                <x-input wire:model.lazy="password" id="password" name="password" type="password" required />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="password_confirmation" value="Konfirmasi kata sandi" />
                <x-input wire:model.lazy="passwordConfirmation" id="password_confirmation" name="password_confirmation"
                    type="password" required />
            </div>
            <div class="flex justify-end mt-4">
                <x-button class="w-full">
                    Simpan
                </x-button>
            </div>
        </form>
    </div>
</div>

