@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Tambah Bahan</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('bahan.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/bahan') }}" title="Kembali"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right" title="Simpan"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nama_bahan">Nama kertas</label>
                <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" id="nama_bahan" placeholder="Nama bahan" name="nama_bahan" onkeyup="this.value = this.value.toUpperCase()" value="{{ old('nama_bahan') }}">
                @error('nama_bahan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="gramasi">Gramasi</label>
                <input type="number" class="form-control @error('gramasi') is-invalid @enderror" id="gramasi" placeholder="Gramasi" name="gramasi" required value="{{ old('gramasi') }}">
                @error('gramasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="offset_kertas_id">Ukuran Kertas</label>
                <select class="form-control @error('offset_kertas_id') is-invalid @enderror" id="offset_kertas_id" name="offset_kertas_id">
                    <option value="">--Pilih Ukuran Kertas--</option>
                    @foreach ($ukuran_kertas as $ukuran_kertas)
                        <option value="{{ $ukuran_kertas->id }}" {{ old('offset_kertas_id') == $ukuran_kertas->id ? "selected" : "" }}>{{ $ukuran_kertas->nama_kertas }} ( {{ $ukuran_kertas->panjang }} cm x {{ $ukuran_kertas->lebar }} cm )</option>
                    @endforeach
                </select>
                @error('offset_kertas_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="harga_bahan">Harga bahan per lembar</label>
                <input type="text" class="form-control @error('harga_bahan') is-invalid @enderror" id="harga_bahan" placeholder="harga bahan" name="harga_bahan" required value="{{ old('harga_bahan') }}">
                @error('harga_bahan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="publish">Publish</label>
                <select class="form-control" id="publish" name="publish">
                    <option value="y" {{ old('jabatan_id') == "y" ? 'selected' : '' }}>Y</option>
                    <option value="n" {{ old('jabatan_id') == "n" ? 'selected' : '' }}>N</option>
                </select>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script>
        var rupiah = document.getElementById("harga_bahan");
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "");
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

