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
    public function index()
    {
        $articles = Article::where('status', 'diterima')->orderBy('created_at', 'desc')->get();
        return view('article', ['title' => 'Galeri Kegiatan', 'articles' => $articles]);
    }

    public function latestArticles()
{
    $articles = Article::orderBy('created_at', 'desc')->take(3)->get();
    return view('home', ['title' => '3 Artikel Terbaru', 'articles' => $articles]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $title = "Create New Article";
        return view('articles.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
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