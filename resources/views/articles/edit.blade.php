<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <form
        action="{{ route("artikel.update", $art->id) }}"
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
                            Judul
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                value="{{ $art->title }}"
                                name="title"
                                id="title"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="category"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Kategori
                        </label>
                        <div class="mt-2">
                            <select
                                name="category"
                                id="category"
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
                                <option value="">Pilih Kategori</option>
                                @foreach ($ktgr as $kategori)
                                    <option
                                        value="{{ $kategori->id }}"
                                        @if ($kategori->id == old('idkategori', $art->category_id)) selected @endif
                                    >
                                        {{ $kategori->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="author"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Author (Nama Penulis)
                        </label>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="author"
                                value="{{ $art->author }}"
                                id="author"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="content"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Isi Artikel
                        </label>
                        <div class="mt-2">
                            <textarea
                                id="content"
                                name="content"
                                rows="3"
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
{{ old("content", $art->content) }}</textarea
                            >
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="photo"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Foto (Jika Tidak Ingin Mengubah Foto Tidak Usah
                            Upload)
                        </label>
                        <div class="mt-2">
                            @if ($art->photo)
                                <div class="mb-4">
                                    <p>
                                        File saat ini:
                                        {{ basename($art->photo) }}
                                    </p>
                                    <img
                                        src="{{ asset($art->photo) }}"
                                        alt="Current Photo"
                                        class="h-40 w-auto object-cover"
                                    />
                                </div>
                            @endif

                            <input
                                type="file"
                                name="photo"
                                id="photo"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="category"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Status
                        </label>
                        <div class="mt-2">
                            <select
                                name="status"
                                id="status"
                                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
                                <option
                                    value="diajukan"
                                    {{ $art->status == "diajukan" ? "selected" : "" }}
                                >
                                    Diajukan
                                </option>
                                <option
                                    value="diterima"
                                    {{ $art->status == "diterima" ? "selected" : "" }}
                                >
                                    Diterima
                                </option>
                                <option
                                    value="ditolak"
                                    {{ $art->status == "ditolak" ? "selected" : "" }}
                                >
                                    Ditolak
                                </option>
                            </select>
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
