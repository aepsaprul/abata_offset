<?php

namespace App\Http\Controllers;

use App\Models\OffsetProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = OffsetProduk::get();

        return view('pages.produk.index', ['produks' => $produks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.produk.create');
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
            'nama_produk' => 'required',
            'kode_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:500',
            'publish' => 'required'
        ]);

        $harga = str_replace(".","", $request->harga);

        $produks = new OffsetProduk;
        $produks->nama_produk = $request->nama_produk;
        $produks->kode_produk = $request->kode_produk;
        $produks->keterangan = $request->keterangan;
        $produks->harga = $harga;
        $produks->foto = $request->file('foto')->store('foto', 'public');
        $produks->publish = $request->publish;
        $produks->save();

        return redirect()->route('produk.index')->with('status', 'Data berhasil disimpan');
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
        $produk = OffsetProduk::find($id);

        return view('pages.produk.edit', ['produk' => $produk]);
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
            'nama_produk' => 'required',
            'kode_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png|max:500',
            'publish' => 'required'
        ]);

        $harga = str_replace(".","", $request->harga);

        $produk = OffsetProduk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->kode_produk = $request->kode_produk;
        $produk->keterangan = $request->keterangan;
        $produk->harga = $harga;

        if ($request->file('foto')) {
            Storage::delete('public/' . $produk->foto);
            $produk->foto = $request->file('foto')->store('foto', 'public');
        }

        $produk->publish = $request->publish;
        $produk->save();

        return redirect()->route('produk.index')->with('status', 'Data berhasil disimpan');
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
        $produk = OffsetProduk::find($id);
        Storage::delete('public/' . $produk->foto);
        $produk->delete();

        return redirect()->route('produk.index')->with('status', 'Data berhasil dihapus');
    }
}
