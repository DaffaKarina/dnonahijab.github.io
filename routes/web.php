<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('about', 'about')->name('about');
    Route::get('shop', 'shop')->name('shop');
    Route::get('detail/{id}', 'detail')->name('detail');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // produk
    Route::controller(ProdukController::class)->group(function () {
        Route::get('produk', 'index')->name('produk');
        Route::get('produk/tambah', 'create')->name('produk.create');
        Route::get('produk/edit/{id}', 'edit')->name('produk.edit');
        Route::post('produk/simpan/{type}', 'store')->name('produk.store');
        Route::delete('produk/destroy/{id}', 'destroy')->name('produk.destroy');
        Route::delete('produk/images/destroy/{name}', 'imagesDestroy')->name('produkImages.destroy');
    });
    // kategori
    Route::controller(KategoriController::class)->group(function () {
        Route::get('kategori', 'index')->name('kategori');
        Route::get('kategori/tambah', 'create')->name('kategori.create');
        Route::get('kategori/edit/{id}', 'edit')->name('kategori.edit');
        Route::post('kategori/simpan', 'store')->name('kategori.store');
        Route::delete('kategori/destroy/{id}', 'destroy')->name('kategori.destroy');
    });

    // profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile/{id}', 'index')->name('profile');
        Route::post('profile/store/{type}', 'store')->name('profile.store');
        Route::delete('profile/destroy/{type}/{id}', 'destroy')->name('profile.destroy');
    });
});



require __DIR__ . '/auth.php';