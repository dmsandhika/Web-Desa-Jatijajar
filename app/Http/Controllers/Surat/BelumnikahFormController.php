<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Surat\BelumnikahForm;
use Illuminate\Support\Facades\File;

class BelumnikahFormController extends Controller
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
        $title='Form Surat Keterangan Belum Nikah';
        return view('surat.form.belumnikah',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nik' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'no' => 'required|numeric',
            'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try{
            
            // Menangani file KTP
            $ktp = $request->file('ktp');
            $ktpPath = 'ktp/' . $ktp->getClientOriginalName();
            $ktp->move(public_path('ktp'), $ktp->getClientOriginalName());
    
            // Menangani file KK
            $kk = $request->file('kk');
            $kkPath = 'kk/' . $kk->getClientOriginalName();
            $kk->move(public_path('kk'), $kk->getClientOriginalName());
    
            // Simpan data formulir ke dalam basis data
            BelumnikahForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'keperluan' => $request->input('keperluan'),
                'no' => $request->input('no'),
                'ktp' => $ktpPath,
                'kk' => $kkPath,
            ]);
    
            // Redirect atau kembalikan respons sesuai kebutuhan
            return redirect()->route('belumnikah.create')->with('success', 'Formulir berhasil diajukan.');
        }
    catch (\Exception $e) {
        // Log error
        Log::error('Error storing belumnikah form: ' . $e->getMessage());

        // Redirect dengan pesan error menggunakan SweetAlert2
        return redirect()->route('belumnikah.create')->with('error', 'Terjadi kesalahan saat mengajukan surat');
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
        //
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
            $form = BelumnikahForm::findOrFail($id);

            // Hapus file KTP
            $ktpPath = public_path($form->ktp);
            if (File::exists($ktpPath)) {
                File::delete($ktpPath);
            }

            // Hapus file KK
            $kkPath = public_path($form->kk);
            if (File::exists($kkPath)) {
                File::delete($kkPath);
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