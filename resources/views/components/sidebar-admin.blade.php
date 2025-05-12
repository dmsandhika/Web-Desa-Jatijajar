<aside
    class="relative flex flex-col justify-between hidden w-64 h-screen shadow-xl bg-sidebar sm:block"
>
    <div>
        <div class="p-6">
            <a
                href="/admin"
                class="text-3xl font-semibold text-white uppercase hover:text-gray-300"
            >
                Admin
            </a>
        </div>
        <nav class="pt-3 text-base font-semibold text-white">
            <x-side-link href="/admin" :active="request()->is('admin')">
                <i class="mr-3 fas fa-tachometer-alt"></i>
                Dashboard
            </x-side-link>
            <x-side-link
                href="/admin/data"
                :active="request()->is('admin/data/*')"
            >
                <i class="mr-3 fas fa-tachometer-alt"></i>
                Data Desa
            </x-side-link>
            <div
                x-data="{
                    open: {{ request()->is("admin/surat*") ? "true" : "false" }},
                }"
            >
                <button
                    @click="open = !open"
                    class="flex items-center w-full px-6 py-2 mt-2 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700"
                    :class="{'bg-blue-700': open || {{ request()->is("admin/surat*") ? "true" : "false" }}}"
                >
                    <i class="mr-3 fas fa-sticky-note"></i>
                    Surat
                    <i
                        :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                        class="ml-auto"
                    ></i>
                </button>
                <div x-show="open" class="mt-2 rounded-md shadow-lg">
                    <x-side-link
                        href="/admin/surat"
                        :active="request()->is('admin/surat')"
                    >
                        <i class="mr-3 fas fa-newspaper"></i>
                        Data Surat
                    </x-side-link>
                    <x-side-link
                        href="/admin/surat/config"
                        :active="request()->is('admin/surat/config')"
                    >
                        <i class="mr-3 fas fa-folder"></i>
                        Konfigurasi Surat
                    </x-side-link>
                </div>
            </div>
            <x-side-link
                href="/admin/struktur"
                :active="request()->is('admin/struktur')"
            >
                <i class="mr-3 fas fa-table"></i>
                Struktur
            </x-side-link>

            <!-- Artikel Dropdown -->
            <div
                x-data="{
                    open: {{ request()->is("admin/artikel*") ? "true" : "false" }},
                }"
            >
                <button
                    @click="open = !open"
                    class="flex items-center w-full px-6 py-2 mt-2 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700"
                    :class="{'bg-blue-700': open || {{ request()->is("admin/artikel*") ? "true" : "false" }}}"
                >
                    <i class="mr-3 fas fa-align-left"></i>
                    Artikel
                    <i
                        :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                        class="ml-auto"
                    ></i>
                </button>
                <div x-show="open" class="mt-2 rounded-md shadow-lg">
                    <x-side-link
                        href="{{ route('admin.article') }}"
                        :active="request()->is('admin/artikel/daftar')"
                    >
                        <i class="mr-3 fas fa-newspaper"></i>
                        Daftar Artikel
                    </x-side-link>
                    <x-side-link
                        href="/admin/artikel/kategori"
                        :active="request()->is('admin/artikel/kategori')"
                    >
                        <i class="mr-3 fas fa-folder"></i>
                        Kategori Artikel
                    </x-side-link>
                </div>
            </div>
            <div class="mt-2 rounded-md">
                <x-side-link
                    href="/admin/feedback"
                    :active="request()->is('admin/feedback')"
                >
                    <i class="mr-3 fas fa-comments"></i>
                    Kritik dan Saran
                </x-side-link>
            </div>
            <!-- End of Artikel Dropdown -->
        </nav>
    </div>
    <div class="absolute bottom-0 w-full">
        <div class="p-3 mb-4 hover:bg-blue-700">
            <a href="/">
                <button
                    class="text-base font-semibold text-white hover:text-gray-300"
                >
                    <i class="mr-3 fas fa-home"></i>
                    Home
                </button>
            </a>
        </div>
        <div class="p-3 hover:bg-blue-700">
            <form action="/logout" method="POST">
                @csrf
                <button
                    class="text-base font-semibold text-white hover:text-gray-300"
                >
                    <i class="mr-3 fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
