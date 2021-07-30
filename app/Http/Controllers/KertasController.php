<?php

namespace App\Http\Controllers;

use App\Models\OffsetKertas;
use Illuminate\Http\Request;

class KertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kertas = OffsetKertas::get();

        return view('pages.kertas.index', ['kertas' => $kertas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kertas.create');
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
            'panjang' => 'required',
            'lebar' => 'required'
        ]);

        $kertas = new OffsetKertas;
        $kertas->nama_kertas = $request->nama_kertas;
        $kertas->panjang = $request->panjang;
        $kertas->lebar = $request->lebar;
        $kertas->save();

        return redirect()->route('kertas.index')->with('status', 'Data berhasil disimpan');
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
        $kertas = OffsetKertas::find($id);

        return view('pages.kertas.edit', ['kertas' => $kertas]);
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
            'panjang' => 'required',
            'lebar' => 'required'
        ]);

        $kertas = OffsetKertas::find($id);
        $kertas->nama_kertas = $request->nama_kertas;
        $kertas->panjang = $request->panjang;
        $kertas->lebar = $request->lebar;
        $kertas->save();

        return redirect()->route('kertas.index')->with('status', 'Data berhasil disimpan');
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
        $kertas = OffsetKertas::find($id);
        $kertas->delete();

        return redirect()->route('kertas.index')->with('status', 'Data berhasil dihapus');
    }
}
