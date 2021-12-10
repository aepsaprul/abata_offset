<?php

namespace App\Http\Controllers;

use App\Models\OffsetGramasi;
use App\Models\OffsetJenisKertas;
use App\Models\OffsetKertas;
use App\Models\OffsetProduk;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class JenisKertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kertas = OffsetJenisKertas::orderBy('id', 'desc')->get();
        $ukuran_kertas = OffsetKertas::get();

        return view('pages.jenis_kertas.index', [
            'jenis_kertas' => $jenis_kertas,
            'ukuran_kertas' => $ukuran_kertas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kertas = OffsetKertas::get();
        $produk = OffsetProduk::get();

        return response()->json([
            'kertas' => $kertas,
            'produks' => $produk
        ]);
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
            'nama_kertas' => 'required',
            'harga' => 'required'
        ]);

        $harga = str_replace(".", "", $request->harga);

        $jenis_kertas = new OffsetJenisKertas;
        $jenis_kertas->nama_kertas = $request->nama_kertas;
        $jenis_kertas->gramasi = $request->gramasi;
        $jenis_kertas->kertas_id = $request->kertas_id;
        $jenis_kertas->harga = $harga;
        $jenis_kertas->produk = $request->produk;
        $jenis_kertas->save();

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
        $jenis_kertas = OffsetJenisKertas::find($id);
        $kertas = OffsetKertas::get();
        $produks = OffsetProduk::get();

        return response()->json([
            'id' => $jenis_kertas->id,
            'nama_kertas' => $jenis_kertas->nama_kertas,
            'gramasi' => $jenis_kertas->gramasi,
            'kertas_id' => $jenis_kertas->kertas_id,
            'harga' => $jenis_kertas->harga,
            'produk' => $jenis_kertas->produk,
            'produks' => $produks,
            'kertas' => $kertas
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
            'nama_kertas' => 'required',
            'harga' => 'required'
        ]);

        $harga = str_replace(".", "", $request->harga);

        $jenis_kertas = OffsetJenisKertas::find($id);
        $jenis_kertas->nama_kertas = $request->nama_kertas;
        $jenis_kertas->gramasi = $request->gramasi;
        $jenis_kertas->kertas_id = $request->kertas_id;
        $jenis_kertas->harga = $harga;
        $jenis_kertas->produk = $request->produk;
        $jenis_kertas->save();

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
        $jenis_kertas = OffsetJenisKertas::find($id);

        return response()->json([
            'id' => $jenis_kertas->id,
            'nama_kertas' => $jenis_kertas->nama_kertas
        ]);
    }

    public function delete(Request $request)
    {
        $jenis_kertas = OffsetJenisKertas::find($request->id);
        $jenis_kertas->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }

    public function ukuranKertasStore(Request $request)
    {
        $validated = $request->validate([
            'nama_kertas' => 'required',
            'panjang' => 'required',
            'lebar' => 'required'
        ]);

        $ukuran_kertas = new OffsetKertas;
        $ukuran_kertas->nama_kertas = $request->nama_kertas;
        $ukuran_kertas->panjang = $request->panjang;
        $ukuran_kertas->lebar = $request->lebar;
        $ukuran_kertas->save();

        return response()->json([
            'status' => 'Data berhasil disimpan'
        ]);
    }

    public function ukuranKertasEdit($id)
    {
        $ukuran_kertas = OffsetKertas::find($id);

        return response()->json([
            'id' => $ukuran_kertas->id,
            'nama_kertas' => $ukuran_kertas->nama_kertas,
            'lebar' => $ukuran_kertas->lebar,
            'panjang' => $ukuran_kertas->panjang
        ]);
    }

    public function ukuranKertasUpdate(Request $request)
    {
        $ukuran_kertas = OffsetKertas::find($request->id);
        $ukuran_kertas->nama_kertas = $request->nama_kertas;
        $ukuran_kertas->panjang = $request->panjang;
        $ukuran_kertas->lebar = $request->lebar;
        $ukuran_kertas->save();

        return response()->json([
            'status' => 'Data berhasil diperbaharui'
        ]);
    }

    public function ukuranKertasDeleteBtn($id)
    {
        $ukuran_kertas = OffsetKertas::find($id);

        return response()->json([
            'id' => $ukuran_kertas->id,
            'nama_kertas' => $ukuran_kertas->nama_kertas
        ]);
    }

    public function ukuranKertasDelete(Request $request)
    {
        $ukuran_kertas = OffsetKertas::find($request->id);
        $ukuran_kertas->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
