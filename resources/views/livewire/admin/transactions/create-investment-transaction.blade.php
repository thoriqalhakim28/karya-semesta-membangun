<div>
    <h1 class="text-2xl font-semibold leading-7">Tambah Transaksi</h1>
    <p class="text-sm font-medium text-gray-600">
        Masukan informasi transaksi baru.
    </p>
    <div class="w-full mt-6">
        <form wire:submit.prevent="submit">
            @foreach ($form->data['transactions'] as $index => $transaction)
                <div class="p-4 mb-4 border rounded">
                    <x-includes.transactions.create-investment :index="$index" :users="$users" :userInvestments="$userInvestments" />
                    @if (count($form->data['transactions']) > 1)
                        <button type="button" wire:click="removeTransactionRow({{ $index }})"
                            class="mt-2 text-red-500">
                            Hapus baris
                        </button>
                    @endif
                </div>
            @endforeach
            <div class="flex items-center justify-between mt-4">
                <x-button type="button" variant="outline" wire:click="addTransactionRow">
                    Tambah baris data
                </x-button>
                <x-button>
                    Simpan data
                </x-button>
            </div>
        </form>
    </div>
</div>

