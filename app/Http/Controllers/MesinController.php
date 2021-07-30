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
            'ukuran_max_kertas' => 'required',
            'ukuran_max_cetak' => 'required',
            'ukuran_min_cetak' => 'required',
            'jumlah_min' => 'required',
            'harga_min' => 'required',
            'harga_lebih' => 'required',
            'harga_ctp' => 'required',
            'publish' => 'required'
        ]);

        $harga_min = str_replace(".","", $request->harga_min);
        $harga_lebih = str_replace(".","", $request->harga_lebih);
        $harga_ctp = str_replace(".","", $request->harga_ctp);

        $mesins = new OffsetMesin;
        $mesins->nama_mesin = $request->nama_mesin;
        $mesins->ukuran_max_kertas = $request->ukuran_max_kertas;
        $mesins->ukuran_max_cetak = $request->ukuran_max_cetak;
        $mesins->ukuran_min_cetak = $request->ukuran_min_cetak;
        $mesins->jumlah_min = $request->jumlah_min;
        $mesins->harga_min = $harga_min;
        $mesins->harga_lebih = $harga_lebih;
        $mesins->harga_ctp = $harga_ctp;
        $mesins->publish = $request->publish;
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
            'ukuran_max_kertas' => 'required',
            'ukuran_max_cetak' => 'required',
            'ukuran_min_cetak' => 'required',
            'jumlah_min' => 'required',
            'harga_min' => 'required',
            'harga_lebih' => 'required',
            'harga_ctp' => 'required',
            'publish' => 'required'
        ]);

        $harga_min = str_replace(".","", $request->harga_min);
        $harga_lebih = str_replace(".","", $request->harga_lebih);
        $harga_ctp = str_replace(".","", $request->harga_ctp);

        $mesins = OffsetMesin::find($id);
        $mesins->nama_mesin = $request->nama_mesin;
        $mesins->ukuran_max_kertas = $request->ukuran_max_kertas;
        $mesins->ukuran_max_cetak = $request->ukuran_max_cetak;
        $mesins->ukuran_min_cetak = $request->ukuran_min_cetak;
        $mesins->jumlah_min = $request->jumlah_min;
        $mesins->harga_min = $harga_min;
        $mesins->harga_lebih = $harga_lebih;
        $mesins->harga_ctp = $harga_ctp;
        $mesins->publish = $request->publish;
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
