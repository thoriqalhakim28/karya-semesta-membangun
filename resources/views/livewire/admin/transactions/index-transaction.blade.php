<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold leading-7">Transaksi</h1>
            <p class="text-sm font-medium text-gray-600">
                Daftar transaksi yang pernah dilakukan oleh pengguna di komunitas anda.
            </p>
        </div>
        <x-link variant="button" :href="route('admin.transaction.create')" class="mt-4 lg:mt-0">
            Tambah transaksi
        </x-link>
    </div>
    <div class="p-4 mt-6 border rounded-lg lg:p-6">
        <div class="items-center justify-between lg:flex">
            <div class="items-center gap-6 lg:flex">
                <x-input wire:model.live.debounce.300ms="search" type="search"
                    placeholder="Cari pengguna, program, atau jenis investasi..." class="lg:w-96" />
                <x-dropdown>
                    <x-slot name="trigger">
                        <x-button type="button" variant="outline">
                            Filter data
                        </x-button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="space-y-4">
                            <div>
                                <x-label for="start_date" value="Tanggal Mulai" />
                                <x-input wire:model.live="startDate" id="start_date" type="date" />
                            </div>
                            <div>
                                <x-label for="end_date" value="Tanggal Selesai" />
                                <x-input wire:model.live="endDate" id="end_date" type="date" />
                            </div>
                            <div>
                                <x-label for="transaction_type" value="Jenis Transaksi" />
                                <x-select wire:model.live="transactionType" id="transaction_type">
                                    <option value="all">Semua Jenis</option>
                                    <option value="personal">Personal</option>
                                    <option value="loyalty">Loyalty</option>
                                </x-select>
                            </div>
                            <div>
                                <x-label for="transactionable_type" value="Sumber Transaksi" />
                                <x-select wire:model.live="transactionableType" id="transactionable_type">
                                    <option value="all">Semua Sumber</option>
                                    <option value="program">Program</option>
                                    <option value="investment">Investasi</option>
                                </x-select>
                            </div>
                            <div class="flex justify-end">
                                <x-button wire:click="resetFilters" variant="outline" type="button">
                                    Reset Filter
                                </x-button>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
        <div class="mt-4 lg:mt-6">
            <x-table>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Nama</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Nama Transaksi</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Jenis Transaksi</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($transactions as $item)
                            <tr>
                                <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                    {{ Carbon\Carbon::parse($item->transaction_date)->locale('id')->translatedFormat('d F Y') }}
                                </td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ $item->user->name }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ class_basename($item->transactionable_type) }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    <span>{{ $item->transactionable->name }}</span>
                                    @if ($item->transactionable_type == 'App\Models\Program')
                                        - <span class="capitalize">{{ $item->transaction_type }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ 'Rp' . number_format($item->amount, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-2 text-sm font-medium whitespace-nowrap text-end">
                                    <x-button variant="ghost" wire:click="showTransactionDetail('{{ $item->id }}')">
                                        <x-icons.view class="w-5 h-5 text-gray-600" />
                                    </x-button>
                                    <x-link variant="ghost" :href="route('admin.transaction.edit', $item->id)" wire:navigate>
                                        <x-icons.edit class="w-5 h-5 text-green-600" />
                                    </x-link>
                                    <x-button variant="ghost" wire:click="delete('{{ $item->id }}')"
                                        wire:confirm="Apakah anda yakin ingin menghapus transaksi ini?">
                                        <x-icons.delete class="w-5 h-5 text-red-600" />
                                    </x-button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-center text-gray-800 whitespace-nowrap"
                                    colspan="6">
                                    Transaksi tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </x-table>
            <div class="mt-4 lg:mt-6">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
    <x-modal name="detail-transaction" focusable>
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-medium">Detail Transaksi</h2>
            <x-button variant="ghost" wire:click="resetTransactionDetail">
                <x-icons.cancel class="w-5 h-5" />
            </x-button>
        </div>
        @if ($selectedTransaction)
            <div class="grid gap-6 mt-6 lg:grid-cols-2">
                <div>
                    <p class="text-sm font-medium text-gray-600">Tanggal</p>
                    <p class="text-sm text-gray-800">
                        {{ Carbon\Carbon::parse($selectedTransaction->created_at)->locale('id')->translatedFormat('d F Y') }}
                    </p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Nama Pengguna</p>
                    <p class="text-sm text-gray-800">
                        {{ $selectedTransaction->user->name }}
                    </p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Nama Transaksi</p>
                    <p class="text-sm text-gray-800">
                        {{ class_basename($selectedTransaction->transactionable_type) }}
                    </p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Jenis Transaksi</p>
                    <p class="text-sm text-gray-800">
                        <span>{{ $item->transactionable->name }}</span>
                        @if ($item->transactionable_type == 'App\Models\Program')
                            - <span class="capitalize">{{ $item->transaction_type }}</span>
                        @endif
                    </p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Jumlah</p>
                    <p class="text-sm text-gray-800">
                        {{ 'Rp' . number_format($selectedTransaction->amount, 2, ',', '.') . ',-' }}
                    </p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Methode Pembayaran</p>
                    <p class="text-sm text-gray-800">
                        {{ $selectedTransaction->payment_method }}
                    </p>
                </div>
            </div>
        @endif
    </x-modal>
</div>

