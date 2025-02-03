<x-user-layout>
    @section('profile')
        <h1 class="text-2xl font-semibold leading-7">Pengaturan</h1>
        <p class="text-sm font-medium text-gray-600">
            Halaman untuk mengubah pengaturan akun anda.
        </p>
        <div class="mt-4 lg:flex lg:mt-6">
            <div class="bg-white lg:w-[20%] lg:mr-6">
                <x-layouts.profile-navigation />
            </div>
            <div class="w-full lg:w-[80%] lg:border-l lg:mt-0 mt-4 lg:pl-6">
                <div class="">
                    @isset($slot)
                        {{ $slot }}
                    @endisset

                    @yield('profile')
                </div>
            </div>
        </div>
    @endsection
</x-user-layout>

