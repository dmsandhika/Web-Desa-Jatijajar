<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\NikahForm;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NikahFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Form Surat Pengantar Nikah';
        return view('surat.form.nikah',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
                'nik' => 'required|string|max:16',
                'nama' => 'required|string|max:255',
                'ktp_pemohon' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'ktp_ayah' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'ktp_ibu' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'ktp_calon' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'kk_pemohon' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'kk_calon' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'tgl' => 'required|date',
                'ktp_wali' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'status_wali' => 'required|string|max:255',
                'no' => 'required|string|max:15',
            ]);

            $timestamp = now()->format('YmdHis');

            

            $ktp_pemohon = $request->file('ktp_pemohon');
            $ktp_pemohonName = $timestamp . '_' . $ktp_pemohon->getClientOriginalName();
            $ktp_pemohonPath = 'ktp/' . $ktp_pemohonName;
            $ktp_pemohon->move(public_path('ktp'), $ktp_pemohonName);
            
            $ktp_ayah = $request->file('ktp_ayah');
            $ktp_ayahName = $timestamp . '_' . $ktp_ayah->getClientOriginalName();
            $ktp_ayahPath = 'ktp/' . $ktp_ayahName;
            $ktp_ayah->move(public_path('ktp'), $ktp_ayahName);
            
            $ktp_ibu = $request->file('ktp_ibu');
            $ktp_ibuName = $timestamp . '_' . $ktp_ibu->getClientOriginalName();
            $ktp_ibuPath = 'ktp/' . $ktp_ibuName;
            $ktp_ibu->move(public_path('ktp'), $ktp_ibuName);
            
            $ktp_calon = $request->file('ktp_calon');
            $ktp_calonName = $timestamp . '_' . $ktp_calon->getClientOriginalName();
            $ktp_calonPath = 'ktp/' . $ktp_calonName;
            $ktp_calon->move(public_path('ktp'), $ktp_calonName);
            
            $kk_pemohon = $request->file('kk_pemohon');
            $kk_pemohonName = $timestamp . '_' . $kk_pemohon->getClientOriginalName();
            $kk_pemohonPath = 'kk/' . $kk_pemohonName;
            $kk_pemohon->move(public_path('kk'), $kk_pemohonName);
            
            $kk_calon = $request->file('kk_calon');
            $kk_calonName = $timestamp . '_' . $kk_calon->getClientOriginalName();
            $kk_calonPath = 'kk/' . $kk_calonName;
            $kk_calon->move(public_path('kk'), $kk_calonName);
            
            $ktp_wali = $request->file('ktp_wali');
            $ktp_waliName = $timestamp . '_' . $ktp_wali->getClientOriginalName();
            $ktp_waliPath = 'ktp/' . $ktp_waliName;
            $ktp_wali->move(public_path('ktp'), $ktp_wali);


            NikahForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'ktp_pemohon' => $ktp_pemohonPath,
                'ktp_ayah' => $ktp_ayahPath,
                'ktp_ibu' => $ktp_ibuPath,
                'ktp_calon' => $ktp_calonPath,
                'kk_pemohon' => $kk_pemohonPath,
                'kk_calon' => $kk_calonPath,
                'tgl'=>$request->input('tgl'),
                'ktp_wali' => $ktp_waliPath,
                'status_wali' => $request->input('status_wali'),
                'no' => $request->input('no'),
            ]);

            return redirect()->route('nikah.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('nikah.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }  

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NikahForm::find($id);
        $title = 'Detail Surat';
        
        
        return view('surat.submit.nikah', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:pdf|max:5120',
            'note' => 'nullable|string',
            'status' => 'required|in:diajukan,selesai,ditolak'
        ]);
    
        $data = NikahForm::find($id);
    
        $data->note = $request->note;
        $data->status = $request->status;
            
        
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($data->file && file_exists(public_path($data->file))) {
                unlink(public_path($data->file));
            }
    
            // Simpan file baru
            $file = $request->file('file');
            $timestamp = time();
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileExtension = $file->getClientOriginalExtension();
            $newFileName = $fileName . '_' . $timestamp . '.' . $fileExtension;
            $filePath = 'file/' . $newFileName;
            $file->move(public_path('file'), $newFileName);
            $data->file = $filePath;
        }
    
        // Simpan data formulir ke dalam basis data
        $data->save();
        
        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->route('admin.surat')->with('success', 'Surat Berhasil Ditindaklanjuti');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $form = NikahForm::findOrFail($id);

            

            $ktp_pemohon = public_path($form->ktp_pemohon);
            if (File::exists($ktp_pemohon)) {
                File::delete($ktp_pemohon);
            }
            $ktp_ayah = public_path($form->ktp_ayah);
            if (File::exists($ktp_ayah)) {
                File::delete($ktp_ayah);
            }
            $ktp_ibu = public_path($form->ktp_ibu);
            if (File::exists($ktp_ibu)) {
                File::delete($ktp_ibu);
            }
            $ktp_calon = public_path($form->ktp_calon);
            if (File::exists($ktp_calon)) {
                File::delete($ktp_calon);
            }
            $kk_pemohon = public_path($form->kk_pemohon);
            if (File::exists($kk_pemohon)) {
                File::delete($kk_pemohon);
            }
            $kk_calon = public_path($form->kk_calon);
            if (File::exists($kk_calon)) {
                File::delete($kk_calon);
            }
            $ktp_wali = public_path($form->ktp_wali);
            if (File::exists($ktp_wali)) {
                File::delete($ktp_wali);
            }
            $file = public_path($form->file);
            if (File::exists($file)) {
                File::delete($file);
            }

            // Hapus data dari database
            $form->delete();

            // Redirect dengan pesan sukses menggunakan SweetAlert2
            return redirect()->route('admin.surat')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error deleting belumnikah form: ' . $e->getMessage());

            // Redirect dengan pesan error menggunakan SweetAlert2
            return redirect()->route('admin.surat')->with('error', 'Terjadi kesalahan saat menghapus data.');
    }
}
}