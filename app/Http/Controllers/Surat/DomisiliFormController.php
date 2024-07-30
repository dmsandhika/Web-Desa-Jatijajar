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
        return view('surat.form.domisili',compact('title'));
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

        $ktp = $request->file('ktp');
        $ktpPath = 'ktp/' . $ktp->getClientOriginalName();
        $ktp->move(public_path('ktp'), $ktp->getClientOriginalName());

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
        //
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