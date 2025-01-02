<div>
    <div class="items-center justify-between lg:flex">
        <h1 class="text-2xl font-semibold leading-7">{{ $investment->name }}</h1>
        <div class="mt-4 lg:mt-0">
            @if ($isFollowed)
                <x-button variant="destructive">
                    Minta untuk berhenti
                </x-button>
            @else
                <x-button wire:click="follow({{ $investment->id }})">
                    Ikuti program
                </x-button>
            @endif
        </div>
    </div>
    @if ($isFollowed)
        <div class="mt-4 lg:mt-6">
            <div class="grid gap-6 lg:grid-cols-3">
                <div class="w-full border divide-y divide-gray-200 rounded-lg">
                    <div class="p-4 bg-gray-100 rounded-t-lg">
                        <p class="text-lg font-semibold text-center">Nilai Investasi</p>
                    </div>
                    <p class="p-4 text-center">{{ 'Rp' . number_format(100, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="mt-4 lg:mt-6">
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
                                        Nama</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                        Jenis Transaksi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                                        Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                {{-- @forelse ($users as $item) --}}
                                <tr>
                                    <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                        27 Des</td>
                                    <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                        Thoriq Al Hakim</td>
                                    <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">Loyalty</td>
                                    <td class="px-6 py-2 text-sm text-gray-800 text-end whitespace-nowrap">
                                        Rp1.000.000,00</td>
                                </tr>
                                {{-- @empty
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-center text-gray-800 whitespace-nowrap"
                                        colspan="4">
                                        Pengguna tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse --}}
                            </tbody>
                        </table>
                    </x-table>
                </div>
            </div>
    @endif
</div>
</div>

