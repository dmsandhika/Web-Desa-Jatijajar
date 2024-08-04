<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div
        class="p-5 border border-b-0 mb-5 border-gray-200 "
    >
        <h4 class="text-2xl">Gambar Banner Saat Ini :</h4>
        <img src="{{ asset($banner->gambar) }}" alt="" />
    </div>

    <form
        action="{{ route("banner.update") }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method("PUT")
        <div class="col-span-full">
            <label
                for="Gambar"
                class="block text-sm font-medium leading-6 text-gray-900"
            >
                Gambar Banner Baru
            </label>
            <div class="mt-2 mb-2">
                <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    autocomplete="off"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
            </div>
        </div>
        <button
            type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
            Simpan
        </button>
    </form>

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
