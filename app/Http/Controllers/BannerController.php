<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $banner = Banner::find(1);
        $title = 'Detail Banner';

        return view ('struktur.banner', compact('banner', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'gambar' => 'required|file|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Ambil data banner yang ingin diperbarui
        $data = Banner::find(1); // Pastikan ID benar atau sesuaikan dengan kebutuhan

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }

            // Simpan file baru
            $file = $request->file('gambar');
            $filePath = 'banner/' . $file->getClientOriginalName();
            $file->move(public_path('banner'), $file->getClientOriginalName());
            $data->gambar = $filePath;
        }

        // Simpan data banner yang telah diperbarui
        $data->save();

        // Redirect dengan pesan sukses
        return redirect()->route('banner.edit')->with('success', 'Banner Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}