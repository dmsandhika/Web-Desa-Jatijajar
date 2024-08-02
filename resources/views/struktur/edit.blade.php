<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <form
        action="{{ route("struktur.update", $struktur->id) }}"
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
                            for="title"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Nama
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                value="{{ $struktur->name }}"
                                name="title"
                                id="title"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label
                            for="jabatan"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Jabatan
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                value="{{ $struktur->jabatan }}"
                                name="jabatan"
                                id="jabatan"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="nip"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            NIP
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="nip"
                                value="{{ $struktur->nip }}"
                                id="nip"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="desc"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Deskripsi(Opsional)
                        </label>
                        <div class="mt-2">
                            <textarea
                                id="desc"
                                name="desc"
                                rows="3"
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
{{ old("desc", $struktur->desc) }}</textarea
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/article/" class="inline-block">
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
                    Save
                </button>
            </div>
        </div>
    </form>
</x-layout-admin>
