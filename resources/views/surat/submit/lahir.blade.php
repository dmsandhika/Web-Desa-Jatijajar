<x-layout-admin>
  <x-slot:title>{{ $title }}</x-slot>
  
  <form id="lahirForm" action="{{ route('surat.lahir.update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK Pemohon</label>
            <div class="mt-2">
              <input type="text" name="nik" id="nik" value="{{ $data->nik }}" readonly placeholder="Masukkan NIK" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>


          <div class="col-span-full">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Pemohon</label>
            <div class="mt-2">
              <input type="text" name="nama" id="nama" value="{{ $data->nama }}" readonly placeholder="Nama Pemohon" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="anak" class="block text-sm font-medium leading-6 text-gray-900">Nama Anak</label>
            <div class="mt-2">
              <input type="text" name="anak" id="anak" value="{{ $data->anak }}" readonly placeholder="Nama Anak" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="keperluan" class="block text-sm font-medium leading-6 text-gray-900">Keperluan</label>
            <div class="mt-2">
              <input type="text" name="keperluan" value="{{ $data->keperluan }}" readonly id="keperluan" placeholder="Keperluan" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full mt-6">
            <label for="no" class="block text-sm font-medium leading-6 text-gray-900">No yang bisa dihubungi</label>
            <div class="mt-2">
              <input type="number" value="{{ $data->no }}" readonly placeholder="Masukkan Nomor" name="no" id="no" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          <div class="col-span-full">
            <label for="suket" class="block text-sm font-medium leading-6 text-gray-900">Scan Surat Keterangan Lahir dari RS (Berstempel)</label>
            <div class="mt-2">
              @if (pathinfo($data->suket, PATHINFO_EXTENSION) == 'pdf')
                  <a href="{{ asset($data->suket) }}" download class="bg-blue-500 text-white px-3 py-2 rounded">Download PDF</a>
              @else
                  <img src="{{ asset($data->suket) }}" alt="Surat Keterangan Lahir" class="h-40 w-auto object-cover cursor-pointer" onclick="openFullScreen('{{ asset($data->suket) }}')">
              @endif
            </div>
          </div>
          <div class="col-span-full">
            <label for="ktp_ayah" class="block text-sm font-medium leading-6 text-gray-900">Scan KTP Ayah</label>
            <div class="mt-2">
              @if (pathinfo($data->ktp_ayah, PATHINFO_EXTENSION) == 'pdf')
                  <a href="{{ asset($data->ktp_ayah) }}" download class="bg-blue-500 text-white px-3 py-2 rounded">Download PDF</a>
              @else
                  <img src="{{ asset($data->ktp_ayah) }}" alt="KTP Ayah" class="h-40 w-auto object-cover cursor-pointer" onclick="openFullScreen('{{ asset($data->ktp_ayah) }}')">
              @endif
            </div>
          </div>
          <div class="col-span-full">
            <label for="ktp_ibu" class="block text-sm font-medium leading-6 text-gray-900">Scan KTP Ibu</label>
            <div class="mt-2">
              @if (pathinfo($data->ktp_ibu, PATHINFO_EXTENSION) == 'pdf')
                  <a href="{{ asset($data->ktp_ibu) }}" download class="bg-blue-500 text-white px-3 py-2 rounded">Download PDF</a>
              @else
                  <img src="{{ asset($data->ktp_ibu) }}" alt="KTP Ibu" class="h-40 w-auto object-cover cursor-pointer" onclick="openFullScreen('{{ asset($data->ktp_ibu) }}')">
              @endif
            </div>
          </div>
          <div class="col-span-full">
            <label for="surat_nikah" class="block text-sm font-medium leading-6 text-gray-900">Scan Surat Nikah</label>
            <div class="mt-2">
              @if (pathinfo($data->surat_nikah, PATHINFO_EXTENSION) == 'pdf')
                  <a href="{{ asset($data->surat_nikah) }}" download class="bg-blue-500 text-white px-3 py-2 rounded">Download PDF</a>
              @else
                  <img src="{{ asset($data->surat_nikah) }}" alt="surat_nikah" class="h-40 w-auto object-cover cursor-pointer" onclick="openFullScreen('{{ asset($data->ktp_ibu) }}')">
              @endif
            </div>
          </div>
          <div class="col-span-full">
            <label for="saksi1" class="block text-sm font-medium leading-6 text-gray-900">Scan KTP Saksi 1</label>
            <div class="mt-2">
              @if (pathinfo($data->saksi1, PATHINFO_EXTENSION) == 'pdf')
                  <a href="{{ asset($data->saksi1) }}" download class="bg-blue-500 text-white px-3 py-2 rounded">Download PDF</a>
              @else
                  <img src="{{ asset($data->saksi1) }}" alt="KTP Saksi 1" class="h-40 w-auto object-cover cursor-pointer" onclick="openFullScreen('{{ asset($data->saksi1) }}')">
              @endif
            </div>
          </div>
          <div class="col-span-full">
            <label for="saksi2" class="block text-sm font-medium leading-6 text-gray-900">Scan KTP Saksi 2</label>
            <div class="mt-2">
              @if (pathinfo($data->saksi2, PATHINFO_EXTENSION) == 'pdf')
                  <a href="{{ asset($data->saksi2) }}" download class="bg-blue-500 text-white px-3 py-2 rounded">Download PDF</a>
              @else
                  <img src="{{ asset($data->saksi2) }}" alt="KTP Saksi 2" class="h-40 w-auto object-cover cursor-pointer" onclick="openFullScreen('{{ asset($data->saksi2) }}')">
              @endif
            </div>
          </div>
          <div class="col-span-full  mt-6">
            <label for="file" class="block text-sm font-medium leading-6 text-gray-900">File Surat (PDF)</label>
            <div class="mt-2">
              @if($data->file)
                <a href="{{ asset($data->file) }}" target="_blank" class="text-indigo-600 hover:underline">Lihat file yang diunggah sebelumnya</a>
              @endif
              <input type="file" name="file" id="file" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="col-span-full  mt-6">
            <label for="note" class="block text-sm font-medium leading-6 text-gray-900">Catatan</label>
            <div class="mt-2">
              <textarea id="note" name="note" rows="3" class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $data->note }}</textarea>
            </div>
          </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="{{ route('admin.surat')}}" class="inline-block">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900 border border-transparent p-2 rounded hover:border-gray-500">
            Cancel
          </button>
        </a>

        <button type="button" onclick="submitForm('ditolak')" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Tolak</button>

        <button type="button" onclick="submitForm('selesai')" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
      </div>
    </div>
  </form>
  <div id="fullScreenModal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-75 z-50 overflow-auto hidden">
    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
        <div class="relative p-4 bg-white shadow-lg rounded-lg max-w-screen-lg w-full">
            <img id="fullScreenImage" src="#" alt="Full Screen Image" class="max-h-screen max-w-full object-contain">
            <button onclick="closeFullScreen()" class="absolute top-0 right-0 mt-4 mr-4 bg-gray-200 text-gray-800 rounded-full p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
  </div>

  <script>
    function submitForm(status) {
        const form = document.getElementById('lahirForm');
        const statusInput = document.createElement('input');
        statusInput.type = 'hidden';
        statusInput.name = 'status';
        statusInput.value = status;
        form.appendChild(statusInput);
        form.submit();
    }

    document.addEventListener('DOMContentLoaded', function () {

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
        });
        @endif
    });
  </script>
 

</x-layout-admin>
