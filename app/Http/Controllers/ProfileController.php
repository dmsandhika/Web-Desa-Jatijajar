<?php

namespace App\Http\Controllers;

use App\Models\DataUsia;
use App\Models\DataAgama;
use Illuminate\Http\Request;
use App\Models\DataPekerjaan;
use App\Models\DataPendidikan;
use App\Models\DataJumlahPenduduk;

class ProfileController extends Controller
{
    public function index(){
        $penduduk = DataJumlahPenduduk::all();
        $agama = DataAgama::all();
        $pendidikan = DataPendidikan::all();
        $usia = DataUsia::all();

        $rts = $penduduk->pluck('rt')
            ->merge($agama->pluck('rt'))
            ->merge($pendidikan->pluck('rt'))
            ->merge($usia->pluck('rt'))
            ->unique();

        $rws = $penduduk->pluck('rw')
            ->merge($agama->pluck('rw'))
            ->merge($pendidikan->pluck('rw'))
            ->merge($usia->pluck('rw'))
        ->unique();


         // Ambil semua data dari tabel
        $dataPekerjaan = DataPekerjaan::all();

        // Ubah jadi array dan hitung total (laki + perempuan)
        $dataPekerjaan = $dataPekerjaan->map(function ($item) {
            $total = ($item->laki_laki ?? 0) + ($item->perempuan ?? 0);
            return [
                'name' => $item->name,
                'total' => $total,
            ];
        });

        // Pisahkan "BELUM/TIDAK BEKERJA"
        $belumBekerja = $dataPekerjaan->firstWhere('name', 'BELUM/TIDAK BEKERJA');

        // Filter data selain "BELUM/TIDAK BEKERJA"
        $dataLain = $dataPekerjaan->filter(fn($item) => $item['name'] !== 'BELUM/TIDAK BEKERJA');

        // Urutkan dan ambil 4 pekerjaan dengan total tertinggi
        $top4 = $dataLain->sortByDesc('total')->take(4);

        // Gabungkan sisanya jadi "Lainnya"
        $lainnyaTotal = $dataLain->sortByDesc('total')->slice(4)->sum('total');

        // Gabungkan semua data
        $finalDataPekerjaan = collect([
            $belumBekerja,
            ...$top4,
            ['name' => 'Lainnya', 'total' => $lainnyaTotal],
        ]);


        return view('profil', compact('penduduk','agama','pendidikan','usia', 'rts', 'rws', 'finalDataPekerjaan'));
    }
}
