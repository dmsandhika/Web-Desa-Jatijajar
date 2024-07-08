<?php

use App\Models\Article;
use App\Models\Struktur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'latestArticles']);
Route::get('/profil', function () {
    return view('profil', ['title'=>'Profil Desa']);
});
Route::get('/struktur', function () {
    return view('struktur', ['title'=>'Struktur Organisasi Desa', 'struktur'=>Struktur::all()]);
});
Route::get('/article', [ArticleController::class, 'index'])->name('articles.index');;
Route::get('/article/{article:slug}', function(Article $article){
    return view('single-article', ['title'=>'Single Post', 'article'=>$article]);
});

Route::get('/articles/create', [ ArticleController::class, 'create']);
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');