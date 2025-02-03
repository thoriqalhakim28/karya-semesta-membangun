<div class="grid gap-4 lg:grid-cols-3">
    <div>
        <x-label for="date-{{ $index }}" value="Tanggal" />
        <x-input wire:model.lazy="form.data.transactions.{{ $index }}.date" id="date-{{ $index }}"
            name="date" type="date" />
        @error('form.data.transactions.' . $index . '.date')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-label for="user-{{ $index }}" value="Nama pengguna" />
        <x-select wire:model.live="form.data.transactions.{{ $index }}.user" id="user-{{ $index }}"
            name="user">
            <option value="" selected>Pilih pengguna</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </x-select>
        @error('form.data.transactions.' . $index . '.user')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-label for="program-{{ $index }}" value="Program" />
        <x-select wire:model.lazy="form.data.transactions.{{ $index }}.program"
            id="program-{{ $index }}" name="program">
            <option value="" selected>Pilih program</option>
            @if (isset($userPrograms[$index]))
                @foreach ($userPrograms[$index] as $program)
                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                @endforeach
            @endif
        </x-select>
        @error('form.data.transactions.' . $index . '.program')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-label for="transaction_type-{{ $index }}" value="Jenis transaksi" />
        <x-select wire:model.lazy="form.data.transactions.{{ $index }}.type"
            id="transaction_type-{{ $index }}" name="transaction_type">
            <option value="" selected>Pilih jenis transaksi</option>
            <option value="loyalty" selected>Loyalty</option>
            <option value="personal" selected>Personal</option>
        </x-select>
        @error('form.data.transactions.' . $index . '.type')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-label for="amount-{{ $index }}" value="Jumlah" />
        <x-input wire:model.lazy="form.data.transactions.{{ $index }}.amount" id="amount-{{ $index }}"
            name="amount" type="number" />
        @error('form.data.transactions.' . $index . '.amount')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <x-label for="payment-{{ $index }}" value="Metode pembayaran" />
        <x-input wire:model.lazy="form.data.transactions.{{ $index }}.payment" id="payment-{{ $index }}" name="payment" type="text" />
        @error('form.data.transactions.' . $index . '.payment')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

