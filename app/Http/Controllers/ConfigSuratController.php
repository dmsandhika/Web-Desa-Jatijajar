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

    public function create(){
        $title = 'Tambah Konfigurasi Surat';
        return view('config_surat.create', compact('title'));
    }
    public function destroy($id){
        $data = ConfigSurat::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function store(Request $request){
        $data = new ConfigSurat();
        $data->name = $request->name;
        $name_values = $request->input('name_value');
        $types = $request->input('type');

        $value = [];

        foreach ($name_values as $index => $label) {
            $label = trim($label);
            if ($label !== '') {
                $value[$label] = $types[$index];
            }
        }
        $data->value = json_encode($value);
        $data->save();

        return redirect()->route('surat.config.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id){
        $data = ConfigSurat::find($id);
        $config = json_decode($data->value, true); 
        $title = 'Edit Konfigurasi Surat';
        return view('config_surat.edit', compact('data', 'title', 'config'));
    }

    public function update(Request $request, $id){
        $data = ConfigSurat::find($id);
        $data->name = $request->name;
        $name_values = $request->input('name_value');
        $types = $request->input('type');

        $value = [];

        foreach ($name_values as $index => $label) {
            $label = trim($label);
            if ($label !== '') {
                $value[$label] = $types[$index];
            }
        }
        $data->value = json_encode($value);
        $data->save();

        return redirect()->route('surat.config.index')->with('success', 'Data berhasil disimpan.');
    }
}
