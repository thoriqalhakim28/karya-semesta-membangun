<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-start justify-between">
        <h3 class="text-lg font-semibold">Informasi pribadi</h3>
        <x-button variant="outline" class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>
    </div>
    <div class="grid gap-4 mt-2 lg:mt-4 lg:grid-cols-2">
        <div class="col-span-2">
            <p class="text-sm font-medium text-gray-600">Tipe alamat</p>
            <p class="font-semibold">{{ $user->address->type ?? '-' }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-sm font-medium text-gray-600">Alamat</p>
            <p class="font-semibold">{{ $user->address->address ?? '-' }}</p>
        </div>
    </div>
</div>

