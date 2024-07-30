<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Surat\RekomendasiForm;

class RekomendasiFormController extends Controller
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
        $title='Form Surat Rekomendasi';
        return view('surat.form.rekomendasi',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
                'nik' => 'required|numeric',
                'nama' => 'required|string|max:255',
                'rekomendasi' => 'required|string',
                'keperluan' => 'required|string',
                'kk' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
                'no' => 'required|numeric',
            ]);

            $timestamp = now()->format('YmdHis');


            $kk = $request->file('kk');
            $kkName = $timestamp . '_' . $kk->getClientOriginalName();
            $kkPath = 'kk/' . $kkName;
            $kk->move(public_path('kk'), $kkName);

            RekomendasiForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'rekomendasi' => $request->input('rekomendasi'),
                'keperluan' => $request->input('keperluan'),
                'kk' => $kkPath,
                'no' => $request->input('no'),
            ]);

            return redirect()->route('rekomendasi.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('rekomendasi.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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