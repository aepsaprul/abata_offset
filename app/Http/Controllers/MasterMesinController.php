<?php

namespace App\Http\Controllers;

use App\Models\OffsetMasterMesin;
use Illuminate\Http\Request;

class MasterMesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master_mesins = OffsetMasterMesin::orderBy('id', 'desc')->get();

        return view('pages.master_mesin.index', ['master_mesins' => $master_mesins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master_mesin.create');
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
            'area_kertas_panjang' => 'required',
            'area_kertas_lebar' => 'required',
            'area_cetak_panjang' => 'required',
            'area_cetak_lebar' => 'required'
        ]);

        $mesins = new OffsetMasterMesin;
        $mesins->nama_mesin = $request->nama_mesin;
        $mesins->area_kertas_panjang = $request->area_kertas_panjang;
        $mesins->area_kertas_lebar = $request->area_kertas_lebar;
        $mesins->area_cetak_panjang = $request->area_cetak_panjang;
        $mesins->area_cetak_lebar = $request->area_cetak_lebar;
        $mesins->save();

        return redirect()->route('master_mesin.index')->with('status', 'Data berhasil disimpan');
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
        $master_mesin = OffsetMasterMesin::find($id);

        return view('pages.master_mesin.edit', ['master_mesin' => $master_mesin]);
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
            'area_kertas_panjang' => 'required',
            'area_kertas_lebar' => 'required',
            'area_cetak_panjang' => 'required',
            'area_cetak_lebar' => 'required'
        ]);

        $mesins = OffsetMasterMesin::find($id);
        $mesins->nama_mesin = $request->nama_mesin;
        $mesins->area_kertas_panjang = $request->area_kertas_panjang;
        $mesins->area_kertas_lebar = $request->area_kertas_lebar;
        $mesins->area_cetak_panjang = $request->area_cetak_panjang;
        $mesins->area_cetak_lebar = $request->area_cetak_lebar;
        $mesins->save();

        return redirect()->route('master_mesin.index')->with('status', 'Data berhasil diperbaharui');
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
        $master_mesin = OffsetMasterMesin::find($id);
        $master_mesin->delete();

        return redirect()->route('master_mesin.index')->with('status', 'Data berhasil dihapus');
    }
}
