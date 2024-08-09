<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\LahirForm;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LahirFormController extends Controller
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
        $title='Form Surat Keterangan Lahir';
        return view('surat.form.lahir', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
 
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|string',
                'nama' => 'required|string',
                'anak' => 'required|string',
                'keperluan' => 'required|string',
                'no' => 'required|numeric',
                'suket' => 'required|file|mimes:jpg,png,pdf|max:2048',
                'ktp_ayah' => 'required|file|mimes:jpg,png,pdf|max:2048',
                'ktp_ibu' => 'required|file|mimes:jpg,png,pdf|max:2048',
                'surat_nikah' => 'required|file|mimes:jpg,png,pdf|max:2048',
                'saksi1' => 'required|file|mimes:jpg,png,pdf|max:2048',
                'saksi2' => 'required|file|mimes:jpg,png,pdf|max:2048',
            ]);

            $timestamp = now()->format('YmdHis');

            $suket = $request->file('suket');
            $suketName = $timestamp . '_' . $suket->getClientOriginalName();
            $suketPath = 'suket/' . $suketName;
            $suket->move(public_path('suket'), $suketName);

            $ktp_ayah = $request->file('ktp_ayah');
            $ktpAyahName = $timestamp . '_' . $ktp_ayah->getClientOriginalName();
            $ktpAyahPath = 'ktp/' . $ktpAyahName;
            $ktp_ayah->move(public_path('ktp'), $ktpAyahName);

            $ktp_ibu = $request->file('ktp_ibu');
            $ktpIbuName = $timestamp . '_' . $ktp_ibu->getClientOriginalName();
            $ktpIbuPath = 'ktp/' . $ktpIbuName;
            $ktp_ibu->move(public_path('ktp'), $ktpIbuName);
            
            $surat_nikah = $request->file('surat_nikah');
            $surat_nikahName = $timestamp . '_' . $surat_nikah->getClientOriginalName();
            $surat_nikahPath = 'nikah/' . $surat_nikahName;
            $surat_nikah->move(public_path('nikah'), $surat_nikahName);

            $saksi1 = $request->file('saksi1');
            $saksi1Name = $timestamp . '_' . $saksi1->getClientOriginalName();
            $saksi1Path = 'ktp/' . $saksi1Name;
            $saksi1->move(public_path('ktp'), $saksi1Name);

            $saksi2 = $request->file('saksi2');
            $saksi2Name = $timestamp . '_' . $saksi2->getClientOriginalName();
            $saksi2Path = 'ktp/' . $saksi2Name;
            $saksi2->move(public_path('ktp'), $saksi2Name);

            LahirForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'anak' => $request->input('anak'),
                'keperluan' => $request->input('keperluan'),
                'no' => $request->input('no'),
                'suket' => $suketPath,
                'ktp_ayah' => $ktpAyahPath,
                'ktp_ibu' => $ktpIbuPath,
                'surat_nikah' => $surat_nikahPath,
                'saksi1' => $saksi1Path,
                'saksi2' => $saksi2Path,
            ]);

            return redirect()->route('lahir.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('lahir.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
        $data = LahirForm::find($id);
        $title = 'Detail Surat';
        
        
        return view('surat.submit.lahir', compact('data', 'title'));
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
    
        $data = LahirForm::find($id);
    
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
            $form = LahirForm::findOrFail($id);

            // Hapus file KTP
            $suket = public_path($form->suket);
            if (File::exists($suket)) {
                File::delete($suket);
            }
            $ktp_ayah = public_path($form->ktp_ayah);
            if (File::exists($ktp_ayah)) {
                File::delete($ktp_ayah);
            }
            $ktp_ibu = public_path($form->ktp_ibu);
            if (File::exists($ktp_ibu)) {
                File::delete($ktp_ibu);
            }
            $surat_nikah = public_path($form->surat_nikah);
            if (File::exists($surat_nikah)) {
                File::delete($surat_nikah);
            }
            $saksi1 = public_path($form->saksi1);
            if (File::exists($saksi1)) {
                File::delete($saksi1);
            }
            $saksi2 = public_path($form->saksi2);
            if (File::exists($saksi2)) {
                File::delete($saksi2);
            }

            // Hapus file KK
            

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