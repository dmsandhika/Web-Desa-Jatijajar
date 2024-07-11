<?php

use App\Models\Letter;
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
    return view('articles.single-article', ['title'=>'Single Post', 'article'=>$article]);
});

Route::get('/articles/create', [ ArticleController::class, 'create']);
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/surat', function () {
    return view('surat.index', ['title'=>'Pengajuan Surat']);
});
Route::get('surat/form_belumnikah', function () {
    return view('surat.form.belumnikah', ['title'=>'Form Surat Keterangan Belum Nikah']);
});
Route::get('/surat/form_domisili', function () {
    return view('surat.form.domisili', ['title'=>'Form Surat Keterangan Domisili']);
});
Route::get('/surat/form_lahir', function () {
    return view('surat.form.lahir', ['title'=>'Form Surat Keterangan Lahir']);
});
Route::get('/surat/form_meninggal', function () {
    return view('surat.form.meninggal', ['title'=>'Form Surat Keterangan Meninggal']);
});
Route::get('/surat/form_tidakmampu', function () {
    return view('surat.form.tidakmampu', ['title'=>'Form Surat Keterangan Tidak Mampu']);
});
Route::get('/surat/form_usaha', function () {
    return view('surat.form.usaha', ['title'=>'Form Surat Keterangan Usaha']);
});