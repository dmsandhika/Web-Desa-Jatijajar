<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\KiaForm;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class KIAFormController extends Controller
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
        $title='Form Kartu Identitas Anak';
        return view('surat.form.kia',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
                'nik' => 'required|string|max:16',
                'nama' => 'required|string|max:255',
                'anak' => 'required|string|max:255',
                'akta' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'kk' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'foto' => 'required|file|mimes:jpg,jpeg,png',
                'no' => 'required|string|max:15',
            ]);

            $timestamp = now()->format('YmdHis');


            $akta = $request->file('akta');
            $aktaName = $timestamp . '_' . $akta->getClientOriginalName();
            $aktaPath = 'akta/' . $aktaName;
            $akta->move(public_path('akta'), $aktaName);
            
            $kk = $request->file('kk');
            $kkName = $timestamp . '_' . $kk->getClientOriginalName();
            $kkPath = 'kk/' . $kkName;
            $kk->move(public_path('kk'), $kkName);
            
            $foto = $request->file('foto');
            $fotoName = $timestamp . '_' . $foto->getClientOriginalName();
            $fotoPath = 'foto/' . $fotoName;
            $foto->move(public_path('foto'), $fotoName);
            

            KiaForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'anak' => $request->input('anak'),
                'akta' => $aktaPath,
                'kk' => $kkPath,
                'foto' => $fotoPath,
                'no' => $request->input('no'),
            ]);

            return redirect()->route('kia.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('kia.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
        $data = KiaForm::find($id);
        $title = 'Detail Surat';
        
        
        return view('surat.submit.kia', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'note' => 'nullable|string',
            'status' => 'required|in:diajukan,selesai,ditolak'
        ]);
    
        $data = KiaForm::find($id);
    
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
            $form = KiaForm::findOrFail($id);

            

            $akta = public_path($form->akta);
            if (File::exists($akta)) {
                File::delete($akta);
            }
            $kk = public_path($form->kk);
            if (File::exists($kk)) {
                File::delete($kk);
            }
            $foto = public_path($form->foto);
            if (File::exists($foto)) {
                File::delete($foto);
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