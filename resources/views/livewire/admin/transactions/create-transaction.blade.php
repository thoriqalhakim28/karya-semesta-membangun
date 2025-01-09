<div>
    <h1 class="text-2xl font-semibold leading-7">Tambah Transaksi</h1>
    <p class="text-sm font-medium text-gray-600">
        Masukan informasi transaksi baru.
    </p>
    <div class="w-full mx-auto mt-6 lg:w-1/2">
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-2 gap-4 lg:gap-6">
                <label for="program" class="flex w-full p-3 text-sm bg-white border border-gray-200 rounded-lg">
                    <input type="radio" wire:model.lazy="type" id="program" name="type" value="program"
                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600">
                    <span class="text-sm text-gray-600 ms-3">Program</span>
                </label>
                <label for="investasi" class="flex w-full p-3 text-sm bg-white border border-gray-200 rounded-lg">
                    <input type="radio" wire:model.lazy="type" id="investasi" name="type" value="investasi"
                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600">
                    <span class="text-sm text-gray-600 ms-3">Investasi</span>
                </label>
            </div>
            <div class="mt-4">
                <x-label for="date" value="Tanggal" />
                <x-input wire:model.lazy="form.date" id="date" name="date" type="date" required />
                @error('form.date')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="user" value="Nama pengguna" />
                <x-select wire:model.lazy="form.user" id="user" name="user" required>
                    <option value="" selected>Pilih pengguna</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </x-select>
                @error('form.user')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @if ($type == 'program' && count($programs) > 0)
                <div class="mt-4">
                    <x-label for="program" value="Program" />
                    <x-select wire:model.lazy="form.program" id="program" name="program" required>
                        <option value="" selected>Pilih program</option>
                        @foreach ($programs as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                    @error('form.program')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <x-label for="transaction_type" value="Jenis transaksi" />
                    <x-select wire:model.lazy="form.transactionType" id="transaction_type" name="transaction_type"
                        required>
                        <option value="" selected>Pilih jenis transaksi</option>
                        <option value="loyalty" selected>Loyalty</option>
                        <option value="personal" selected>Personal</option>
                    </x-select>
                    @error('form.transactionType')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @elseif ($type == 'investasi' && count($investments) > 0)
                <div class="mt-4">
                    <x-label for="investment" value="Jenis Investasi" />
                    <x-select wire:model.lazy="form.investment" id="investment" name="investment" required>
                        <option value="" selected>Pilih jenis investasi</option>
                        @foreach ($investments as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                    @error('form.investment')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endif
            @if (isset($form->investment) || isset($form->program))
                <div class="mt-4">
                    <x-label for="amount" value="Jumlah" />
                    <x-input wire:model.lazy="form.amount" id="amount" name="amount" type="number" required />
                    @error('form.amount')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-label for="payment" value="Metode pembayaran" />
                    <x-input wire:model.lazy="form.payment" id="payment" name="payment" type="text" required />
                    @error('form.payment')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endif
            <div class="flex justify-end mt-4">
                <x-button class="w-full">
                    Simpan
                </x-button>
            </div>
        </form>
    </div>
</div>

