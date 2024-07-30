<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Surat\KehilanganForm;

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
        return view('surat.form.kehilangan',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
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
        //
    }
}