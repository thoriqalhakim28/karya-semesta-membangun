<div class="border divide-y divide-gray-200 rounded-lg">
    <div class="p-4 bg-gray-100 rounded-t-lg">
        <h3 class="font-medium">Investasi</h3>
        <p class="text-sm">Jenis investasi yang di ikuti oleh {{ $user->name }}</p>
    </div>
    <div class="grid gap-4 p-4 lg:grid-cols-2">
        @forelse ($user->investments as $item)
            <div class="p-4 border rounded-lg">
                <p class="font-semibold">{{ $item->name }}</p>
                <div class="flex justify-between mt-2">
                    <p class="text-sm font-medium">Nilai investasi</p>
                    <p class="text-sm">{{ 'Rp' . number_format($item->totalTransactionAmount(), 2, ',', '.') }}</p>
                </div>
            </div>
        @empty
            <p class="col-span-2 font-semibold text-center">Tidak ada jenis investasi</p>
        @endforelse
    </div>
</div>

