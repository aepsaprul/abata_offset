<?php

namespace App\Http\Controllers;

use App\Models\OffsetBiayaJasaKalender;
use App\Models\OffsetGramasi;
use App\Models\OffsetMesin;
use App\Models\OffsetWarna;
use Illuminate\Http\Request;

class JasaCetakController extends Controller
{
    public function index()
    {
        $jasa_cetak = OffsetBiayaJasaKalender::with(['mesin', 'warna', 'gramasi'])->orderBy('id', 'desc')->get();

        return view('pages.jasa_cetak.index', ['jasa_cetaks' => $jasa_cetak]);
    }

    public function create()
    {
        $gramasi = OffsetGramasi::get();
        $mesin = OffsetMesin::get();
        $warna = OffsetWarna::get();

        return response()->json([
            'gramasis' => $gramasi,
            'mesins' => $mesin,
            'warnas' => $warna
        ]);
    }

    public function store(Request $request)
    {
        $harga_per_seribu = str_replace(".", "", $request->harga_per_seribu);
        $harga_lebih = str_replace(".", "", $request->harga_lebih);

        $jasa_cetak = new OffsetBiayaJasaKalender;
        $jasa_cetak->gramasi_id = $request->gramasi_id;
        $jasa_cetak->mesin_id = $request->mesin_id;
        $jasa_cetak->warna_id = $request->warna_id;
        $jasa_cetak->harga_per_seribu = $harga_per_seribu;
        $jasa_cetak->harga_lebih = $harga_lebih;
        $jasa_cetak->save();

        return response()->json([
            'status' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $jasa_cetak = OffsetBiayaJasaKalender::find($id);
        $gramasi = OffsetGramasi::get();
        $mesin = OffsetMesin::get();
        $warna = OffsetWarna::get();

        return response()->json([
            'id' => $jasa_cetak->id,
            'gramasi_id' => $jasa_cetak->gramasi_id,
            'mesin_id' => $jasa_cetak->mesin_id,
            'warna_id' => $jasa_cetak->warna_id,
            'harga_per_seribu' => $jasa_cetak->harga_per_seribu,
            'harga_lebih' => $jasa_cetak->harga_lebih,
            'gramasis' => $gramasi,
            'mesins' => $mesin,
            'warnas' => $warna
        ]);
    }

    public function update(Request $request)
    {
        $harga_per_seribu = str_replace(".", "", $request->harga_per_seribu);
        $harga_lebih = str_replace(".", "", $request->harga_lebih);

        $jasa_cetak = OffsetBiayaJasaKalender::find($request->id);
        $jasa_cetak->gramasi_id = $request->gramasi_id;
        $jasa_cetak->mesin_id = $request->mesin_id;
        $jasa_cetak->warna_id = $request->warna_id;
        $jasa_cetak->harga_per_seribu = $harga_per_seribu;
        $jasa_cetak->harga_lebih = $harga_lebih;
        $jasa_cetak->save();

        return response()->json([
            'status' => 'Data berhasil diperbaharui'
        ]);
    }

    public function deleteBtn($id)
    {
        $jasa_cetak = OffsetBiayaJasaKalender::find($id);

        return response()->json([
            'id' => $jasa_cetak->id
        ]);
    }

    public function delete(Request $request)
    {
        $jasa_cetak = OffsetBiayaJasaKalender::find($request->id);
        $jasa_cetak->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
