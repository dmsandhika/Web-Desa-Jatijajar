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
            
            <!-- Artikel Dropdown -->
            <div x-data="{ open: {{ request()->is('admin/artikel*') ? 'true' : 'false' }} }">
                <button @click="open = !open" class="flex items-center w-full px-6 py-2 mt-2 text-white  hover:bg-blue-700 focus:outline-none focus:bg-blue-700" :class="{'bg-blue-700': open || {{ request()->is('admin/artikel*') ? 'true' : 'false' }}}">
                    <i class="fas fa-align-left mr-3"></i> Artikel
                    <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-auto"></i>
                </button>
                <div x-show="open" class="mt-2  rounded-md shadow-lg">
                    <x-side-link href="/admin/artikel/daftar" :active="request()->is('admin/artikel/daftar')">
                        <i class="fas fa-newspaper mr-3"></i> Daftar Artikel
                    </x-side-link>
                    <x-side-link href="/admin/artikel/kategori" :active="request()->is('admin/artikel/kategori')">
                        <i class="fas fa-folder mr-3"></i> Kategori Artikel
                    </x-side-link>
                </div>
            </div>
            <!-- End of Artikel Dropdown -->

        </nav>
    </div>
    <div class="absolute bottom-0 p-6 w-full">
        <a href="/" class="text-white text-base font-semibold hover:text-gray-300">
            <i class="fas fa-sign-out-alt mr-3"></i> Logout
        </a>
    </div>
</aside>
