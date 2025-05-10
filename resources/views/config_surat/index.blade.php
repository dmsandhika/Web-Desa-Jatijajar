<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="relative mt-10 overflow-x-auto">
        <table
            id="dataTable"
            class="w-full mt-10 text-sm text-left text-gray-500 rtl:text-right"
        >
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="w-3 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $config)
                    <tr class="bg-white border-b">
                        <th
                            scope="row"
                            class="py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">{{ $config->name }}</td>
                        <td class="px-6 py-4">
                            <a
                                href="#"
                                class="inline-flex items-center px-2 py-1 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700"
                            >
                                <i class="mr-2 fas fa-pencil-alt"></i>
                                Detail
                            </a>
                            <form
                                action="{{ route("surat.config.delete", $config->id) }}"
                                method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?');"
                            >
                                @csrf
                                @method("DELETE")
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-2 py-1 mt-2 font-bold text-white bg-red-500 rounded delete-button hover:bg-red-700"
                                >
                                    <i class="mr-2 fas fa-trash-alt"></i>
                                    Hapus
                                </button>
                            </form>
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
