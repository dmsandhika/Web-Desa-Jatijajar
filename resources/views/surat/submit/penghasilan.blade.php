<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <form
        id="hasilForm"
        action="{{ route("surat.penghasilan.update", $data->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method("PUT")
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div
                    class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                >
                    <div class="col-span-full">
                        <label
                            for="nik"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            NIK
                        </label>
                        <div class="mt-2">
                            <input
                                type="number"
                                name="nik"
                                id="nik"
                                value="{{ $data->nik }}"
                                readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="nama"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Nama Lengkap
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                value="{{ $data->nama }}"
                                readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="usaha"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Nama Usaha
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="usaha"
                                id="usaha"
                                value="{{ $data->usaha }}"
                                readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="gaji"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Rata-rata Penghasilan per Bulan
                        </label>
                        <div class="mt-2">
                            <input
                                type="number"
                                name="gaji"
                                id="gaji"
                                value="{{ $data->gaji }}"
                                readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full mt-6">
                        <label
                            for="keperluan"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Keperluan
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="keperluan"
                                id="keperluan"
                                value="{{ $data->keperluan }}"
                                readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full mt-6">
                        <label
                            for="no"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            No yang bisa dihubungi
                        </label>
                        <div class="mt-2">
                            <input
                                type="number"
                                name="no"
                                id="no"
                                value="{{ $data->no }}"
                                readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full mt-6">
                        <label
                            for="file"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            File Surat (PDF)
                        </label>
                        <div class="mt-2">
                            @if ($data->file)
                                <a
                                    href="{{ asset($data->file) }}"
                                    target="_blank"
                                    class="text-indigo-600 hover:underline"
                                >
                                    Lihat file yang diunggah sebelumnya
                                </a>
                            @endif

                            <input
                                type="file"
                                name="file"
                                id="file"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full mt-6">
                        <label
                            for="note"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Catatan
                        </label>
                        <div class="mt-2">
                            <textarea
                                id="note"
                                name="note"
                                rows="3"
                                class="block w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
{{ $data->note }}</textarea
                            >
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route("admin.surat") }}" class="inline-block">
                        <button
                            type="button"
                            class="text-sm font-semibold leading-6 text-gray-900 border border-transparent p-2 rounded hover:border-gray-500"
                        >
                            Cancel
                        </button>
                    </a>

                    <button
                        type="button"
                        onclick="submitForm('ditolak')"
                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                    >
                        Tolak
                    </button>

                    <button
                        type="button"
                        onclick="submitForm('selesai')"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function submitForm(status) {
                const form = document.getElementById('hasilForm');
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
