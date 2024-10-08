@props(["active" => false])
<a
    {{ $attributes }}
    class="{{ $active ? "flex items-center active-nav-link text-white py-4 pl-6 nav-item" : "flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item" }}"
    aria-current="{{ $active ? "page" : false }}"
>
    {{ $slot }}
</a>
