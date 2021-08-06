<?php

namespace App\Http\Controllers;

use App\Models\OffsetBahan;
use App\Models\OffsetKertas;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahans = OffsetBahan::with('kertas')->get();

        return view('pages.bahan.index', ['bahans' => $bahans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ukuran_kertas = OffsetKertas::get();

        return view('pages.bahan.create', ['ukuran_kertas' => $ukuran_kertas]);
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
            'nama_bahan' => 'required',
            'harga_bahan' => 'required',
            'gramasi' => 'required',
            'offset_kertas_id' => 'required',
            'publish' => 'required'
        ]);

        $harga_bahan = str_replace(".", "", $request->harga_bahan);

        $bahans = new OffsetBahan;
        $bahans->nama_bahan = $request->nama_bahan;
        $bahans->harga_bahan = $harga_bahan;
        $bahans->gramasi = $request->gramasi;
        $bahans->kertas_id = $request->offset_kertas_id;
        $bahans->publish = $request->publish;
        $bahans->save();

        return redirect()->route('bahan.index')->with('status', 'Data berhasil ditambah');
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
        $bahan = OffsetBahan::find($id);
        $ukuran_kertas = OffsetKertas::get();

        return view('pages.bahan.edit', ['bahan' => $bahan, 'ukuran_kertas' => $ukuran_kertas]);
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
            'nama_bahan' => 'required',
            'harga_bahan' => 'required',
            'gramasi' => 'required',
            'offset_kertas_id' => 'required',
            'publish' => 'required'
        ]);

        $harga_bahan = str_replace(".", "", $request->harga_bahan);

        $bahans = OffsetBahan::find($id);
        $bahans->nama_bahan = $request->nama_bahan;
        $bahans->harga_bahan = $harga_bahan;
        $bahans->gramasi = $request->gramasi;
        $bahans->kertas_id = $request->offset_kertas_id;
        $bahans->publish = $request->publish;
        $bahans->save();

        return redirect()->route('bahan.index')->with('status', 'Data berhasil diubah');
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
        $bahan = OffsetBahan::find($id);
        $bahan->delete();

        return redirect()->route('bahan.index')->with('status', 'Data berhasil dihapus');
    }
}
