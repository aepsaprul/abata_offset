<?php

namespace App\Http\Controllers;

use App\Models\OffsetJenisKertas;
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
        return view('pages.jenis_kertas.create');
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
            'nama_kertas' => 'required'
        ]);

        $jenis_kertas = new OffsetJenisKertas;
        $jenis_kertas->nama_kertas = $request->nama_kertas;
        $jenis_kertas->save();

        return redirect()->route('jenis_kertas.index')->with('status', 'Data berhasil disimpan');
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

        return view('pages.jenis_kertas.edit', ['jenis_kertas' => $jenis_kertas]);
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
            'nama_kertas' => 'required'
        ]);

        $jenis_kertas = OffsetJenisKertas::find($id);
        $jenis_kertas->nama_kertas = $request->nama_kertas;
        $jenis_kertas->save();

        return redirect()->route('jenis_kertas.index')->with('status', 'Data berhasil diperbaharui');
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
        $jenis_kertas = OffsetJenisKertas::find($id);
        $jenis_kertas->delete();

        return redirect()->route('jenis_kertas.index')->with('status', 'Data berhasil dihapus');
    }
}
