<div>
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-semibold font-display">
            Selamat Datang
        </h1>
        <p>Masukan email dan kata sandi untuk mengakses akun anda.</p>
    </div>
    <div class="mt-6">
        @if (session()->has('error'))
            <p class="text-destructive">{{ session('error') }}</p>
        @endif
        <form wire:submit.prevent="authenticate">
            <div>
                <x-label for="email" value="Email" />
                <x-input wire:model.lazy="email" id="email" name="email" type="email" required autofocus />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="password" value="Kata sandi" />
                <x-input wire:model.lazy="password" id="password" name="password" type="password" required autofocus />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-6">
                <x-button class="w-full">
                    Masuk
                </x-button>
            </div>
        </form>
    </div>
</div>

