<?php

namespace App\Http\Controllers;

use App\Models\OffsetHitungProduk;
use App\Models\OffsetJenisKertas;
use App\Models\OffsetProduk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produks = OffsetProduk::get();

        return view('home', ['produks' => $produks]);
    }

    public function getProduk()
    {
        $produks = OffsetProduk::get();

        return response()->json([
            'success' => 'sukses',
            'data' => $produks
        ]);
    }

    public function produk(Request $request, $kode_produk)
    {
        $produks = OffsetProduk::with('kertas')->get();

        if ($kode_produk == "kalenderdinding") {

            $produk_relasi = OffsetProduk::where('kode_produk', 'kalenderdinding')->with(['kertas', 'finishing'])->first();

            return view('pages.hitung_kalender_dinding.index', ['produks' => $produks, 'produk_relasi' => $produk_relasi]);
        } else {
            echo "data mbuh";
        }
    }

    public function kalenderDinding(Request $request) {
        $jml_halaman_kalender = $request->jml_halaman_kalender;
        $jml_warna = $request->jml_warna;
        $ukuran_cetak = $request->ukuran_cetak;
        $jenis_kertas = $request->jenis_kertas;
        $jenis_finishing = $request->jenis_finishing;
        $laminasi = $request->laminasi;
        $jml_cetak = $request->jml_cetak;
        $biaya_potong = $request->biaya_potong;
        $biaya_design = $request->biaya_design;
        $biaya_akomodasi = $request->biaya_akomodasi;
        $nama_file = $request->nama_file;

        // jumlah set kalender
        $jml_set_kalender = $jml_halaman_kalender * $jml_cetak;

        // jumlah plat
        $jml_plat = $jml_halaman_kalender * $jml_warna;

        // hitung biaya susun
        if ($jml_halaman_kalender == 1) {
            $biaya_susun = 0;
            $message = 1;
        } else if ($jml_halaman_kalender == 6) {
            $biaya_susun = 500 * $jml_cetak;
            $message = 2;
        } elseif ($jml_halaman_kalender == 12) {
            $biaya_susun = 800 * $jml_cetak;
            $message = 3;
        } else {
            $biaya_susun = 100 * $jml_cetak;
            $message = 4;
        }

        if ($ukuran_cetak == "32 x 48") {
            $biaya_klem = 1000;
            $biaya_spiral = 150 * 36; // 32 + 4
            $jml_kertas_insheet = ($jml_set_kalender / 4) + 25 * $jml_halaman_kalender;
        } elseif ($ukuran_cetak == "38 x 52") {
            $biaya_klem = 1000;
            $biaya_spiral = 150 * 42; // 38 + 4
            $jml_kertas_insheet = ($jml_set_kalender / 4) + 25 * $jml_halaman_kalender;
        } elseif ($ukuran_cetak == "40 x 56") {
            $biaya_klem = 1500;
            $biaya_spiral = 150 * 44; // 40 + 4
            $jml_kertas_insheet = ($jml_set_kalender / 2) + 50 * $jml_halaman_kalender;
        } elseif ($ukuran_cetak == "44 x 64") {
            $biaya_klem = 1500;
            $biaya_spiral = 150 * 48; // 44 + 4
            $jml_kertas_insheet = ($jml_set_kalender / 2) + 50 * $jml_halaman_kalender;
        } elseif ($ukuran_cetak == "50 x 70") {
            $biaya_klem = 2000;
            $biaya_spiral = 150 * 54; // 50 + 4
            $jml_kertas_insheet = ($jml_set_kalender / 2) + 50 * $jml_halaman_kalender;
        } else {
            echo "ukuran lainnya";
        }

        // hitung kondisi finishing
        if ($jenis_finishing == "KLEM") {
            $biaya_finishing = $biaya_klem;
        } elseif ($jenis_finishing == "SPIRAL") {
            $biaya_finishing = $biaya_spiral;
            // $biaya_finishing = $biaya_spiral * $jml_cetak;
        } else {
            $biaya_finishing = 1000;
            // $biaya_finishing = 1000 * $jml_cetak;
        }


        // JENIS BIAYA
        $offset_jenis_kertas = OffsetJenisKertas::find($jenis_kertas);
        $kertas = $offset_jenis_kertas->harga;

        if ($jml_cetak > 1000) {
            $biaya_cetak_lebih = 60 * ($jml_cetak - 1000) * $jml_halaman_kalender;
        } else {
            $biaya_cetak_lebih = 0;
        }

        $biaya_kertas = $kertas * $jml_kertas_insheet;
        $biaya_cetak_min = 200000 * $jml_halaman_kalender;
        $biaya_plat = $jml_plat * $jml_warna;
        $biaya_set_kalender = $biaya_finishing * $jml_cetak;

        $total_biaya = $biaya_kertas + $biaya_cetak_min + $biaya_cetak_lebih + $biaya_plat + $biaya_set_kalender;

        $hitung_kalender = new OffsetHitungProduk;
        $hitung_kalender->jml_halaman_kalender = $jml_halaman_kalender;
        $hitung_kalender->jml_warna = $jml_warna;
        $hitung_kalender->ukuran_cetak = $ukuran_cetak;
        $hitung_kalender->kertas_id = $jenis_kertas;
        $hitung_kalender->finishing = $jenis_finishing;
        $hitung_kalender->laminasi = $laminasi;
        $hitung_kalender->jml_cetak = $jml_cetak;
        $hitung_kalender->biaya_potong = $biaya_potong;
        $hitung_kalender->biaya_design = $biaya_design;
        $hitung_kalender->biaya_akomodasi = $biaya_akomodasi;
        $hitung_kalender->nama_file = $nama_file;
        $hitung_kalender->harga_set_kalender = $jml_set_kalender;
        $hitung_kalender->insheet = $jml_kertas_insheet;
        $hitung_kalender->harga_kertas_satuan = $kertas;
        $hitung_kalender->jml_plat = $jml_plat;
        $hitung_kalender->biaya_kertas = $biaya_kertas;
        $hitung_kalender->biaya_cetak_min = $biaya_cetak_min;
        $hitung_kalender->biaya_cetak_lebih = $biaya_cetak_lebih;
        $hitung_kalender->biaya_plat = $biaya_plat;
        $hitung_kalender->biaya_set_kalender = $biaya_set_kalender;
        $hitung_kalender->biaya_susun = $biaya_susun;
        $hitung_kalender->total_biaya = $total_biaya;
        $hitung_kalender->save();

        return response()->json([
            'data' => $biaya_plat,
            'message' => $message
        ]);
    }
}
