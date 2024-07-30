<x-layout>
  <x-slot:title>{{ $title }}</x-slot>
  
  <form action="{{ route('kuasa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-xl font-medium leading-6 text-gray-900">Pemberi Kuasa</h2>
 
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
         

          <div class="col-span-full">
            <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <input type="number" name="nik" id="nik" placeholder="NIK" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="col-span-full">
            <label for="ktp_pemberi" class="block text-sm font-medium leading-6 text-gray-900">Foto Scan KTP Pemberi Kuasa</label>
            <div class="mt-2">
              <input type="file" name="ktp_pemberi" id="ktp_pemberi" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="isi_kuasa" class="block text-sm font-medium leading-6 text-gray-900">Isi Kuasa</label>
            <textarea id="isi_kuasa" name="isi_kuasa" rows="3" placeholder="isi ..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>

          <div class="col-span-full">
            <label for="no" class="block text-sm font-medium leading-6 text-gray-900">Nomor Yang Bisa Dihubungi</label>
            <input type="text" name="no" id="no" placeholder="Masukkan nomor telepon" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>

      <!-- Penerima Kuasa -->
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-xl font-medium leading-6 text-gray-900">Penerima Kuasa</h2>
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="ktp_penerima" class="block text-sm font-medium leading-6 text-gray-900">Foto Scan KTP Penerima Kuasa</label>
            <div class="mt-2">
              <input type="file" name="ktp_penerima" id="ktp_penerima" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="hubungan" class="block text-sm font-medium leading-6 text-gray-900">Hubungan Dengan Pemberi Kuasa</label>
            <input type="text" name="hubungan" id="hubungan" placeholder="Hubungan" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
