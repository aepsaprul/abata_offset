@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                @foreach ($produks as $produk)
                <li class="list-group-item"><a href="{{ route('home.produk', ['kode_produk' => $produk->kode_produk]) }}" class="text-decoration-none text-dark">{{ $produk->nama_produk }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                <h3 class="text-center">Selamat Datang</h3>
            </div>
        </div>
    </div>
</div>
@endsection


