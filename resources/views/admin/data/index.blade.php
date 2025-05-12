<x-layout-admin>
    <x-slot:title>Data Desa</x-slot>

    <div class="relative overflow-x-auto">
        <table
            id="dataTable"
            class="w-full text-sm text-left rtl:text-right text-gray-500 mt-6"
        >
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 w-4">No.</th>
                    <th scope="col" class="px-6 py-3">Jenis Data</th>
                    <th scope="col" class="px-6 py-3">Terakhir Diperbarui</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="bg-white border-b">
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">{{ $item->name }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($item->updated_at)->format("d-m-Y H:i") }}
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="/admin/data/{{ $item->connect_table }}"
                                class="inline-flex items-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded"
                            >
                                <i class="fas fa-pencil-alt mr-2"></i>
                                Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
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
