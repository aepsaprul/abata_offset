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
            'area_kertas_panjang' => 'required',
            'area_kertas_lebar' => 'required',
            'area_cetak_panjang' => 'required',
            'area_cetak_lebar' => 'required'
        ]);

        $mesins = new OffsetMesin;
        $mesins->nama_mesin = $request->nama_mesin;
        $mesins->area_kertas_panjang = $request->area_kertas_panjang;
        $mesins->area_kertas_lebar = $request->area_kertas_lebar;
        $mesins->area_cetak_panjang = $request->area_cetak_panjang;
        $mesins->area_cetak_lebar = $request->area_cetak_lebar;
        $mesins->save();

        return redirect()->route('mesin.index')->with('status', 'Data berhasil disimpan');
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

        return view('pages.mesin.edit', ['mesin' => $mesin]);
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

        $mesins = OffsetMesin::find($id);
        $mesins->nama_mesin = $request->nama_mesin;
        $mesins->area_kertas_panjang = $request->area_kertas_panjang;
        $mesins->area_kertas_lebar = $request->area_kertas_lebar;
        $mesins->area_cetak_panjang = $request->area_cetak_panjang;
        $mesins->area_cetak_lebar = $request->area_cetak_lebar;
        $mesins->save();

        return redirect()->route('mesin.index')->with('status', 'Data berhasil disimpan');
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
        $mesin = OffsetMesin::find($id);
        $mesin->delete();

        return redirect()->route('mesin.index')->with('status', 'Data berhasil dihapus');
    }
}
