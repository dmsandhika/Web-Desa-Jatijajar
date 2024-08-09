<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm">
            <form
                action="{{ route("kategori.update", $data->id) }}"
                method="POST"
                class="space-y-4"
            >
                @csrf
                @method("PUT")
                <div>
                    <label
                        for="nama"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Nama Kategori
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $data->name }}"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>
