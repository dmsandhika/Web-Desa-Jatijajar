<x-layout-admin>
    <x-slot:title>
        Data {{ $data->name }} Desa
    </x-slot>
    <div class="mt-10 max-w-xl mx-auto">
        <div class="space-y-4">
            <!-- Tombol download template -->
            <a
                href="{{ asset("template/Pekerjaan.xlsx") }}"
                download
                class="inline-block w-full text-center text-white bg-blue-600 hover:bg-blue-700 font-semibold py-3 px-6 rounded-xl transition"
            >
                Contoh Template File
            </a>

            @if ($data->file)
                <a
                    href="{{ asset("storage/" . $data->file) }}"
                    download
                    class="inline-block w-full text-center text-white bg-green-600 hover:bg-green-700 font-semibold py-3 px-6 rounded-xl transition"
                >
                    Lihat File yang Sudah Terdata
                </a>
            @endif

            <!-- Form upload file -->
            <form
                action="{{ route("admin.data.desa.pekerjaan") }}"
                method="POST"
                enctype="multipart/form-data"
                class="bg-white p-6 rounded-xl shadow-md space-y-4"
            >
                @csrf

                <label class="block text-sm font-medium text-gray-700">
                    Perbarui Data
                </label>
                <input
                    type="file"
                    name="file"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                />

                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-xl transition"
                >
                    Update
                </button>
            </form>
        </div>
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
