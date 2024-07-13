<x-layout>
  <x-slot:title>{{ $title }}</x-slot>

  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          
          <div class="col-span-full">
            <label for="jenis_keterangan" class="block text-sm font-medium leading-6 text-gray-900">Jenis Keterangan</label>
            <div class="mt-2">
              <select name="jenis_keterangan" id="jenis_keterangan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="">--Pilih--</option>
                <!-- Tambahkan opsi jenis keterangan di sini -->
              </select>
            </div>
          </div>
          
          <div class="col-span-full">
            <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-2">
              <input type="text" name="nik" id="nik" placeholder="Masukan NIK" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="perbedaan_pada" class="block text-sm font-medium leading-6 text-gray-900">Perbedaan Pada</label>
            <div class="mt-2">
              <input type="text" name="perbedaan_pada" id="perbedaan_pada" placeholder="Ex. Buku Rekening Bank, Raport, SHM, KIS, Kartu BPJS, Dll." autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="identitas_yang_beda" class="block text-sm font-medium leading-6 text-gray-900">Identitas yang Beda</label>
            <div class="mt-2">
              <input type="text" name="identitas_yang_beda" id="identitas_yang_beda" placeholder="Masukkan Data Yang Beda..." autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="seharusnya" class="block text-sm font-medium leading-6 text-gray-900">Seharusnya</label>
            <div class="mt-2">
              <input type="text" name="seharusnya" id="seharusnya" placeholder="Masukkan Data Yang Benar Berdasarkan KTP/KK/Akta Kelahiran" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="keperluan" class="block text-sm font-medium leading-6 text-gray-900">Keperluan</label>
            <div class="mt-2">
              <input type="text" name="keperluan" id="keperluan" placeholder="Keperluan" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-full">
            <label for="nomor_yang_bisa_dihubungi" class="block text-sm font-medium leading-6 text-gray-900">Nomor Yang Bisa Dihubungi</label>
            <div class="mt-2">
              <input type="text" name="nomor_yang_bisa_dihubungi" id="nomor_yang_bisa_dihubungi" placeholder="Masukan nomor telepon" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
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