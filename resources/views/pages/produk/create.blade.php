@extends('layouts.app')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Data Produk</h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('produk.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="mt-3" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center mb-3">
                                <div class="p-2">
                                    <div class="form-group row ">
                                        <label class="control-label col-md-4 col-sm-4 for="foto">Foto (max 500kb)</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input
                                                type="file"
                                                class="form-control-file @error('foto') is-invalid @enderror"
                                                id="foto"
                                                name="foto"
                                                required>
                                            @error('foto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-4 col-sm-4 for="nama_produk">Nama Produk</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input
                                                type="text"
                                                class="form-control @error('nama_produk') is-invalid @enderror"
                                                id="nama_produk"
                                                placeholder="Nama Produk"
                                                name="nama_produk"
                                                onkeyup="this.value = this.value.toUpperCase()"
                                                required
                                                value="{{ old('nama_produk') }}">
                                            @error('nama_produk')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-4 col-sm-4 for="kode_produk">Kode Produk</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input
                                                type="text"
                                                class="form-control @error('kode_produk') is-invalid @enderror"
                                                id="kode_produk"
                                                placeholder="Kode Produk"
                                                name="kode_produk"
                                                required
                                                value="{{ old('kode_produk') }}">
                                            @error('kode_produk')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-4 col-sm-4 for="keterangan">Keterangan</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input
                                                type="text"
                                                class="form-control @error('keterangan') is-invalid @enderror"
                                                id="keterangan"
                                                placeholder="Keterangan"
                                                name="keterangan"
                                                required
                                                value="{{ old('keterangan') }}">
                                            @error('keterangan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-4 col-sm-4 for="harga">Harga</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input
                                                type="text"
                                                class="form-control @error('harga') is-invalid @enderror"
                                                id="harga"
                                                placeholder="Harga"
                                                name="harga"
                                                required
                                                value="{{ old('harga') }}">
                                            @error('harga')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="control-label col-md-4 col-sm-4 for="publish">Publish</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <select class="form-control" id="publish" name="publish">
                                                <option value="y">Y</option>
                                                <option value="n">N</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

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

