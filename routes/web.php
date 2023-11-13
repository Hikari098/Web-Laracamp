<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\BootcampController;
use App\Http\Controllers\Admin\KategoriBootcampController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mentor\MentorController as MentorMentorController;
use App\Http\Controllers\Peserta\PesertaController;
use App\Models\Bootcamp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ini akses tamu [ngga usah login bisa liat landing page]


Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('front.index');
    Route::get('/bootcamp', 'bootcamp')->name('front.bootcamp');
    Route::get('/bootcamp/mentor/{username}', 'bootcampMentor')->name('front.bootcamp.mentor');
    Route::get('/bootcamp/kategori/{slug}', 'kategoriBootcamp')->name('front.kategori.bootcamp');
    Route::get('/detail/bootcamp/{slug}', 'detailBootcamp')->name('front.detail.bootcamp');
    // Pendaftaran Bootcamp/ Transaksi
    Route::post('/daftar/bootcamp', 'daftarBootcamp')->name('front.daftar.bootcamp');
});



// ini Route Admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::controller(BaseController::class)->group(function () {
        Route::get('/home', 'index')->name('index.home');
    });

    Route::controller(TagController::class)->group(function () {
        Route::get('/tags', 'tag')->name('admin.index.tag');
        Route::post('/tags/create', 'createTag')->name('admin.create.tag');
        Route::put('/tags/update', 'updateTag')->name('admin.update.tag');
        Route::delete('/tags/delete', 'deleteTag')->name('admin.delete.tag');
        Route::get('/tags/search', 'searchTag')->name('admin.search.tag');
    });

    Route::controller(ArtikelController::class)->group(function () {
        Route::get('/artikel', 'index')->name('admin.index.artikel');
        Route::get('/artikel/form', 'formArtikel')->name('admin.form.artikel');
        Route::post('/artikel/create', 'createArtikel')->name('admin.create.artikel');
        Route::get('/artikel/edit/{id}', 'editArtikel')->name('admin.edit.artikel');
        Route::put('/artikel/update/{id}', 'updateArtikel')->name('admin.update.artikel');
        Route::delete('/artikel/delete', 'deleteArtikel')->name('admin.delete.artikel');
    });

    Route::controller(MentorController::class)->group(function () {
        Route::get('/data/mentor', 'index')->name('admin.index.data.mentor');
        Route::get('/data/mentor/form', 'formMentor')->name('admin.form.data.mentor');
        Route::post('/data/mentor/create', 'createMentor')->name('admin.create.data.mentor');
        Route::delete('/data/mentor/delete', 'deleteMentor')->name('admin.delete.data.mentor');
    });

    // Filter
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/skincare', 'skincare')->name('produk.skincare');
        Route::get('/product/bodycare', 'bodycare')->name('produk.bodycare');
        Route::get('/product/haircare', 'haircare')->name('produk.haircare');


        Route::get('/produk/search', 'searchProduk')->name('search.produk');
    });

    // Search
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori-search', 'searchKategori')->name('Product.Search');
    });



    // Menggunakan Route List [resource]=>php artisan route:list
    Route::resource('kategoriBootcamp', KategoriBootcampController::class);
    Route::resource('Bootcamp', BootcampController::class);
    Route::resource('Product', ProductController::class);
    Route::resource('Kategori', KategoriController::class);



    // Ini Buat Transaksi
    Route::controller(TransaksiController::class)->group(function () {
        Route::get('/transaksi', 'index')->name('index.transaksi');
        Route::delete('/transaksi/hapus', 'hapusTransaksi')->name('index.hapus.transaksi');
        Route::put('/update/transaksi', 'updateTransaksi')->name('index.update.transaksi');
    });
});




// ini Route Mentor
Route::prefix('mentor')->middleware(['auth', 'isMentor'])->group(function () {

    Route::controller(MentorMentorController::class)->group(function () {
        Route::get('/home', 'index')->name('mentor.index.home');
        Route::get('/mybootcamp', 'myBootcamp')->name('mentor.my.bootcamp');
        Route::get('/profile', 'profile')->name('mentor.profile');
        Route::get('/list/peserta/{id}', 'listPeserta')->name('mentor.list.peserta');
    });
});


// ini Route Peserta
Route::prefix('peserta')->middleware(['auth', 'isPeserta'])->group(function () {

    Route::controller(PesertaController::class)->group(function () {
        Route::get('/home', 'index')->name('peserta.index');
        Route::get('/profile', 'profile')->name('peserta.profile');
        Route::get('/profile/update/{id}', 'profileUpdate')->name('peserta.profile.update');
        Route::get('/profile/update', 'updateProfile')->name('peserta.update.profile');
        // Sukses Transaksi
        Route::get('/sukses-Beli', 'suksesBeli')->name('peserta.sukses.beli');
        // Lihat Bootcamp
        Route::get('/transaksi', 'transaksi')->name('peserta.transaksi');
        Route::get('/mybootcamp', 'mybootcamp')->name('peserta.mybootcamp');
    });
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
