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
            <p class="text-sm font-medium text-gray-600">Tanggal lahir</p>
            <p class="font-semibold">{{ $user->detail->birth_date ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Tempat lahir</p>
            <p class="font-semibold">{{ $user->detail->birth_place ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Jenis kelamin</p>
            <p class="font-semibold">{{ $user->detail->gender ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Status pernikahan</p>
            <p class="font-semibold">{{ $user->detail->is_married ? 'Menikah' : 'Belum menikah' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Pendidikan terakhir</p>
            <p class="font-semibold">{{ $user->detail->last_education ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Jurusan</p>
            <p class="font-semibold">{{ $user->detail->major ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Pekerjaan</p>
            <p class="font-semibold">{{ $user->detail->job ?? '-' }}</p>
        </div>
    </div>
</div>

