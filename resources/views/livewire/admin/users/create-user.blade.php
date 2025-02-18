<div>
    <h1 class="text-2xl font-semibold leading-7">Tambah Pengguna</h1>
    <p class="text-sm font-medium text-gray-600">
        Masukan informasi pengguna baru.
    </p>
    {{-- multi step form --}}
    <x-includes.users.multi-step-form :currentStep="$currentStep" :totalSteps="$totalSteps" :form="$form" :investments="$investments"
        :programs="$programs" :investmentSelected="$investmentSelected" :programSelected="$programSelected" />
</div>

