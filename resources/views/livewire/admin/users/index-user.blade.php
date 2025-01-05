<div>
    <div class="items-center justify-between lg:flex">
        <div>
            <h1 class="text-2xl font-semibold leading-7">Pengguna</h1>
            <p class="text-sm font-medium text-gray-600">
                Daftar anggota komunitas anda.
            </p>
        </div>
        <x-link variant="button" :href="route('admin.user.create')" class="mt-4 lg:mt-0">
            Tambah Pengguna
        </x-link>
    </div>
    <div class="p-4 mt-6 border rounded-lg lg:p-6">
        <div class="items-center justify-between lg:flex">
            <div class="relative">
                <x-input wire:model.live.debounce.300ms="search" type="search" placeholder="Cari pengguna..."
                    class="lg:w-96" />
            </div>
        </div>
        <div class="mt-4 lg:mt-6">
            <x-table>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Nama</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Email</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Nomor Telepon</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($users as $item)
                            <tr>
                                <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                    {{ $item->name }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ $item->email }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ $item->contact->phone_number ?? '-' }}</td>
                                <td class="px-6 py-2 text-sm font-medium whitespace-nowrap text-end">
                                    <x-link variant="ghost" :href="route('admin.user.show', $item->id)" wire:navigate>
                                        <x-icons.more class="w-5 h-5" />
                                    </x-link>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-center text-gray-800 whitespace-nowrap"
                                    colspan="4">
                                    Pengguna tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </x-table>
            <div class="mt-4 lg:mt-6">
                {{ $users->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>

