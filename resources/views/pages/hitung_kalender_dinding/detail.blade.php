@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-group">
                @foreach ($produks as $produk)
                <li class="list-group-item"><a href="{{ route('home.produk', ['kode_produk' => $produk->kode_produk]) }}" class="text-decoration-none text-dark">{{ $produk->nama_produk }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                <h3 class="text-center text-uppercase mb-5">Kalender Dinding</h3>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-10">
                    <form id="form-kalender-dinding">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Spesifikasi Item</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-right">Jumlah Cetak</td>
                                            <td>:</td>
                                            <td class="float-right">{{ $hitung->jml_cetak }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Halaman</td>
                                            <td>:</td>
                                            <td>{{ $hitung->jml_halaman_kalender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Warna</td>
                                            <td>:</td>
                                            <td>{{ $hitung->jml_warna }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran Cetak</td>
                                            <td>:</td>
                                            <td>{{ $hitung->ukuran_cetak }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kertas</td>
                                            <td>:</td>
                                            <td>{{ $hitung->kertas_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Finishing</td>
                                            <td>:</td>
                                            <td>{{ $hitung->finishing }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <h4>Hasil Perhitungan</h4>
                                <table class="table">
                                    <tr>
                                        <td>Insheet</td>
                                        <td>:</td>
                                        <td>{{ $hitung->insheet }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mesin yg dipakai</td>
                                        <td>:</td>
                                        <td>{{ $hitung->mesin_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Plat</td>
                                        <td>:</td>
                                        <td>{{ $hitung->jml_plat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ukuran Cetak Real</td>
                                        <td>:</td>
                                        <td>{{ $hitung->ukuran_cetak }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ukuran Potong Kertas</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <h4>Total</h4>
                                <table class="table">
                                    <tr>
                                        <td>Biaya Kertas</td>
                                        <td>:</td>
                                        <td>{{ $hitung->biaya_kertas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Cetak Min</td>
                                        <td>:</td>
                                        <td>{{ $hitung->biaya_cetak_min }}</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Cetak Lebih</td>
                                        <td>:</td>
                                        <td>{{ $hitung->biaya_cetak_lebih }}</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Plat</td>
                                        <td>:</td>
                                        <td>{{ $hitung->biaya_plat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Biaya</td>
                                        <td>:</td>
                                        <td>{{ $hitung->total_biaya }}</td>
                                    </tr>
                                    <tr>
                                        <td>Margin Profit</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Profit</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Grand Total</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Harga Satuan Kalender</td>
                                        <td>:</td>
                                        <td>-</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-3">
                                    <label for="nama_file" class="col-sm-6 col-form-label">Nama File</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-sm" id="nama_file" name="nama_file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">HITUNG</button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.sub_cover_depan').hide();

        $('#cover_depan').change(function() {
            if (this.checked == true) {
                $('.sub_cover_depan').show();
            }
            else {
                $('.sub_cover_depan').hide();
            }
        });

        $("#form-kalender-dinding").submit(function (e) {
            e.preventDefault();

            var formData = {
                jml_halaman_kalender: $("#jml_halaman_kalender").val(),
                jml_warna: $("#jml_warna").val(),
                ukuran_cetak: $("#ukuran_cetak").val(),
                jenis_kertas: $("#jenis_kertas").val(),
                jenis_finishing: $("#jenis_finishing").val(),
                laminasi: $("#laminasi").val(),
                jml_cetak: $("#jml_cetak").val(),
                biaya_potong: $("#biaya_potong").val(),
                biaya_design: $("#biaya_design").val(),
                biaya_akomodasi: $("#biaya_akomodasi").val(),
                nama_file: $("#nama_file").val(),
                _token: CSRF_TOKEN
            };


            $.ajax({
                url: '{{ URL::route('home.produk.kalender_dinding') }}',
                type: "POST",
                data: formData,
                success: function(response) {
                    console.log(response);
                }
            });
        })
    })
</script>
@endsection
