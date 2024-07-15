<x-layout-admin>
  <x-slot:title>{{ $title }}</x-slot>
  <div class="grid grid-cols-3 w-[1050px] gap-2 max-[750px]:grid-cols-1 px-3 mt-6">
    <div
      class="group w-full rounded-lg bg-[#673ab7] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]"
    >
      <p class="text-white text-2xl">2000</p>
      <p class="text-white text-sm">Total Surat Diajukan</p>
      <svg
        class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
        xmlns="http://www.w3.org/2000/svg"
        height="36"
        viewBox="0 0 24 24"
        width="36"
        fill="#ffffff"
      >
        <path d="M0 0h24v24H0z" fill="none" />
        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
      </svg>
    </div>
    <div
      class="group w-full rounded-lg bg-[rgb(41,49,79)] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_rgb(244,67,54)]"
    >
      <p class="text-white text-2xl">1999</p>
      <p class="text-white text-sm">Surat Diproses</p>
      <svg
        class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
        xmlns="http://www.w3.org/2000/svg"
        height="36"
        viewBox="0 0 24 24"
        width="36"
        fill="#ffffff"
      >
        <path d="M0 0h24v24H0z" fill="none" />
        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
      </svg>
    </div>
    <div
      class="group w-full rounded-lg bg-[rgb(253,200,48)] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#fc6f03]"
    >
      <p class="text-white text-2xl">1000</p>
      <p class="text-white text-sm">Surat Selesai</p>
      <svg
        class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
        xmlns="http://www.w3.org/2000/svg"
        height="36"
        viewBox="0 0 24 24"
        width="36"
        fill="#ffffff"
      >
        <path d="M0 0h24v24H0z" fill="none" />
        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
      </svg>
    </div>
  </div>
</x-layout-admin>
