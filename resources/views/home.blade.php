<x-layout>
    <section class="bg-yellow-300 text-white py-6 rounded-lg mb-2">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-extrabold">Selamat Datang di Website Desa Jatijajar</h1>
            <p class="text-lg mt-4">Informasi Terkini dan Layanan Terbaik untuk Warga Desa</p>
        </div>
    </section>

    <div id="default-carousel" class="relative w-full" data-carousel="slide">
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="img/carousel/kuda.jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Kuda">
            <div class="absolute w-full text-center text-white flex justify-center items-center h-full">
                <div>
                    <h2 class="text-4xl font-bold">Kuda di Padang Rumput</h2>
                    <p class="text-xl">Kuda sedang menikmati waktu di padang rumput.</p>
                </div>
            </div>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="img/carousel/lake.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Danau">
            <div class="absolute w-full text-center text-white flex justify-center items-center h-full">
                <div>
                    <h2 class="text-4xl font-bold">Pemandangan Danau</h2>
                    <p class="text-xl">Pemandangan indah danau saat matahari terbenam.</p>
                </div>
            </div>
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="img/carousel/kuda.jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Kuda">
            <div class="absolute w-full text-center text-white flex justify-center items-center h-full">
                <div>
                    <h2 class="text-4xl font-bold">Kuda Berlari</h2>
                    <p class="text-xl">Kuda berlari dengan bebas di alam terbuka.</p>
                </div>
            </div>
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="img/carousel/lake.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Danau">
            <div class="absolute w-full text-center text-white flex justify-center items-center h-full">
                <div>
                    <h2 class="text-4xl font-bold">Danau Tenang</h2>
                    <p class="text-xl">Danau yang tenang di pagi hari.</p>
                </div>
            </div>
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="img/carousel/kuda.jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Kuda">
            <div class="absolute w-full text-center text-white flex justify-center items-center h-full">
                <div>
                    <h2 class="text-4xl font-bold">Kuda di Senja</h2>
                    <p class="text-xl">Kuda menikmati senja di padang rumput.</p>
                </div>
            </div>
        </div>
    
    
      </div>
      <!-- Slider indicators -->
      <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
          <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
      </div>
      <!-- Slider controls -->
      <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
              </svg>
              <span class="sr-only">Previous</span>
          </span>
      </button>
      <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="sr-only">Next</span>
          </span>
      </button>
    </div>
    
    
    <div class="grid grid-cols-2 place-items-center md:grid-cols-4 gap-4 mt-12 border-b-4 pb-10">
      <!-- Item 1 -->
      <a href="/profil" class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-44 h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105">
            <rect x="25" y="50" width="150" height="100" />
        </svg>
        
          <div class="z-20 flex flex-col justify-center items-center">
              
              <p class="font-bold text-white">Profil Desa</p>
          </div>
        </a>
        <a href="/struktur" class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-44 h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105">
                <rect x="25" y="50" width="150" height="100" />
            </svg>
            
          <div class="z-20 flex flex-col justify-center items-center">
              
              <p class="font-bold text-center  text-white">Pemerintahan <br> Desa</p>
          </div>
        </a>
  
        
        
        <a href="/article" class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-44 h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105">
                <rect x="25" y="50" width="150" height="100" />
            </svg>
            
          <div class="z-20 flex flex-col justify-center items-center">
            
            <p class="font-bold text-white">Galeri Kegiatan</p>
          </div>
        </a>
        <a href="/surat" class="hover:-translate-y-2 group bg-neutral-50 duration-500 w-44 h-32 flex text-neutral-600 flex-col justify-center items-center relative rounded-xl overflow-hidden shadow-md">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="absolute blur z-10 fill-yellow-300 duration-500 group-hover:blur-none group-hover:scale-105">
                <rect x="25" y="50" width="150" height="100" />
            </svg>
            
            <div class="z-20 flex flex-col justify-center items-center">
                <p class="font-bold text-white">Layanan Desa</p>
            </div>
        </a>
    </div>

    <div>

        
<h1 class="flex items-center text-3xl mt-6 font-bold dark:text-white">Artikel Terbaru</h1>

        @foreach ( $articles as $art)
        <div
            class="flex flex-col gap-2 dark:text-white max-w-md w-full bg-white cursor-pointer dark:bg-neutral-900 p-5 rounded-md mt-8 shadow-md hover:scale-105 hover:duration-150 duration-150"
            onclick="window.location.href='/article/{{ $art['slug'] }}'"
            >
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-row justify-between w-full">
                <p class="text-xs">{{ $art['author'] }}</p>
                <p class="text-xs">{{ $art->created_at->translatedFormat('j F Y')}}</p>
                </div>
            </div>
            <div class="flex flex-row justify-between w-full">
                <h3 class="text-xl font-bold">{{ $art['title'] }}</h3>

            
            </div>

            <div class="text-sm">
                {{ Str::limit($art['content'], 100) }}
            </div>
        </div>
        @endforeach
    </div>
    </x-layout>

