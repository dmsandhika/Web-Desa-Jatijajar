<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Buat slug dari nama kategori
        $slug = Category::createSlug($request->input('name'));

        // Simpan kategori baru ke database
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $slug;
        $category->save();

        return response()->json(['success' => true]);
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
        $data = Category::find($id);
        $title = 'Edit Kategori';
        
        
        return view('admin.editkategori', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Temukan kategori berdasarkan ID
        $kategori = Category::findOrFail($id);

        // Perbarui data kategori
        $kategori->name = $request->input('name');
        $kategori->slug = Category::createSlug($request->input('name'));
        $kategori->save();

        // Redirect dengan pesan sukses
        return redirect()->route('kategori.list')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan artikel berdasarkan ID
        $kategori = Category::findOrFail($id);
    
    
        // Hapus artikel dari database
        $kategori->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('kategori.list')->with('success', 'Artikel berhasil dihapus');
    }
}