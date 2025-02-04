<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-semibold leading-7">Beranda</h1>
        <p class="text-sm font-medium text-gray-600">
            Lacak aktivitas dan perkembangan anda.
        </p>
    </div>
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">
        <div class="flex flex-col border rounded-lg">
            <div class="flex-1 p-6">
                <div class="flex items-start justify-between">
                    <x-icons.transaction class="w-10 h-10 p-2 text-blue-600 rounded-full bg-blue-100/50" />
                    <div class="w-1/2">
                        <x-select wire:model.live="period" name="period" class="text-xs">
                            <option value="week">Minggu ini</option>
                            <option value="month">Bulan ini</option>
                            <option value="year">Tahun ini</option>
                        </x-select>
                    </div>
                </div>
                <div class="mt-4 text-center lg:text-start">
                    <p class="font-medium">Transaksi</p>
                    <p class="text-2xl font-semibold">{{ $totalTransactions }}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col border rounded-lg">
            <div class="flex-1 p-6">
                <div class="flex items-center justify-between">
                    <div class="space-y-2">
                        <p class="text-sm font-medium text-gray-600">Program diikuti</p>
                        <p class="text-3xl font-semibold tracking-tighter">{{ $totalPrograms }}</p>
                    </div>
                    <div>
                        <x-icons.program class="p-2 text-blue-600 w-14 h-14 bg-blue-100/50 rounded-xl" />
                    </div>
                </div>
            </div>
            <x-separator />
            <div class="flex items-center justify-center p-4">
                <x-link href="{{ route('user.program.index', ['filter' => 'followed']) }}"
                    class="text-sm hover:text-blue-600 hover:underline" wire:navigate>
                    Lihat detail
                </x-link>
            </div>
        </div>
        <div class="flex flex-col border rounded-lg">
            <div class="flex flex-col justify-between flex-1 p-6">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-600">Total investasi</p>
                    <x-icons.investment class="w-6 h-6 p-0.5 text-blue-600 bg-blue-100/50 rounded-xl" />
                </div>
                <p class="text-lg font-semibold tracking-tighter">
                    {{ 'Rp ' . number_format($totalInvestments, 2, ',', '.') }}</p>
            </div>
            <x-separator />
            <div class="flex items-center justify-center p-4">
                <x-link href="{{ route('user.investment.index', ['filter' => 'followed']) }}"
                    class="text-sm hover:text-blue-600 hover:underline" wire:navigate>
                    Lihat detail
                </x-link>
            </div>
        </div>
    </div>
    <div class="p-6 border rounded-lg">
        <h3 class="mb-6 font-medium">Transaksi terakhir</h3>
        <x-table>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                            Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                            Nama Transaksi</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                            Jenis Transaksi</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                            Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($recentTransactions as $item)
                        <tr>
                            <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                {{ Carbon\Carbon::parse($item->transaction_date)->locale('id')->translatedFormat('d F') }}
                            </td>
                            <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                {{ class_basename($item->transactionable_type) }}</td>
                            <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                <span>{{ $item->transactionable->name }}</span>
                                @if ($item->transactionable_type == 'App\Models\Program')
                                    - <span class="capitalize">{{ $item->transaction_type }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                {{ $item->amount }}
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
    </div>
</div>

