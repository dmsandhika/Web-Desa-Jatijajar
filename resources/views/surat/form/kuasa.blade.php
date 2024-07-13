<x-layout>
  <x-slot:title>{{ $title }}</x-slot>
  
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-xl font-medium leading-6 text-gray-900">Pemberi Kuasa</h2>
 
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
         

          <div class="col-span-full">
            <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="NIK" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="col-span-full">
            <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>

          <div class="col-span-full sm:flex sm:space-x-4">
            <div class="sm:w-1/2">
              <label for="tempat_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div class="sm:w-1/2">
              <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <option value="">Pilih</option>
              <option value="Laki-laki">Laki Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div class="col-span-full">
            <label for="pekerjaan" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>

          <div class="col-span-full">
            <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" placeholder="Alamat ..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>

          <div class="col-span-full">
            <label for="isi_kuasa" class="block text-sm font-medium leading-6 text-gray-900">Isi Kuasa</label>
            <textarea id="isi_kuasa" name="isi_kuasa" rows="3" placeholder="isi ..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>

          <div class="col-span-full">
            <label for="nomor_telepon" class="block text-sm font-medium leading-6 text-gray-900">Nomor Yang Bisa Dihubungi</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" placeholder="Masukkan nomor telepon" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>

      <!-- Penerima Kuasa -->
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-xl font-medium leading-6 text-gray-900">Penerima Kuasa</h2>
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="NIK" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>

          <div class="col-span-full">
            <label for="nama_lengkap_penerima" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <input type="text" name="nama_lengkap_penerima" id="nama_lengkap_penerima" placeholder="Nama Lengkap" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>

          <div class="col-span-full sm:flex sm:space-x-4">
            <div class="sm:w-1/2">
              <label for="tempat_lahir_penerima" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
              <input type="text" name="tempat_lahir_penerima" id="tempat_lahir_penerima" placeholder="Tempat Lahir" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div class="sm:w-1/2">
              <label for="tanggal_lahir_penerima" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir_penerima" id="tanggal_lahir_penerima" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="jenis_kelamin_penerima" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
            <select name="jenis_kelamin_penerima" id="jenis_kelamin_penerima" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <option value="">Pilih</option>
              <option value="Laki-laki">Laki Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div class="col-span-full">
            <label for="pekerjaan_penerima" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan</label>
            <input type="text" name="pekerjaan_penerima" id="pekerjaan_penerima" placeholder="Pekerjaan" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>

          <div class="col-span-full">
            <label for="alamat_penerima" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
            <textarea id="alamat_penerima" name="alamat_penerima" rows="3" placeholder="Alamat ..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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
</x-layout>
