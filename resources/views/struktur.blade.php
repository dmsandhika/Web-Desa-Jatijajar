<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div
        id="accordion-color"
        data-accordion="collapse"
        data-active-classes="bg-yellow-100 dark:bg-gray-300 text-yellow-500 dark:text-gray-800"
    >
        <h2 id="accordion-color-heading-1">
            <button
                type="button"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-yellow-20 hover:bg-gray-100  gap-3"
                data-accordion-target="#accordion-color-body-1"
                aria-expanded="true"
                aria-controls="accordion-color-body-1"
            >
                <span class="text-center w-full">Struktur Organisasi</span>
                <svg
                    data-accordion-icon
                    class="w-3 h-3 rotate-180 shrink-0"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5 5 1 1 5"
                    />
                </svg>
            </button>
        </h2>
        <div
    id="accordion-color-body-1"
    class="hidden"
    aria-labelledby="accordion-color-heading-1"
>
    <div class="p-5 border border-b-0 border-gray-200 flex justify-center">
        <img src="{{ asset($bnr->gambar) }}" alt="" />
    </div>
</div>

        @foreach ($struktur as $str)
            <h2 id="accordion-color-heading-{{ $str->id + 1 }}">
                <button
                    type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-yellow-20 hover:bg-gray-100  gap-3"
                    data-accordion-target="#accordion-color-body-{{ $str->id + 1 }}"
                    aria-expanded="false"
                    aria-controls="accordion-color-body-{{ $str->id + 1 }}"
                >
                    <span class="text-center w-full">
                        {{ $str["jabatan"] }}
                    </span>
                    <svg
                        data-accordion-icon
                        class="w-3 h-3 rotate-180 shrink-0"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-color-body-{{ $str->id + 1 }}"
                class="hidden"
                aria-labelledby="accordion-color-heading-{{ $str->id + 1 }}"
            >
                <div
                    class="p-5 border border-b-0 border-gray-200 dark:border-gray-700"
                >
                    <div class="relative overflow-x-auto">
                        <h2 class="text-3xl font-bold dark:text-white mb-3">
                            {{ $str["jabatan"] }}
                        </h2>
                        <table
                            class="w-full text-left rtl:text-right text-gray-500 "
                        >
                            <tbody>
                                <tr
                                    class="bg-gray-100 border-b "
                                >
                                    <th
                                        scope="row"
                                        class="px-6 py-4 w-1/4 text-gray-500 whitespace-nowrap "
                                    >
                                        Nama
                                    </th>
                                    <td class="px-6 py-4">
                                        :&nbsp;&nbsp;&nbsp; {{ $str["name"] }}
                                    </td>
                                </tr>
                                <tr
                                    class="bg-gray-100 border-b "
                                >
                                    <th
                                        scope="row"
                                        class="px-6 py-4 w-1/4 text-gray-500 whitespace-nowrap "
                                    >
                                        Jabatan
                                    </th>
                                    <td class="px-6 py-4">
                                        :&nbsp;&nbsp;&nbsp;
                                        {{ $str["jabatan"] }}
                                    </td>
                                </tr>
                                <tr
                                    class="bg-gray-100 border-b "
                                >
                                    <th
                                        scope="row"
                                        class="px-6 py-4 w-1/4 text-gray-500 whitespace-nowrap "
                                    >
                                        NIP
                                    </th>
                                    <td class="px-6 py-4">
                                        :&nbsp;&nbsp;&nbsp;
                                        @if ($str["nip"])
                                            {{ $str["nip"] }}
                                        @else
                                                -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if ($str["desc"])
                        <p
                            class="mb- ml-10 pt-10 text-gray-500 "
                        >
                            {{ $str["desc"] }}
                        </p>
                    @else
                        <p
                            class="mb- ml-10 pt-10 text-gray-400 italic text-center"
                        >
                            Tidak ada deskripsi
                        </p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
