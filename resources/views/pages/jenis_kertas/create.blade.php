@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Tambah Jenis Kertas</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('jenis_kertas.store') }}" method="POST">
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
            <div class="form-group col-md-4">
                <label for="nama_kertas" class="form-label">Nama Kertas</label>
                <input
                    type="text"
                    class="form-control @error('nama_kertas') is-invalid @enderror"
                    id="nama_kertas"
                    placeholder="Nama Kertas"
                    name="nama_kertas"
                    onkeyup="this.value = this.value.toUpperCase()"
                    value="{{ old('nama_kertas') }}">
                        @error('nama_kertas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="nama_kertas" class="form-label">Gramasi</label>
                <select name="gramasi_id" id="gramasi_id" class="form-control">
                    <option value="">--Pilih Gramasi--</option>
                    @foreach ($gramasis as $item)
                        <option value="{{ $item->id }}">{{ $item->ukuran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" name="harga" onkeyup="this.value = this.value.toUpperCase()" value="{{ old('harga') }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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

