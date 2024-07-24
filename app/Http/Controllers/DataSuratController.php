<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat\DomisiliForm;
use Illuminate\Support\Facades\DB;
use App\Models\Surat\BelumnikahForm;

class DataSuratController extends Controller
{
    public function index(){
        $belumNikah = BelumnikahForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Belum Nikah' as jenis_surat"), // Tambahkan jenis_surat untuk mengetahui asal tabel
            'created_at',
            'status'
        );
    
        // Ambil data dari tabel domisili_forms dan gabungkan dengan union
        $domisili = DomisiliForm::select(
            'id',
            'nik',
            'nama',
            DB::raw("'Ket Domisili' as jenis_surat"), // Tambahkan jenis_surat untuk mengetahui asal tabel
            'created_at',
            'status'
        );
        $data = $belumNikah->union($domisili)->orderBy('created_at')->get();
        
        foreach ($data as $item) {
            if ($item->jenis_surat === 'Ket Domisili') {
                $item->detail_url = route('surat.domisili.detail', $item->id);
                $item->delete_url = route('surat.domisili.delete', $item->id);
            } elseif ($item->jenis_surat === 'Ket Belum Nikah') {
                $item->detail_url = route('surat.belumnikah.detail', $item->id);
                $item->delete_url = route('surat.belumnikah.delete', $item->id);
            }
        }
        // Gabungkan kedua query dengan union
    
        $title = 'Data Surat';
    
        return view('admin.surat', compact('data', 'title'));
    }

    public function search(Request $request){

        $search = $request->input('search');
        $data = collect();

        if ($search) {

            $belumNikah = BelumnikahForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Belum Nikah' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");

            // Ambil data dari tabel domisili_forms
            $domisili = DomisiliForm::select(
                'nik',
                'nama',
                DB::raw("'Ket Domisili' as jenis_surat"),
                'created_at',
                'note',
                'status',
                'file'
            )->where('nik', 'like', "%{$search}%");

            // Ambil data dari tabel surat_nikah

            // Gabungkan ketiga query dengan union
            $data = $belumNikah
                        ->union($domisili)
                        ->orderBy('created_at')
                        ->get();
        }

        $title = 'Pelacakan Surat';

        return view('surat.lacak', compact('data', 'title'));
    }
    public function count(){
        $domisili = DomisiliForm::where('status', 'diajukan')->count();
        $belumnikah = BelumnikahForm::where('status', 'diajukan')->count();
        $domisilitotal = DomisiliForm::count();
        $belumnikahtotal = BelumnikahForm::count();

        $totalSuratDiajukan = $domisili + $belumnikah;
        $totalSurat = $domisilitotal + $belumnikahtotal;

        return response()->json([
            'totalSuratDiajukan' => $totalSuratDiajukan,
            'totalSurat' => $totalSurat,
        ]);
    }
}