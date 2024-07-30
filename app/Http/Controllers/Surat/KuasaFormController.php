<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\KuasaForm;
use App\Http\Controllers\Controller;

class KuasaFormController extends Controller
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
        $title='Form Surat Kuasa';
        return view('surat.form.kuasa',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        try {
            $request->validate([
                'nik' => 'required|numeric',
                'nama' => 'required|string|max:255',
                'ktp_pemberi' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
                'isi_kuasa' => 'required|string',
                'no' => 'required|string|max:15',
                'ktp_penerima' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
                'hubungan' => 'required|string|max:255'
            ]);

            $timestamp = now()->format('YmdHis');


            $ktp_pemberi = $request->file('ktp_pemberi');
            $ktpPemberiName = $timestamp . '_' . $ktp_pemberi->getClientOriginalName();
            $ktpPemberiPath = 'ktp/' . $ktpPemberiName;
            $ktp_pemberi->move(public_path('ktp'), $ktpPemberiName);
            
            $ktp_penerima = $request->file('ktp_penerima');
            $ktpPenerimaName = $timestamp . '_' . $ktp_penerima->getClientOriginalName();
            $ktpPenerimaPath = 'ktp/' . $ktpPenerimaName;
            $ktp_penerima->move(public_path('ktp'), $ktpPenerimaName);

            KuasaForm::create([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'ktp_pemberi' => $ktpPemberiPath,
                'isi_kuasa' => $request->input('isi_kuasa'),
                'ktp_penerima' => $ktpPenerimaPath,
                'no' => $request->input('no'),
                'hubungan' => $request->input('hubungan'),
            ]);

            return redirect()->route('kuasa.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('kuasa.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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