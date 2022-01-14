<?php

namespace App\Http\Controllers;

use App\Models\OffsetJenisKertas;
use App\Models\OffsetWarna;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HitungController extends Controller
{
    public function paperBag()
    {
        $warna = OffsetWarna::get();

        return view('pages.hitung_paper_bag.index', ['warnas' => $warna]);
    }

    public function hitung(Request $request)
    {
        $jumlah_cetak_rp = $request->jumlah_cetak;
        $panjang_real = $request->panjang_real;
        $lebar_real = $request->lebar_real;
        $tinggi_real = $request->tinggi_real;
        $kertas_id = $request->kertas_id;
        $biaya_pisau_rp = $request->biaya_pisau;
        $biaya_desain_rp = $request->biaya_desain;
        $biaya_akomodasi_rp = $request->biaya_akomodasi;
        $biaya_lain_rp = $request->biaya_lain;
        $laminasi = $request->laminasi;
        $finishing_rp = $request->finishing;

        // ubah rupiah ke integer
        $jumlah_cetak = str_replace(".", "", $jumlah_cetak_rp);
        $finishing = str_replace(".", "", $finishing_rp);
        $biaya_pisau = str_replace(".", "", $biaya_pisau_rp);
        $biaya_desain = str_replace(".", "", $biaya_desain_rp);
        $biaya_akomodasi = str_replace(".", "", $biaya_akomodasi_rp);
        $biaya_lain = str_replace(".", "", $biaya_lain_rp);

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

        $biaya_finishing = $finishing * $jumlah_cetak;

        // kertas
        $kertas_query = OffsetJenisKertas::find($kertas_id);
        $biaya_kertas = $kertas_query->harga * $total_cetak_ceil;

        // biaya laminasi
        if ($laminasi != 0) {
            $biaya_laminasi = $plat_panjang * $plat_lebar * 0.90 * $jumlah_cetak;
        } else {
            $biaya_laminasi = 0;
        }


        return response()->json([
            'jumlah_cetak' => $jumlah_cetak,
            'ukuran_jadi' => $panjang_real . " x " . $lebar_real . " x " . $tinggi_real,
            'kertas_id' => $kertas_id,
            'plano' => $plano_title . " - " . $plano_value,
            'ukuran_cetak' => $plat_panjang . " x " . $plat_lebar,
            'biaya_laminasi' => $biaya_laminasi,
            'biaya_finishing' => $biaya_finishing,
            'biaya_pisau' => $biaya_pisau,
            'biaya_desain' => $biaya_desain,
            'biaya_akomodasi' => $biaya_akomodasi,
            'biaya_lain' => $biaya_lain,
            'biaya_kertas' => $biaya_kertas
        ]);
    }
}
