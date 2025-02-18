<div class="w-full mt-12 space-y-6">
    <div class="flex items-center gap-x-6">
        <div class="flex items-center gap-x-3">
            <div
                class="inline-flex items-center justify-center rounded-lg size-8 {{ $currentStep >= 1 ? 'bg-blue-600' : 'bg-gray-100' }}">
                <span class="{{ $currentStep >= 1 ? 'text-white' : '' }}">1</span>
            </div>
            <p class="md:block hidden {{ $currentStep >= 1 ? 'font-medium' : '' }}">Detail pengguna</p>
        </div>
        <div class="flex items-center gap-x-3">
            <div
                class="inline-flex items-center justify-center rounded-lg size-8 {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-100' }}">
                <span class="{{ $currentStep >= 2 ? 'text-white' : '' }}">2</span>
            </div>
            <p class="md:block hidden {{ $currentStep >= 2 ? 'font-medium' : '' }}">Investasi dan Program</p>
        </div>
        <div class="flex items-center gap-x-3">
            <div
                class="inline-flex items-center justify-center rounded-lg size-8 {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-100' }}">
                <span class="{{ $currentStep >= 3 ? 'text-white' : '' }}">3</span>
            </div>
            <p class="md:block hidden {{ $currentStep >= 3 ? 'font-medium' : '' }}">Akses masuk</p>
        </div>
        <div class="flex items-center gap-x-3">
            <div
                class="inline-flex items-center justify-center rounded-lg size-8 {{ $currentStep >= 4 ? 'bg-blue-600' : 'bg-gray-100' }}">
                <span class="{{ $currentStep >= 4 ? 'text-white' : '' }}">4</span>
            </div>
            <p class="md:block hidden {{ $currentStep >= 4 ? 'font-medium' : '' }}">Selesai</p>
        </div>
    </div>
    <div class="w-full h-px bg-gray-200"></div>
    <form wire:submit.prevent="submit">
        @if ($currentStep == 1)
            <div class="space-y-4">
                <p>Step {{ $currentStep }}/{{ $totalSteps }}</p>
                <h1 class="text-xl font-semibold">Detail pengguna</h1>
                <div class="grid gap-3 lg:grid-cols-2">
                    <div>
                        <x-label for="name" value="Nama pengguna" />
                        <x-input wire:model="form.name" id="name" type="text" name="name"
                            autocomplete="name" />
                        @error('form.name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-label for="email" value="Email" />
                        <x-input wire:model="form.email" id="email" type="email" name="email"
                            autocomplete="email" />
                        @error('form.email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-label for="phone" value="Nomor telepon" />
                        <x-input wire:model="form.phone" id="phone" type="number" name="phone"
                            autocomplete="phone" />
                        @error('form.phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-label for="gender" value="Jenis kelamin" />
                        <x-select wire:model="form.gender" id="gender" name="gender" autocomplete="gender">
                            <option value="" selected>Pilih jenis kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </x-select>
                        @error('form.gender')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-button type="button" wire:click="nextStep">Selanjutnya</x-button>
                </div>
            </div>
        @endif
        @if ($currentStep == 2)
            <div class="space-y-4">
                <p>Step {{ $currentStep }}/{{ $totalSteps }}</p>
                <div class="grid gap-3 lg:grid-cols-2">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold">Investments</h2>
                        @foreach ($form->dataInvestments as $index => $investment)
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <x-label for="investment-{{ $index }}"
                                        value="Investment {{ $index + 1 }}" />
                                    <x-select wire:model.lazy="form.dataInvestments.{{ $index }}.investment"
                                        id="investment-{{ $index }}" name="investment">
                                        <option value="" selected>Pilih investment</option>
                                        @foreach ($investments as $inv)
                                            <option value="{{ $inv->id }}">{{ $inv->name }}</option>
                                        @endforeach
                                    </x-select>
                                    @error("form.dataInvestments.{$index}.investment")
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if (count($form->dataInvestments) > 1)
                                    <button type="button" wire:click="removeInvestmentRow({{ $index }})"
                                        class="self-end p-2 mb-1 text-gray-400 group"
                                        {{ count($form->dataInvestments) === 1 ? 'disabled' : '' }}>
                                        <x-icons.cancel class="w-5 h-5 group-hover:text-red-500" />
                                    </button>
                                @endif
                            </div>
                        @endforeach
                        <div class="flex justify-start">
                            <x-button type="button" variant="outline" wire:click="addInvestmentRow">
                                Tambah Investment
                            </x-button>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold">Programs</h2>
                        @foreach ($form->dataPrograms as $index => $program)
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <x-label for="program-{{ $index }}" value="Program {{ $index + 1 }}" />
                                    <x-select wire:model.lazy="form.dataPrograms.{{ $index }}.program"
                                        id="program-{{ $index }}" name="program">
                                        <option value="" selected>Pilih program</option>
                                        @foreach ($programs as $prog)
                                            <option value="{{ $prog->id }}">{{ $prog->name }}</option>
                                        @endforeach
                                    </x-select>
                                    @error("form.dataPrograms.{$index}.program")
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if (count($form->dataInvestments) > 1)
                                    <button type="button" wire:click="removeProgramRow({{ $index }})"
                                        class="self-end p-2 mb-1 text-gray-400 group"
                                        {{ count($form->dataPrograms) === 1 ? 'disabled' : '' }}>
                                        <x-icons.cancel class="w-5 h-5 group-hover:text-red-500" />
                                    </button>
                                @endif
                            </div>
                        @endforeach
                        <div class="flex justify-start">
                            <x-button type="button" variant="outline" wire:click="addProgramRow">
                                Tambah Program
                            </x-button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <x-button variant="outline" type="button" wire:click="previousStep">Sebelumnya</x-button>
                    <x-button type="button" wire:click="nextStep">Selanjutnya</x-button>
                </div>
            </div>
        @endif
        @if ($currentStep == 3)
            <div class="space-y-4">
                <p>Step {{ $currentStep }}/{{ $totalSteps }}</p>
                <h1 class="text-xl font-semibold">Akses pengguna</h1>
                <div class="grid gap-3 lg:grid-cols-2">
                    <div>
                        <x-label for="password" value="Kata sandi" />
                        <x-input wire:model.lazy="form.password" id="password" type="password" name="password" />
                        @error('form.password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-label for="password_confirmation" value="Konfirmasi kata sandi" />
                        <x-input wire:model.lazy="form.passwordConfirmation" id="password_confirmation"
                            type="password" name="password_confirmation" />
                        @error('form.passwordConfirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <x-button variant="outline" type="button" wire:click="previousStep">Sebelumnya</x-button>
                    <x-button type="button" wire:click="nextStep">Selanjutnya</x-button>
                </div>
            </div>
        @endif
        @if ($currentStep == 4)
            <div class="p-6 space-y-4 border border-gray-200 rounded-xl">
                <p>Step {{ $currentStep }}/{{ $totalSteps }}</p>
                <h1 class="text-xl font-semibold">Informasi pengguna</h1>
                <div class="grid gap-3 md:grid-cols-4">
                    <div>
                        <p class="text-base font-semibold">Nama lengkap</p>
                        <p>{{ $form->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold">Email</p>
                        <p>{{ $form->email ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold">Nomor telepon</p>
                        <p>{{ $form->phone ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold">Jenis kelamin</p>
                        <p>{{ $form->gender ?? '-' }}</p>
                    </div>
                </div>
                <div class="grid gap-3 md:grid-cols-2">
                    <div class="space-y-3">
                        <p class="text-base font-semibold">Investments</p>
                        <div class="grid gap-3 md:grid-cols-2">
                            @foreach ($investmentSelected as $item)
                                <div wire:key="investment-{{ $item->id }}"
                                    class="p-4 transition duration-300 ease-in-out border rounded-lg hover:shadow-md">
                                    <h2 class="text-base font-medium leading-7">{{ $item->name }}</h2>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-base font-semibold">Programs</p>
                        <div class="grid gap-3 md:grid-cols-2">
                            @forelse ($programSelected as $item)
                                <div wire:key="program-{{ $item->id }}"
                                    class="p-4 transition duration-300 ease-in-out border rounded-lg hover:shadow-md">
                                    <h2 class="font-medium leading-7">{{ $item->name }}</h2>
                                    <p class="text-sm text-gray-600">{{ $item->description }}</p>
                                    <div class="mt-4 space-y-1">
                                        <div class="inline-flex items-center justify-between w-full">
                                            <p class="text-sm font-medium">Target/orang</p>
                                            <p class="text-sm">{{ $item->target }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 text-center">
                                    <p class="text-sm font-medium text-gray-800">Tidak ada program</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <x-button variant="outline" type="button" wire:click="previousStep">Sebelumnya</x-button>
                    <x-button type="submit">Simpan</x-button>
                </div>
            </div>
        @endif
    </form>
</div>
