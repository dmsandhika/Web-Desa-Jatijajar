<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\LahirForm;
use App\Http\Controllers\Controller;

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
 
    public function store(Request $request){
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