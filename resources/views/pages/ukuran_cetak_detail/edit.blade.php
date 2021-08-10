@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Ubah Ukuran Cetak</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('ukuran_cetak.update', [$ukuran_cetak->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/ukuran_cetak') }}" title="kembali"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right" title="Simpan"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="ukuran_cetak_id" class="form-label">Ukuran Cetak</label>
                <select class="form-control" id="ukuran_cetak_id" name="ukuran_cetak_id">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($ukuran_cetaks as $ukuran_cetak)
                        <option value="{{ $ukuran_cetak->id }}" {{ $ukuran_cetak_detail->ukuran_cetak_id == $ukuran_cetak->id ? 'selected' : '' }}>{{ $ukuran_cetak->lebar }} x {{ $ukuran_cetak->panjang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="kertas_id">Kertas</label>
                <div class="form-group col-md-6">
                    <label for="kertas_id" class="form-label">Kertas</label>
                    <select class="form-control" id="kertas_id" name="kertas_id">
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($kertas as $kertas)
                            <option value="{{ $kertas->id }}" {{ $ukuran_cetak_detail->kertas_id == $kertas->id ? 'selected' : '' }}>{{ $kertas->nama_kertas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="mesin_id">Mesin</label>
                <select class="form-control @error('mesin_id') is-invalid @enderror" id="mesin_id" name="mesin_id">
                    <option value="">--Pilih Mesin--</option>
                    @foreach ($mesins as $mesin)
                        <option value="{{ $mesin->id }}" {{ $ukuran_cetak_detail->mesin_id == $mesin->id ? "selected" : "" }}>{{ $mesin->nama_mesin }}</option>
                    @endforeach
                </select>
                @error('mesin_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')

@endsection

