<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
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
        $title = "Tambah Struktur";
        return view('struktur.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
        ]);

        // Create a new struktur with the validated data
        $struktur = new Struktur([
            'name' => $request->input('name'),
            'jabatan' => $request->input('jabatan'),
            'nip' => $request->input('nip'),
            'desc' => $request->input('desc'),
        ]);

        // Save the new struktur
        $struktur->save();

        // Redirect to a route or return a response
        return redirect()->route('struktur.index')->with('success', 'Struktur created successfully');
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
        $struktur = Struktur::find($id);
        $title = "Form Edit Struktur";

        return view('struktur.edit', compact('struktur', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'desc' => 'nullable|string',
        ]);

        // Find the struktur by id
        $struktur = Struktur::findOrFail($id);

        // Update the struktur with new data
        $struktur->name = $request->input('title');
        $struktur->jabatan = $request->input('jabatan');
        $struktur->nip = $request->input('nip');
        $struktur->desc = $request->input('desc');

        // Save the changes
        $struktur->save();

        // Redirect to a route or return a response
        return redirect()->route('struktur.index')->with('success', 'Struktur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}