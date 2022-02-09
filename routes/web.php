<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\BiayaCetakController;
use App\Http\Controllers\BiayaFinishingController;
use App\Http\Controllers\JasaCetakController;
use App\Http\Controllers\JenisKertasController;
use App\Http\Controllers\KertasController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MasterMesinController;
use App\Http\Controllers\PaperBagController;

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
Route::get('/tes', function () {
    $panjang = 12;
    $lebar = 24;
    $tinggi = 7;
    // title
    $lipatan_bawah = $tinggi - 2;
    $lipatan_atas = $lipatan_bawah * 0.5;
    $lipatan_lem = $lipatan_atas;

    // ukuran plat
    $plat_lebar = $lipatan_atas + $lebar + $lipatan_bawah;
    $plat_panjang = 2 * ($panjang + $tinggi) + $lipatan_lem;


    // ukuran plano kecil
    $plano_panjang_1 = 100;
    $plano_lebar_1 = 65;

    // hitung plano kecil
        // lebar x panjang (standar)
        $hitung_lebar_plat_lebar_plano_kecil = $plano_lebar_1 / $plat_lebar;
        $hitung_panjang_plat_panjang_plano_kecil = $plano_panjang_1 / $plat_panjang;
        // hasil
        $hasil_1 = floor($hitung_lebar_plat_lebar_plano_kecil) * floor($hitung_panjang_plat_panjang_plano_kecil);

        // lebar x panjang (di tukar)
        $hitung_lebar_plat_panjang_plano_kecil = $plano_lebar_1 / $plat_panjang;
        $hitung_panjang_plat_lebar_plano_kecil = $plano_panjang_1 / $plat_lebar;
        // hasil
        $hasil_2 = floor($hitung_lebar_plat_panjang_plano_kecil) * floor($hitung_panjang_plat_lebar_plano_kecil);


    // ukuran plano besar
    $plano_panjang_2 = 109;
    $plano_lebar_2 = 79;

    // hitung plano besar
        // lebar x panjang (standar)
        $hitung_lebar_plat_lebar_plano_besar = $plano_lebar_2 / $plat_lebar;
        $hitung_panjang_plat_panjang_plano_besar = $plano_panjang_2 / $plat_panjang;
        // hasil
        $hasil_3 = floor($hitung_lebar_plat_lebar_plano_besar) * floor($hitung_panjang_plat_panjang_plano_besar);

        // lebar x panjang (di tukar)
        $hitung_lebar_plat_panjang_plano_besar = $plano_lebar_2 / $plat_panjang;
        $hitung_panjang_plat_lebar_plano_besar = $plano_panjang_2 / $plat_lebar;
        // hasil
        $hasil_4 = floor($hitung_lebar_plat_panjang_plano_besar) * floor($hitung_panjang_plat_lebar_plano_besar);

    // result
    $array = array(1 => $hasil_1, 2 => $hasil_2, 3 => $hasil_3, 4 => $hasil_4);
    $maxValue = max($array);
    $maxIndex = array_search(max($array), $array);

    if ($maxIndex == 1 || $maxIndex == 2) {
        $maxx = "Plano Kecil";
    }
    if ($maxIndex == 3 || $maxIndex == 4) {
        $maxx = "Plano Besar";
    }

    return $hitung_lebar_plat_lebar_plano_besar . "," . $hitung_panjang_plat_panjang_plano_besar;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{kode_produk}', [App\Http\Controllers\HomeController::class, 'produk'])->name('home.produk');
Route::post('/home/ukuran-cetak-detail/', [App\Http\Controllers\HomeController::class, 'ukuranCetakDetail'])->name('home.ukuran_cetak_detail');

Route::post('/home/kalender-dinding', [App\Http\Controllers\HomeController::class, 'kalenderDinding'])->name('home.produk.kalender_dinding');
Route::post('/home/kalender-dinding-detail', [App\Http\Controllers\HomeController::class, 'kalenderDindingDetail'])->name('home.produk.kalender_dinding_detail');

Route::middleware(['auth'])->group(function () {
    // Route::resource('bahan', BahanController::class);
    // Route::get('bahan/{id}/delete', [BahanController::class, 'delete'])->name('bahan.delete');

    // Route::resource('biaya_cetak', BiayaCetakController::class);
    // Route::get('biaya_cetak/{id}/delete', [BiayaCetakController::class, 'delete'])->name('biaya_cetak.delete');

    // Route::resource('biaya_finishing', BiayaFinishingController::class);
    // Route::get('biaya_finishing/{id}/delete', [BiayaFinishingController::class, 'delete'])->name('biaya_finishing.delete');

    Route::resource('finishing', App\Http\Controllers\FinishingController::class);
    Route::get('finishing/{id}/delete', [App\Http\Controllers\FinishingController::class, 'delete'])->name('finishing.delete');

    Route::resource('finishing_produk', App\Http\Controllers\FinishingProdukController::class);
    Route::get('finishing_produk/{id}/delete', [App\Http\Controllers\FinishingProdukController::class, 'delete'])->name('finishing_produk.delete');

    Route::resource('jenis_kertas', App\Http\Controllers\JenisKertasController::class);
    Route::get('jenis_kertas/{id}/delete_btn', [App\Http\Controllers\JenisKertasController::class, 'deleteBtn'])->name('jenis_kertas.delete_btn');
    Route::post('jenis_kertas/delete', [App\Http\Controllers\JenisKertasController::class, 'delete'])->name('jenis_kertas.delete');

    Route::post('jenis_kertas/ukuran_kertas_store', [App\Http\Controllers\JenisKertasController::class, 'ukuranKertasStore'])->name('jenis_kertas.ukuran_kertas_store');
    Route::get('jenis_kertas/{id}/ukuran_kertas_edit', [App\Http\Controllers\JenisKertasController::class, 'ukuranKertasEdit'])->name('jenis_kertas.ukuran_kertas_edit');
    Route::post('jenis_kertas/ukuran_kertas_update', [App\Http\Controllers\JenisKertasController::class, 'ukuranKertasUpdate'])->name('jenis_kertas.ukuran_kertas_update');
    Route::get('jenis_kertas/{id}/ukuran_kertas_delete_btn', [App\Http\Controllers\JenisKertasController::class, 'ukuranKertasDeleteBtn'])->name('jenis_kertas.ukuran_kertas_delete_btn');
    Route::post('jenis_kertas/ukuran_kertas_delete', [App\Http\Controllers\JenisKertasController::class, 'ukuranKertasDelete'])->name('jenis_kertas.ukuran_kertas_delete');

    // Route::resource('kertas', KertasController::class);
    // Route::get('kertas/{id}/delete', [KertasController::class, 'delete'])->name('kertas.delete');

    Route::resource('kertas_produk', App\Http\Controllers\KertasProdukController::class);
    Route::get('kertas_produk/{id}/delete', [App\Http\Controllers\KertasProdukController::class, 'delete'])->name('kertas_produk.delete');

    Route::resource('mesin', MesinController::class);
    Route::get('mesin/{id}/delete_btn', [MesinController::class, 'deleteBtn'])->name('mesin.delete_btn');
    Route::post('mesin/delete', [MesinController::class, 'delete'])->name('mesin.delete');

    Route::resource('produk', ProdukController::class);
    Route::get('produk/{id}/delete', [ProdukController::class, 'delete'])->name('produk.delete');

    // Route::resource('ukuran_cetak', App\Http\Controllers\UkuranCetakController::class);
    // Route::get('ukuran_cetak/{id}/delete', [App\Http\Controllers\UkuranCetakController::class, 'delete'])->name('ukuran_cetak.delete');

    Route::resource('ukuran_cetak_detail', App\Http\Controllers\UkuranCetakDetailController::class);
    Route::get('ukuran_cetak_detail/{id}/delete', [App\Http\Controllers\UkuranCetakDetailController::class, 'delete'])->name('ukuran_cetak_detail.delete');

    Route::get('jasa_cetak', [JasaCetakController::class, 'index'])->name('jasa_cetak.index');
    Route::get('jasa_cetak/create', [JasaCetakController::class, 'create'])->name('jasa_cetak.create');
    Route::post('jasa_cetak/store', [JasaCetakController::class, 'store'])->name('jasa_cetak.store');
    Route::get('jasa_cetak/{id}/edit', [JasaCetakController::class, 'edit'])->name('jasa_cetak.edit');
    Route::post('jasa_cetak/update', [JasaCetakController::class, 'update'])->name('jasa_cetak.update');
    Route::get('jasa_cetak/{id}/delete_btn', [JasaCetakController::class, 'deleteBtn'])->name('jasa_cetak.delete_btn');
    Route::post('jasa_cetak/delete', [JasaCetakController::class, 'delete'])->name('jasa_cetak.delete');

    // paper bag
    Route::get('paper_bag', [PaperBagController::class, 'paperBag'])->name('paper_bag.index');
    Route::post('paper_bag/mesin', [PaperBagController::class, 'mesin'])->name('paper_bag.mesin');
    Route::post('paper_bag/hitung', [PaperBagController::class, 'hitung'])->name('paper_bag.hitung');
});
