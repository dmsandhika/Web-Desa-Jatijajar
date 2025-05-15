<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <form
        action="{{ route("admin.surat.proses", $surat->id) }}"
        method="POST"
        enctype="multipart/form-data"
        id="suratForm"
    >
        @csrf
        @method("PUT")
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <div
                    class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6"
                >
                    <input
                        type="hidden"
                        name="jenis_surat"
                        value="{{ $surat->name }}"
                    />
                    @foreach ($config as $key => $type)
                        @if ($type == "text")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <input
                                        type="text"
                                        placeholder="Masukkan {{ $key }}"
                                        name="{{ $key }}"
                                        id="{{ $key }}"
                                        value="{{ old($key, $surat->data[str_replace(" ", "_", $key)] ?? "") }}"
                                        autocomplete="off"
                                        class="block w-full pl-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        disabled
                                    />
                                </div>
                            </div>
                        @elseif ($type == "number")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <input
                                        type="number"
                                        placeholder="Masukkan {{ $key }}"
                                        name="{{ $key }}"
                                        id="{{ $key }}"
                                        value="{{ old($key, $surat->data[str_replace(" ", "_", $key)] ?? "") }}"
                                        autocomplete="off"
                                        disabled
                                        class="block w-full pl-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>
                        @elseif ($type == "file")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>

                                <div class="flex items-center gap-4 mt-2">
                                    {{-- Tombol download file jika ada --}}
                                    @php
                                        $fileKey = str_replace(" ", "_", $key);
                                        $filePath = $surat->data[$fileKey] ?? null;
                                    @endphp

                                    @if ($filePath)
                                        <a
                                            href="{{ asset("storage/" . $filePath) }}"
                                            target="_blank"
                                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-500"
                                        >
                                            Download File
                                        </a>
                                    @else
                                        <span class="text-sm text-gray-500">
                                            Belum ada file
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @elseif ($type == "date")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <input
                                        type="date"
                                        name="{{ $key }}"
                                        id="{{ $key }}"
                                        value="{{ old($key, $surat->data[str_replace(" ", "_", $key)] ?? "") }}"
                                        autocomplete="off"
                                        disabled
                                    />
                                </div>
                            </div>
                        @elseif ($type == "textarea")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <textarea
                                        id="{{ $key }}"
                                        name="{{ $key }}"
                                        placeholder="Masukkan {{ $key }}..."
                                        rows="3"
                                        disabled
                                        class="block w-full pl-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    >
{{ old($key, $surat->data[str_replace(" ", "_", $key)] ?? "") }}</textarea
                                    >
                                </div>
                            </div>
                        @elseif (is_array($type) && $type["type"] == "radio")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <select
                                        name="{{ $key }}"
                                        id="{{ $key }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    >
                                        <option value="" disabled>Pilih</option>
                                        @foreach ($type["options"] as $option)
                                            <option value="{{ $option }}">
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="pt-10 border-t-2 col-span-full">
                        <label
                            for="file"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            File Surat (Jika Data Sudah Sesuai Silahkan Upload
                            File Surat Disini)
                        </label>
                        <div class="mt-2">
                            <input
                                type="file"
                                name="file"
                                id="file"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="pt-4 col-span-full">
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
                                class="block pl-3 w-full rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
{{ $surat->note }}</textarea
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 gap-x-6">
                <a href="{{ route("admin.surat") }}" class="inline-block">
                    <button
                        type="button"
                        class="p-2 text-sm font-semibold leading-6 text-gray-900 border border-transparent rounded hover:border-gray-500"
                    >
                        Cancel
                    </button>
                </a>

                <button
                    type="button"
                    onclick="submitForm('ditolak')"
                    class="px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                >
                    Tolak
                </button>

                <button
                    type="button"
                    onclick="submitForm('selesai')"
                    class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Submit
                </button>
            </div>
        </div>
    </form>

    <script>
        function submitForm(status) {
            const form = document.getElementById('suratForm');
            const statusInput = document.createElement('input');
            statusInput.type = 'hidden';
            statusInput.name = 'status';
            statusInput.value = status;
            form.appendChild(statusInput);
            form.submit();
        }
    </script>
</x-layout-admin>
