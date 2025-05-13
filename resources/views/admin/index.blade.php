<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>
    <div
        class="grid grid-cols-2 w-[1050px] gap-2 max-[750px]:grid-cols-1 px-3 mt-6"
    >
        <a
            href="{{ route("admin.surat.diajukan") }}"
            class="group w-full rounded-lg bg-[#673ab7] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#2196f3]"
        >
            <p class="text-2xl text-white" id="totalSuratDiajukan">
                {{ $diajukan }}
            </p>
            <p class="text-sm text-white">Surat Diajukan</p>
            <svg
                class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
                xmlns="http://www.w3.org/2000/svg"
                height="36"
                viewBox="0 0 24 24"
                width="36"
                fill="#ffffff"
            >
                <path d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"
                />
            </svg>
        </a>
        <a href="{{ route("admin.surat") }}">
            <div
                class="group w-full rounded-lg bg-[rgb(41,49,79)] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_rgb(244,67,54)]"
            >
                <p class="text-2xl text-white" id="totalSurat">{{ $total }}</p>
                <p class="text-sm text-white">Total Surat</p>
                <svg
                    class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
                    xmlns="http://www.w3.org/2000/svg"
                    height="36"
                    viewBox="0 0 24 24"
                    width="36"
                    fill="#ffffff"
                >
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"
                    />
                </svg>
            </div>
        </a>
        <a
            href="{{ route("article.list.diajukan") }}"
            class="group w-full rounded-lg bg-[#fc6602] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#fc1b02]"
        >
            <p class="text-2xl text-white" id="submittedCount"></p>
            <p class="text-sm text-white">Artikel Diajukan</p>
            <svg
                class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
                xmlns="http://www.w3.org/2000/svg"
                height="36"
                viewBox="0 0 24 24"
                width="36"
                fill="#ffffff"
            >
                <path d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M13 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V9l-6-6zM5 19V5h7v5h5v9H5zm8-9h-4v2h4v-2zm-4 4h8v2h-8v-2zm0 4h8v2h-8v-2z"
                />
            </svg>
        </a>
        <a
            href="/article"
            class="group w-full rounded-lg bg-[#ff0000] p-5 transition relative duration-300 cursor-pointer hover:translate-y-[3px] hover:shadow-[0_-8px_0px_0px_#ff7777]"
        >
            <p class="text-2xl text-white" id="acceptedCount"></p>
            <p class="text-sm text-white">Artikel Dipublish</p>
            <svg
                class="group-hover:opacity-100 absolute right-[10%] top-[50%] translate-y-[-50%] opacity-20 transition group-hover:scale-110 duration-300"
                xmlns="http://www.w3.org/2000/svg"
                height="36"
                viewBox="0 0 24 24"
                width="36"
                fill="#ffffff"
            >
                <path d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M13 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V9l-6-6zM5 19V5h7v5h5v9H5zm8-9h-4v2h4v-2zm-4 4h8v2h-8v-2zm0 4h8v2h-8v-2z"
                />
            </svg>
        </a>
    </div>
    <div class="w-4/5 mx-auto mt-10">
        <h1 class="mb-6 text-2xl font-bold text-center">
            Data Surat Masuk 7 Hari Terakhir
        </h1>
        <canvas id="barChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartData["labels"]),
                datasets: [
                    {
                        label: 'Surat Masuk',
                        data: @json($chartData["data"]),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>

    <script>
        // Panggil fungsi untuk mendapatkan jumlah artikel yang diajukan dan diterima
        fetch('/surat/count')
            .then((response) => response.json())
            .then((dataSurat) => {
                document.getElementById('totalSurat').innerText =
                    dataSurat.totalSurat;
                document.getElementById('totalSuratDiajukan').innerText =
                    dataSurat.totalSuratDiajukan;
            });
        fetch('/articles/count')
            .then((response) => response.json())
            .then((data) => {
                document.getElementById('submittedCount').innerText =
                    data.submittedArticlesCount;
                document.getElementById('acceptedCount').innerText =
                    data.acceptedArticlesCount;
            });
    </script>
</x-layout-admin>
