@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Ubah Data Mesin</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('master_mesin.update', [$master_mesin->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/master_mesin') }}" title="Kembali"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right" title="Perbaharui"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nama_mesin">Nama Mesin</label>
                <input type="text" class="form-control @error('nama_mesin') is-invalid @enderror" id="nama_mesin" placeholder="Nama Mesin" name="nama_mesin" onkeyup="this.value = this.value.toUpperCase()" required value="{{ $master_mesin->nama_mesin }}">
                @error('nama_mesin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="area_kertas_panjang">Panjang Area Kertas (cm)</label>
                <input type="number" class="form-control @error('area_kertas_panjang') is-invalid @enderror" id="area_kertas_panjang" placeholder="Panjang Area Kertas" name="area_kertas_panjang" required value="{{ $master_mesin->area_kertas_panjang }}">
                @error('area_kertas_panjang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="area_kertas_lebar">Lebar Area Kertas (cm)</label>
                <input type="number" class="form-control @error('area_kertas_lebar') is-invalid @enderror" id="area_kertas_lebar" placeholder="Lebar Area Kertas" name="area_kertas_lebar" required value="{{ $master_mesin->area_kertas_lebar }}">
                @error('area_kertas_lebar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="area_cetak_panjang">Panjang Area Cetak (cm)</label>
                <input type="number" class="form-control @error('area_cetak_panjang') is-invalid @enderror" id="area_cetak_panjang" placeholder="Panjang Area Cetak" name="area_cetak_panjang" required value="{{ $master_mesin->area_cetak_panjang }}">
                @error('area_cetak_panjang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="area_cetak_lebar">Lebar Area Cetak (cm)</label>
                <input type="number" class="form-control @error('area_cetak_lebar') is-invalid @enderror" id="area_cetak_lebar" placeholder="Lebar Area Cetak" name="area_cetak_lebar" required value="{{ $master_mesin->area_cetak_lebar }}">
                @error('area_cetak_lebar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')

@endsection

