<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl flex flex-col justify-between">
    <div>
        <div class="p-6">
            <a href="/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <x-side-link href="/admin" :active="request()->is('admin')">
                <i class="fas fa-tachometer-alt mr-3"></i> Admin
            </x-side-link>
            <x-side-link href="/admin/surat" :active="request()->is('admin/surat')">
                <i class="fas fa-sticky-note mr-3"></i> Surat
            </x-side-link>
            <x-side-link href="/admin/struktur" :active="request()->is('admin/struktur')">
                <i class="fas fa-table mr-3"></i> Struktur
            </x-side-link>
            <x-side-link href="/admin/artikel" :active="request()->is('admin/artikel')">
                <i class="fas fa-align-left mr-3"></i> Artikel
            </x-side-link>
        </nav>
    </div>
    <div class="absolute bottom-0 p-6 w-full">
        <a href="/" class="text-white text-base font-semibold hover:text-gray-300">
            <i class="fas fa-sign-out-alt mr-3"></i> Logout
        </a>
    </div>
</aside>
