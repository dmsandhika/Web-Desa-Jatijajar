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
          <div class="col-span-full mt-6">
            <label for="no" class="block text-sm font-medium leading-6 text-gray-900">Penghasilan Orang Tua Perbulan</label>
            <div class="mt-2">
              <input type="number" placeholder="Penghasilan rata - rata" name="no" id="no" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
          
          <div class="mb-4 mt-4">
            <label class="block mb-2 text-lg font-medium text-gray-700">Pilih Orang Tua</label>
            <div class="flex items-center mb-2">
                <input id="ayah" name="parent" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" value="ayah">
                <label for="ayah" class="ml-2 text-sm font-medium text-gray-900">Ayah</label>
            </div>
            <div class="flex items-center">
                <input id="ibu" name="parent" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" value="ibu">
                <label for="ibu" class="ml-2 text-sm font-medium text-gray-900">Ibu</label>
            </div>
        </div>

        <div class="col-span-full">
            <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-2">
              <input type="text" name="nik" id="nik" placeholder="NIK Orang Tua" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
            <div class="mt-2">
              <input type="text" name="nama" id="nama" placeholder="Nama Lengkap Orang Tua" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="col-span-full sm:col-span-3">
            <label for="tempat_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
            <div class="mt-2">
              <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir Orang Tua" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="col-span-full sm:col-span-3">
            <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
            <div class="mt-2">
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="col-span-full">
            <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
            <div class="mt-2">
              <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
        </div>

        <div class="col-span-full">
            <label for="agama" class="block text-sm font-medium leading-6 text-gray-900">Agama</label>
            <div class="mt-2">
              <select name="agama" id="agama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">Pilih</option>
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Buddha">Buddha</option>
                <option value="Hindu">Hindu</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
        </div>

        <div class="col-span-full">
            <label for="pekerjaan" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan</label>
            <div class="mt-2">
              <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan Orang Tua" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="col-span-full">
            <label for="kewarganegaraan" class="block text-sm font-medium leading-6 text-gray-900">Kewarganegaraan</label>
            <div class="mt-2">
              <input type="text" name="kewarganegaraan" id="kewarganegaraan" placeholder="Kewarganegaraan Orang Tua" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div class="col-span-full">
            <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Alamat Lengkap</label>
            <div class="mt-2">
              <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Orang Tua..." class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
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