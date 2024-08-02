<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <form
        action="{{ route("articles.store") }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">
                    Note :
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Artikel akan ditampilkan apabila sudah disetujui oleh admin.
                </p>

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
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            >
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
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
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            ></textarea>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                            for="photo"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Foto (Opsional)
                        </label>
                        <div class="mt-2">
                            <input
                                type="file"
                                name="photo"
                                id="photo"
                                autocomplete="off"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/article" class="inline-block">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session("success"))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        </script>
    @endif

    @if (session("error"))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session("error") }}',
            });
        </script>
    @endif
</x-layout>
