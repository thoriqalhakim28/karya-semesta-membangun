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
            <p class="text-sm font-medium text-gray-600">Nomor telepon</p>
            <p class="font-semibold">{{ $user->contact->phone_number ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Email</p>
            <p class="font-semibold">{{ $user->email ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Rekening Mandiri</p>
            <p class="font-semibold">{{ $user->contact->mandiri_account_number ?? '-' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Rekening BTN</p>
            <p class="font-semibold">{{ $user->contact->btn_account_number ?? '-' }}</p>
        </div>
    </div>
</div>

