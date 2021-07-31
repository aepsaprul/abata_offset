<?php

namespace App\Http\Controllers;

use App\Models\OffsetProduk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produks = OffsetProduk::get();

        return view('home', ['produks' => $produks]);
    }

    public function getProduk()
    {
        $produks = OffsetProduk::get();

        return response()->json([
            'success' => 'sukses',
            'data' => $produks
        ]);
    }

    public function produk(Request $request, $kode_produk)
    {
        $produks = OffsetProduk::get();

        if ($kode_produk == "kalenderdinding") {
            return view('kalenderDinding', ['produks' => $produks]);
        } else {
            echo "data mbuh";
        }
    }
}
