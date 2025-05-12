<?php

namespace App\Http\Controllers;

use App\Models\DataUsia;
use App\Models\DataAgama;
use App\Models\ConfigData;
use App\Imports\UsiaImport;
use App\Imports\AgamaImport;
use Illuminate\Http\Request;
use App\Models\DataPekerjaan;
use App\Models\DataPendidikan;
use App\Imports\PekerjaanImport;
use App\Imports\PendidikanImport;
use App\Models\DataJumlahPenduduk;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JumlahPendudukImport;
use Illuminate\Support\Facades\Storage;

class ImportDataController extends Controller
{
    public function index(){
        $data = ConfigData::all();
        return view('admin.data.index', compact('data'));
    }


    public function dataAgama(){
        $data = ConfigData::where('name', 'agama')->first();
        return view('admin.data.agama', compact('data'));
    }
    public function importAgama(Request $request){
        $data = ConfigData::where('name', 'Agama')->first();
        if ($data && $data->file && Storage::exists($data->file)) {
            Storage::delete($data->file);
        }
        DataAgama::truncate();
        $file = $request->file('file');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $path = $file->storeAs('data', $filename, 'public');
        $data->file = $path;
        $data->save();
        Excel::import(new AgamaImport, $request->file('file'));

        return back()->with('success', 'Data agama berhasil diimport');
    }

    public function dataJumlahPenduduk(){
        $data = ConfigData::where('name', 'jumlah penduduk')->first();
        return view('admin.data.jumlah_penduduk', compact('data'));
    }
    public function importJumlahPenduduk(Request $request){
        $data = ConfigData::where('name', 'Jumlah Penduduk')->first();
        if ($data && $data->file && Storage::exists($data->file)) {
            Storage::delete($data->file);
        }
        DataJumlahPenduduk::truncate();
        $file = $request->file('file');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $path = $file->storeAs('data', $filename, 'public');
        $data->file = $path;
        $data->save();
        Excel::import(new JumlahPendudukImport, $request->file('file'));

        return back()->with('success', 'Data jumlah penduduk berhasil diimport');
    }

    public function dataPekerjaan(){
        $data = ConfigData::where('name', 'Pekerjaan')->first();
        return view('admin.data.pekerjaan', compact('data'));
    }
    public function importPekerjaan(Request $request){
        $data = ConfigData::where('name', 'Pekerjaan')->first();
        if ($data && $data->file && Storage::exists($data->file)) {
            Storage::delete($data->file);
        }
        DataPekerjaan::truncate();
        $file = $request->file('file');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $path = $file->storeAs('data', $filename, 'public');
        $data->file = $path;
        $data->save();
        Excel::import(new PekerjaanImport(), $request->file('file'));

        return back()->with('success', 'Data pekerjaan berhasil diimport');
    }

    public function dataPendidikan(){
        $data = ConfigData::where('name', 'Pendidikan')->first();
        return view('admin.data.pendidikan', compact('data'));
    }

    public function importDataPendidikan(Request $request){
        $data = ConfigData::where('name', 'Pendidikan')->first();
        if ($data && $data->file && Storage::exists($data->file)) {
            Storage::delete($data->file);
        }
        DataPendidikan::truncate();
        $file = $request->file('file');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $path = $file->storeAs('data', $filename, 'public');
        $data->file = $path;
        $data->save();
        Excel::import(new PendidikanImport(), $request->file('file'));

        return back()->with('success', 'Data pendidikan berhasil diimport');
    }

    public function dataUsia(){
        $data = ConfigData::where('name', 'Usia')->first();
        return view('admin.data.usia', compact('data'));
    }

    public function importUsia(Request $request){
        $data = ConfigData::where('name', 'Usia')->first();
        if ($data && $data->file && Storage::exists($data->file)) {
            Storage::delete($data->file);
        }
        DataUsia::truncate();
        $file = $request->file('file');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $path = $file->storeAs('data', $filename, 'public');
        $data->file = $path;
        $data->save();
        Excel::import(new UsiaImport(), $request->file('file'));

        return back()->with('success', 'Data usia berhasil diimport');
    }
}
