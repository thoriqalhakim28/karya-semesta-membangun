<div class="border divide-y divide-gray-200 rounded-lg">
    <div class="p-4 bg-gray-100 rounded-t-lg">
        <h3 class="font-medium">Program</h3>
        <p class="text-sm">Program yang di ikuti oleh {{ $user->name }}</p>
    </div>
    <div class="grid gap-4 p-4 lg:grid-cols-2">
        @forelse ($user->programs as $item)
            <div class="p-4 border rounded-lg">
                <p class="font-semibold">{{ $item->name }}</p>
                <p class="text-sm">{{ $item->description }}</p>
                <div class="flex justify-between mt-2">
                    <p class="text-sm font-medium">Target</p>
                    <p class="text-sm">{{ $item->target }}</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm font-medium">Terkumpul</p>
                    <p class="text-sm">Rp1.000.000.000</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm font-medium">Keterangan</p>
                    <p class="text-sm">Rp1.000.000.000</p>
                </div>
            </div>
        @empty
            <p class="col-span-2 font-semibold text-center">Tidak ada program</p>
        @endforelse

    </div>
</div>

