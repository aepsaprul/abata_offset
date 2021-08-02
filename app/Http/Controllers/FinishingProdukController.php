<?php

namespace App\Http\Controllers;

use App\Models\OffsetFinishing;
use App\Models\OffsetFinishingProduk;
use App\Models\OffsetProduk;
use Illuminate\Http\Request;

class FinishingProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finishing_produks = OffsetFinishingProduk::with(['finishing', 'produk'])->orderBy('id', 'desc')->get();

        return view('pages.finishing_produk.index', ['finishing_produks' => $finishing_produks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $finishings = OffsetFinishing::get();
        $produks = OffsetProduk::get();

        return view('pages.finishing_produk.create', ['finishings' => $finishings, 'produks' => $produks]);
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
            'finishing_id' => 'required',
            'produk_id' => 'required'
        ]);

        $finishing_produks = new OffsetFinishingProduk;
        $finishing_produks->finishing_id = $request->finishing_id;
        $finishing_produks->produk_id = $request->produk_id;
        $finishing_produks->save();

        return redirect()->route('finishing_produk.index')->with('status', 'Data berhasil disimpan');
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
        $finishing_produk = OffsetFinishingProduk::find($id);
        $finishings = OffsetFinishing::get();
        $produks = OffsetProduk::get();

        return view('pages.finishing_produk.edit', [
            'finishing_produk' => $finishing_produk,
            'finishings' => $finishings,
            'produks' => $produks
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
            'finishing_id' => 'required',
            'produk_id' => 'required'
        ]);

        $finishing_produks = OffsetFinishingProduk::find($id);
        $finishing_produks->finishing_id = $request->finishing_id;
        $finishing_produks->produk_id = $request->produk_id;
        $finishing_produks->save();

        return redirect()->route('finishing_produk.index')->with('status', 'Data berhasil disimpan');
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
        $finishing_produk = OffsetFinishingProduk::find($id);
        $finishing_produk->delete();

        return redirect()->route('finishing_produk.index')->with('status', 'Data berhasil dihapus');
    }
}
