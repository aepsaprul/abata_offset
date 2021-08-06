@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Ubah Jenis Kertas</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('jenis_kertas.update', [$jenis_kertas->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/jenis_kertas') }}" title="Kembali"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right" title="Simpan"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nama_kertas" class="form-label">Nama Kertas</label>
                <input type="text" class="form-control @error('nama_kertas') is-invalid @enderror" id="nama_kertas" placeholder="Nama Kertas" name="nama_kertas" onkeyup="this.value = this.value.toUpperCase()" value="{{ $jenis_kertas->nama_kertas }}">
                @error('nama_kertas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
</div>
@endsection
