<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\EktpForm;
use App\Http\Controllers\Controller;

class EktpFormController extends Controller
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
        $title='Form Surat Pengantar E-KTP';
        return view('surat.form.ektp',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
                'nik' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'kk' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
                'no' => 'required|string|max:15',
            ]);

            $timestamp = now()->format('YmdHis');


            $kk = $request->file('kk');
            $kkName = $timestamp . '_' . $kk->getClientOriginalName();
            $kkPath = 'kk/' . $kkName;
            $kk->move(public_path('kk'), $kkName);

            EktpForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'kk' => $kkPath,
                'no' => $request->input('no'),
            ]);

            return redirect()->route('ektp.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('ektp.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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