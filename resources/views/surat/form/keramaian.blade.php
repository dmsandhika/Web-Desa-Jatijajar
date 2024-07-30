<x-layout>
  <x-slot:title>{{ $title }}</x-slot>
  
  <form action="{{ route('keramaian.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-2">
              <input type="text" placeholder="NIK" name="nik" id="nik" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>


          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <div class="mt-2">
              <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="acara" class="block text-sm font-medium leading-6 text-gray-900">Nama Acara</label>
            <div class="mt-2">
              <input type="text" name="acara" id="acara" placeholder="Nikahan, Dll" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full flex items-center space-x-4">
            <div class="w-1/6">
                <label for="tanggal_mulai" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Mulai</label>
                <div class="mt-2">
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="w-1/12">
                <label for="jam_mulai" class="block text-sm font-medium leading-6 text-gray-900">Jam Mulai</label>
                <div class="mt-2">
                    <input type="time" name="jam_mulai" id="jam_mulai" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
          <div class="col-span-full flex items-center space-x-4">
            <div class="w-1/6">
                <label for="tanggal_berakhir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Berakhir</label>
                <div class="mt-2">
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="w-1/12">
                <label for="jam_berakhir" class="block text-sm font-medium leading-6 text-gray-900">Jam Berakhir</label>
                <div class="mt-2">
                    <input type="time" name="jam_berakhir" id="jam_berakhir" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
        
        
          <div class="col-span-full mt-6">
            <label for="hiburan" class="block text-sm font-medium leading-6 text-gray-900">Jenis Hiburan</label>
            <div class="mt-2">
              <input type="text" name="hiburan" id="hiburan" autocomplete="off" placeholder="Jenis Hiburan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="lokasi" class="block text-sm font-medium leading-6 text-gray-900">Lokasi Acara</label>
            <div class="mt-2">
              <textarea id="lokasi" name="lokasi" placeholder="Masukkan Alamat..." rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
          </div>
          <div class="col-span-full mt-6">
            <label for="no" class="block text-sm font-medium leading-6 text-gray-900">No yang bisa dihubungi</label>
            <div class="mt-2">
              <input type="number" name="no" id="no" autocomplete="off" placeholder="Masukkan Nomor" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          
 
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/surat" class="inline-block">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900 border border-transparent p-2 rounded hover:border-gray-500">
            Cancel
          </button>
        </a>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajukan</button>
      </div>
    </div>
  </form>
  @if(session('success'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: '{{ session('success') }}',
          timer: 3000,
          showConfirmButton: false
      });
  </script>
@endif

@if(session('error'))
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '{{ session('error') }}',
      });
  </script>
@endif
</x-layout>