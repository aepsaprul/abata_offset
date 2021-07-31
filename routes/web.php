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

Route::middleware(['auth'])->group(function () {
    Route::resource('bahan', BahanController::class);
    Route::get('bahan/{id}/delete', [BahanController::class, 'delete'])->name('bahan.delete');

    Route::resource('biaya_cetak', BiayaCetakController::class);
    Route::get('biaya_cetak/{id}/delete', [BiayaCetakController::class, 'delete'])->name('biaya_cetak.delete');

    Route::resource('biaya_finishing', BiayaFinishingController::class);
    Route::get('biaya_finishing/{id}/delete', [BiayaFinishingController::class, 'delete'])->name('biaya_finishing.delete');

    Route::resource('kertas', KertasController::class);
    Route::get('kertas/{id}/delete', [KertasController::class, 'delete'])->name('kertas.delete');

    Route::resource('mesin', MesinController::class);
    Route::get('mesin/{id}/delete', [MesinController::class, 'delete'])->name('mesin.delete');

    Route::resource('master_mesin', MasterMesinController::class);
    Route::get('master_mesin/{id}/delete', [MasterMesinController::class, 'delete'])->name('master_mesin.delete');

    Route::resource('produk', ProdukController::class);
    Route::get('produk/{id}/delete', [ProdukController::class, 'delete'])->name('produk.delete');
});
