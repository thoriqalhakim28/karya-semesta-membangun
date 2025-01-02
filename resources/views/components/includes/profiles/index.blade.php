<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-600">Nama lengkap</p>
            <p class="font-semibold">{{ $user->name }}</p>
        </div>
        <x-button variant="outline" class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>
    </div>
</div>
