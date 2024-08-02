<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="mt-6 flex items-center gap-x-4 mb-9">
        <button
            onclick="window.location='{{ route("admin.article") }}'"
            class="rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500"
        >
            Semua
        </button>
        <button
            onclick="window.location='{{ route("article.list.diajukan") }}'"
            class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500"
        >
            Diajukan
        </button>
        <button
            onclick="window.location='{{ route("article.list.ditolak") }}'"
            class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500"
        >
            Ditolak
        </button>
        <button
            onclick="window.location='{{ route("article.list.diterima") }}'"
            class="rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500"
        >
            Dipublish
        </button>
    </div>
    <div class="relative overflow-x-auto">
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-6"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Tanggal Dibuat</th>
                    <th scope="col" class="px-6 py-3">Author</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($blog as $b)
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
                            {{ $b["title"] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $b["created_at"] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $b["author"] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $b->category->name }}
                        </td>
                        @php
                            $status = $b["status"];
                            $bgColor = "";

                            if ($status === "diterima") {
                                $bgColor = "bg-green-500 text-white px-2 py-1 rounded";
                            } elseif ($status === "ditolak") {
                                $bgColor = "bg-red-500 text-white px-2 py-1 rounded";
                            } elseif ($status === "diajukan") {
                                $bgColor = "bg-blue-500 text-white px-2 py-1 rounded";
                            }
                        @endphp

                        <td class="px-6 py-4">
                            <span class="{{ $bgColor }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="{{ route("artikel.edit", $b->id) }}"
                                class="inline-flex items-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded"
                            >
                                <i class="fas fa-pencil-alt mr-2"></i>
                                Edit
                            </a>
                            <form
                                action="{{ route("artikel.destroy", $b->id) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');"
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
</x-layout-admin>
