<?php

use App\Models\Banner;
use App\Models\Article;
use App\Models\Category;
use App\Models\Struktur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\ImportDataController;
use App\Http\Controllers\KritikFormController;
use App\Http\Controllers\ConfigSuratController;
use App\Http\Controllers\Surat\KIAFormController;
use App\Http\Controllers\Surat\EktpFormController;
use App\Http\Controllers\Surat\SkckFormController;
use App\Http\Controllers\Surat\SktmFormController;
use App\Http\Controllers\Surat\KuasaFormController;
use App\Http\Controllers\Surat\LahirFormController;
use App\Http\Controllers\Surat\NikahFormController;
use App\Http\Controllers\Surat\UsahaFormController;
use App\Http\Controllers\Surat\DomisiliFormController;
use App\Http\Controllers\Surat\KeramaianFormController;
use App\Http\Controllers\Surat\MeninggalFormController;
use App\Http\Controllers\Surat\BelumnikahFormController;
use App\Http\Controllers\Surat\KehilanganFormController;
use App\Http\Controllers\Surat\PenghasilanFormController;
use App\Http\Controllers\Surat\RekomendasiFormController;

Route::get('/', [ArticleController::class, 'latestArticles']);
Route::get('/profil', [ProfileController::class, 'index']);
Route::get('/kontak', function () {
    return view('contact', ['title'=>'Kontak']);
})->name('contact');
Route::post('/kontak', [KritikFormController::class, 'store'])->name('contact.store');
Route::get('/struktur', function () {
    return view('struktur', ['title'=>'Struktur Organisasi Desa', 'struktur'=>Struktur::all(), 'bnr'=>Banner::findOrFail(1)]);
});
Route::get('/article', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/article/succes', function () {
    return view('articles.success');
})->name('articles.success');
Route::get('/article/{article:slug}', function (Article $article) {
    return view('articles.single-article', ['title'=>'Artikel', 'article'=>$article]);
});
Route::get('/category/{category:slug}', [ArticleController::class, 'categoryArticles']);


Route::get('/articles/create', [ ArticleController::class, 'create']);
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::prefix('surat')->group(function () {
    Route::get('/', [SuratController::class, 'index'])->name('surat.index'); 
    Route::get('/lacak', [SuratController::class, 'lacak'])->name('surat.lacak');
   Route::get('/{id}', [SuratController::class, 'show'])->name('surat.show');
   Route::post('/', [SuratController::class, 'store'])->name('surat.store');
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [ChartController::class, 'barChart']);
        Route::get('/surat', [SuratController::class, 'dataSurat'])->name('admin.surat');
        Route::get('/surat/diajukan', [SuratController::class, 'diajukan'])->name('admin.surat.diajukan');
        Route::get('/surat/ditolak', [SuratController::class, 'ditolak'])->name('admin.surat.ditolak');
        Route::get('/surat/selesai', [SuratController::class, 'selesai'])->name('admin.surat.selesai'); 
        Route::get('/surat/{id}', [SuratController::class, 'editSurat'])->name('admin.surat.detail');
        Route::put('/surat/{id}/proses', [SuratController::class, 'updateSurat'])->name('admin.surat.proses');
        Route::delete('/surat/{id}', [SuratController::class, 'destroySurat'])->name('admin.surat.delete');

        Route::prefix('data')->group(function () {
            Route::get('/', [ImportDataController::class, 'index'])->name('admin.data.desa');
            Route::get('/data_agama', [ImportDataController::class, 'dataAgama']);
            Route::post('/agama', [ImportDataController::class, 'importAgama'])->name('admin.data.desa.agama');
            Route::get('/data_jumlah_penduduk', [ImportDataController::class, 'dataJumlahPenduduk']);
            Route::post('/jumlah_penduduk', [ImportDataController::class, 'importJumlahPenduduk'])->name('admin.data.desa.jumlah_penduduk');
            Route::get('/data_pendidikan', [ImportDataController::class, 'dataPendidikan']);
            Route::post('/pendidikan', [ImportDataController::class, 'importDataPendidikan'])->name('admin.data.desa.pendidikan');
            Route::get('/data_pekerjaan', [ImportDataController::class, 'dataPekerjaan']);
            Route::post('/pekerjaan', [ImportDataController::class, 'importPekerjaan'])->name('admin.data.desa.pekerjaan');
            Route::get('/data_usia', [ImportDataController::class, 'dataUsia']);
            Route::post('/usia', [ImportDataController::class, 'importUsia'])->name('admin.data.desa.usia');
        });
    });
    Route::get('/admin/artikel/daftar', [ArticleController::class, 'all'])->name('admin.article');
    Route::get('/admin/feedback', [KritikFormController::class, 'index',])->name('admin.feedback');
    Route::get('/admin/artikel/daftar/diajukan', [ArticleController::class, 'diajukan'])->name('article.list.diajukan');
    Route::get('/admin/artikel/daftar/ditolak', [ArticleController::class, 'ditolak'])->name('article.list.ditolak');
    Route::get('/admin/artikel/daftar/publish', [ArticleController::class, 'diterima'])->name('article.list.diterima');
    Route::get('/admin/artikel/kategori', function () {
        return view('admin.kategori', ['title'=>'Kategori Artikel', 'ktgr'=>Category::all()]);
    })->name('kategori.list');
    Route::post('/admin/artikel/kategori', [CategoryController::class, 'store'])->name('kategori.store');
    Route::get('/admin/artikel/kategori/edit/{id}', [CategoryController::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/artikel/kategori/{id}', [CategoryController::class, 'update'])->name('kategori.update');
    Route::delete('/admin/artikel/kategori/{id}', [CategoryController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/admin/struktur', function () {
        return view('admin.struktur', ['title'=>'Struktur Kepengurusan Desa', 'strk'=>Struktur::all()]);
    })->name('struktur.index');
    Route::get('/admin/struktur/create', [ StrukturController::class, 'create'])->name('struktur.create');
    Route::get('/admin/banner/edit', [ BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/admin/banner/edit', [ BannerController::class, 'update'])->name('banner.update');
    Route::post('/admin/struktur/', [ StrukturController::class, 'store'])->name('struktur.store');
    Route::get('/admin/struktur/{id}/edit', [StrukturController::class, 'edit'])->name('struktur.edit');
    Route::put('/admin/struktur/{id}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::get('/admin/artikel/{id}/edit', [ArticleController::class, 'edit'])->name('artikel.edit');
    Route::put('/admin/artikel/{id}', [ArticleController::class, 'update'])->name('artikel.update');
    Route::delete('/admin/artikel/{id}', [ArticleController::class, 'destroy'])->name('artikel.destroy');
    Route::get('/articles/count', [ArticleController::class, 'countArticles']);

    Route::prefix('admin/surat/config')->group(function () {
        Route::get('/', [ConfigSuratController::class, 'index'])->name('surat.config.index');
        Route::delete('/{id}', [ConfigSuratController::class, 'destroy'])->name('surat.config.delete');
        Route::get('/create', [ConfigSuratController::class, 'create'])->name('surat.config.create');
        Route::post('/', [ConfigSuratController::class, 'store'])->name('surat.config.store');
        Route::get('/{id}/edit', [ConfigSuratController::class, 'edit'])->name('surat.config.edit');
        Route::put('/{id}', [ConfigSuratController::class, 'update'])->name('surat.config.update');
    });

});