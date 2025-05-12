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

    public function dataSurat(){
        $data = Surat::all();
        $title = 'Data Surat';
        foreach($data as $item){
                $item->data = json_decode($item->data, true);
            }
        return view('admin.surat.index', compact('title', 'data'));
    }
    public function diajukan(){
        $data = Surat::where('status', 'diajukan')->get();
        $title = 'Data Surat';
        foreach($data as $item){
                $item->data = json_decode($item->data, true);
            }
        return view('admin.surat.index', compact('title', 'data'));
    }

    public function ditolak(){
        $data = Surat::where('status', 'ditolak')->get();
        $title = 'Data Surat';
        foreach($data as $item){
                $item->data = json_decode($item->data, true);
            }
        return view('admin.surat.index', compact('title', 'data'));
    }
    public function selesai(){
        $data = Surat::where('status', 'selesai')->get();
        $title = 'Data Surat';
        foreach($data as $item){
                $item->data = json_decode($item->data, true);
            }
        return view('admin.surat.index', compact('title', 'data'));
    }
    public function editSurat($id){
        $surat = Surat::find($id);
        $surat->data = json_decode($surat->data, true);
        $config = ConfigSurat::where('name', $surat->jenis_surat)->first();
        $config = json_decode($config->value, true); 

        $title = 'Detail Surat';
        return view('admin.surat.edit', compact('surat', 'title', 'config'));
    }

    public function updateSurat(Request $request, $id){
        $surat = Surat::find($id);
        $request->validate([
            'note' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:5120',
            'status' => 'required|in:diajukan,selesai,ditolak'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $path = $file->storeAs('uploads/surat', $filename, 'public');
            $surat->file = $path;
        }

        $surat->note = $request->note;
        $surat->status = $request->status;
        $surat->save();
        return redirect('/admin/surat')->with('success', 'Surat berhasil diupdate');
    
    }

    public function destroySurat($id){
        $surat = Surat::find($id);
        $surat->delete();
        return redirect('/admin/surat')->with('success', 'Surat berhasil dihapus');
    }

    
}
