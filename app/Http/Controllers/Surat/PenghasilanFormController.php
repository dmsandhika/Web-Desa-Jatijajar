<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Surat\PenghasilanForm;

class PenghasilanFormController extends Controller
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
        $title='Form Surat Keterangan Penghasilan';
        return view('surat.form.penghasilan',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
               'nik' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'usaha' => 'required|string|max:255',
                'gaji' => 'required|string|max:255',
                'no' => 'required|numeric',
                'keperluan' => 'required|string|max:255',
            ]);


            PenghasilanForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'usaha' => $request->input('usaha'),
                'gaji' => $request->input('gaji'),
                'keperluan' => $request->input('keperluan'),
                'no' => $request->input('no'),
            ]);

            return redirect()->route('hasil.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('hasil.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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