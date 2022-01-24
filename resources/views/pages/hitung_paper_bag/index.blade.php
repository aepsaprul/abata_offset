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
                        <h2>Perhitungan Paper Bag</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content mt-3 mb-3">
                        <form id="form-paper-bag">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="jumlah_cetak" class="col-sm-4 col-form-label">Jumlah Cetak</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="jumlah_cetak" name="jumlah_cetak">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="ukuran_real" class="col-sm-4 col-form-label">Ukuran Paper Bag</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-sm" id="panjang_real" name="panjang_real" placeholder="Panjang">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-sm" id="lebar_real" name="lebar_real" placeholder="Lebar">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-sm" id="tinggi_real" name="tinggi_real" placeholder="Tinggi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="warna_id" class="col-sm-4 col-form-label">Warna</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="warna_id" name="warna_id">
                                                        <option value="">--Pilih Jumlah--</option>
                                                        @foreach ($warnas as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="kertas_id" class="col-sm-4 col-form-label">Jenis Kertas</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="kertas_id" name="kertas_id">
                                                        <option value="">--Pilih Kertas--</option>
                                                        @foreach ($jenis_kertas as $item_jenis_kertas)
                                                            <option value="{{ $item_jenis_kertas->id }}">{{ $item_jenis_kertas->nama_kertas }} {{ $item_jenis_kertas->gramasi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="laminasi" class="col-sm-4 col-form-label">Laminasi</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="laminasi" name="laminasi">
                                                        <option value="0">--Pilih Laminasi--</option>
                                                        <option value="1">Laminasi Doff</option>
                                                        <option value="2">Laminasi Glosy</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="mesin_id" class="col-sm-4 col-form-label">Mesin</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="mesin_id" name="mesin_id">
                                                        <option value="0">--Pilih Mesin--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="insheet" class="col-sm-4 col-form-label">Insheet</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="insheet" id="insheet" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="finishing" class="col-sm-4 col-form-label">Biaya Finishing</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="finishing" id="finishing" class="form-control form-control-sm">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="biaya_pisau" class="col-sm-4 col-form-label">Biaya Pisau</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="biaya_pisau" name="biaya_pisau">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="biaya_desain" class="col-sm-4 col-form-label">Biaya Design</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="biaya_desain" name="biaya_desain">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="biaya_potong" class="col-sm-4 col-form-label">Biaya Potong</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="biaya_potong" name="biaya_potong">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="biaya_lain" class="col-sm-4 col-form-label">Lain - lain</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="biaya_lain" name="biaya_lain">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="nama_file" class="col-sm-4 col-form-label">Nama File</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="nama_file" name="nama_file" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm btn-block btn-hitung-spinner" disabled style="display: none;"><span class="spinner-grow spinner-grow-sm"></span>Loading..</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-block btn-hitung">Hitung</button>
                        </form>
                    </div>
                </div>
                <div class="hasil_hitung">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection

@section('script')
<script>
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#jumlah_cetak').on("keyup", function(e) {
            $('#jumlah_cetak').val(formatRupiah(this.value, ""));
        });
        $('#finishing').on("keyup", function(e) {
            $('#finishing').val(formatRupiah(this.value, ""));
        });
        $('#biaya_pisau').on("keyup", function(e) {
            $('#biaya_pisau').val(formatRupiah(this.value, ""));
        });
        $('#biaya_desain').on("keyup", function(e) {
            $('#biaya_desain').val(formatRupiah(this.value, ""));
        });
        $('#biaya_potong').on("keyup", function(e) {
            $('#biaya_potong').val(formatRupiah(this.value, ""));
        });
        $('#biaya_lain').on("keyup", function(e) {
            $('#biaya_lain').val(formatRupiah(this.value, ""));
        });

        $('#tinggi_real').on("keyup", function() {
            if ($('#lebar_real').val() == "") {
                alert('Lebar diisi terlebih dahulu');
            } else {
                $('#mesin_id').empty();

                var formData = {
                    lebar: $('#lebar_real').val(),
                    tinggi: $('#tinggi_real').val(),
                    _token: CSRF_TOKEN
                }

                $.ajax({
                    url: '{{ URL::route('paper_bag.mesin') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $("#mesin_id").empty();
                        $.each(response.mesins, function(index, value) {
                        var data_mesin = "<option value=\"" + value.id + "\">" + value.nama_mesin + "</option>";

                        $("#mesin_id").append(data_mesin);
                    });
                    }
                });
            }
        });

        $('#form-paper-bag').submit(function(e) {
            e.preventDefault();
            $(".hasil_hitung").empty();

            var formData = {
                jumlah_cetak: $('#jumlah_cetak').val(),
                warna_id: $('#warna_id').val(),
                panjang_real: $('#panjang_real').val(),
                lebar_real: $('#lebar_real').val(),
                tinggi_real: $('#tinggi_real').val(),
                kertas_id: $('#kertas_id').val(),
                laminasi: $('#laminasi').val(),
                mesin_id: $('#mesin_id').val(),
                insheet: $('#insheet').val(),
                finishing: $('#finishing').val(),
                biaya_pisau: $('#biaya_pisau').val(),
                biaya_desain: $('#biaya_desain').val(),
                biaya_potong: $('#biaya_potong').val(),
                biaya_lain: $('#biaya_lain').val(),
                nama_file: $('#nama_file').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('paper_bag.hitung') }}',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-hitung-spinner').css("display", "block");
                    $('.btn-hitung').css("display", "none");
                },
                success: function(response) {
                    if (response.status == 'false') {
                        var a = new PNotify({
                            title: 'Gagal',
                            text: 'Ukuran terlalu besar melebihi 70cm',
                            type: 'danger',
                            styling: 'bootstrap3'
                        });

                        setTimeout(() => {
                            $('.btn-hitung-spinner').css("display", "none");
                            $('.btn-hitung').css("display", "block");
                        }, 1000);
                    } else {
                        var a = new PNotify({
                            title: 'Success',
                            text: 'Data berhasil ditampilkan',
                            type: 'success',
                            styling: 'bootstrap3'
                        });

                        function formatRp(bilangan) {
                            var	number_string = bilangan.toString(),
                                sisa 	= number_string.length % 3,
                                rupiah 	= number_string.substr(0, sisa),
                                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                            if (ribuan) {
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }
                            return rupiah;
                        }

                        var dataHasilHitung = "" +
                        "<div class=\"x_panel\">" +
                            "<div class=\"x_content mt-3 mb-3\">" +
                                "<div class=\"col-md-12\">" +
                                    "<div class=\"card\">" +
                                        "<div class=\"card-header\">" +
                                            "Harga Jual" +
                                        "</div>" +
                                        "<div class=\"card-body\">" +
                                            "<div class=\"d-flex justify-content-between\">" +
                                                "<div class=\"p-2\">Rp. <span id=\"harga_satuan_atas\">" + formatRp(Math.round(response.harga_satuan)) + "</span> / pcs</div>" +
                                                "<div class=\"p-2\"> Rp. <span id=\"harga_jual_atas\">" + formatRp(response.harga_jual) + "</span></div>" +
                                            "</div>" +
                                        "</div>" +
                                    "</div>" +
                                    "<div class=\"row\">" +
                                        "<div class=\"col-md-4 p-4\">" +
                                            "<h4 class=\"text-uppercase font-weight-bold mb-3\">Spesifikasi Item</h4>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Jumlah Cetak</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + formatRp(response.jumlah_cetak) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Warna</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.warna + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Ukuran Jadi</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.ukuran_jadi + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Jenis Kertas</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.kertas + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                        "</div>" +
                                        "<div class=\"col-md-4 p-4\">" +
                                            "<h4 class=\"text-uppercase font-weight-bold mb-3\">Hasil Perhitungan</h4>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Plano</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.plano + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Ukuran Cetak</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.ukuran_cetak + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Laminasi</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.jenis_laminasi + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Insheet</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.insheet + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Mesin</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.mesin + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Jumlah Plat</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + response.plat_jumlah + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row \">" +
                                                "<label class=\"control-label col-md-4 col-sm-4 \">Harga Plat</label>" +
                                                "<div class=\"col-md-8 col-sm-8 text-right\">" +
                                                    "<span>" + formatRp(response.plat_harga) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                        "</div>" +
                                        "<div class=\"col-md-4 p-4\">" +
                                            "<h4 class=\"text-uppercase font-weight-bold mb-3\">Total</h4>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Laminasi</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_laminasi) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Minimal</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_minimal) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Lebih</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_lebih) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Kertas</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_kertas) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Finishing</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_finishing) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Pisau</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_pisau) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Desain</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_desain) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Potong</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_potong) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Pond</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_minimal_pond) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Lebih Pond</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_lebih_pond) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Biaya Lain - Lain</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<span>" + formatRp(response.biaya_lain) + "</span>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">HPP</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<input type=\"text\" class=\"form-control form-control-sm text-right\" disabled id=\"hpp\" name=\"hpp\" value=\"" + formatRp(response.hpp) + "\">" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Margin Profit</label>" +
                                                "<div class=\"col-md-7 col-sm-7\">" +
                                                    "<div class=\"input-group input-group-sm mb-3\">" +
                                                    "<input type=\"text\" id=\"margin_profit\" class=\"form-control text-right\" aria-label=\"Margin Profit\"aria-describedby=\"basic-addon2\" value=\"20\">" +
                                                        "<div class=\"input-group-append\">" +
                                                            "<span class=\"input-group-text\" id=\"basic-addon2\">%</span>" +
                                                        "</div>" +
                                                    "</div>" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Profit</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<input type=\"text\" class=\"form-control form-control-sm text-right\" disabled id=\"hitung_profit\" name=\"hitung_profit\" value=\"" + formatRp(Math.round(response.profit)) + "\">" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Harga Jual</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<input type=\"text\" class=\"form-control form-control-sm text-right\" disabled id=\"harga_jual\" name=\"harga_jual\" value=\"" + formatRp(parseInt(response.harga_jual)) + "\">" +
                                                "</div>" +
                                            "</div>" +
                                            "<div class=\"form-group row\">" +
                                                "<label class=\"control-label col-md-5 col-sm-5 \">Harga Satuan</label>" +
                                                "<div class=\"col-md-7 col-sm-7 text-right\">" +
                                                    "<input type=\"text\" class=\"form-control form-control-sm text-right\" disabled id=\"harga_satuan\" name=\"harga_satuan\" value=\"" + formatRp(Math.round(response.harga_satuan)) + "\">" +
                                                "</div>" +
                                            "</div>" +
                                        "</div>" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>";


                        $(".hasil_hitung").append(dataHasilHitung);

                        setTimeout(() => {
                            $('.btn-hitung-spinner').css("display", "none");
                            $('.btn-hitung').css("display", "block");
                        }, 1000);

                        // update margin profit
                        $("#margin_profit").on('keyup', function() {
                            $("#harga_satuan_atas").empty();
                            $("#harga_jual_atas").empty();

                            var margin_profit = $(this).val() / 100;
                            var hitung_profit = margin_profit * response.hpp;
                            var hitung_grand_total = parseInt(hitung_profit) + parseInt(response.hpp);
                            var hitung_harga_satuan = Math.round(hitung_grand_total / response.jumlah_cetak);

                            var profit_rupiah = formatRupiah(Math.round(hitung_profit));
                            var grand_total_rupiah = formatRupiah(hitung_grand_total);
                            var harga_satuan_rupiah = formatRupiah(hitung_harga_satuan);

                            function formatRupiah(bilangan) {
                                var	number_string = bilangan.toString(),
                                    sisa 	= number_string.length % 3,
                                    rupiah 	= number_string.substr(0, sisa),
                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }
                                return rupiah;
                            }


                            $("#hitung_profit").val(profit_rupiah);
                            $("#harga_jual").val(grand_total_rupiah);
                            $("#harga_satuan").val(harga_satuan_rupiah);
                            $("#harga_jual_atas").append(grand_total_rupiah);
                            $("#harga_satuan_atas").append(harga_satuan_rupiah);

                        });
                    }
                }
            });
        });
    });
</script>
@endsection
