<div>
    <h1 class="text-2xl font-semibold leading-7">Profile</h1>
    <div class="mt-4 space-y-4 lg:mt-6 lg:space-y-6">
        <x-includes.profiles.index :user="$user" />
        <x-includes.profiles.detail :user="$user" />
        <x-includes.profiles.contact :user="$user" />
        <x-includes.profiles.address :user="$user" />
        <x-includes.profiles.family :user="$user" />
    </div>
</div>

