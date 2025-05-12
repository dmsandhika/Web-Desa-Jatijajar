<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\Surat\DomisiliForm;
use Illuminate\Support\Facades\DB;
use App\Models\Surat\BelumnikahForm;

class ChartController extends Controller
{
    public function barChart()
    {
        // Ambil 7 tanggal terakhir dari data surat beserta jumlahnya
    $recentDatesData = Surat::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderByRaw('DATE(created_at) DESC')
        ->limit(7)
        ->get()
        ->reverse() // agar urutan dari tanggal lama ke baru (untuk chart)
        ->values();

        // Pisahkan label dan data
        $recentDates = $recentDatesData->pluck('date')->toArray();
        $data = $recentDatesData->pluck('count')->toArray();

        $chartData = [
            'labels' => $recentDates,
            'data' => $data,
    ];

        $title = 'Dashboard';

        return view('admin.index', compact('chartData', 'title'));
    }
    
    

}
