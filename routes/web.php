<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Struktur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StrukturController;

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
Route::get('/surat/form_keramaian', function () {
    return view('surat.form.keramaian', ['title'=>'Form Surat Izin Keramaian']);
});
Route::get('/surat/form_ektp', function () {
    return view('surat.form.ektp', ['title'=>'Form Surat Pengantar E-Ktp']);
});
Route::get('/surat/form_skck', function () {
    return view('surat.form.skck', ['title'=>'Form Surat Pengantar SKCK']);
});
Route::get('/surat/form_kehilangan', function () {
    return view('surat.form.kehilangan', ['title'=>'Form Surat Keterangan Kehilangan']);
});
Route::get('/surat/form_penghasilan', function () {
    return view('surat.form.penghasilan', ['title'=>'Form Surat Keterangan Penghasilan']);
});
Route::get('/surat/form_rekomendasi', function () {
    return view('surat.form.rekomendasi', ['title'=>'Form Surat Rekomendasi']);
});
Route::get('/surat/form_hasil_ortu', function () {
    return view('surat.form.hasilortu', ['title'=>'Form Surat Keterangan Penghasilan Orang Tua']);
});
Route::get('/surat/form_kuasa', function () {
    return view('surat.form.kuasa', ['title'=>'Form Surat Permohonan Kuasa']);
});
Route::get('/surat/form_domisili_lembaga', function () {
    return view('surat.form.domisili_lembaga', ['title'=>'Form Surat Keterangan Domisili Lembaga']);
});
Route::get('/surat/form_beda_identitas', function () {
    return view('surat.form.beda_identitas', ['title'=>'Form Surat Keterangan Beda Identitas']);
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index', ['title'=>'Dashboard']);
    });
    Route::get('/admin/surat', function () {
        return view('admin.surat', ['title'=>'Kelola Surat']);
    });
    
    Route::get('admin/artikel/daftar', function () {
        return view('admin.artikel', [
            'title' => 'Artikel Kegiatan Desa',
            'blog' => Article::all()
        ]);
    })->name('article.list');
    Route::get('/admin/artikel/kategori', function () {
    return view('admin.kategori', ['title'=>'Kategori Artikel', 'ktgr'=>Category::all()]);
    })->name('kategori.list');
    Route::post('/admin/artikel/kategori', [CategoryController::class, 'store'])->name('kategori.store');
    Route::delete('/admin/artikel/kategori/{id}', [CategoryController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/admin/struktur', function () {
        return view('admin.struktur', ['title'=>'Struktur Kepengurusan Desa', 'strk'=>Struktur::all()]);
    })->name('struktur.index');
    Route::get('/admin/struktur/create', [ StrukturController::class, 'create'])->name('struktur.create');
    Route::post('/admin/struktur/', [ StrukturController::class, 'store'])->name('struktur.store');
    Route::get('/admin/struktur/{id}/edit', [StrukturController::class, 'edit'])->name('struktur.edit');
    Route::put('/admin/struktur/{id}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::get('/admin/artikel/{id}/edit', [ArticleController::class, 'edit'])->name('artikel.edit');
    Route::put('/admin/artikel/{id}', [ArticleController::class, 'update'])->name('artikel.update');
    Route::delete('/admin/artikel/{id}', [ArticleController::class, 'destroy'])->name('artikel.destroy');
    Route::get('/articles/count', [ArticleController::class, 'countArticles']);
        
});