<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat\DomisiliForm;
use Illuminate\Support\Facades\DB;
use App\Models\Surat\BelumnikahForm;

class ChartController extends Controller
{
    public function barChart()
    {
        // Retrieve the three most recent dates with their counts from the union of the two tables
        $recentDatesData = DB::select("
    SELECT date(created_at) as date, COUNT(*) as count
    FROM (
        SELECT created_at FROM belumnikah_forms
        UNION ALL
        SELECT created_at FROM domisili_forms
        UNION ALL
        SELECT created_at FROM lahir_forms
        UNION ALL
        SELECT created_at FROM meninggal_forms
        UNION ALL
        SELECT created_at FROM sktm_forms
        UNION ALL
        SELECT created_at FROM usaha_forms
        UNION ALL
        SELECT created_at FROM keramaian_forms
        UNION ALL
        SELECT created_at FROM ektp_forms
        UNION ALL
        SELECT created_at FROM skck_forms
        UNION ALL
        SELECT created_at FROM kehilangan_forms
        UNION ALL
        SELECT created_at FROM penghasilan_forms
        UNION ALL
        SELECT created_at FROM rekomendasi_forms
        UNION ALL
        SELECT created_at FROM kuasa_forms
        UNION ALL
        SELECT created_at FROM kia_forms
        UNION ALL
        SELECT created_at FROM nikah_forms
    ) AS combined
    GROUP BY date
    ORDER BY date DESC
    LIMIT 7
");

    
        // Extract dates and counts
        $recentDates = array_map(function ($item) {
            return $item->date;
        }, $recentDatesData);
    
        $data = array_map(function ($item) {
            return $item->count;
        }, $recentDatesData);
    
        $chartData = [
            'labels' => $recentDates,
            'data' => $data,
        ];
        $title = 'Dashboard';
    
        return view('admin.index', compact('chartData', 'title'));
    }
    
    

}
