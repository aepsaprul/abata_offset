@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Ubah Kertas</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('kertas.update', [$kertas->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/kertas') }}"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nama_kertas">Nama Kertas</label>
                <input type="text" class="form-control @error('nama_kertas') is-invalid @enderror" id="nama_kertas" placeholder="Nama Kertas" name="nama_kertas" onkeyup="this.value = this.value.toUpperCase()" required value="{{ $kertas->nama_kertas }}">
                @error('nama_kertas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="panjang">Panjang</label>
                <input type="number" class="form-control @error('panjang') is-invalid @enderror" id="panjang" placeholder="Panjang" name="panjang" required value="{{ $kertas->panjang }}">
                @error('panjang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="lebar">Lebar</label>
                <input type="text" class="form-control @error('lebar') is-invalid @enderror" id="lebar" placeholder="Lebar" name="lebar" required value="{{ $kertas->lebar }}" }}>
                @error('lebar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')

@endsection

