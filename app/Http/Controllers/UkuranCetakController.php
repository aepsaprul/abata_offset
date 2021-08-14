<?php

namespace App\Http\Controllers;

use App\Models\OffsetKertas;
use App\Models\OffsetMesin;
use App\Models\OffsetUkuranCetak;
use Illuminate\Http\Request;

class UkuranCetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukuran_cetaks = OffsetUkuranCetak::orderBy('id', 'desc')->get();

        return view('pages.ukuran_cetak.index', ['ukuran_cetaks' => $ukuran_cetaks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ukuran_cetak.create');
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
            'lebar' => 'required',
            'panjang' => 'required'
        ]);

        $ukuran_cetaks = new OffsetUkuranCetak;
        $ukuran_cetaks->lebar = $request->lebar;
        $ukuran_cetaks->panjang = $request->panjang;
        $ukuran_cetaks->save();

        return redirect()->route('ukuran_cetak.index')->with('status', 'Data berhasil disimpan');
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
        $ukuran_cetak = OffsetUkuranCetak::find($id);

        return view('pages.ukuran_cetak.edit', ['ukuran_cetak' => $ukuran_cetak]);
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
            'lebar' => 'required',
            'panjang' => 'required'
        ]);

        $ukuran_cetaks = OffsetUkuranCetak::find($id);
        $ukuran_cetaks->lebar = $request->lebar;
        $ukuran_cetaks->panjang = $request->panjang;
        $ukuran_cetaks->save();

        return redirect()->route('ukuran_cetak.index')->with('status', 'Data berhasil diperbaharui');
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
        $ukuran_cetak = OffsetUkuranCetak::find($id);
        $ukuran_cetak->delete();

        return redirect()->route('ukuran$ukuran_cetak.index')->with('status', 'Data berhasil dihapus');
    }
}
