@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Tambah Produk</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('produk.update', [$produk->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/produk') }}"><i class="fas fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i></button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <img src="{{ asset('../storage/app/public/' . $produk->foto) }}" style="width: 150px; height: 150px;">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="foto">Ganti Foto (max 500kb)</label>
                <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto">
                @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" placeholder="Nama Produk" name="nama_produk" onkeyup="this.value = this.value.toUpperCase()" required value="{{ $produk->nama_produk }}">
                @error('nama_produk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Keterangan" name="keterangan" required value="{{ $produk->keterangan }}">
                @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="harga">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" name="harga" required value="{{ $produk->harga }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="foto">Publish</label>
                <select class="form-control" id="publish" name="publish">
                    <option value="y" {{ $produk->publish == "y" ? "selected" : "" }}>Y</option>
                    <option value="n" {{ $produk->publish == "n" ? "selected" : "" }}>N</option>
                </select>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script>
        var rupiah = document.getElementById("harga");
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

