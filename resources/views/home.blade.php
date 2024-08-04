<x-layout>
    <section class="bg-yellow-300 text-white py-6 rounded-lg mb-2">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-extrabold">
                Selamat Datang di Website Desa Jatijajar
            </h1>
            <p class="text-lg mt-4">
                Informasi Terkini dan Layanan Terbaik untuk Warga Desa
            </p>
        </div>
    </section>

    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img
                src="img/carousel/desa.jpg"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                alt="Danau"
                />
                <div
                    class="absolute bottom-0 left-0 p-4  text-white bg-gray-800 bg-opacity-50 rounded-sm"
                >
                    <div>
                        <h2 class="text-4xl font-bold">
                            Desa Jatijajar
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img
                    src="img/carousel/wayang.jpg"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="Wayang"
                />
                <div
                    class="absolute bottom-0 left-0 p-4  text-white bg-gray-800 bg-opacity-50 rounded-sm"
                >
                    <div>
                        <h2 class="text-4xl font-bold">
                            Kirab Budaya Tahunan
                        </h2>
                    </div>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img
                    src="img/carousel/patung.jpg"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="Kuda"
                />
                <div
                    class="absolute bottom-0 left-0 p-4  text-white bg-gray-800 bg-opacity-50 rounded-sm"
                >
                    <div>
                        <h2 class="text-4xl font-bold">
                            Monumen Patung Punakawan
                        </h2>
                    </div>
                </div>
            </div>
            <!-- Item 4 -->
            
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img
                    src="img/carousel/alun-alun.jpg"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="Alun Alun"
                />
                <div
                    class="absolute bottom-0 left-0 p-4  text-white bg-gray-800 bg-opacity-50 rounded-sm"
                >
                    <div>
                        <h2 class="text-4xl font-bold">
                            Alun-Alun Mini Desa Jatijajar
                        </h2>
                    </div>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img
                    src="img/carousel/lapangan.jpg"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="Danau"
                />
                <div
                    class="absolute bottom-0 left-0 p-4  text-white bg-gray-800 bg-opacity-50 rounded-sm"
                >
                    <div>
                        <h2 class="text-4xl font-bold">
                            Lapangan Desa Jatijajar
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider indicators -->
        <div
            class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse"
        >
            <button
                type="button"
                class="w-3 h-3 rounded-full"
                aria-current="true"
                aria-label="Slide 1"
                data-carousel-slide-to="0"
            ></button>
            <button
                type="button"
                class="w-3 h-3 rounded-full"
                aria-current="false"
                aria-label="Slide 2"
                data-carousel-slide-to="1"
            ></button>
            <button
                type="button"
                class="w-3 h-3 rounded-full"
                aria-current="false"
                aria-label="Slide 3"
                data-carousel-slide-to="2"
            ></button>
            <button
                type="button"
                class="w-3 h-3 rounded-full"
                aria-current="false"
                aria-label="Slide 4"
                data-carousel-slide-to="3"
            ></button>
            <button
                type="button"
                class="w-3 h-3 rounded-full"
                aria-current="false"
                aria-label="Slide 5"
                data-carousel-slide-to="4"
            ></button>
        </div>
        <!-- Slider controls -->
        <button
            type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev
        >
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
            >
                <svg
                    class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 6 10"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 1 1 5l4 4"
                    />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button
            type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next
        >
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
            >
                <svg
                    class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 6 10"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 9 4-4-4-4"
                    />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div
    class="grid grid-cols-2 place-items-center md:grid-cols-4 gap-4 mt-12 border-b-4 pb-10"
>
    <!-- Item 1 -->
    <a
        href="/profil"
        class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-32 h-24 md:w-44 md:h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md"
    >
        <svg
            viewBox="0 0 200 200"
            xmlns="http://www.w3.org/2000/svg"
            class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105"
        >
            <rect x="25" y="50" width="150" height="100" />
        </svg>

        <div class="z-20 flex flex-col justify-center items-center">
            <p class="font-bold text-white text-sm md:text-base">Profil Desa</p>
        </div>
    </a>

    <!-- Item 2 -->
    <a
        href="/struktur"
        class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-32 h-24 md:w-44 md:h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md"
    >
        <svg
            viewBox="0 0 200 200"
            xmlns="http://www.w3.org/2000/svg"
            class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105"
        >
            <rect x="25" y="50" width="150" height="100" />
        </svg>

        <div class="z-20 flex flex-col justify-center items-center">
            <p class="font-bold text-center text-white text-sm md:text-base">
                Pemerintahan
                <br />
                Desa
            </p>
        </div>
    </a>

    <!-- Item 3 -->
    <a
        href="/article"
        class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-32 h-24 md:w-44 md:h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md"
    >
        <svg
            viewBox="0 0 200 200"
            xmlns="http://www.w3.org/2000/svg"
            class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105"
        >
            <rect x="25" y="50" width="150" height="100" />
        </svg>

        <div class="z-20 flex flex-col justify-center items-center">
            <p class="font-bold text-white text-sm md:text-base">Galeri Kegiatan</p>
        </div>
    </a>

    <!-- Item 4 -->
    <a
        href="/surat"
        class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-32 h-24 md:w-44 md:h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md"
    >
        <svg
            viewBox="0 0 200 200"
            xmlns="http://www.w3.org/2000/svg"
            class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105"
        >
            <rect x="25" y="50" width="150" height="100" />
        </svg>

        <div class="z-20 flex flex-col justify-center items-center">
            <p class="font-bold text-white text-sm md:text-base">Layanan Desa</p>
        </div>
    </a>
</div>


    <div class="flex flex-col md:flex-row gap-6 mt-12">
        <!-- Left Column for Digitalisasi Info (Wider - 3 parts) -->
        <div class="flex-1 bg-gray-100 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Manfaat Digitalisasi Administrasi Desa</h2>
            <p class="text-base text-justify">
                Digitalisasi administrasi desa menawarkan berbagai manfaat signifikan bagi pengelolaan pemerintahan lokal. Pertama, digitalisasi mempermudah akses dan pengelolaan data administratif. Dengan sistem digital, data seperti dokumen kependudukan, laporan keuangan, dan catatan kegiatan dapat diakses dan dikelola dengan lebih efisien. Hal ini tidak hanya mengurangi beban kerja administratif tetapi juga meningkatkan akurasi data serta mengurangi kemungkinan kehilangan atau kerusakan dokumen fisik. </p>
            <p class="text-base mt-5 text-justify">
                Kedua, digitalisasi mendukung transparansi dan akuntabilitas dalam administrasi desa. Dengan sistem digital, setiap transaksi dan perubahan data dapat dicatat dan dilacak dengan mudah, sehingga meminimalkan kemungkinan penyalahgunaan wewenang atau kecurangan. Selain itu, digitalisasi memungkinkan masyarakat untuk lebih aktif terlibat dan memantau proses administrasi, yang pada gilirannya dapat meningkatkan kepercayaan dan partisipasi warga dalam kegiatan pemerintahan desa. </p>
        </div>

        <!-- Right Column for Artikel Terbaru (Narrower - 2 parts) -->
        <div class="flex-1 min-w-0">
            <h1 class="text-3xl font-bold  mb-6">
                Artikel Terbaru
            </h1>

            <div class="flex flex-col gap-6">
                @foreach ($articles as $art)
                    <div
                        class="flex flex-col gap-2  bg-white cursor-pointer  p-5 rounded-md shadow-md hover:scale-105 hover:duration-150 duration-150"
                        onclick="window.location.href='/article/{{ $art["slug"] }}'"
                    >
                        <div class="flex flex-row justify-between w-full">
                            <p class="text-xs">{{ $art["author"] }}</p>
                            <p class="text-xs">
                                {{ $art->created_at->translatedFormat("j F Y") }}
                            </p>
                        </div>
                        <div class="flex flex-row justify-between w-full">
                            <h3 class="text-xl font-bold">{{ $art["title"] }}</h3>
                        </div>

                        <div class="text-sm">
                            {{ Str::limit($art["content"], 100) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
