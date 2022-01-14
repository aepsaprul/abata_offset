<?php

namespace App\Http\Controllers;

use App\Models\OffsetMesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesins = OffsetMesin::get();

        return view('pages.mesin.index', ['mesins' => $mesins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.mesin.create');
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
            'nama_mesin' => 'required',
            'harga_plat' => 'required'
        ]);

        $harga_plat = str_replace(".", "", $request->harga_plat);

        $mesins = new OffsetMesin;
        $mesins->nama_mesin = $request->nama_mesin;
        $mesins->area_cetak_panjang = $request->area_cetak_panjang;
        $mesins->area_cetak_lebar = $request->area_cetak_lebar;
        $mesins->harga_plat = $harga_plat;
        $mesins->save();

        return response()->json([
            'status' => 'Data berhasil disimpan'
        ]);
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
        $mesin = OffsetMesin::find($id);

        return response()->json([
            'id' => $mesin->id,
            'nama_mesin' => $mesin->nama_mesin,
            'area_cetak_panjang' => $mesin->area_cetak_panjang,
            'area_cetak_lebar' => $mesin->area_cetak_lebar,
            'harga_plat' => $mesin->harga_plat
        ]);
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
            'nama_mesin' => 'required',
            'harga_plat' => 'required'
        ]);

        $harga_plat = str_replace(".", "", $request->harga_plat);

        $mesin = OffsetMesin::find($id);
        $mesin->nama_mesin = $request->nama_mesin;
        $mesin->area_cetak_panjang = $request->area_cetak_panjang;
        $mesin->area_cetak_lebar = $request->area_cetak_lebar;
        $mesin->harga_plat = $harga_plat;
        $mesin->save();

        return response()->json([
            'status' => 'Data berhasil diperbaharui'
        ]);
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

    public function deleteBtn($id)
    {
        $mesin = OffsetMesin::find($id);

        return response()->json([
            'id' => $mesin->id,
            'nama_mesin' => $mesin->nama_mesin
        ]);
    }

    public function delete(Request $request)
    {
        $mesin = OffsetMesin::find($request->id);
        $mesin->delete();

        return redirect()->route('mesin.index')->with('status', 'Data berhasil dihapus');
    }
}
