@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Tambah Data Mesin</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('mesin.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/mesin') }}" title="Kembali"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right" title="Simpan"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4 mb-2">
                <label for="nama_mesin" class="form-label">Nama Mesin</label>
                <input type="text" class="form-control @error('nama_mesin') is-invalid @enderror" id="nama_mesin" placeholder="Nama Mesin" name="nama_mesin" onkeyup="this.value = this.value.toUpperCase()" required value="{{ old('nama_mesin') }}">
                @error('nama_mesin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4 mb-2">
                <label for="area_kertas_panjang" class="form-label">Panjang Area Kertas (cm)</label>
                <input type="number" class="form-control @error('area_kertas_panjang') is-invalid @enderror" id="area_kertas_panjang" placeholder="Panjang Area Kertas" name="area_kertas_panjang" required value="{{ old('area_kertas_panjang') }}">
                @error('area_kertas_panjang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4 mb-2">
                <label for="area_kertas_lebar" class="form-label">Lebar Area Kertas (cm)</label>
                <input type="number" class="form-control @error('area_kertas_lebar') is-invalid @enderror" id="area_kertas_lebar" placeholder="Lebar Area Kertas" name="area_kertas_lebar" required value="{{ old('area_kertas_lebar') }}">
                @error('area_kertas_lebar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4 mb-2">
                <label for="area_cetak_panjang" class="form-label">Panjang Area Cetak (cm)</label>
                <input type="number" class="form-control @error('area_cetak_panjang') is-invalid @enderror" id="area_cetak_panjang" placeholder="Panjang Area Cetak" name="area_cetak_panjang" required value="{{ old('area_cetak_panjang') }}">
                @error('area_cetak_panjang')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4 mb-2">
                <label for="area_cetak_lebar" class="form-label">Lebar Area Cetak (cm)</label>
                <input type="number" class="form-control @error('area_cetak_lebar') is-invalid @enderror" id="area_cetak_lebar" placeholder="Lebar Area Cetak" name="area_cetak_lebar" required value="{{ old('area_cetak_lebar') }}">
                @error('area_cetak_lebar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="harga_min">Harga Min</label>
                <input type="text" class="form-control @error('harga_min') is-invalid @enderror" id="harga_min" placeholder="Harga Min" name="harga_min" required value="{{ old('harga_min') }}">
                @error('harga_min')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="harga_plat">Harga Plat</label>
                <input type="text" class="form-control @error('harga_plat') is-invalid @enderror" id="harga_plat" placeholder="Harga Plat" name="harga_plat" required value="{{ old('harga_plat') }}">
                @error('harga_plat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    var harga_min_rp = document.getElementById("harga_min");
    harga_min_rp.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatharga_min_rp() untuk mengubah angka yang di ketik menjadi format angka
        harga_min_rp.value = formatRupiah(this.value, "");
    });

    var harga_plat_rp = document.getElementById("harga_plat");
    harga_plat_rp.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatharga_plat_rp() untuk mengubah angka yang di ketik menjadi format angka
        harga_plat_rp.value = formatRupiah(this.value, "");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
    }
</script>
@endsection

