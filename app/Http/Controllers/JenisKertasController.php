<?php

namespace App\Http\Controllers;

use App\Models\OffsetGramasi;
use App\Models\OffsetJenisKertas;
use App\Models\OffsetKertas;
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

        return view('pages.jenis_kertas.index', ['jenis_kertas' => $jenis_kertas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kertas = OffsetKertas::get();

        return response()->json([
            'kertas' => $kertas
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

        return response()->json([
            'id' => $jenis_kertas->id,
            'nama_kertas' => $jenis_kertas->nama_kertas,
            'gramasi' => $jenis_kertas->gramasi,
            'kertas_id' => $jenis_kertas->kertas_id,
            'harga' => $jenis_kertas->harga,
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

        return redirect()->route('jenis_kertas.index')->with('status', 'Data berhasil dihapus');
    }
}
