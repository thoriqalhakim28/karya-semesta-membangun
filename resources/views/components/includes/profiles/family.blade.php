<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-start justify-between">
        <h3 class="text-lg font-semibold">Informasi pribadi</h3>
        <x-button variant="outline" class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>
    </div>
    <div class="grid gap-4 mt-2 lg:mt-4 lg:grid-cols-2">
        <div>
            <p class="text-sm font-medium text-gray-600">Nama ayah</p>
            <p class="font-semibold">{{ $user->family->father_name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Nama ibu</p>
            <p class="font-semibold">{{ $user->family->mother_name ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Status keluarga</p>
            <p class="font-semibold">{{ $user->family->family_status ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Jumlah anak</p>
            <p class="font-semibold">{{ $user->family->number_of_children ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Kepemilikan hunian</p>
            <p class="font-semibold">{{ $user->family->residential_ownership ?? '-' }}</p>
        </div>
    </div>
</div>

