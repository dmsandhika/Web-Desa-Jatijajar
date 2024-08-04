<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="relative overflow-x-auto">
        <div class="flex justify-between mb-4 mt-5">
            <a
                href="{{ route("banner.edit") }}"
                class="inline-flex items-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                <i class="fas fa-edit mr-2"></i>
                Ubah Banner Struktur
            </a>

            <a
                href="{{ route("struktur.create") }}"
                class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                <i class="fas fa-plus mr-2"></i>
                Tambah
            </a>
        </div>
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500  mt-6"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 "
            >
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Jabatan</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">NIP</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($strk as $s)
                    <tr
                        class="bg-white border-b "
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap "
                        >
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $s["jabatan"] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $s["name"] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $s["nip"] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $s["desc"] }}
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="{{ route("struktur.edit", $s->id) }}"
                                class="inline-flex items-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded"
                            >
                                <i class="fas fa-pencil-alt mr-2"></i>
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout-admin>
