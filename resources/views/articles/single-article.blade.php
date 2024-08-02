<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <h4
        class="font-bold text-2xl uppercase duration-300 group-hover:text-white group-hover:z-[5] hover:underline text-center"
    >
        {{ $article->title }}
    </h4>
    <div
        class="text-base text-gray-500 group-hover:text-white group-hover:z-[5] mt-5"
    >
        <div class="text-right">
            Dibuat Oleh
            <a href="#" class="hover:underline group-hover:text-white">
                {{ $article->author }}
            </a>
            |
            <a href="" class="hover:underline group-hover:text-white">
                {{ $article->category->name }}
            </a>
            | {{ $article->created_at->diffForHumans() }}
        </div>

        @if (! empty($article->photo))
            <div class="flex justify-center my-6">
                <img
                    src="{{ asset($article->photo) }}"
                    alt="{{ $article->title }}"
                    class="rounded-lg shadow-md"
                />
            </div>
        @endif

        <p class="my-6 font-light group-hover:text-white">
            {!! nl2br(e($article->content)) !!}
        </p>
    </div>

    <a href="/article" class="font-medium text-yellow-300 hover:underline">
        &laquo; Kembali
    </a>
</x-layout>
