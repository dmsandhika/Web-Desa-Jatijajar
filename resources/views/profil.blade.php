<x-layout>
    <x-slot:title>Profil Desa</x-slot>



<div>
    <h3 class="mb-4 mt-6 pt-6 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 md:text-5xl lg:text-3xl ">
        Profil Desa <span class="underline underline-offset-3 decoration-7 decoration-yellow-300 dark:decoration-yellow-400">Jatijajar</span>
    </h3>
    <p class="text-lg font-normal text-center text-gray-500 lg:text-l ">
        Desa Jatijajar adalah sebuah desa yang terletak di Kecamatan Bergas, Kabupaten Semarang, Provinsi Jawa Tengah. Desa ini memiliki pemandangan yang indah dan lingkungan yang asri, dengan udara yang sejuk karena terletak di daerah yang agak tinggi. Desa Jatijajar terbagi menjadi 5 dusun, sekaligus 5 RW, yaitu Dusun Kebonan (RW 1), Dusun Senden (RW 2), Dusun Begajah (RW 3), Dusun Saren (RW 4), dan Dusun Krajan (RW 5).
    </p>
</div>
<div>
    <h3 class="mb-4 mt-6 pt-6 text-3xl font-bold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-2xl ">
        Geografi Desa Jatijajar</span>
    </h3>
</div>
<div class="flex flex-col lg:flex-row items-start lg:items-start mt-4">
    <div class="lg:w-2/3 lg:pr-4">
        <p class="text-lg font-normal text-gray-500 lg:text-l  text-justify">
            <span class="indent-8">Desa Jatijajar terletak di Kecamatan Bergas, Kabupaten Semarang, Provinsi Jawa Tengah, pada ketinggian sekitar 500-600 meter di atas permukaan laut yang memberikan iklim sejuk dan kondisi tanah yang subur.</span> Desa ini berbatasan dengan Desa Bergas Kidul di sebelah utara, Desa Randugunting di sebelah timur, Desa Wringin Putih di sebelah selatan, dan Desa Bergas Lor di sebelah barat. Dikelilingi oleh perbukitan dan area pertanian yang luas, Desa Jatijajar memiliki akses yang cukup mudah melalui jalan-jalan utama yang menghubungkannya dengan pusat Kecamatan Bergas dan wilayah sekitarnya. Infrastruktur yang ada, seperti jalan raya dan fasilitas umum, mendukung mobilitas serta aktivitas sosial dan ekonomi masyarakat sehari-hari. Secara administratif desa Jatijajar memiliki luas wilayah mencapai 385 Ha.
        </p>
    </div>
    
    <div class="w-full lg:w-1/3 lg:pl-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31666.560851985585!2d110.40726893870239!3d-7.20427305523393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70841c0af5f8a3%3A0xe277132842599546!2sJatijajar%2C%20Kec.%20Bergas%2C%20Kabupaten%20Semarang%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1719896777395!5m2!1sid!2sid" class="w-full h-64 lg:h-80 border-2 border-gray-300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
</div>
<div>
    <h3 class="mb-4 mt-6 pt-6 text-3xl font-bold leading-none text-center tracking-tight text-gray-700 md:text-5xl lg:text-2xl ">
        Visualisasi Data</span>
    </h3>
</div>

<!DOCTYPE html>
<html>
<head>
    <title>Chart Penduduk</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="max-w-4xl mx-auto p-4 mb-6 bg-white shadow rounded-lg">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Filter Wilayah</h3>
    <div class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1">
            <label for="filterRT" class="block text-sm font-medium text-gray-600 mb-1">RT</label>
            <select id="filterRT" class="w-full rounded-lg border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none p-2">
                <option value="">Semua RT</option>
                @foreach($rts as $rt)
                    <option value="{{ $rt }}">{{ $rt }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-1">
            <label for="filterRW" class="block text-sm font-medium text-gray-600 mb-1">RW</label>
            <select id="filterRW" class="w-full rounded-lg border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none p-2">
                <option value="">Semua RW</option>
                @foreach($rws as $rw)
                    <option value="{{ $rw }}">{{ $rw }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>



<div class="max-w-7xl mx-auto space-y-6 px-4">
    {{-- Baris 1 --}}
    <div class="flex flex-col md:flex-row gap-4">
        <div class="md:w-1/3 w-full">
            <div class="bg-white shadow rounded-lg p-4 h-full">
                <h4 class="text-xl font-semibold text-gray-700 mb-2">Jumlah Penduduk</h4>
                <div class="aspect-[4/3] md:aspect-[5/3]">
                    <canvas id="pendudukChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <div class="md:w-2/3 w-full">
            <div class="bg-white shadow rounded-lg p-4 h-full">
                <h4 class="text-xl font-semibold text-gray-700 mb-2">Tingkat Pendidikan</h4>
                <div class="aspect-[3/3] md:aspect-[5/3]">
                    <canvas id="pendidikanChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris 2 --}}
    <div class="flex flex-col md:flex-row gap-4">
        <div class="md:w-2/3 w-full">
            <div class="bg-white shadow rounded-lg p-4 h-full">
                <h4 class="text-xl font-semibold text-gray-700 mb-2">Distribusi Usia</h4>
                <div class="aspect-[4/3] md:aspect-[5/3]">
                    <canvas id="usiaChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <div class="md:w-1/3 w-full">
            <div class="bg-white shadow rounded-lg p-4 h-full">
                <h4 class="text-xl font-semibold text-gray-700 mb-2">Distribusi Agama</h4>
               <div class="aspect-[4/3] md:aspect-[5/3]">
                    <canvas id="agamaChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Presentase Gambar --}}
    <div class="bg-white shadow rounded-lg p-6 text-center space-y-2">
        <div id="persentaseGambar" class="text-4xl flex flex-wrap justify-center gap-2"></div>
        <div id="persentaseText" class="text-xl"></div>
    </div>

    {{-- Distribusi Pekerjaan --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h4 class="text-xl font-semibold text-gray-700 mb-4 text-center">Distribusi Pekerjaan</h4>
        <div class="aspect-[4/3] md:aspect-[5/3]">
            <canvas id="pekerjaanChart" class="w-full h-full"></canvas>
        </div>
    </div>
</div>





</div>


<script>
    const pendudukData = @json($penduduk);
    const agamaData = @json($agama);
    const pendidikanData = @json($pendidikan);
    const usiaData = @json($usia);

    function sumPenduduk(rt = '', rw = '') {
        let filtered = pendudukData;
        if (rt) filtered = filtered.filter(d => d.rt === rt);
        if (rw) filtered = filtered.filter(d => d.rw === rw);

        const totalL = filtered.reduce((a, c) => a + parseInt(c["laki-laki"] || 0), 0);
        const totalP = filtered.reduce((a, c) => a + parseInt(c["perempuan"] || 0), 0);
        return [totalL, totalP];
    }

    function sumAgama(rt = '', rw = '') {
        let filtered = agamaData;
        if (rt) filtered = filtered.filter(d => d.rt === rt);
        if (rw) filtered = filtered.filter(d => d.rw === rw);

        const agama = ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu'];
        return agama.map(ag => 
            filtered.reduce((a, c) => a + parseInt(c[ag] || 0), 0)
        );
    }
    function sumPendidikan(rt = '', rw = '') {
        let filtered = pendidikanData;
        if (rt) filtered = filtered.filter(d => d.rt === rt);
        if (rw) filtered = filtered.filter(d => d.rw === rw);

        const pendidikan = {
            'Belum Sekolah': ['belum_sekolah'],
            'SD': ['sd', 'belum_tamat_sd'],
            'SMP': ['smp'],
            'SMA': ['sma'],
            'Perguruan Tinggi': ['d1_3', 'akademi', 's1', 's2', 's3']
        };
        return Object.values(pendidikan).map(group =>
            filtered.reduce((sum, item) => {
                return sum + group.reduce((subSum, key) => subSum + parseInt(item[key] || 0), 0);
            }, 0)
        );
    }

    function sumUsia(rt = '', rw = '') {
        let filtered = usiaData;
        if (rt) filtered = filtered.filter(d => d.rt === rt);
        if (rw) filtered = filtered.filter(d => d.rw === rw);

        const usia = {
            'Anak - anak': ['0-4', '5-9', '10-14'],
            'Remaja': ['15-19', '20-24'],
            'Dewasa': ['25-29', '30-34', '35-39', '40-44', '45-49', '50-54', '55-59'],
            'Lansia': [ '60-64', '65-69', '70-74', '>=75']
        };
        return Object.values(usia).map(group =>
            filtered.reduce((sum, item) => {
                return sum + group.reduce((subSum, key) => subSum + parseInt(item[key] || 0), 0);
            }, 0)
        );
    }

    function hitungPersentaseUsiaProduktif() {
        const usiaData = sumUsia(); // Ambil data usia per kelompok
        const usiaProduktifIndex = [1, 2]; // Index untuk Remaja dan Dewasa

        const totalUsiaProduktif = usiaProduktifIndex.reduce((sum, index) => sum + usiaData[index], 0);
        const totalData = usiaData.reduce((sum, value) => sum + value, 0);

        return (totalUsiaProduktif / totalData) * 100;
    }
    function tampilkanGambarPersentase(persentase) {
        const jumlahGambar = 10; // 10 ikon untuk mewakili 100%
        const jumlahGambarDitampilkan = Math.round((persentase / 100) * jumlahGambar);

        const container = document.getElementById('persentaseGambar');
        container.innerHTML = ''; // Reset tampilan sebelumnya

        for (let i = 0; i < jumlahGambar; i++) {
            const personIcon = document.createElement('span');
            personIcon.classList.add('fas', 'fa-user'); // Font Awesome icon

            // Jika urutan ikon lebih kecil dari jumlah yang ditampilkan, beri warna hijau (usia produktif)
            if (i < jumlahGambarDitampilkan) {
                personIcon.classList.add('text-green-500'); // Hijau untuk produktif
            } else {
                personIcon.classList.add('text-gray-500'); // Abu-abu untuk non-produktif
            }

            container.appendChild(personIcon);
        }
        const persentaseText = document.getElementById('persentaseText');
        persentaseText.textContent = `${persentase.toFixed(2)}% warga desa Jatijajar saat ini berada dalam usia produktif.`;
    }
    const ctxPenduduk = document.getElementById('pendudukChart').getContext('2d');
    const ctxAgama = document.getElementById('agamaChart').getContext('2d');
    const ctxPendidikan = document.getElementById('pendidikanChart').getContext('2d');
    const ctxUsia = document.getElementById('usiaChart').getContext('2d');
    const ctx = document.getElementById('pekerjaanChart').getContext('2d');

    const pendudukChart = new Chart(ctxPenduduk, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: sumPenduduk(),
                backgroundColor: ['#36A2EB', '#FF6384']
            }]
        }
    });

    const agamaChart = new Chart(ctxAgama, {
        type: 'pie',
        data: {
            labels: ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
            datasets: [{
                data: sumAgama(),
                backgroundColor: ['#f39c12', '#3498db', '#e74c3c', '#9b59b6', '#2ecc71', '#95a5a6']
            }]
        }
    });

    const pendidikanChart = new Chart(ctxPendidikan, {
        type: 'bar',
        data: {
            labels: ['Tidak/Belum Sekolah', 'Belum Tamat/SD Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'Perguruan Tinggi'],
            datasets: [{
                data: sumPendidikan(),
                backgroundColor: ['#f39c12', '#3498db', '#e74c3c', '#9b59b6', '#2ecc71', '#95a5a6', '#34495e', '#16a085', '#2980b9']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value, index, values) {
                            const label = this.getLabelForValue(index);
                            return label.length > 20 ? label.slice(0, 20) + '…' : label;
                        },
                        maxRotation: 45, // label miring
                        minRotation: 30
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    })

    const usiaChart = new Chart(ctxUsia, {
        type: 'bar',
        data: {
            labels: ['Anak - anak (0 - 14 tahun)', 'Remaja (15 - 24 tahun)', 'Dewasa (25 - 64 tahun)', 'Lansia (>= 65 tahun)'],
            datasets: [{
                data: sumUsia(),
                backgroundColor: [ '#95a5a6', '#34495e', '#16a085', '#2980b9']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value, index, values) {
                            const label = this.getLabelForValue(index);
                            return label.length > 20 ? label.slice(0, 20) + '…' : label;
                        },
                        maxRotation: 45, // label miring
                        minRotation: 30
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    })
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($finalDataPekerjaan->pluck('name')) !!},
            datasets: [{
                label: 'Jumlah Penduduk per Pekerjaan',
                data: {!! json_encode($finalDataPekerjaan->pluck('total')) !!},
                backgroundColor: ['#2ecc71', '#95a5a6', '#34495e', '#16a085', '#2980b9','#FF6384']
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    function updateCharts(rt, rw) {
        pendudukChart.data.datasets[0].data = sumPenduduk(rt, rw);
        pendudukChart.update();

        agamaChart.data.datasets[0].data = sumAgama(rt, rw);
        agamaChart.update();

        pendidikanChart.data.datasets[0].data = sumPendidikan(rt, rw);
        pendidikanChart.update();

        usiaChart.data.datasets[0].data = sumUsia(rt, rw);
        usiaChart.update();
    }

    document.getElementById('filterRT').addEventListener('change', function () {
        updateCharts(this.value, document.getElementById('filterRW').value);
    });

    document.getElementById('filterRW').addEventListener('change', function () {
        updateCharts(document.getElementById('filterRT').value, this.value);
    });
    const persentaseUsiaProduktif = hitungPersentaseUsiaProduktif();
    console.log("Persentase usia produktif: " + persentaseUsiaProduktif.toFixed(2) + "%");
    tampilkanGambarPersentase(persentaseUsiaProduktif);
</script>



</x-layout>