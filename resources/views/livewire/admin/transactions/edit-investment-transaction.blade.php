<div>
    <h1 class="text-2xl font-semibold leading-7">Edit Transaksi</h1>
    <p class="text-sm font-medium text-gray-600">
        Masukan informasi transaksi yang akan di rubah.
    </p>
    <div class="w-full mt-6">
        <form wire:submit.prevent="submit">
            <div class="grid gap-4 lg:grid-cols-3">
                <div>
                    <x-label for="date" value="Tanggal" />
                    <x-input wire:model.lazy="form.date" id="date" name="date" type="date" />
                    @error('form.date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-label for="user" value="Nama pengguna" />
                    <x-select wire:model.live="form.user" id="user" name="user">
                        <option value="" selected>Pilih pengguna</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </x-select>
                    @error('form.user')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-label for="investment" value="Investment" />
                    <x-select wire:model.lazy="form.investment" id="investment" name="investment">
                        <option value="" selected>Pilih investment</option>
                        @foreach ($investments as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                    @error('form.program')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-label for="amount" value="Jumlah" />
                    <x-input wire:model.lazy="form.amount" id="amount" name="amount" type="number" />
                    @error('form.amount')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-label for="payment" value="Metode pembayaran" />
                    <x-input wire:model.lazy="form.payment" id="payment" name="payment" type="text" />
                    @error('form.payment')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between mt-4">
                <x-button>
                    Simpan data
                </x-button>
            </div>
        </form>
    </div>
</div>

