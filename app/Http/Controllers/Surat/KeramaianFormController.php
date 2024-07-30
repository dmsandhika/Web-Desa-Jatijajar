<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\KeramaianForm;
use App\Http\Controllers\Controller;

class KeramaianFormController extends Controller
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
        $title='Form Surat Izin Keramaian';
        return view('surat.form.keramaian',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'acara' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'tanggal_berakhir' => 'required|date',
            'jam_berakhir' => 'required|date_format:H:i',
            'hiburan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:1000',
            'no' => 'required|string|max:15',
        ]);

        try {
            KeramaianForm::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'acara' => $request->acara,
                'tanggal_mulai' => $request->tanggal_mulai,
                'jam_mulai' => $request->jam_mulai,
                'tanggal_berakhir' => $request->tanggal_berakhir,
                'jam_berakhir' => $request->jam_berakhir,
                'hiburan' => $request->hiburan,
                'lokasi' => $request->lokasi,
                'no' => $request->no,
            ]);

            return redirect()->route('keramaian.create')->with('success', 'Formulir berhasil diajukan.');
        } catch (\Exception $e) {
            return redirect()->route('keramaian.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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