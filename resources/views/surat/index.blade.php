<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex justify-end p-5">
        <a
            href="{{ route("surat.search") }}"
            class="inline-block py-2 px-6 rounded-l-xl rounded-t-xl bg-[#faca15] hover:bg-white cursor-pointer hover:border-[#faca15] hover:text-[#faca15] focus:text-[#faca15] focus:bg-gray-200 text-gray-50 font-bold leading-loose transition duration-200"
        >
            Cek Surat
        </a>
    </div>
    <div class="grid gap-6 lg:grid-cols-4 sm:grid-cols-2">
        @foreach ($surat as $item)
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow"
            >
                <a href="{{ route("surat.show", $item->id) }}">
                    <h5
                        class="mb-2 text-xl font-bold tracking-tight text-gray-900"
                    >
                        {{ $item->name }}
                    </h5>
                </a>
                <a
                    href="{{ route("surat.show", $item->id) }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300"
                >
                    Ajukan Surat
                    <svg
                        class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9"
                        />
                    </svg>
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
