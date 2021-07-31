@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-uppercase font-weight-bold">Ubah Biaya</h3>
        </div>
    </div>
    <!-- <div class="row justify-content-center"> -->
    <form class="mt-3" action="{{ route('biaya_cetak.update', [$biaya_cetak->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ url('/biaya_cetak') }}" title="Kembali"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-right" title="Perbaharui"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nama_biaya">Nama Biaya</label>
                <input type="text" class="form-control @error('nama_biaya') is-invalid @enderror" id="nama_biaya" placeholder="Nama Biaya" name="nama_biaya" onkeyup="this.value = this.value.toUpperCase()" required value="{{ $biaya_cetak->nama_biaya }}">
                @error('nama_biaya')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="offset_mesin_id">Mesin</label>
                <select class="form-control @error('offset_mesin_id') is-invalid @enderror" id="offset_mesin_id" name="offset_mesin_id">
                    <option value="">--Pilih Mesin--</option>
                    @foreach ($master_mesins as $master_mesins)
                        <option value="{{ $master_mesins->id }}" {{ $biaya_cetak->offset_mesin_id == $master_mesins->id ? "selected" : "" }}>{{ $master_mesins->nama_mesin }} ( {{ $master_mesins->panjang }} cm x {{ $master_mesins->lebar }} cm )</option>
                    @endforeach
                </select>
                @error('offset_mesin_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="kategori_warna">Kategori Warna</label>
                <select class="form-control @error('kategori_warna') is-invalid @enderror" id="kategori_warna" name="kategori_warna">
                    <option value="">--Pilih Kategori Warna--</option>
                    <option value="1 Warna" {{ $biaya_cetak->kategori_warna == "1 Warna" ? "selected" : "" }}>1 Warna</option>
                    <option value="2 Warna" {{ $biaya_cetak->kategori_warna == "2 Warna" ? "selected" : "" }}>2 Warna</option>
                    <option value="Full Color" {{ $biaya_cetak->kategori_warna == "Full Color" ? "selected" : "" }}>Full Color</option>
                    <option value="Warna Khusus" {{ $biaya_cetak->kategori_warna == "Warna Khusus" ? "selected" : "" }}>Warna Khusus</option>
                </select>
                @error('kategori_warna')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="jumlah_min">Jumlah Min</label>
                <input type="number" class="form-control @error('jumlah_min') is-invalid @enderror" id="jumlah_min" placeholder="Jumlah Min" name="jumlah_min" required value="{{ $biaya_cetak->jumlah_min }}">
                @error('jumlah_min')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="harga_cetak_min">Harga Min</label>
                <input type="text" class="form-control @error('harga_cetak_min') is-invalid @enderror" id="harga_cetak_min" placeholder="Harga Min" name="harga_cetak_min" required value="{{ rupiah($biaya_cetak->harga_cetak_min) }}">
                @error('harga_cetak_min')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="harga_cetak_lebih">Harga Lebih</label>
                <input type="text" class="form-control @error('harga_cetak_lebih') is-invalid @enderror" id="harga_cetak_lebih" placeholder="Harga Lebih" name="harga_cetak_lebih" required value="{{ rupiah($biaya_cetak->harga_cetak_lebih) }}">
                @error('harga_cetak_lebih')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script>
        var rupiah1 = document.getElementById("harga_cetak_min");
        rupiah1.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah1.value = formatRupiah(this.value, "");
        });

        var rupiah2 = document.getElementById("harga_cetak_lebih");
        rupiah2.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah2.value = formatRupiah(this.value, "");
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

