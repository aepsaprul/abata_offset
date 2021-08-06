<?php

namespace App\Http\Controllers;

use App\Models\OffsetBiaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biayas = OffsetBiaya::get();

        return view('pages.biaya.index', ['biayas' => $biayas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.biaya.create');
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
            'keterangan_biaya' => 'required',
            'jumlah_min' => 'required',
            'harga_min' => 'required',
            'harga_lebih' => 'required'
        ]);

        $harga_min = str_replace(".","", $request->harga_min);
        $harga_lebih = str_replace(".","", $request->harga_lebih);

        $biayas = new OffsetBiaya;
        $biayas->keterangan_biaya = $request->keterangan_biaya;
        $biayas->jml_min = $request->jumlah_min;
        $biayas->harga_min = $harga_min;
        $biayas->harga_lebih = $harga_lebih;
        $biayas->save();

        return redirect()->route('biaya.index')->with('status', 'Data berhasil disimpan');
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
        $biaya = OffsetBiaya::find($id);

        return view('pages.biaya.edit', ['biaya' => $biaya]);
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
            'keterangan_biaya' => 'required',
            'jumlah_min' => 'required',
            'harga_min' => 'required',
            'harga_lebih' => 'required'
        ]);

        $harga_min = str_replace(".","", $request->harga_min);
        $harga_lebih = str_replace(".","", $request->harga_lebih);

        $biayas = OffsetBiaya::find($id);
        $biayas->keterangan_biaya = $request->keterangan_biaya;
        $biayas->jml_min = $request->jumlah_min;
        $biayas->harga_min = $harga_min;
        $biayas->harga_lebih = $harga_lebih;
        $biayas->save();

        return redirect()->route('biaya.index')->with('status', 'Data berhasil disimpan');
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
        $biayas = Offsetbiaya::find($id);
        $biayas->delete();

        return redirect()->route('biaya.index')->with('status', 'Data berhasil dihapus');
    }
}
