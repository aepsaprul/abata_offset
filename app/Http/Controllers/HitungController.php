<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function paperBag()
    {
        return view('pages.hitung_paper_bag.index');
    }
}
