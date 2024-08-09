<?php

use App\Models\Banner;
use App\Models\Article;
use App\Models\Category;
use App\Models\Struktur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\DataSuratController;
use App\Http\Controllers\KritikFormController;
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
Route::get('/profil', function () {
    return view('profil', ['title'=>'Profil Desa']);
});
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
Route::get('/surat', function () {
    return view('surat.index', ['title'=>'Pengajuan Surat']);
});
Route::get('/surat/lacak', [DataSuratController::class, 'search'])->name('surat.search');
Route::get('/surat/form_belumnikah', [BelumnikahFormController::class, 'create'])->name('belumnikah.create');
Route::post('/surat/form_belumnikah', [BelumnikahFormController::class, 'store'])->name('belumnikah.store');
Route::get('/surat/form_domisili', [DomisiliFormController::class, 'create'])->name('domisili.create');
Route::post('/surat/form_domisili', [DomisiliFormController::class, 'store'])->name('domisili.store');
Route::get('/surat/form_lahir', [LahirFormController::class, 'create'])->name('lahir.create');
Route::post('/surat/form_lahir', [LahirFormController::class, 'store'])->name('lahir.store');
Route::get('/surat/form_meninggal', [MeninggalFormController::class, 'create'])->name('meninggal.create');
Route::post('/surat/form_meninggal', [MeninggalFormController::class, 'store'])->name('meninggal.store');
Route::get('/surat/form_tidakmampu', [SktmFormController::class, 'create'])->name('sktm.create');
Route::post('/surat/form_tidakmampu', [SktmFormController::class, 'store'])->name('sktm.store');
Route::get('/surat/form_usaha', [UsahaFormController::class, 'create'])->name('usaha.create');
Route::post('/surat/form_usaha', [UsahaFormController::class, 'store'])->name('usaha.store');
Route::get('/surat/form_keramaian', [KeramaianFormController::class, 'create'])->name('keramaian.create');
Route::post('/surat/form_keramaian', [KeramaianFormController::class, 'store'])->name('keramaian.store');
Route::get('/surat/form_ektp', [EktpFormController::class, 'create'])->name('ektp.create');
Route::post('/surat/form_ektp', [EktpFormController::class, 'store'])->name('ektp.store');
Route::get('/surat/form_skck', [SkckFormController::class, 'create'])->name('skck.create');
Route::post('/surat/form_skck', [SkckFormController::class, 'store'])->name('skck.store');
Route::get('/surat/form_kehilangan', [KehilanganFormController::class,'create'])->name('hilang.create');
Route::post('/surat/form_kehilangan', [KehilanganFormController::class,'store'])->name('hilang.store');
Route::get('/surat/form_penghasilan', [PenghasilanFormController::class, 'create'])->name('hasil.create');
Route::post('/surat/form_penghasilan', [PenghasilanFormController::class, 'store'])->name('hasil.store');
Route::get('/surat/form_rekomendasi', [RekomendasiFormController::class, 'create'])->name('rekomendasi.create');
Route::post('/surat/form_rekomendasi', [RekomendasiFormController::class, 'store'])->name('rekomendasi.store');
Route::get('/surat/form_kuasa', [KuasaFormController::class, 'create'])->name('kuasa.create');
Route::post('/surat/form_kuasa', [KuasaFormController::class, 'store'])->name('kuasa.store');
Route::get('/surat/form_kia', [KIAFormController::class, 'create'])->name('kia.create');
Route::post('/surat/form_kia', [KIAFormController::class, 'store'])->name('kia.store');
Route::get('/surat/form_nikah', [NikahFormController::class, 'create'])->name('nikah.create');
Route::post('/surat/form_nikah', [NikahFormController::class, 'store'])->name('nikah.store');


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ChartController::class, 'barChart']);
    Route::get('/admin/surat', [DataSuratController::class, 'index'])->name('admin.surat');
    Route::get('/admin/surat/diajukan', [DataSuratController::class, 'diajukan'])->name('admin.surat.diajukan');
    Route::get('/admin/surat/ditolak', [DataSuratController::class, 'ditolak'])->name('admin.surat.ditolak');
    Route::get('/admin/surat/selesai', [DataSuratController::class, 'selesai'])->name('admin.surat.selesai');
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
    Route::get('/surat/count', [DatasuratController::class, 'count']);
    Route::get('/admin/surat/Domisili/{id}', [DomisiliFormController::class, 'edit'])->name('surat.domisili.detail');
    Route::delete('/admin/surat/Domisili/{id}', [DomisiliFormController::class, 'destroy'])->name('surat.domisili.delete');
    Route::put('/admin/surat/Domisili/{id}', [DomisiliFormController::class, 'update'])->name('surat.domisili.update');
    Route::get('/admin/surat/Belumnikah/{id}', [BelumnikahFormController::class, 'edit'])->name('surat.belumnikah.detail');
    Route::delete('/admin/surat/Belumnikah/{id}', [BelumnikahFormController::class, 'destroy'])->name('surat.belumnikah.delete');
    Route::put('/admin/surat/Belumnikah/{id}', [BelumnikahFormController::class, 'update'])->name('surat.belumnikah.update');
    Route::get('/admin/surat/Ektp/{id}', [EktpFormController::class, 'edit'])->name('surat.ektp.detail');
    Route::delete('/admin/surat/Ektp/{id}', [EktpFormController::class, 'destroy'])->name('surat.ektp.delete');
    Route::put('/admin/surat/Ektp/{id}', [EktpFormController::class, 'update'])->name('surat.ektp.update');
    Route::get('/admin/surat/Kehilangan/{id}', [KehilanganFormController::class, 'edit'])->name('surat.kehilangan.detail');
    Route::delete('/admin/surat/Kehilangan/{id}', [KehilanganFormController::class, 'destroy'])->name('surat.kehilangan.delete');
    Route::put('/admin/surat/Kehilangan/{id}', [KehilanganFormController::class, 'update'])->name('surat.kehilangan.update');
    Route::get('/admin/surat/Keramaian/{id}', [KeramaianFormController::class, 'edit'])->name('surat.keramaian.detail');
    Route::delete('/admin/surat/Keramaian/{id}', [KeramaianFormController::class, 'destroy'])->name('surat.keramaian.delete');
    Route::put('/admin/surat/Keramaian/{id}', [KeramaianFormController::class, 'update'])->name('surat.keramaian.update');
    Route::get('/admin/surat/Kia/{id}', [KIAFormController::class, 'edit'])->name('surat.kia.detail');
    Route::delete('/admin/surat/Kia/{id}', [KIAFormController::class, 'destroy'])->name('surat.kia.delete');
    Route::put('/admin/surat/Kia/{id}', [KIAFormController::class, 'update'])->name('surat.kia.update');
    Route::get('/admin/surat/Kuasa/{id}', [KuasaFormController::class, 'edit'])->name('surat.kuasa.detail');
    Route::delete('/admin/surat/Kuasa/{id}', [KuasaFormController::class, 'destroy'])->name('surat.kuasa.delete');
    Route::put('/admin/surat/Kuasa/{id}', [KuasaFormController::class, 'update'])->name('surat.kuasa.update');
    Route::get('/admin/surat/Lahir/{id}', [LahirFormController::class, 'edit'])->name('surat.lahir.detail');
    Route::delete('/admin/surat/Lahir/{id}', [LahirFormController::class, 'destroy'])->name('surat.lahir.delete');
    Route::put('/admin/surat/Lahir/{id}', [LahirFormController::class, 'update'])->name('surat.lahir.update');
    Route::get('/admin/surat/Meninggal/{id}', [MeninggalFormController::class, 'edit'])->name('surat.meninggal.detail');
    Route::delete('/admin/surat/Meninggal/{id}', [MeninggalFormController::class, 'destroy'])->name('surat.meninggal.delete');
    Route::put('/admin/surat/Meninggal/{id}', [MeninggalFormController::class, 'update'])->name('surat.meninggal.update');
    Route::get('/admin/surat/Nikah/{id}', [NikahFormController::class, 'edit'])->name('surat.nikah.detail');
    Route::delete('/admin/surat/Nikah/{id}', [NikahFormController::class, 'destroy'])->name('surat.nikah.delete');
    Route::put('/admin/surat/Nikah/{id}', [NikahFormController::class, 'update'])->name('surat.nikah.update');
    Route::get('/admin/surat/Penghasilan/{id}', [PenghasilanFormController::class, 'edit'])->name('surat.penghasilan.detail');
    Route::delete('/admin/surat/Penghasilan/{id}', [PenghasilanFormController::class, 'destroy'])->name('surat.penghasilan.delete');
    Route::put('/admin/surat/Penghasilan/{id}', [PenghasilanFormController::class, 'update'])->name('surat.penghasilan.update');
    Route::get('/admin/surat/Rekomendasi/{id}', [RekomendasiFormController::class, 'edit'])->name('surat.rekomendasi.detail');
    Route::delete('/admin/surat/Rekomendasi/{id}', [RekomendasiFormController::class, 'destroy'])->name('surat.rekomendasi.delete');
    Route::put('/admin/surat/Rekomendasi/{id}', [RekomendasiFormController::class, 'update'])->name('surat.rekomendasi.update');
    Route::get('/admin/surat/Skck/{id}', [SkckFormController::class, 'edit'])->name('surat.skck.detail');
    Route::delete('/admin/surat/Skck/{id}', [SkckFormController::class, 'destroy'])->name('surat.skck.delete');
    Route::put('/admin/surat/Skck/{id}', [SkckFormController::class, 'update'])->name('surat.skck.update');
    Route::get('/admin/surat/Sktm/{id}', [SktmFormController::class, 'edit'])->name('surat.sktm.detail');
    Route::delete('/admin/surat/Sktm/{id}', [SktmFormController::class, 'destroy'])->name('surat.sktm.delete');
    Route::put('/admin/surat/Sktm/{id}', [SktmFormController::class, 'update'])->name('surat.sktm.update');
    Route::get('/admin/surat/Usaha/{id}', [UsahaFormController::class, 'edit'])->name('surat.usaha.detail');
    Route::delete('/admin/surat/Usaha/{id}', [UsahaFormController::class, 'destroy'])->name('surat.usaha.delete');
    Route::put('/admin/surat/Usaha/{id}', [UsahaFormController::class, 'update'])->name('surat.usaha.update');

});