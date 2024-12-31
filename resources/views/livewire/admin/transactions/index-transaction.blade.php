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
            <div class="relative">
                <x-input type="search" placeholder="Cari pengguna..." class="lg:w-96" />
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
                                Jenis Transaksi</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @for ($i = 0; $i < 10; $i++)
                            <tr>
                                <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                    27 Desember 2024</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    Thoriq Al Hakim</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    Program - Loyalty
                                </td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ 'Rp' . number_format(1000000, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-2 text-sm font-medium whitespace-nowrap text-end">
                                    <x-link variant="ghost" :href="route('admin.transaction.edit', $i)" wire:navigate>
                                        <x-icons.edit class="w-5 h-5 text-green-600" />
                                    </x-link>
                                    <x-button variant="ghost">
                                        <x-icons.delete class="w-5 h-5 text-red-600" />
                                    </x-button>
                                </td>
                            </tr>
                        @endfor
                        {{-- @forelse ($users as $item)
                            <tr>
                                <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                    27 Desember 2024</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    Thoriq Al Hakim</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    Program - Loyalty
                                </td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ 'Rp' . number_format(1000000, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-2 text-sm font-medium whitespace-nowrap text-end">
                                    <x-link variant="ghost" :href="route('admin.transaction.show', $i)" wire:navigate>
                                        <x-icons.more class="w-5 h-5" />
                                    </x-link>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-center text-gray-800 whitespace-nowrap"
                                    colspan="4">
                                    Transaksi tidak ditemukan
                                </td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                </table>
            </x-table>
            {{-- <div class="mt-4 lg:mt-6">
                {{ $users->links('pagination::tailwind') }}
            </div> --}}
        </div>
    </div>
</div>

