<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="mt-6 flex items-center gap-x-4 mb-9">
        <button
            onclick="window.location='{{ route("admin.surat") }}'"
            class="rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500"
        >
            Semua
        </button>
        <button
            onclick="window.location='{{ route("admin.surat.diajukan") }}'"
            class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500"
        >
            Diajukan
        </button>
        <button
            onclick="window.location='{{ route("admin.surat.ditolak") }}'"
            class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500"
        >
            Ditolak
        </button>
        <button
            onclick="window.location='{{ route("admin.surat.selesai") }}'"
            class="rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500"
        >
            Selesai
        </button>
    </div>
    <div class="relative overflow-x-auto">
        <table
            id="dataTable"
            class="w-full text-sm text-left rtl:text-right text-gray-500 mt-6"
        >
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">No.</th>
                    <th scope="col" class="px-6 py-3">NIK</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Jenis Surat</th>
                    <th scope="col" class="px-6 py-3">Tanggal Pengajuan</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($data as $s)
                    @php
                        $nik = $s->data["NIK"] ?? ($s->data["NIK_Pemohon"] ?? "-");
                        $nama = $s->data["Nama"] ?? ($s->data["Nama_Pemohon"] ?? ($s->data["Nama_Lengkap"] ?? "-"));
                    @endphp

                    <tr class="bg-white border-b">
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">{{ $nik }}</td>
                        <td class="px-6 py-4">{{ $nama }}</td>
                        <td class="px-6 py-4">{{ $s->jenis_surat }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($s->created_at)->format("d-m-Y") }}
                        </td>
                        @php
                            $status = $s->status;
                            $bgColor = "";

                            if ($status === "selesai") {
                                $bgColor = "bg-green-500 text-white px-2 py-1 rounded";
                            } elseif ($status === "ditolak") {
                                $bgColor = "bg-red-500 text-white px-2 py-1 rounded";
                            } elseif ($status === "diajukan") {
                                $bgColor = "bg-blue-500 text-black px-2 py-1 rounded";
                            }
                        @endphp

                        <td class="px-6 py-4">
                            <span class="{{ $bgColor }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="{{ route("admin.surat.detail", $s->id) }}"
                                class="inline-flex items-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded"
                            >
                                <i class="fas fa-pencil-alt mr-2"></i>
                                Detail
                            </a>
                            <form
                                action="{{ route("admin.surat.delete", $s->id) }}"
                                method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?');"
                            >
                                @csrf
                                @method("DELETE")
                                <button
                                    type="submit"
                                    class="delete-button inline-flex items-center mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded"
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
