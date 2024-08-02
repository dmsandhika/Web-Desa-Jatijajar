<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex justify-between items-center w-full mb-8">
        <form
            class="form relative w-1/4"
            action="{{ url("article") }}"
            method="get"
        >
            <div class="absolute left-2 -translate-y-1/2 top-1/2 p-1">
                <svg
                    width="17"
                    height="16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    role="img"
                    aria-labelledby="search"
                    class="w-5 h-5 text-gray-700"
                >
                    <path
                        d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                        stroke="currentColor"
                        stroke-width="1.333"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    ></path>
                </svg>
            </div>
            <input
                class="input rounded-full px-8 py-3 border-2 border-transparent focus:outline-none focus:border-blue-500 placeholder-gray-400 transition-all duration-300 shadow-md w-full"
                placeholder="Cari..."
                name="search"
                required=""
                type="text"
            />
            <button
                type="reset"
                class="absolute right-3 -translate-y-1/2 top-1/2 p-1"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-gray-700"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    ></path>
                </svg>
            </button>
        </form>

        <a
            href="/articles/create"
            class="inline-block py-2 px-6 rounded-l-xl rounded-t-xl bg-[#faca15] hover:bg-white cursor-pointer hover:border-[#faca15] hover:text-[#faca15] focus:text-[#faca15] focus:bg-gray-200 text-gray-50 font-bold leading-loose transition duration-200"
        >
            Tambah
        </a>
    </div>

    @if ($hasArticles)
        @foreach ($articles as $blog)
            <div
                class="overflow-hidden before:ease-in-out mb-6 after:ease-in-out bg-white group cursor-pointer relative flex flex-col gap-4 justify-between rounded-2xl border hover:after:w-full border-white-222 hover:border-[#faca15] duration-300 p-4 md:p-6 px-8 before:h-full before:w-2 hover:before:w-full after:absolute after:top-0 after:left-0 after:h-full after:w-0 after:duration-300 after:opacity-5 after:bg-[url('https://s3-alpha-sig.figma.com/img/6956/4aec/59afa93303a34a23ecc13368dc4094db?Expires=1717977600&amp;Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&amp;Signature=PFrwNwC7QeqlIUsWFsC-jbQzlVTUSh7T5VfJ9vMNaAEsoOS92kRDH-OjWcAX~dmuZ77fPWjZJX0v1kXaZENeqa--USg1BcCN8z~Z1id5y5RQT1ZTU5OR4PRrLISHbowyTAu65h2jCKOSYXCrXN3F6fH8epD-Pm9TCGCYvD9svkhnbTSZxPKZhn8okHm7W~3wWyIhJBaZyQ30qWwD~JAh5r0BRE6XIfIpgTlUWeLq9wwCbwFZQR5RWInuHUfLrfhvAnxmzVVoTO1TxyjHOeXVb68Tc~nJuypwlDmcd0Sg02sJu3-uj7vFXRul6qw0LRfsQrWS5c5RJ~P-z5-eS~1jTA__')] before:duration-300 before:-z-1 before:bg-[#faca15] before:absolute before:top-0 before:left-0"
                onclick="window.location.href='/article/{{ $blog["slug"] }}'"
            >
                <a
                    href="/article/{{ $blog["slug"] }}"
                    class="font-bold text-xl duration-300 group-hover:text-white group-hover:z-[5] hover:underline"
                >
                    {{ $blog->title }}
                </a>
                <div
                    class="text-base text-gray-500 group-hover:text-white group-hover:z-[5]"
                >
                    Dibuat Oleh
                    <a href="#" class="hover:underline group-hover:text-white">
                        {{ $blog->author }}
                    </a>
                    |
                    <a href="" class="hover:underline group-hover:text-white">
                        {{ $blog->category->name }}
                    </a>
                    | {{ $blog->created_at->diffForHumans() }}
                    <p class="my-4 font-light group-hover:text-white">
                        {{ Str::limit($blog["content"], 200) }}
                    </p>
                </div>

                <a
                    href="/article/{{ $blog["slug"] }}"
                    class="text-[#1D2825] group-hover:z-[5] font-medium duration-300 group-hover:text-white mt-auto flex items-center gap-2 text-sm xl:text-base hover:underline"
                >
                    Baca Selengkapnya
                    <svg
                        class="w-4 h-4"
                        stroke="currentColor"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                        ></path>
                    </svg>
                </a>
            </div>
        @endforeach
    @else
        <p>Data tidak ada</p>
    @endif
</x-layout>
