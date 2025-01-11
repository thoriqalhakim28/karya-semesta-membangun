<div>
    <div class="items-center justify-between lg:flex">
        <div>
            <h1 class="text-2xl font-semibold leading-7">{{ $program->name }}</h1>
            <p class="text-sm font-medium text-gray-600">{{ $program->description }}</p>
        </div>
        <div class="flex items-center gap-4 mt-4 lg:mt-0">
            <x-link variant="button" href="{{ route('admin.program.edit', $program->id) }}">
                Edit program
            </x-link>
            <x-button wire:click="delete('{{ $program->id }}')" variant="destructive"
                wire:confirm="Apakah anda yakin ingin menghapus program ini?">
                Hapus program
            </x-button>
        </div>
    </div>
    <div class="mt-4 lg:mt-6">
        <div class="items-center gap-6 space-y-4 lg:flex lg:space-y-0">
            <div class="w-full border divide-y divide-gray-200 rounded-lg">
                <div class="p-4 bg-gray-100 rounded-t-lg">
                    <h3 class="font-medium text-center">Total pengguna</h3>
                </div>
                <p class="p-4 text-center">{{ count($program->users) }}</p>
            </div>
            <div class="w-full border divide-y divide-gray-200 rounded-lg">
                <div class="p-4 bg-gray-100 rounded-t-lg">
                    <h3 class="font-medium text-center">Target/orang</h3>
                </div>
                <p class="p-4 text-center">{{ 'Rp' . number_format($program->target, 2, ',', '.') }}</p>
            </div>
            <div class="w-full border divide-y divide-gray-200 rounded-lg">
                <div class="p-4 bg-gray-100 rounded-t-lg">
                    <h3 class="font-medium text-center">Terkumpul</h3>
                </div>
                <p class="p-4 text-center">{{ 'Rp' . number_format($totalAmount, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
    <div class="p-4 mt-4 border rounded-lg lg:p-6 lg:mt-6">
        <h2 class="text-xl font-semibold">Transaksi</h2>
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
                                Jenis Transaksi</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                                Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($transactions as $item)
                            <tr wire:key="transaction-{{ $item->id }}">
                                <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                    {{ Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y') }}
                                </td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ $item->user->name }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 capitalize whitespace-nowrap">
                                    {{ $item->transaction_type }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 text-end whitespace-nowrap">
                                    {{ 'Rp' . number_format($item->amount, 2, ',', '.') }}
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
</div>

