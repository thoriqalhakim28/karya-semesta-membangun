<div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <x-logo class="w-auto h-24 mx-auto" />
            <h1 class="text-2xl font-semibold leading-7 text-center">Masuk</h1>
            <div class="mt-6">
                <form wire:submit.prevent="register">
                    <div>
                        <x-label for="name" value="Nama" />
                        <x-input wire:model.lazy="name" id="name" type="text" required autofocus />
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label value="Email" />
                        <x-input wire:model.lazy="email" id="email" name="email" type="email" required />
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-label value="Kata sandi" />
                        <x-input wire:model.lazy="password" id="password" name="password" type="password" required
                            autofocus />
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6">
                        <x-label for="password_confirmation" value="Konfirmasi kata sandi" />
                        <x-input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password"
                            required />
                    </div>
                    <div class="mt-6">
                        <x-button class="w-full">
                            Daftar
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

