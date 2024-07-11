<x-layout>
  <x-slot:title>{{ $title }}</x-slot>

  @php
   $data = [
    [
        'title' => 'Keterangan Belum Nikah',
        'href' => '/surat/form_belumnikah',
    ],
    [
        'title' => 'Keterangan Domisili',
        'href' => '/surat/form_domisili',
    ],
    [
        'title' => 'Keterangan Lahir',
        'href' => '/surat/form_lahir',
    ],
    [
        'title' => 'Keterangan Meninggal',
        'href' => '/surat/form_meninggal',
    ],
    [
        'title' => 'Keterangan Tidak Mampu',
        'href' => '/surat/form_tidakmampu',
    ],
    [
        'title' => 'Keterangan Usaha',
        'href' => '/surat/form_usaha',
    ],
    [
        'title' => 'Pengantar Izin Keramaian',
        'href' => '/surat/form_keramaian',
    ],
    [
        'title' => 'Pengantar E-Ktp',
        'href' => '/surat/form_ektp',
    ],
    [
        'title' => 'Pengantar SKCK',
        'href' => '/surat/form_skck',
    ],
    [
        'title' => 'Keterangan Kehilangan',
        'href' => '/surat/form_kehilangan',
    ],
    [
        'title' => 'Keterangan Penghasilan',
        'href' => '/surat/form_penghasilan',
    ],
    [
        'title' => 'Surat Rekomendasi',
        'href' => '/surat/form_rekomendasi',
    ],
    [
        'title' => 'Keterangan Penghasilan Orang Tua',
        'href' => '#',
    ],
    [
        'title' => 'Permohonan Kuasa',
        'href' => '#',
    ],
    [
        'title' => 'Perjanjian Kesepakatan',
        'href' => '#',
    ],
    [
        'title' => 'Keterangan Domisili Lembaga',
        'href' => '#',
    ],
    [
        'title' => 'Keterangan Pindah Domisili',
        'href' => '#',
    ],
    [
        'title' => 'Ket. Beda Identitas',
        'href' => '#',
    ],
    [
        'title' => 'Pengantar Catin',
        'href' => '#',
    ],
    [
        'title' => 'Keterangan Perkawinan',
        'href' => '#',
    ],
    [
        'title' => 'Pernyataan Izin Keluarga',
        'href' => '#',
    ],
    [
        'title' => 'Keterangan Lainnya',
        'href' => '#',
    ],
];
 
  @endphp

  <div class="grid gap-6 lg:grid-cols-4 sm:grid-cols-2">
    @foreach($data as $item)
      <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ $item['href'] }}">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item['title'] }}</h5>
        </a>
        <a href="{{ $item['href'] }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Ajukan Surat
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
        </a>
      </div>
    @endforeach
  </div>
</x-layout>
