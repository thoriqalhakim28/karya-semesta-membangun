<div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <div class="flex flex-col items-center space-y-2">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-24 h-24">
                <h1 class="text-2xl font-semibold leading-7">Masuk</h1>
            </div>
            <div class="mt-6">
                <form wire:submit.prevent="authenticate">
                    <div>
                        <x-label value="Email" />
                        <x-input wire:model.lazy="email" id="email" name="email" type="email" required
                            autofocus />
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
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                            Lupa kata sandi?
                        </a>
                    </div>
                    <div class="mt-6">
                        <x-button class="w-full">
                            Masuk
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

