<x-layout>
  <x-slot:title>{{ $title }}</x-slot>
  
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-2">
              <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>


          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
            <div class="mt-2">
              <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="keperluan" class="block text-sm font-medium leading-6 text-gray-900">Keperluan</label>
            <div class="mt-2">
              <input type="text" name="keperluan" id="keperluan" placeholder="Keperluan" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full mt-6">
            <label for="no" class="block text-sm font-medium leading-6 text-gray-900">No yang bisa dihubungi</label>
            <div class="mt-2">
              <input type="number" placeholder="Masukkan Nomor" name="no" id="no" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          
          <h2 class="text-xl font-medium leading-6 text-gray-900 mt-2">Identitas Ayah</h2>
          
          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-2">
              <input type="text" name="nama" id="nama" placeholder="NIK Ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
            <div class="mt-2">
              <input type="text" name="nama" id="nama" placeholder="Nama Lengkap Ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full sm:col-span-3">
            <label for="tempat_lahir_ayah" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
            <div class="mt-2">
              <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full sm:col-span-3">
            <label for="tanggal_lahir_ayah" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
            <div class="mt-2">
              <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
            <div class="mt-2">
              <select name="category" id="category" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Pilih</option>
                <option value="">Laki Laki</option>
                <option value="">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="col-span-full">
            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Agama</label>
            <div class="mt-2">
              <select name="category" id="category" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Pilih</option>
                <option value="">Islam</option>
                <option value="">Kristen Protestan</option>
                <option value="">Kristen Katolik</option>
                <option value="">Buddha</option>
                <option value="">Hindu</option>
                <option value="">Konghucu</option>
              </select>
            </div>
          </div>
          <div class="col-span-full">
            <label for="keperluan" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan</label>
            <div class="mt-2">
              <input type="text" name="keperluan" id="keperluan" placeholder="Pekerjaan Ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="keperluan" class="block text-sm font-medium leading-6 text-gray-900">Kewarganegaraan</label>
            <div class="mt-2">
              <input type="text" name="keperluan" id="keperluan" placeholder="Kewarganegaraan Ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Alamat Lengkap</label>
            <div class="mt-2">
              <textarea id="content" name="content" rows="3" placeholder="Masukkan Alamat Ayah..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
          </div>

          <h2 class="text-xl font-medium leading-6 text-gray-900 mt-2">Identitas Ibu</h2>
          
          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-2">
              <input type="text" name="nama" placeholder="NIK Ibu" id="nama" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
            <div class="mt-2">
              <input type="text" name="nama" placeholder="Nama Lengkap Ibu" id="nama" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full sm:col-span-3">
            <label for="tempat_lahir_ayah" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
            <div class="mt-2">
              <input type="text" name="tempat_lahir_ayah" placeholder="Tempat Lahir Ibu" id="tempat_lahir_ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full sm:col-span-3">
            <label for="tanggal_lahir_ayah" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
            <div class="mt-2">
              <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
            <div class="mt-2">
              <select name="category" id="category" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Pilih</option>
                <option value="">Laki Laki</option>
                <option value="">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="col-span-full">
            <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Agama</label>
            <div class="mt-2">
              <select name="category" id="category" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Pilih</option>
                <option value="">Islam</option>
                <option value="">Kristen Protestan</option>
                <option value="">Kristen Katolik</option>
                <option value="">Buddha</option>
                <option value="">Hindu</option>
                <option value="">Konghucu</option>
              </select>
            </div>
          </div>
          <div class="col-span-full">
            <label for="keperluan" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan</label>
            <div class="mt-2">
              <input type="text" name="keperluan" placeholder="Pekerjaan Ibu" id="keperluan" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="keperluan" class="block text-sm font-medium leading-6 text-gray-900">Kewarganegaraan</label>
            <div class="mt-2">
              <input type="text" name="keperluan" id="keperluan" placeholder="Kewarganegaraan Ibu" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Alamat Lengkap</label>
            <div class="mt-2">
              <textarea id="content" name="content" rows="3" placeholder="Masukkan Alamat Ibu..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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