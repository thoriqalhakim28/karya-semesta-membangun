<div>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold leading-7">Blog</h1>
            <p class="text-sm font-medium text-gray-600">
                Daftar blog yang telah di buat komunitas anda.
            </p>
        </div>
        <x-link variant="button" :href="route('admin.blog.create')" class="mt-4 lg:mt-0">
            Posting blog
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
                                Judul</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Kategori</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                                Status</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($blogs as $item)
                            <tr>
                                <td class="px-6 py-2 text-sm font-medium text-gray-800 whitespace-nowrap">
                                    {{ $item->title }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    {{ $item->category }}</td>
                                <td class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center h-6 px-3 text-xs font-medium  border rounded-md capitalize {{ $item->status == 'published' ? 'bg-blue-100 text-blue-800 border-blue-800' : 'bg-green-100 text-green-800 border-green-800' }}">{{ $item->status }}</span>
                                </td>
                                <td class="px-6 py-2 text-sm font-medium whitespace-nowrap text-end">
                                    <x-link variant="ghost" :href="route('admin.blog.show', $item->slug)" wire:navigate>
                                        <x-icons.more class="w-5 h-5" />
                                    </x-link>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-center text-gray-800 whitespace-nowrap"
                                    colspan="4">
                                    Blog tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </x-table>
            <div class="mt-4 lg:mt-6">
                {{ $blogs->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>

