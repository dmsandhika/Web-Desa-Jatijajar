<?php

namespace App\Http\Controllers;

use App\Models\ConfigSurat;
use Illuminate\Http\Request;

class ConfigSuratController extends Controller
{
    public function index(){
        $data = ConfigSurat::all();
        $title = 'Konfigurasi Surat';
        return view('config_surat.index', compact('data', 'title'));
    }

    public function destroy($id){
        $data = ConfigSurat::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
