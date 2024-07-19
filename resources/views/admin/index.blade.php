<x-layout-admin>
  <x-slot:title>{{ $title }}</x-slot>
  <div class="grid grid-cols-2 w-[1050px] gap-2 max-[750px]:grid-cols-1 px-3 mt-6">
    <div class="group w-full rounded-lg bg-[#673ab7] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]" >
      <p class="text-white text-2xl">2000</p>
      <p class="text-white text-sm">Surat Diajukan</p>
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
    <div class="group w-full rounded-lg bg-[rgb(41,49,79)] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_rgb(244,67,54)]" >
      <p class="text-white text-2xl">1999</p>
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
    <a href="/admin/artikel/daftar" class="group w-full rounded-lg bg-[#fc6602] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#fc1b02]" >
      <p class="text-white text-2xl" id="submittedCount"></p>
      <p class="text-white text-sm">Artikel Diajukan</p>
      <svg
        class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
        xmlns="http://www.w3.org/2000/svg"
        height="36"
        viewBox="0 0 24 24"
        width="36"
        fill="#ffffff"
    >
        <path d="M0 0h24v24H0z" fill="none" />
        <path d="M13 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V9l-6-6zM5 19V5h7v5h5v9H5zm8-9h-4v2h4v-2zm-4 4h8v2h-8v-2zm0 4h8v2h-8v-2z" />
    </svg>
  </a>
    <a href="/article" class="group w-full rounded-lg bg-[#ff0000] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#ff7777]" >
      <p class="text-white text-2xl" id="acceptedCount"></p>
      <p class="text-white text-sm">Artikel Dipublish</p>
      <svg
        class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
        xmlns="http://www.w3.org/2000/svg"
        height="36"
        viewBox="0 0 24 24"
        width="36"
        fill="#ffffff"
    >
        <path d="M0 0h24v24H0z" fill="none" />
        <path d="M13 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V9l-6-6zM5 19V5h7v5h5v9H5zm8-9h-4v2h4v-2zm-4 4h8v2h-8v-2zm0 4h8v2h-8v-2z" />
    </svg>
  </a>

  </div>

  <script>
    // Panggil fungsi untuk mendapatkan jumlah artikel yang diajukan dan diterima
    fetch('/articles/count')
        .then(response => response.json())
        .then(data => {
            document.getElementById('submittedCount').innerText = data.submittedArticlesCount;
            document.getElementById('acceptedCount').innerText = data.acceptedArticlesCount;
        });
</script>
</x-layout-admin>
