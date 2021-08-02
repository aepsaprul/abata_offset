<?php

namespace App\Http\Controllers;

use App\Models\OffsetFinishing;
use Illuminate\Http\Request;

class FinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finishings = OffsetFinishing::orderBy('id', 'desc')->get();

        return view('pages.finishing.index', ['finishings' => $finishings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.finishing.create');
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
            'nama_finishing' => 'required',
            'produk_id' => 'required'
        ]);

        $finishings = new OffsetFinishing;
        $finishings->nama_finishing = $request->nama_finishing;
        $finishings->produk_id = $request->produk_id;
        $finishings->save();

        return redirect()->route('finishing.index')->with('status', 'Data berhasil disimpan');
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
        $finishing = OffsetFinishing::find($id);

        return view('pages.finishing.edit');
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
            'nama_finishing' => 'required',
            'produk_id' => 'required'
        ]);

        $finishings = OffsetFinishing::find($id);
        $finishings->nama_finishing = $request->nama_finishing;
        $finishings->produk_id = $request->produk_id;
        $finishings->save();

        return redirect()->route('finishing.index')->with('status', 'Data berhasil diperbaharui');
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
        $biaya_finishing = OffsetFinishing::find($id);
        $biaya_finishing->delete();

        return redirect()->route('biaya_finishing.index')->with('status', 'Data berhasil dihapus');
    }
}
