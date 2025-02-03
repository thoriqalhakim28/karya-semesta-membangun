<div class="space-y-4">
    <div class="space-y-2">
        <h2 class="font-semibold">Informasi Pribadi</h2>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Tempat lahir</p>
            <p class="text-sm">{{ $user->detail->birth_place ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Tanggal lahir</p>
            <p class="text-sm">{{ $user->detail->birth_date ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Jenis kelamin</p>
            <p class="text-sm capitalize">{{ $user->detail->gender ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Status pernikahan</p>
            <p class="text-sm">{{ $user->detail->is_married ?? '-' ? 'Menikah' : 'Belum menikah' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Pendidikan terakhir</p>
            <p class="text-sm uppercase">{{ $user->detail->last_education ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Jurusan</p>
            <p class="text-sm capitalize">{{ $user->detail->major ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Pekerjaan</p>
            <p class="text-sm capitalize">{{ $user->detail->job ?? '-' }}</p>
        </div>
    </div>
    <div class="space-y-2">
        <h2 class="font-semibold">Informasi Kontak</h2>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Email</p>
            <p class="text-sm">{{ $user->email ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Nomor telepon</p>
            <p class="text-sm">{{ $user->contact->phone_number ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Rekening Mandiri</p>
            <p class="text-sm">{{ $user->contact->mandiri_account_number ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Rekening BTN</p>
            <p class="text-sm">{{ $user->contact->btn_account_number ?? '-' }}</p>
        </div>
    </div>
    <div class="space-y-2">
        <h2 class="font-semibold">Informasi Alamat</h2>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Tipe</p>
            <p class="text-sm uppercase">{{ $user->address->type ?? '-' }}</p>
        </div>
        <div class="flex items-start">
            <p class="flex-initial w-1/2 text-sm font-medium">Alamat</p>
            <p class="w-1/2 text-sm">{{ $user->address->address ?? '-' }}</p>
        </div>
    </div>
    <div class="space-y-2">
        <h2 class="font-semibold">Informasi Keluarga</h2>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Nama ayah</p>
            <p class="text-sm">{{ $user->family->father_name ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Nama ibu</p>
            <p class="text-sm">{{ $user->family->mother_name ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Status keluarga</p>
            <p class="text-sm capitalize">{{ $user->family->family_status ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Jumlah anak</p>
            <p class="text-sm">{{ $user->family->number_of_children ?? '-' }}</p>
        </div>
        <div class="flex items-center">
            <p class="flex-initial w-1/2 text-sm font-medium">Kepemilikan hunian</p>
            <p class="text-sm capitalize">{{ $user->family->residential_ownership ?? '-' }}</p>
        </div>
    </div>
</div>

