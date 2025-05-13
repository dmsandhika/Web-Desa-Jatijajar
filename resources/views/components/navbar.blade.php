<nav class="bg-yellow-300" x-data="{ isOpen: false }">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a href="/">

              <img class="w-10 h-10" src="{{ asset('logo.jpg') }}" alt="Desa Jatijajar">
            </a>
          </div>
          <div class="hidden md:block">
            <div class="flex items-baseline ml-10 space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <x-nav-link href="/profil" :active="request()-> is('profil')">Profil</x-nav-link>
              <x-nav-link href="/struktur" :active="request()-> is('struktur')">Struktur</x-nav-link>
              <x-nav-link href="/article" :active="request()-> is('article')">Artikel</x-nav-link>
              <x-nav-link href="/surat" :active="request()-> is('surat*')">Layanan</x-nav-link>
              <x-nav-link href="/kontak" :active="request()-> is('kontak')">Kontak</x-nav-link>
              
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="flex items-center ml-4 md:ml-6">

            <!-- Profile dropdown -->
            <div class="relative ml-3">
                <div>
                  @if(auth()->check())
                    <a href="/admin" class="flex items-center cursor-pointer transition-all bg-yellow-500 text-white px-6 py-2 rounded-lg
                                  border-yellow-600
                                  border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                                  active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
                      <span>
                        Dashboard
                      </span>
                    </a>
                  
                    @else
                    <a href="/login" class="flex items-center cursor-pointer transition-all bg-yellow-500 text-white px-6 py-2 rounded-lg
                    border-yellow-600
                    border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                    active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
                    <span>
                      Admin
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                  </a>
                    @endif
                  </div>
                  

         
              
            </div>
          </div>
        </div>
        <div class="flex -mr-2 md:hidden">
          <!-- Mobile menu button -->
          <button type="button"  @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center p-2 text-white bg-yellow-400 rounded-md hover:bg-yellow-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-yellow-600" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg  :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <x-nav-link-mob href="/profil" :active="request()-> is('profil')">Profil</x-nav-link-mob>
        <x-nav-link-mob href="/struktur" :active="request()-> is('struktur')">Struktur</x-nav-link-mob>
        <x-nav-link-mob href="/article" :active="request()-> is('article')">Artikel</x-nav-link-mob>
        <x-nav-link-mob href="/surat" :active="request()-> is('surat*')">Layanan</x-nav-link-mob>
        <x-nav-link-mob href="/kontak" :active="request()-> is('kontak')">Kontak</x-nav-link-mob>
      </div>
      <div class="pt-4 pb-3 border-t border-yellow-700">
        <div class="flex items-center w-full px-5">
            <div class="w-full">
              @if (auth()->check())  
              <a href="/" class="flex items-center justify-center w-full cursor-pointer transition-all bg-yellow-500 text-white px-6 py-2 rounded-lg
                                border-yellow-600
                                border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                                active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
                <span class="text-center">Dashboard</span>
              </a>
              @else  
              <a href="/login" class="flex items-center justify-center w-full cursor-pointer transition-all bg-yellow-500 text-white px-6 py-2 rounded-lg
                                border-yellow-600
                                border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                                active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
                <span class="text-center">Admin</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
              </a>
              @endif
            </div>
          </div>
          
    </div>
  </nav>