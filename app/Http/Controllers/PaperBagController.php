<?php

namespace App\Http\Controllers;

use App\Models\OffsetBiayaCetak;
use App\Models\OffsetJenisKertas;
use App\Models\OffsetMesin;
use App\Models\OffsetWarna;
use Illuminate\Http\Request;

class PaperBagController extends Controller
{
    public function paperBag()
    {
        $warna = OffsetWarna::get();

        return view('pages.hitung_paper_bag.index', ['warnas' => $warna]);
    }

    public function mesin(Request $request)
    {
        // $panjang_real = $request->panjang_real;
        $lebar_real = $request->lebar;
        $tinggi_real = $request->tinggi;

        // ukuran cetak
        $lipatan_bawah = $tinggi_real - 2;
        $lipatan_atas = $lipatan_bawah * 0.5;
        $plat_lebar = $lipatan_atas + $lebar_real + $lipatan_bawah;
        // $lipatan_lem = $lipatan_atas;
        // $plat_panjang = 2 * ($panjang_real + $tinggi_real) + $lipatan_lem;

        if ($plat_lebar <= 32) {
            $mesin = OffsetMesin::whereIn('id', [1,2])->get();
        } elseif ($plat_lebar > 32 && $plat_lebar <= 38) {
            $mesin = OffsetMesin::whereIn('id', [2,3])->get();
        } elseif ($plat_lebar > 38 && $plat_lebar <= 40) {
            $mesin = OffsetMesin::where('id', 2)->get();
        } else {
            $mesin = OffsetMesin::where('id', 3)->get();
        }

        return response()->json([
            'mesins' => $mesin
        ]);
    }

    public function hitung(Request $request)
    {
        $jumlah_cetak_rp = $request->jumlah_cetak;
        $warna_id = $request->warna_id;
        $panjang_real = $request->panjang_real;
        $lebar_real = $request->lebar_real;
        $tinggi_real = $request->tinggi_real;
        $kertas_id = $request->kertas_id;
        $biaya_pisau_rp = $request->biaya_pisau;
        $biaya_desain_rp = $request->biaya_desain;
        $biaya_potong_rp = $request->biaya_potong;
        $biaya_lain_rp = $request->biaya_lain;
        $laminasi = $request->laminasi;
        $mesin_id = $request->mesin_id;
        $insheet = $request->insheet;
        $finishing_rp = $request->finishing;

        // ukuran cetak
        $lipatan_bawah = $tinggi_real - 2;
        $lipatan_atas = $lipatan_bawah * 0.5;
        $lipatan_lem = $lipatan_atas;
        $plat_lebar = $lipatan_atas + $lebar_real + $lipatan_bawah;
        $plat_panjang = 2 * ($panjang_real + $tinggi_real) + $lipatan_lem;

        if ($plat_panjang > 70 || $plat_lebar > 70) {
            return response()->json([
                'status' => 'false'
            ]);
        } else {
            $mesin = OffsetMesin::find($mesin_id);
            $mesin_pond = OffsetBiayaCetak::where('mesin_id', 5)->where('warna_id', $warna_id)->first();
            $warna = OffsetWarna::find($warna_id);
            $kertas = OffsetJenisKertas::find($kertas_id);

            // ubah rupiah ke integer
            $jumlah_cetak = str_replace(".", "", $jumlah_cetak_rp);
            $finishing = str_replace(".", "", $finishing_rp);
            $biaya_pisau = str_replace(".", "", $biaya_pisau_rp);
            $biaya_desain = str_replace(".", "", $biaya_desain_rp);
            $biaya_potong = str_replace(".", "", $biaya_potong_rp);
            $biaya_lain = str_replace(".", "", $biaya_lain_rp);

            // jasa cetak & pond
            if ($kertas->gramasi <= 310) {
                $biaya_jasa = OffsetBiayaCetak::where('mesin_id', $mesin->id)
                    ->where('gramasi_id', 1)
                    ->where('warna_id', $warna_id)
                    ->first();
            } else {
                $biaya_jasa = OffsetBiayaCetak::where('mesin_id', $mesin->id)
                    ->where('gramasi_id', 2)
                    ->where('warna_id', $warna_id)
                    ->first();
            }

            $biaya_minimal = $biaya_jasa->harga_per_seribu;
            $biaya_minimal_pond = $mesin_pond->harga_per_seribu;

            if ($jumlah_cetak > 1000) {
                $biaya_lebih = $biaya_jasa->harga_lebih * ($jumlah_cetak - 1000);
                $biaya_lebih_pond = $mesin_pond->harga_lebih * ($jumlah_cetak - 1000);
            } else {
                $biaya_lebih = 0;
                $biaya_lebih_pond = 0;
            }

            // plano
            $plano = planoPaperBag($panjang_real, $lebar_real, $tinggi_real);
            $plano_explode = explode(',', $plano);
            $plano_title = $plano_explode[0];
            $plano_value = $plano_explode[1];

            // hitung total cetak
            $total_cetak = ($jumlah_cetak + 75) / $plano_value;
            $total_cetak_ceil = ceil($total_cetak);

            // ukuran cetak
            $lipatan_bawah = $tinggi_real - 2;
            $lipatan_atas = $lipatan_bawah * 0.5;
            $lipatan_lem = $lipatan_atas;
            $plat_lebar = $lipatan_atas + $lebar_real + $lipatan_bawah;
            $plat_panjang = 2 * ($panjang_real + $tinggi_real) + $lipatan_lem;

            // plat
            if($warna_id == 5) {
                $plat_jumlah = 1;
            } else {
                $plat_jumlah = $warna_id;
            }

            $plat_harga = $plat_jumlah * $mesin->harga_plat;

            // biaya finishing
            $biaya_finishing = $finishing * $jumlah_cetak;

            // kertas
            $biaya_kertas = $kertas->harga * $total_cetak_ceil;

            // biaya laminasi
            if ($laminasi == 1) {
                $jenis_laminasi = "Laminasi Doff";
            } elseif ($laminasi == 2) {
                $jenis_laminasi = "Laminasi Glosy";
            } else {
                $jenis_laminasi = "-";
            }

            if ($laminasi != 0) {
                $biaya_laminasi = $plat_panjang * $plat_lebar * 0.90 * $jumlah_cetak;
            } else {
                $biaya_laminasi = 0;
            }

            // total biaya
            $hpp = $biaya_kertas + $plat_harga + $biaya_laminasi + $biaya_finishing + $biaya_pisau + $biaya_desain + $biaya_potong + $biaya_minimal_pond + $biaya_lebih_pond + $biaya_lain + $biaya_minimal + $biaya_lebih;

            $margin_profit = 0.2;
            $profit = $margin_profit * $hpp;
            $harga_jual = $hpp + $profit;
            $harga_satuan = $harga_jual / $jumlah_cetak;
            $harga_satuan_ceil = ceil($harga_satuan);

            return response()->json([
                'status' => 'true',
                'jumlah_cetak' => $jumlah_cetak,
                'warna' => $warna->nama,
                'ukuran_jadi' => $panjang_real . " x " . $lebar_real . " x " . $tinggi_real,
                'kertas' => $kertas->nama_kertas . " " . $kertas->gramasi,
                'plano' => $plano_title . " - " . $plano_value,
                'ukuran_cetak' => $plat_panjang . " x " . $plat_lebar,
                'jenis_laminasi' => $jenis_laminasi,
                'insheet' => $insheet,
                'mesin' => $mesin->nama_mesin,
                'plat_jumlah' => $plat_jumlah,
                'plat_harga' => $plat_harga,
                'biaya_laminasi' => $biaya_laminasi,
                'biaya_finishing' => $biaya_finishing,
                'biaya_pisau' => $biaya_pisau,
                'biaya_desain' => $biaya_desain,
                'biaya_potong' => $biaya_potong,
                'biaya_minimal_pond' => $biaya_minimal_pond,
                'biaya_lebih_pond' => $biaya_lebih_pond,
                'biaya_lain' => $biaya_lain,
                'biaya_kertas' => $biaya_kertas,
                'biaya_minimal' => $biaya_minimal,
                'biaya_lebih' => $biaya_lebih,
                'hpp' => $hpp,
                'profit' => $profit,
                'harga_jual' => $harga_jual,
                'harga_satuan' => $harga_satuan_ceil
            ]);
        }
    }
}
