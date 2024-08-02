<x-layout>
  <x-slot:title>{{ $title }}</x-slot>

  @php
   $data = [
    [
        'title' => 'Keterangan Belum Nikah',
        'href' => route('belumnikah.create'),
    ],
    [
        'title' => 'Keterangan Domisili',
        'href' => route('domisili.create'),
    ],
    [
        'title' => 'Keterangan Lahir',
        'href' => route('lahir.create'),
    ],
    [
        'title' => 'Keterangan Meninggal',
        'href' => route('meninggal.create'),
    ],
    [
        'title' => 'Keterangan Tidak Mampu',
        'href' => route('sktm.create'),
    ],
    [
        'title' => 'Keterangan Usaha',
        'href' => route('usaha.create'),
    ],
    [
        'title' => 'Pengantar Izin Keramaian',
        'href' => route('keramaian.create'),
    ],
    [
        'title' => 'Pengantar E-Ktp',
        'href' => route('ektp.create'),
    ],
    [
        'title' => 'Pengantar SKCK',
        'href' => route('skck.create'),
    ],
    [
        'title' => 'Keterangan Kehilangan',
        'href' => route('hilang.create'),
    ],
    [
        'title' => 'Keterangan Penghasilan',
        'href' => route('hasil.create'),
    ],
    [
        'title' => 'Surat Rekomendasi',
        'href' => route('rekomendasi.create'),
    ],
    [
        'title' => 'Permohonan Kuasa',
        'href' => route('kuasa.create'),
    ],
    [
        'title' => 'KIA (Kartu Identitas Anak)',
        'href' => route('kia.create'),
    ],
    [
        'title' => 'Surat Pengantar Nikah',
        'href' => route('nikah.create'),
    ],
];
 
  @endphp

<div class="flex justify-end p-5">
    <a href="{{ route('surat.search') }}"
       class="inline-block py-2 px-6 rounded-l-xl rounded-t-xl bg-[#faca15] hover:bg-white cursor-pointer hover:border-[#faca15] hover:text-[#faca15] focus:text-[#faca15] focus:bg-gray-200 text-gray-50 font-bold leading-loose transition duration-200">
      Cek Surat
    </a>
  </div>
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
