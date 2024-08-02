<x-layout>
    <x-slot:title>Artikel Berhasil Diajukan</x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-4 text-green-600">
                Artikel Berhasil Diajukan
            </h1>
            <p class="mb-6 text-gray-700">
                Terima kasih! Artikel Anda telah berhasil diajukan dan akan
                ditinjau oleh admin.
            </p>
            <a href="{{ route("articles.index") }}">
                <button
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"
                >
                    Kembali ke Beranda
                </button>
            </a>
        </div>
    </div>
</x-layout>
