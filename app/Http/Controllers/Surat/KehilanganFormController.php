<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Surat\KehilanganForm;
use Illuminate\Support\Facades\File;

class KehilanganFormController extends Controller
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
        $title='Form Surat Keterangan Kehilangan';
        return view('surat.form.kehilangan', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|numeric',
                'nama' => 'required|string|max:255',
                'barang' => 'required|string|max:255',
                'lokasi' => 'required|string',
                'ktp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
                'no' => 'required|numeric',
            ]);

            $timestamp = now()->format('YmdHis');


            $ktp = $request->file('ktp');
            $ktpName = $timestamp . '_' . $ktp->getClientOriginalName();
            $ktpPath = 'ktp/' . $ktpName;
            $ktp->move(public_path('ktp'), $ktpName);

            KehilanganForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'barang' => $request->input('barang'),
                'lokasi' => $request->input('lokasi'),
                'no' => $request->input('no'),
                'ktp' => $ktpPath,
            ]);

            return redirect()->route('hilang.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('hilang.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
        $data = KehilanganForm::find($id);
        $title = 'Detail Surat';
        
        
        return view('surat.submit.kehilangan', compact('data', 'title'));
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

        $data = KehilanganForm::find($id);

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
            $form = KehilanganForm::findOrFail($id);

            // Hapus file KTP
            $ktpPath = public_path($form->ktp);
            if (File::exists($ktpPath)) {
                File::delete($ktpPath);
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
