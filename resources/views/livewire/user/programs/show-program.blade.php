<div>
    <div class="items-center justify-between lg:flex">
        <div>
            <h1 class="text-2xl font-semibold leading-7">{{ $program->name }}</h1>
            <p class="text-sm font-medium text-gray-600">{{ $program->description }}</p>
        </div>
        <div class="mt-4 lg:mt-0">
            @if (!$isFollowed)
                <x-button wire:click="follow('{{ $program->id }}')">
                    Ikuti program
                </x-button>
            @endif
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        <div class="grid gap-6 lg:grid-cols-3">
            <div class="w-full border divide-y divide-gray-200 rounded-lg">
                <div class="p-4 bg-gray-100 rounded-t-lg">
                    <p class="text-lg font-semibold text-center">Target/orang</p>
                </div>
                <p class="p-4 text-center">{{ $program->target }}</p>
            </div>
            @if ($isFollowed)
                <div class="w-full border divide-y divide-gray-200 rounded-lg">
                    <div class="p-4 bg-gray-100 rounded-t-lg">
                        <p class="text-lg font-semibold text-center">Terkumpul</p>
                    </div>
                    <p class="p-4 text-center">{{ $userTotalAmount }}</p>
                </div>
                <div class="w-full border divide-y divide-gray-200 rounded-lg">
                    <div class="p-4 bg-gray-100 rounded-t-lg">
                        <p class="text-lg font-semibold text-center">Keterangan</p>
                    </div>
                    <p class="p-4 text-center {{ $difference >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $this->differenceFormatted }}
                    </p>
                </div>
            @endif
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        @if ($isFollowed)
            <div class="p-4 border rounded-lg lg:p-6">
                <h2 class="text-xl font-semibold">Transaksi</h2>
                <div class="mt-4 lg:mt-6">
                    <x-table>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                        Tanggal</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                        Jenis Transaksi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                        Metode Pembayaran</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                                        Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($transactions as $item)
                                    <tr wire:key="transaction-{{ $item->id }}">
                                        <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                            {{ Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="px-6 py-2 text-sm text-gray-800 capitalize whitespace-nowrap">
                                            {{ $item->transaction_type }}</td>
                                        <td class="px-6 py-2 text-sm text-gray-800 capitalize whitespace-nowrap">
                                            {{ $item->payment_method }}</td>
                                        <td class="px-6 py-2 text-sm text-gray-800 text-end whitespace-nowrap">
                                            {{ $item->amount }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-4 text-sm font-medium text-center text-gray-800 whitespace-nowrap">
                                            Transaksi tidak ditemukan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </x-table>
                    <div class="mt-4 lg:mt-6">
                        {{ $transactions->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

