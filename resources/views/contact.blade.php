<x-layout>
  <x-slot:title>{{ $title }}</x-slot>

  <div class="flex justify-center">
    <div class="w-full max-w-2xl">
      <div class="bg-gray-200 p-8 rounded-lg shadow-lg">
        <form action="{{ route('contact.store') }}" method="POST" class="mb-8">
          @csrf
              <h2 class="text-xl font-bold mb-8 text-center">Kritik dan Saran</h2>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-800">Nama</label>
                    <input type="text" id="name" name="nama" class="mt-1 block w-full bg-white border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nama">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-800">Kritik dan Saran</label>
                    <textarea id="message" name="pesan" rows="4" class="mt-1 block w-full bg-white border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Isi Pesan"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">KIRIM</button>
            </form>
            <div class="space-y-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                        <!-- Facebook Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.734 0-1.325.591-1.325 1.325v21.351c0 .733.591 1.324 1.325 1.324h11.49v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.658-4.788 1.325 0 2.463.099 2.795.142v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.764v2.312h3.587l-.467 3.622h-3.12v9.293h6.115c.734 0 1.325-.591 1.325-1.324v-21.35c0-.734-.591-1.325-1.325-1.325z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <a href="https://www.facebook.com/profile.php?id=61563239762258&locale=id_ID" target="_blank">
                            <h3 class="text-lg font-medium">Facebook</h3>
                            <p>Pemdes Jatijajar</p>
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                        <!-- Instagram Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.332 3.608 1.308.975.975 1.246 2.242 1.308 3.608.058 1.265.069 1.645.069 4.849 0 3.204-.012 3.584-.07 4.849-.062 1.366-.332 2.633-1.308 3.608-.975.975-2.242 1.246-3.608 1.308-1.265.058-1.645.069-4.849.069-3.204 0-3.584-.012-4.849-.07-1.366-.062-2.633-.332-3.608-1.308-.975-.975-1.246-2.242-1.308-3.608-.058-1.265-.069-1.645-.069-4.849 0-3.204.012-3.584.07-4.849.062-1.366.332-2.633 1.308-3.608.975-.975 2.242-1.246 3.608-1.308 1.265-.058 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.67.015-4.947.072-1.276.057-2.582.332-3.541 1.291-.96.96-1.235 2.265-1.291 3.541-.057 1.276-.072 1.687-.072 4.947s.015 3.67.072 4.947c.057 1.276.332 2.582 1.291 3.541.96.96 2.265 1.235 3.541 1.291 1.276.057 1.687.072 4.947.072s3.67-.015 4.947-.072c1.276-.057 2.582-.332 3.541-1.291.96-.96 1.235-2.265 1.291-3.541.057-1.276.072-1.687.072-4.947s-.015-3.67-.072-4.947c-.057-1.276-.332-2.582-1.291-3.541-.96-.96-2.265-1.235-3.541-1.291-1.276-.057-1.687-.072-4.947-.072z"/>
                            <path d="M12 5.838c-3.403 0-6.162 2.76-6.162 6.162s2.76 6.162 6.162 6.162 6.162-2.76 6.162-6.162-2.76-6.162-6.162-6.162zm0 10.149c-2.199 0-3.988-1.789-3.988-3.988s1.789-3.988 3.988-3.988 3.988 1.789 3.988 3.988-1.789 3.988-3.988 3.988zm6.406-11.845c-.796 0-1.441.645-1.441 1.441s.645 1.441 1.441 1.441 1.441-.645 1.441-1.441-.645-1.441-1.441-1.441z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <a href="https://www.instagram.com/pemdes_jatijajar" target="_blank">
                            <h3 class="text-lg font-medium">Instagram</h3>
                            <p>@pemdes_jatijajar</p>
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                        <!-- Email Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4h-16c-1.104 0-2 .896-2 2v12c0 1.104.896 2 2 2h16c1.104 0 2-.896 2-2v-12c0-1.104-.896-2-2-2zm0 2v.511l-8 5.337-8-5.337v-.511h16zm-16 12v-9.461l8 5.341 8-5.341v9.461h-16z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=pemdesjatijajarbergas@gmail.com" target="_blank">
                            <h3 class="text-lg font-medium">Email</h3>
                            <p class="">pemdesjatijajarbergas@gmail.com</p>
                        </a>
                    </div>
                </div>
            </div>
            
      </div>
        </div>
    </div>
</div>
@if (session("success"))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session("success") }}',
                timer: 3000,
                showConfirmButton: false,
            });
        </script>
    @endif

    @if (session("error"))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session("error") }}',
            });
        </script>
    @endif
</x-layout>