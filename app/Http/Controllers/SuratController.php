<?php

namespace App\Http\Controllers;

use App\Models\ConfigSurat;
use Illuminate\Http\Request;

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
}
