<?php

namespace App\Http\Controllers;

use App\Models\OffsetKertas;
use App\Models\OffsetMesin;
use App\Models\OffsetUkuranCetak;
use App\Models\OffsetUkuranCetakDetail;
use Illuminate\Http\Request;

class UkuranCetakDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukuran_cetak_details = OffsetUkuranCetakDetail::with(['ukuranCetak', 'kertas', 'mesin'])->orderBy('id', 'desc')->get();

        return view('pages.ukuran_cetak_detail.index', ['ukuran_cetak_details' => $ukuran_cetak_details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ukuran_cetaks = OffsetUkuranCetak::get();
        $kertas = OffsetKertas::get();
        $mesins = OffsetMesin::get();

        return view('pages.ukuran_cetak_detail.create', ['ukuran_cetaks' => $ukuran_cetaks,'kertas' => $kertas, 'mesins' => $mesins]);
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
            'ukuran_cetak_id' => 'required',
            'kertas_id' => 'required',
            'mesin_id' => 'required'
        ]);

        $ukuran_cetak_details = new OffsetUkuranCetakDetail;
        $ukuran_cetak_details->ukuran_cetak_id = $request->ukuran_cetak_id;
        $ukuran_cetak_details->kertas_id = $request->kertas_id;
        $ukuran_cetak_details->mesin_id = $request->mesin_id;
        $ukuran_cetak_details->save();

        return redirect()->route('ukuran_cetak_detail.index')->with('status', 'Data berhasil disimpan');
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
        $ukuran_cetak_detail = OffsetUkuranCetakDetail::find($id);
        $kertas = OffsetKertas::get();
        $mesins = OffsetMesin::get();

        return view('pages.ukuran_cetak_detail.edit', ['ukuran_cetak_detail' => $ukuran_cetak_detail, 'kertas' => $kertas, 'mesins' => $mesins]);
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
            'ukuran_cetak_id' => 'required',
            'kertas_id' => 'required',
            'mesin_id' => 'required'
        ]);

        $ukuran_cetak_detail = OffsetUkuranCetakDetail::find($id);
        $ukuran_cetak_detail->ukuran_cetak_id = $request->ukuran_cetak_id;
        $ukuran_cetak_detail->kertas_id = $request->kertas_id;
        $ukuran_cetak_detail->mesin_id = $request->mesin_id;
        $ukuran_cetak_detail->save();

        return redirect()->route('ukuran_cetak_detail.index')->with('status', 'Data berhasil disimpan');
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
        $ukuran_cetak_detail = OffsetUkuranCetakDetail::find($id);
        $ukuran_cetak_detail->delete();

        return redirect()->route('ukuran$ukuran_cetak_detail.index')->with('status', 'Data berhasil dihapus');
    }
}
