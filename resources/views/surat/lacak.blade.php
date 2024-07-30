<x-layout>
  <x-slot:title>{{ $title }}</x-slot>

  <div class="flex justify-center items-center h-full">
    <form class="form relative" action="{{ route('surat.search') }}" method="GET">
      <button type="submit" class="absolute left-2 -translate-y-1/2 top-1/2 p-1">
        <svg
          width="17"
          height="16"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          role="img"
          aria-labelledby="search"
          class="w-5 h-5 text-gray-700"
        >
          <path
            d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
            stroke="currentColor"
            stroke-width="1.333"
            stroke-linecap="round"
            stroke-linejoin="round"
          ></path>
        </svg>
      </button>
      <input
        class="input rounded-full no-spinner px-8 py-3 border-2 border-transparent focus:outline-none focus:border-blue-500 placeholder-gray-400 transition-all duration-300 shadow-md"
        placeholder="Masukkan NIK"
        required
        name="search"
        type="number"
      />
      <button type="reset" class="absolute right-3 -translate-y-1/2 top-1/2 p-1">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-5 h-5 text-gray-700"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12"
          ></path>
        </svg>
      </button>
    </form>


    
    
  </div>

  <div>
    @if($data->isEmpty())
            <div class="text-center text-xl font-bold text-gray-500 mt-6">
                Tidak ada data yang ditampilkan
            </div>
        @else
        <!-- Tabel Data Surat -->
        <table id="dataTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-6">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">NIK</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Jenis Surat</th>
                    <th scope="col" class="px-6 py-3">Tanggal Pengajuan</th>
                    <th scope="col" class="px-6 py-3">Catatan</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">File</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $s)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $no++ }}
                    </th>
                    <td class="px-6 py-4">{{ $s->nik }}</td>
                    <td class="px-6 py-4">{{ $s->nama }}</td>
                    <td class="px-6 py-4">{{ $s->jenis_surat }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($s->created_at)->format('d-m-Y') }}</td>
                    @php
                        $status = $s->status;
                        $bgColor = '';
                        if ($status === 'selesai') {
                            $bgColor = 'bg-green-500 text-white px-2 py-1 rounded';
                        } elseif ($status === 'ditolak') {
                            $bgColor = 'bg-red-500 text-white px-2 py-1 rounded';
                        } elseif ($status === 'diajukan') {
                            $bgColor = 'bg-blue-500 text-black px-2 py-1 rounded';
                        }
                    @endphp
                      <td class="px-6 py-4">{{ $s->note }}</td>
                    <td class="px-6 py-4">
                        <span class="{{ $bgColor }}">{{ $status }}</span>
                    </td>
                    <td class="px-6 py-4">
                      @if (!empty($s->file))
                            <a href="{{ asset($s->file) }}" class="inline-flex items-center bg-yellow-300 hover:bg-yellow-400 text-white font-bold py-1 px-2 rounded">
                                Unduh File
                            </a>
                        @else
                            <!-- Biarkan kolom kosong jika tidak ada file -->
                        @endif  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
  </div>
</x-layout>
