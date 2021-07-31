@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                @foreach ($produks as $produk)
                <li class="list-group-item"><a href="{{ route('home.produk', ['kode_produk' => $produk->kode_produk]) }}">{{ $produk->nama_produk }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                <h3 class="text-center">Formulir</h3>
            </div>
        </div>
    </div>
</div>
@endsection


