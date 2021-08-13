<?php

namespace App\Http\Controllers;

use App\Models\OffsetHitungProduk;
use App\Models\OffsetJenisKertas;
use App\Models\OffsetMesin;
use App\Models\OffsetProduk;
use App\Models\OffsetUkuranCetak;
use App\Models\OffsetUkuranCetakDetail;
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
            $ukuran_cetaks = OffsetUkuranCetak::get();

            return view('pages.hitung_kalender_dinding.index', ['produks' => $produks, 'produk_relasi' => $produk_relasi, 'ukuran_cetaks' => $ukuran_cetaks]);
        } else {
            echo "data mbuh";
        }
    }

    public function ukuranCetakDetail(Request $request) {
        $mesin = OffsetUkuranCetakDetail::where('ukuran_cetak_id', $request->id)->with('mesin')->get();

        return response()->json([
            'data' => $mesin
        ]);
    }

    public function kalenderDinding(Request $request) {
        $jml_halaman_kalender = $request->jml_halaman_kalender;
        $jml_warna = $request->jml_warna;
        $ukuran_cetak_id = $request->ukuran_cetak;
        $jenis_kertas = $request->jenis_kertas;
        $jenis_finishing = $request->jenis_finishing;
        $mesin_id = $request->mesin_id;
        $laminasi_val = $request->laminasi;
        $jml_cetak_rp = $request->jml_cetak;
        $biaya_potong_rp = $request->biaya_potong;
        $biaya_design_rp = $request->biaya_design;
        $biaya_akomodasi_rp = $request->biaya_akomodasi;
        $nama_file = $request->nama_file;

        $jml_cetak = str_replace(".", "", $jml_cetak_rp);
        $biaya_potong = str_replace(".", "", $biaya_potong_rp);
        $biaya_design = str_replace(".", "", $biaya_design_rp);
        $biaya_akomodasi = str_replace(".", "", $biaya_akomodasi_rp);

        // jumlah set kalender
        $jml_set_kalender = $jml_halaman_kalender * $jml_cetak;

        // jumlah plat
        $jml_plat = $jml_halaman_kalender * $jml_warna;

        // ukuran cetak
        $ukuran_cetak_db = OffsetUkuranCetak::where('id', $ukuran_cetak_id)->first();
        $ukuran_cetak = $ukuran_cetak_db->lebar . " x " . $ukuran_cetak_db->panjang;

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

        if ($laminasi_val == "ya") {
            $laminasi = ($ukuran_cetak_db->lebar * $ukuran_cetak_db->panjang) * 0.5;
        } else {
            $laminasi = 0;
        }

        $ukuran_cetak_detail_db = OffsetUkuranCetakDetail::where('ukuran_cetak_id', $ukuran_cetak_id)->where('mesin_id', $mesin_id)->with('kertas')->first();
        $ukuran_cetak_detail = $ukuran_cetak_detail_db->kertas->nama_kertas;

        // ukuran potong kertas
        $ukuran_potong_lebar = $ukuran_cetak_db->lebar + 2;
        $ukuran_potong_panjang = $ukuran_cetak_db->panjang + 2;
        $ukuran_potong_kertas = $ukuran_potong_lebar . " x " . $ukuran_potong_panjang;

        // hitung kondisi finishing
        if ($jenis_finishing == "KLEM") {
            $biaya_susun = 0;
            $biaya_finishing = $biaya_klem;
        } elseif ($jenis_finishing == "SPIRAL") {
            // hitung biaya susun
            if ($jml_halaman_kalender == 1) {
                $biaya_susun = 0;
            } else if ($jml_halaman_kalender == 6) {
                $biaya_susun = 500 * $jml_cetak;
            } elseif ($jml_halaman_kalender == 12) {
                $biaya_susun = 800 * $jml_cetak;
            } else {
                $biaya_susun = 100 * $jml_cetak;
            }
            $biaya_finishing = $biaya_spiral + $biaya_susun;
            // $biaya_finishing = $biaya_spiral * $jml_cetak;
        } else {
            $biaya_susun = 0;
            $biaya_finishing = 1000;
            // $biaya_finishing = 1000 * $jml_cetak;
        }


        // jenis kertas
        $offset_jenis_kertas = OffsetJenisKertas::find($jenis_kertas);
        $kertas = $offset_jenis_kertas->harga;

        if ($jml_cetak > 1000) {
            $biaya_cetak_lebih = 60 * ($jml_cetak - 1000) * $jml_halaman_kalender;
        } else {
            $biaya_cetak_lebih = 0;
        }

        $mesin = OffsetMesin::where('id', $mesin_id)->first();
        $mesin_harga = $mesin->harga_min;

        // ongkos
        if ($jml_warna == 1) {
            $ongkos = 100000;
        } elseif ($jml_warna == 2) {
            $ongkos = 150000;
        } else {
            $ongkos = 200000;
        }

        // cover
        if ($request->cover_depan != null) {
            $cover_depan = $request->cover_depan;
            $jml_warna_cover = $request->jml_warna_cover;
            $jenis_kertas_cover = $request->jenis_kertas_cover;
            if ($ukuran_cetak == "32 x 48") {
                $jml_kertas_insheet_cover = ($jml_cetak / 4) + 25 * $cover_depan;
            } elseif ($ukuran_cetak == "38 x 52") {
                $jml_kertas_insheet_cover = ($jml_cetak / 4) + 25 * $cover_depan;
            } elseif ($ukuran_cetak == "40 x 56") {
                $jml_kertas_insheet_cover = ($jml_cetak / 2) + 50 * $cover_depan;
            } elseif ($ukuran_cetak == "44 x 64") {
                $jml_kertas_insheet_cover = ($jml_cetak / 2) + 50 * $cover_depan;
            } elseif ($ukuran_cetak == "50 x 70") {
                $jml_kertas_insheet_cover = ($jml_cetak / 2) + 50 * $cover_depan;
            } else {
                echo "ukuran lainnya";
            }

            $jml_plat_cover = $jml_warna_cover * 1;
            $biaya_kertas_cover = $kertas * $jml_kertas_insheet_cover;
            $biaya_cetak_min_cover = $ongkos * 1;
            $biaya_cetak_lebih_cover = 60 * ($jml_cetak - 1000) * $cover_depan;
            $biaya_plat_cover = $cover_depan * $mesin->harga_plat;
            $biaya_cover = $biaya_kertas_cover + $biaya_cetak_min_cover + $biaya_cetak_lebih_cover + $biaya_plat_cover;
        } else {
            $jenis_kertas_cover = "";
            $jml_plat_cover = 0;
            $biaya_kertas_cover = 0;
            $biaya_cetak_min_cover = 0;
            $biaya_cetak_lebih_cover = 0;
            $biaya_plat_cover = 0;
            $biaya_cover = 0;
        }

        // biaya
        $biaya_kertas = $kertas * $jml_kertas_insheet;
        $biaya_cetak_min = $ongkos * $jml_halaman_kalender;
        $biaya_plat = $jml_halaman_kalender * $mesin->harga_plat;
        $biaya_set_kalender = $biaya_finishing * $jml_cetak;

        $total_biaya = $biaya_kertas + $biaya_cetak_min + $biaya_cetak_lebih + $biaya_plat + $biaya_set_kalender + $biaya_potong + $biaya_design + $biaya_akomodasi + $laminasi + $biaya_cover;

        $margin_profit = 0.2;
        $profit = $margin_profit * $total_biaya;
        $grand_total = $total_biaya + $profit;
        $harga_satuan = $grand_total / $jml_cetak;

        return response()->json([
            'jml_cetak' => $jml_cetak,
            'jml_halaman' => $jml_halaman_kalender,
            'jml_warna' => $jml_warna,
            'ukuran_cetak' => $ukuran_cetak,
            'jenis_kertas' => $offset_jenis_kertas->nama_kertas,
            'finishing' => $jenis_finishing,
            'kertas' => $ukuran_cetak_detail,
            'mesin' => $mesin->nama_mesin,
            'jml_plat' => $jml_plat,
            'insheet' => $jml_kertas_insheet,
            'ukuran_cetak_real' => $ukuran_cetak,
            'ukuran_potong_kertas' => $ukuran_potong_kertas,
            'total_biaya' => $total_biaya,
            'profit' => $profit,
            'grand_total' => $grand_total,
            'harga_satuan' => $harga_satuan,
            'biaya_kertas' => $biaya_kertas,
            'biaya_cetak_min' => $biaya_cetak_min,
            'biaya_cetak_lebih' => $biaya_cetak_lebih,
            'biaya_plat' => $biaya_plat,
            'biaya_susun' => $biaya_susun,
            'biaya_set_kalender' => $biaya_set_kalender,
            'laminasi' => $laminasi,
            'nama_file' => $nama_file,
            'jenis_kertas_cover' => $jenis_kertas_cover,
            'jml_kertas_insheet_cover' => $jml_kertas_insheet_cover,
            'jml_plat_cover' => $jml_plat_cover,
            'biaya_kertas_cover' => $biaya_kertas_cover,
            'biaya_cetak_min_cover' => $biaya_cetak_min_cover,
            'biaya_cetak_lebih_cover' => $biaya_cetak_lebih_cover,
            'biaya_plat_cover' => $biaya_plat_cover,
            'biaya_cover' => $biaya_cover
        ]);
    }

    public function kalenderDindingDetail(Request $request) {
        $produks = OffsetProduk::with('kertas')->get();

        return view('pages.hitung_kalender_dinding.detail', [
            'produks' => $produks,
            'jml_cetak' => $request->jml_cetak,
            'jml_halaman' => $request->jml_halaman,
            'jml_warna' => $request->jml_warna,
            'ukuran_cetak' => $request->ukuran_cetak,
            'jenis_kertas' => $request->jenis_kertas,
            'finishing' => $request->finishing,
            'kertas' => $request->ukuran_cetak_detail,
            'mesin' => $request->mesin,
            'jml_plat' => $request->jml_plat,
            'insheet' => $request->insheet,
            'ukuran_cetak_real' => $request->ukuran_cetak,
            'ukuran_potong_kertas' => $request->ukuran_potong_kertas,
            'total_biaya' => $request->total_biaya,
            'profit' => $request->profit,
            'grand_total' => $request->grand_total,
            'harga_satuan' => $request->harga_satuan,
            'biaya_kertas' => $request->biaya_kertas,
            'biaya_cetak_min' => $request->biaya_cetak_min,
            'biaya_cetak_lebih' => $request->biaya_cetak_lebih,
            'biaya_plat' => $request->biaya_plat,
            'biaya_susun' => $request->biaya_susun,
            'biaya_set_kalender' => $request->biaya_set_kalender
        ]);
    }
}
