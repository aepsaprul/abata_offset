<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\BiayaCetakController;
use App\Http\Controllers\BiayaFinishingController;
use App\Http\Controllers\KertasController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MasterMesinController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{kode_produk}', [App\Http\Controllers\HomeController::class, 'produk'])->name('home.produk');
Route::post('/home/ukuran-cetak-detail/', [App\Http\Controllers\HomeController::class, 'ukuranCetakDetail'])->name('home.ukuran_cetak_detail');

Route::post('/home/kalender-dinding', [App\Http\Controllers\HomeController::class, 'kalenderDinding'])->name('home.produk.kalender_dinding');
Route::get('/home/kalender-dinding-detail/{id}', [App\Http\Controllers\HomeController::class, 'kalenderDindingDetail'])->name('home.produk.kalender_dinding_detail');

Route::middleware(['auth'])->group(function () {
    Route::resource('bahan', BahanController::class);
    Route::get('bahan/{id}/delete', [BahanController::class, 'delete'])->name('bahan.delete');

    Route::resource('biaya_cetak', BiayaCetakController::class);
    Route::get('biaya_cetak/{id}/delete', [BiayaCetakController::class, 'delete'])->name('biaya_cetak.delete');

    Route::resource('biaya_finishing', BiayaFinishingController::class);
    Route::get('biaya_finishing/{id}/delete', [BiayaFinishingController::class, 'delete'])->name('biaya_finishing.delete');

    Route::resource('finishing', App\Http\Controllers\FinishingController::class);
    Route::get('finishing/{id}/delete', [App\Http\Controllers\FinishingController::class, 'delete'])->name('finishing.delete');

    Route::resource('finishing_produk', App\Http\Controllers\FinishingProdukController::class);
    Route::get('finishing_produk/{id}/delete', [App\Http\Controllers\FinishingProdukController::class, 'delete'])->name('finishing_produk.delete');

    Route::resource('jenis_kertas', App\Http\Controllers\JenisKertasController::class);
    Route::get('jenis_kertas/{id}/delete', [App\Http\Controllers\JenisKertasController::class, 'delete'])->name('jenis_kertas.delete');

    Route::resource('kertas', KertasController::class);
    Route::get('kertas/{id}/delete', [KertasController::class, 'delete'])->name('kertas.delete');

    Route::resource('kertas_produk', App\Http\Controllers\KertasProdukController::class);
    Route::get('kertas_produk/{id}/delete', [App\Http\Controllers\KertasProdukController::class, 'delete'])->name('kertas_produk.delete');

    Route::resource('mesin', MesinController::class);
    Route::get('mesin/{id}/delete', [MesinController::class, 'delete'])->name('mesin.delete');

    Route::resource('produk', ProdukController::class);
    Route::get('produk/{id}/delete', [ProdukController::class, 'delete'])->name('produk.delete');

    Route::resource('ukuran_cetak', App\Http\Controllers\UkuranCetakController::class);
    Route::get('ukuran_cetak/{id}/delete', [App\Http\Controllers\UkuranCetakController::class, 'delete'])->name('ukuran_cetak.delete');

    Route::resource('ukuran_cetak_detail', App\Http\Controllers\UkuranCetakDetailController::class);
    Route::get('ukuran_cetak_detail/{id}/delete', [App\Http\Controllers\UkuranCetakDetailController::class, 'delete'])->name('ukuran_cetak_detail.delete');
});
