<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\MeninggalForm;
use App\Http\Controllers\Controller;

class MeninggalFormController extends Controller
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
        $title='Form Surat Keterangan Meninggal';
        return view('surat.form.meninggal',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
                'nik' => 'required|string|max:16',
                'nama' => 'required|string|max:255',
                'tgl' => 'required|date',
                'di' => 'required|string|max:255',
                'penyebab' => 'required|string|max:255',
                'keperluan' => 'required|string|max:255',
                'no' => 'required|string|max:15',
                'suket' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
                'saksi1' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
                'saksi2' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);

            $timestamp = now()->format('YmdHis');

            $suket = $request->file('suket');
            $suketName = $timestamp . '_' . $suket->getClientOriginalName();
            $suketPath = 'suket/' . $suketName;
            $suket->move(public_path('suket'), $suketName);

            $saksi1 = $request->file('saksi1');
            $saksi1Name = $timestamp . '_' . $saksi1->getClientOriginalName();
            $saksi1Path = 'ktp/' . $saksi1Name;
            $saksi1->move(public_path('ktp'), $saksi1Name);

            $saksi2 = $request->file('saksi2');
            $saksi2Name = $timestamp . '_' . $saksi2->getClientOriginalName();
            $saksi2Path = 'ktp/' . $saksi2Name;
            $saksi2->move(public_path('ktp'), $saksi2Name);

            MeninggalForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'tgl' => $request->input('tgl'),
                'di' => $request->input('di'),
                'penyebab' => $request->input('penyebab'),
                'keperluan' => $request->input('keperluan'),
                'no' => $request->input('no'),
                'suket' => $suketPath,
                'saksi1' => $saksi1Path,
                'saksi2' => $saksi2Path,
            ]);

            return redirect()->route('meninggal.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('meninggal.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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