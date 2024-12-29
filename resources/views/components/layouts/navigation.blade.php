<div class="sticky top-0 z-50 flex items-center justify-between h-16 px-4 lg:px-0">
    <a href="/">
        <x-logo class="w-auto mx-auto h-14" />
    </a>

    <div class="items-center justify-center flex-1 hidden space-x-1 list-none lg:flex group">
        <a href="/" class="px-3 py-2 text-sm font-medium rounded-md hover:bg-accent hover:text-accent-foreground">
            Beranda
        </a>
        <a href="/" class="px-3 py-2 text-sm font-medium rounded-md hover:bg-accent hover:text-accent-foreground">
            Tentang kami
        </a>
        <a href="/" class="px-3 py-2 text-sm font-medium rounded-md hover:bg-accent hover:text-accent-foreground">
            Kontak
        </a>
        <a href="/" class="px-3 py-2 text-sm font-medium rounded-md hover:bg-accent hover:text-accent-foreground">
            Blog
        </a>
    </div>

    @if (Route::has('login'))
        <div class="hidden lg:block">
            @auth
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-flex items-center px-3 text-sm font-medium rounded-md h-9 bg-primary text-primary-foreground hover:bg-primary/90">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('user.dashboard') }}"
                        class="inline-flex items-center px-3 text-sm font-medium rounded-md h-9 bg-primary text-primary-foreground hover:bg-primary/90">
                        Dashboard
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="inline-flex items-center px-3 text-sm font-medium rounded-md h-9 bg-primary text-primary-foreground hover:bg-primary/90">
                    Masuk
                </a>
            @endauth
        </div>
    @endif

    <div class="lg:hidden">
        Menu
    </div>
</div>

