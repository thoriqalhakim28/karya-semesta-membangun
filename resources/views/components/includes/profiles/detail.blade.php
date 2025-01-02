<div class="p-4 border rounded-lg lg:p-6">
    <div class="flex items-start justify-between">
        <h3 class="text-lg font-semibold">Informasi pribadi</h3>
        <x-button variant="outline" x-data="" x-on:click="$dispatch('open-modal', 'edit-detail')"
            class="group hover:bg-green-100/50 hover:text-green-600 hover:border-green-600">
            <x-icons.edit class="w-5 h-5 text-accent-foreground group-hover:text-green-600" />
            Edit
        </x-button>
    </div>
    <div class="grid gap-4 mt-2 lg:mt-4 lg:grid-cols-2">
        <div>
            <p class="text-sm font-medium text-gray-600">Tanggal lahir</p>
            <p class="font-semibold">
                {{ Carbon\Carbon::parse($user->detail->birth_date)->locale('id')->translatedFormat('d F Y') ?? '-' }}
            </p>
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

<x-modal name="edit-detail" focusable>
    <h3 class="text-lg font-semibold">Edit Detail</h3>
    <div class="mt-6">
        <form wire:submit.prevent="submitDetail">
            <div>
                <x-label for="birth_place" :value="__('Tempat lahir')" />
                <x-input wire:model.lazy="detail.birthPlace" id="birth_place" name="birth_place" type="text" />
                @error('detail.birthPlace')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="birth_date" :value="__('Tanggal lahir')" />
                <x-input wire:model.lazy="detail.birthDate" id="birth_date" name="birth_date" type="date" />
                @error('detail.birthDate')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="gander" :value="__('Jenis kelamin')" />
                <x-select wire:model.lazy="detail.gender" id="gender" name="gender">
                    <option value="" selected>Pilih jenis kelamin</option>
                    <option value="laki-laki" selected>Laki-laki</option>
                    <option value="perempuan" selected>Perempuan</option>
                </x-select>
                @error('detail.gender')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="is_married" :value="__('Status Pernikahan')" />
                <x-select wire:model.lazy="detail.isMarried" id="is_married" name="is_married">
                    <option value="" selected>Pilih status pernikahan</option>
                    <option value="1" selected>Menikah</option>
                    <option value="0" selected>Belum menikah</option>
                </x-select>
                @error('detail.isMarried')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="last_education" :value="__('Pendidikan terakhir')" />
                <x-input wire:model.lazy="detail.lastEducation" id="last_education" name="last_education"
                    type="text" />
                @error('detail.lastEducation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="major" :value="__('Jurusan')" />
                <x-input wire:model.lazy="detail.major" id="major" name="major" type="text" />
                @error('detail.major')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="job" :value="__('Pekerjaan')" />
                <x-input wire:model.lazy="detail.job" id="job" name="job" type="text" />
                @error('detail.job')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end mt-4">
                <x-button class="w-full" type="submit">
                    Simpan
                </x-button>
            </div>
        </form>
    </div>
</x-modal>

