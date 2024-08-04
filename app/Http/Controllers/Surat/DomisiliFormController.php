<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\DomisiliForm;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DomisiliFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Form Surat Keterangan Domisili';
        return view('surat.form.domisili', compact('title'));
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
                'tempatlahir' => 'required|string',
                'tgl' => 'required|date',
                'kelamin' => 'required|string',
                'agama' => 'required|string',
                'pekerjaan' => 'required|string',
                'alamat' => 'required|string',
                'keperluan' => 'required|string',
                'ktp' => 'required|file|mimes:jpg,png,pdf|max:2048',
                'no' => 'required|numeric',
            ]);

            $timestamp = now()->format('YmdHis');


            $ktp = $request->file('ktp');
            $ktpName = $timestamp . '_' . $ktp->getClientOriginalName();
            $ktpPath = 'ktp/' . $ktpName;
            $ktp->move(public_path('ktp'), $ktpName);

            DomisiliForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'tempatlahir' => $request->input('tempatlahir'),
                'tgl' => $request->input('tgl'),
                'kelamin' => $request->input('kelamin'),
                'agama' => $request->input('agama'),
                'pekerjaan' => $request->input('pekerjaan'),
                'keperluan' => $request->input('keperluan'),
                'alamat' => $request->input('alamat'),
                'no' => $request->input('no'),
                'ktp' => $ktpPath
            ]);

            return redirect()->route('domisili.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('domisili.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
        $data = DomisiliForm::find($id);
        $title = 'Detail Surat';
        
        
        return view('surat.submit.domisili', compact('data', 'title'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'file' => 'nullable|file|mimes:pdf|max:5120',
            'note' => 'nullable|string',
            'status' => 'required|in:diajukan,selesai,ditolak'
        ]);
    
        $data = DomisiliForm::find($id);
    
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
            $form = DomisiliForm::findOrFail($id);

            // Hapus file KTP
            $ktpPath = public_path($form->ktp);
            if (File::exists($ktpPath)) {
                File::delete($ktpPath);
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
            Log::error('Error deleting domisili form: ' . $e->getMessage());

            // Redirect dengan pesan error menggunakan SweetAlert2
            return redirect()->route('admin.surat')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}