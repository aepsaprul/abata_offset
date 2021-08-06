<?php

namespace App\Http\Controllers;

use App\Models\OffsetBiayaCetak;
use App\Models\OffsetMasterMesin;
use Illuminate\Http\Request;

class BiayaCetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biaya_cetaks = OffsetBiayaCetak::orderBy('id', 'desc')->get();

        return view('pages.biaya_cetak.index', ['biaya_cetaks' => $biaya_cetaks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master_mesins = OffsetMasterMesin::get();

        return view('pages.biaya_cetak.create', ['master_mesins' => $master_mesins]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_biaya' => 'required',
            'jumlah_min' => 'required',
            'harga_cetak_min' => 'required',
            'harga_cetak_lebih' => 'required'
        ]);

        $harga_cetak_min = str_replace(".","", $request->harga_cetak_min);
        $harga_cetak_lebih = str_replace(".","", $request->harga_cetak_lebih);

        $biaya_cetaks = new OffsetBiayaCetak;
        $biaya_cetaks->nama_biaya = $request->nama_biaya;
        $biaya_cetaks->mesin_id = $request->offset_mesin_id;
        $biaya_cetaks->kategori_warna = $request->kategori_warna;
        $biaya_cetaks->jml_min = $request->jumlah_min;
        $biaya_cetaks->harga_cetak_min = $harga_cetak_min;
        $biaya_cetaks->harga_cetak_lebih = $harga_cetak_lebih;
        $biaya_cetaks->save();

        return redirect()->route('biaya_cetak.index')->with('status', 'Data berhasi disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biaya_cetak = OffsetBiayaCetak::find($id);
        $master_mesins = OffsetMasterMesin::get();

        return view('pages.biaya_cetak.edit', ['biaya_cetak' => $biaya_cetak, 'master_mesins' => $master_mesins]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_biaya' => 'required',
            'jumlah_min' => 'required',
            'harga_cetak_min' => 'required',
            'harga_cetak_lebih' => 'required'
        ]);

        $harga_cetak_min = str_replace(".","", $request->harga_cetak_min);
        $harga_cetak_lebih = str_replace(".","", $request->harga_cetak_lebih);

        $biaya_cetaks = OffsetBiayaCetak::find($id);
        $biaya_cetaks->nama_biaya = $request->nama_biaya;
        $biaya_cetaks->mesin_id = $request->offset_mesin_id;
        $biaya_cetaks->kategori_warna = $request->kategori_warna;
        $biaya_cetaks->jml_min = $request->jumlah_min;
        $biaya_cetaks->harga_cetak_min = $harga_cetak_min;
        $biaya_cetaks->harga_cetak_lebih = $harga_cetak_lebih;
        $biaya_cetaks->save();

        return redirect()->route('biaya_cetak.index')->with('status', 'Data berhasi diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request, $id)
    {
        $biaya_cetak = OffsetBiayaCetak::find($id);
        $biaya_cetak->delete();

        return redirect()->route('biaya_cetak.index')->with('status', 'Data berhasil dihapus');
    }
}
