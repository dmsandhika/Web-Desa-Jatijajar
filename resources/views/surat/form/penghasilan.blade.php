<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <form
        action="{{ route("hasil.store") }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
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
                                placeholder="Masukkan NIK"
                                autocomplete="off"
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
                                placeholder="Nama Lengkap"
                                name="nama"
                                id="nama"
                                autocomplete="off"
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
                                placeholder="Nama Usaha"
                                name="usaha"
                                id="usaha"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label
                            for="gaji"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Rata rata penghasilan per Bulan
                        </label>
                        <div class="mt-2">
                            <input
                                type="number"
                                placeholder="Penghasilan Per Bulan"
                                name="gaji"
                                id="gaji"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
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
                            placeholder="Keperluan"
                            name="keperluan"
                            id="keperluan"
                            autocomplete="off"
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
                            placeholder="Masukkan Nomor"
                            name="no"
                            id="no"
                            autocomplete="off"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/surat" class="inline-block">
                    <button
                        type="button"
                        class="text-sm font-semibold leading-6 text-gray-900 border border-transparent p-2 rounded hover:border-gray-500"
                    >
                        Cancel
                    </button>
                </a>
                <button
                    type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Ajukan
                </button>
            </div>
        </div>
    </form>
    @if (session("success"))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session("success") }}',
                timer: 3000,
                showConfirmButton: false,
            });
        </script>
    @endif

    @if (session("error"))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session("error") }}',
            });
        </script>
    @endif
</x-layout>
