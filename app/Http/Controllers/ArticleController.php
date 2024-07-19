<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Ambil kata kunci pencarian dari request
    $search = $request->input('search');

    // Query untuk mendapatkan artikel
    $query = Article::where('status', 'diterima');

    // Jika ada kata kunci pencarian, tambahkan kondisi pencarian ke query
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhere('content', 'LIKE', "%{$search}%");
        });
    }

    // Ambil artikel yang sudah difilter dan diurutkan berdasarkan tanggal pembuatan
    $articles = $query->orderBy('created_at', 'desc')->get();

    $hasArticles = $articles->isNotEmpty();
    // Kembalikan view dengan artikel yang sesuai
    return view('articles.article', ['title' => 'Galeri Kegiatan', 'articles' => $articles, 'hasArticles' => $hasArticles]);
}


    public function latestArticles()
    {
        $articles = Article::where('status', 'diterima')->orderBy('created_at', 'desc')->take(3)->get();
        return view('home', ['title' => '3 Artikel Terbaru', 'articles' => $articles]);
    }
    public function create()
    {
        $categories = Category::all();
        $title = "Create New Article";
        return view('articles.create', compact('categories', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'photo' => 'nullable|image|max:10240',
        ]);

        $slug = Str::slug($request->title, '-');

        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->author = $request->author;
        $article->content = $request->content;
        $article->slug = $slug;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = 'artikel/' . $photo->getClientOriginalName();
            $photo->move(public_path('artikel'), $photo->getClientOriginalName());
            $article->photo = $photoPath;
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
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
        $art = Article::find($id);
        $ktgr = Category::all();
        $title = 'Form Edit Artikel';
        

        return view('articles.edit', compact('art', 'ktgr', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'photo' => 'nullable|image|max:10240',
            'status' => 'required|in:diajukan,diterima,ditolak'
        ]);
    
        $article = Article::find($id);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->author = $request->author;
        $article->content = $request->content;
        $article->status = $request->status;
    
        $slug = Str::slug($request->title, '-');
        $article->slug = $slug;
    
        if ($request->hasFile('photo')) {
            // Delete the old photo if exists
            if ($article->photo) {
                $oldPhotoPath = public_path($article->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            // Store the new photo
            $photo = $request->file('photo');
            $photoPath = 'artikel/' . $photo->getClientOriginalName();
            $photo->move(public_path('artikel'), $photo->getClientOriginalName());
            $article->photo = $photoPath;
        }
    
        $article->save();
    
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan artikel berdasarkan ID
        $article = Article::findOrFail($id);
    
        // Hapus foto artikel jika ada
        if ($article->photo) {
            $photoPath = public_path($article->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }
    
        // Hapus artikel dari database
        $article->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('article.list')->with('success', 'Artikel berhasil dihapus');
    }


    public function countArticles()
{
    $submittedArticlesCount = Article::count();
    $acceptedArticlesCount = Article::where('status', 'diterima')->count();

    return response()->json([
        'submittedArticlesCount' => $submittedArticlesCount,
        'acceptedArticlesCount' => $acceptedArticlesCount
    ]);
}
    
}