<?php

namespace App\Http\Controllers;

use App\Models\OffsetBiayaFinishing;
use Illuminate\Http\Request;

class BiayaFinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biaya_finishings = OffsetBiayaFinishing::orderBy('id', 'desc')->get();

        return view('pages.biaya_finishing.index', ['biaya_finishings' => $biaya_finishings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.biaya_finishing.create');
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
            'jenis' => 'required',
            'harga' => 'required'
        ]);

        $harga = str_replace(".","", $request->harga);

        $biaya_finishings = new OffsetBiayaFinishing;
        $biaya_finishings->jenis = $request->jenis;
        $biaya_finishings->harga = $harga;
        $biaya_finishings->save();

        return redirect()->route('biaya_finishing.index')->with('status', 'Data berhasil disimpan');
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
        $biaya_finishing = OffsetBiayaFinishing::find($id);

        return view('pages.biaya_finishing.edit', ['biaya_finishing' => $biaya_finishing]);
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
            'jenis' => 'required',
            'harga' => 'required'
        ]);

        $harga = str_replace(".","", $request->harga);

        $biaya_finishings = OffsetBiayaFinishing::find($id);
        $biaya_finishings->jenis = $request->jenis;
        $biaya_finishings->harga = $harga;
        $biaya_finishings->save();

        return redirect()->route('biaya_finishing.index')->with('status', 'Data berhasil diperbaharui');
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
        $biaya_finishing = OffsetBiayaFinishing::find($id);
        $biaya_finishing->delete();

        return redirect()->route('biaya_finishing.index')->with('status', 'Data berhasil dihapus');
    }
}
