<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="relative overflow-x-auto">
        <div class="flex justify-end mb-4">
            <a
                href="#"
                id="addButton"
                class="inline-flex items-center bg-blue-500 hover:bg-blue-700 mt-5 text-white font-bold py-2 px-4 rounded"
            >
                <i class="fas fa-plus mr-2"></i>
                Tambah
            </a>
        </div>
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-6"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Nama Kategori</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($ktgr as $k)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $k["name"] }}
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="#"
                                class="inline-flex items-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded"
                            >
                                <i class="fas fa-pencil-alt mr-2"></i>
                                Edit
                            </a>
                            <form
                                action="{{ route("kategori.destroy", $k->id) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus Kategori ini?');"
                            >
                                @csrf
                                @method("DELETE")
                                <button
                                    type="submit"
                                    class="inline-flex items-center mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
                                >
                                    <i class="fas fa-trash-alt mr-2"></i>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document
            .getElementById('addButton')
            .addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default anchor behavior
                Swal.fire({
                    title: 'Tambah Kategori',
                    text: 'Masukkan nama kategori baru',
                    input: 'text',
                    inputPlaceholder: 'Nama Kategori',
                    showCancelButton: true,
                    confirmButtonText: 'Tambah',
                    cancelButtonText: 'Batal',
                    inputValidator: (value) => {
                        if (!value) {
                            return 'Nama kategori tidak boleh kosong!';
                        }
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send the data to the server
                        fetch('{{ route("kategori.store") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                            },
                            body: JSON.stringify({
                                name: result.value,
                            }),
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.success) {
                                    Swal.fire(
                                        'Kategori Ditambahkan',
                                        'Nama kategori baru: ' + result.value,
                                        'success',
                                    ).then(() => {
                                        location.reload(); // Reload the page to see the updated data
                                    });
                                } else {
                                    Swal.fire(
                                        'Gagal',
                                        'Kategori tidak berhasil ditambahkan',
                                        'error',
                                    );
                                }
                            })
                            .catch((error) => {
                                Swal.fire(
                                    'Error',
                                    'Terjadi kesalahan saat menambahkan kategori',
                                    'error',
                                );
                            });
                    }
                });
            });
    </script>
</x-layout-admin>
