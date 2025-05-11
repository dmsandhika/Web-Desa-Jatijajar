<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\ConfigSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function index(){
        $surat = ConfigSurat::all();
        $title = 'Pengajuan Surat';
        return view('surat.index', compact('surat', 'title'));
    }

    public function show($id){
        $surat = ConfigSurat::find($id);
        $title = 'Pengajuan '.$surat->name;
        $config = json_decode($surat->value, true); 

        return view('surat.pengajuan', compact('surat', 'title', 'config'));
    }

    public function store(Request $request){
        $data = [];

        foreach ($request->except(['_token', 'jenis_surat']) as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $path = $file->storeAs('uploads', $filename, 'public');
                $data[$key] = $path;
            } else {
                $data[$key] = $value;
            }
        }

        Surat::create([
            'jenis_surat' => $data['jenis_surat'] ?? 'Tidak diketahui',
            'data' => json_encode($data),
        ]);

        return redirect('/surat')->with('success', 'Pengajuan surat berhasil disimpan.');
    }

    public function lacak (Request $request){
        $title = 'Pelacakan Surat';
        $search = $request->input('search');
        $data = [];
        if($search){
            $data = Surat::where('data', 'like', '%'.$search.'%')->get();
            foreach($data as $item){
                $item->data = json_decode($item->data, true);
            }
        }

        return view('surat.lacak', compact( 'title', 'data'));
    }
}
