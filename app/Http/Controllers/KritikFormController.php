<?php

namespace App\Http\Controllers;

use App\Models\KritikForm;
use Illuminate\Http\Request;

class KritikFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KritikForm::all();
        $title = 'Kritik dan Saran';
        
        return view('admin.feedback', compact('data', 'title'));
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
        try {
            $request->validate([

                'nama' => 'required|string|max:255',
                'pesan' => 'required|string',
            ]);

            KritikForm::create([
                'nama' => $request->input('nama'),
                'pesan' => $request->input('pesan'),
            ]);

            return redirect()->route('contact')->with('success', 'Kritik dan Saran Berhasil Dikirim');
        } catch (\Exception $e) {
            return redirect()->route('contact')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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