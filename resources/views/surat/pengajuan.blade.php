<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <div
                    class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6"
                >
                    @foreach ($config as $key => $type)
                        @if ($type == "text")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <input
                                        type="text"
                                        placeholder="Masukkan {{ $key }}"
                                        name="{{ $key }}"
                                        id="{{ $key }}"
                                        autocomplete="off"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    />
                                </div>
                            </div>
                        @elseif ($type == "file")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <input
                                        type="file"
                                        name="{{ $key }}"
                                        id="{{ $key }}"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none"
                                    />
                                </div>
                            </div>
                        @elseif ($type == "textarea")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <textarea
                                        id="{{ $key }}"
                                        name="{{ $key }}"
                                        placeholder="Masukkan {{ $key }}..."
                                        rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    ></textarea>
                                </div>
                            </div>
                        @elseif (is_array($type) && $type["type"] == "radio")
                            <div class="col-span-full">
                                <label
                                    for="{{ $key }}"
                                    class="block text-sm font-medium leading-6 text-gray-900"
                                >
                                    {{ $key }}
                                </label>
                                <div class="mt-2">
                                    <select
                                        name="{{ $key }}"
                                        id="{{ $key }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    >
                                        <option value="" disabled>Pilih</option>
                                        @foreach ($type["options"] as $option)
                                            <option value="{{ $option }}">
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 gap-x-6">
                <a href="/surat" class="inline-block">
                    <button
                        type="button"
                        class="p-2 text-sm font-semibold leading-6 text-gray-900 border border-transparent rounded hover:border-gray-500"
                    >
                        Cancel
                    </button>
                </a>

                <button
                    type="submit"
                    class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Submit
                </button>
            </div>
        </div>
    </form>
</x-layout>
