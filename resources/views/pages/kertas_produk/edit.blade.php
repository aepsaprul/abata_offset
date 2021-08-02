@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Ubah Kertas Produk</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('kertas_produk.update', [$kertas_produk->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/kertas_produk') }}" title="Kembali"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right" title="Simpan"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="kertas_id" class="form-label">Nama Kertas</label>
                <select class="form-control" id="kertas_id" name="kertas_id">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($kertas as $kertas)
                        <option value="{{ $kertas->id }}" {{ $kertas_produk->kertas_id == $kertas->id ? 'selected' : '' }}>{{ $kertas->nama_kertas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="produk_id" class="form-label">Produk</label>
                <select class="form-control" id="produk_id" name="produk_id">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" {{ $kertas_produk->produk_id == $produk->id ? 'selected' : '' }}>{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>
@endsection

