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
                        <h2>Pehitungan Kalender Dinding</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                    <form id="form-kalender-dinding">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jml_halaman_kalender" class="col-sm-6 col-form-label">Jumlah Halaman Kalender</label>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm" id="jml_halaman_kalender" name="jml_halaman_kalender">
                                                    <option value="">--Pilih Jumlah--</option>
                                                    <option value="1">1 Lembar</option>
                                                    <option value="2">2 Lembar</option>
                                                    <option value="3">3 Lembar</option>
                                                    <option value="4">4 Lembar</option>
                                                    <option value="6">6 Lembar</option>
                                                    <option value="12">12 Lembar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jml_warna" class="col-sm-6 col-form-label">Jumlah Warna</label>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm" id="jml_warna" name="jml_warna">
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
                                            <label for="ukuran_cetak" class="col-sm-6 col-form-label">Ukuran Cetak</label>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" id="ukuran_cetak_lebar" name="ukuran_cetak_lebar" class="form-control form-control-sm" placeholder="Lebar">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" id="ukuran_cetak_panjang" name="ukuran_cetak_panjang" class="form-control form-control-sm" placeholder="Panjang">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jenis_kertas" class="col-sm-6 col-form-label">Jenis Kertas</label>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm" id="jenis_kertas" name="jenis_kertas">
                                                    <option value="">--Pilih Kertas--</option>
                                                    @foreach ($produk_relasi as $kertas)
                                                        <option value="{{ $kertas->id }}">{{ $kertas->nama_kertas }} {{ $kertas->gramasi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jenis_finishing" class="col-sm-6 col-form-label">Jenis Finishing</label>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm" id="jenis_finishing" name="jenis_finishing">
                                                    <option value="">--Pilih Finishing--</option>
                                                    @foreach ($finishings as $finishing)
                                                        <option value="{{ $finishing->nama_finishing }}">{{ $finishing->nama_finishing }}</option>
                                                    @endforeach

                                                    {{-- NOTE: mata ayam khusus 1 lembar  --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="laminasi" class="col-sm-6 col-form-label">Varnish UV</label>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm" id="laminasi" name="laminasi">
                                                    <option value="">--Pilih Varnish--</option>
                                                    <option value="ya">Ya</option>
                                                    <option value="tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="mesin_id" class="col-sm-6 col-form-label">Mesin</label>
                                            <div class="col-sm-6">
                                                <select class="form-control form-control-sm" id="mesin_id" name="mesin_id">
                                                    <option value="">--Pilih Mesin--</option>
                                                    {{-- data mesin di javascript  --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jml_cetak" class="col-sm-6 col-form-label">Jumlah Cetak</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="jml_cetak" name="jml_cetak">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="biaya_potong" class="col-sm-6 col-form-label">Biaya Potong</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="biaya_potong" name="biaya_potong">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="biaya_design" class="col-sm-6 col-form-label">Biaya Design</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="biaya_design" name="biaya_design">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="biaya_akomodasi" class="col-sm-6 col-form-label">Biaya Akomodasi</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="biaya_akomodasi" name="biaya_akomodasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="nama_file" class="col-sm-6 col-form-label">Nama File</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm" id="nama_file" name="nama_file" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="cover_depan" name="cover_depan" value=""> Cover Depan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="sub_cover_depan">
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="jml_halaman_cover" class="col-sm-6 col-form-label">Jumlah Halaman Cover</label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control form-control-sm" id="jml_halaman_cover" name="jml_halaman_cover" min="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="jml_warna_cover" class="col-sm-6 col-form-label">Jumlah Warna Cover</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control form-control-sm" id="jml_warna_cover" name="jml_warna_cover">
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
                                                <label for="jenis_kertas_cover" class="col-sm-6 col-form-label">Jenis Kertas Cover</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control form-control-sm" id="jenis_kertas_cover" name="jenis_kertas_cover">
                                                        <option value="">--Pilih Kertas--</option>
                                                        @foreach ($produk_relasi as $kertas)
                                                            <option value="{{ $kertas->id }}">{{ $kertas->nama_kertas }} {{ $kertas->gramasi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Hitung</button>
                    </form>
                    <br>
                    <form id="kalender-dinding-detail" action="{{ route('home.produk.kalender_dinding_detail') }}" method="POST">
                        @csrf
                        <div class="row hasil_hitung">
                            {{-- hasil hitung di jquery  --}}
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
    $(document).ready(function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var rupiah_jml_cetak = document.getElementById("jml_cetak");
        rupiah_jml_cetak.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah_jml_cetak.value = formatRupiah(this.value, "");
        });

        var rupiah_biaya_potong = document.getElementById("biaya_potong");
        rupiah_biaya_potong.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah_biaya_potong.value = formatRupiah(this.value, "");
        });

        var rupiah_biaya_design = document.getElementById("biaya_design");
        rupiah_biaya_design.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah_biaya_design.value = formatRupiah(this.value, "");
        });

        var rupiah_biaya_akomodasi = document.getElementById("biaya_akomodasi");
        rupiah_biaya_akomodasi.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah_biaya_akomodasi.value = formatRupiah(this.value, "");
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

        $('.sub_cover_depan').hide();

        $('#cover_depan').change(function() {
            if (this.checked == true) {
                $('.sub_cover_depan').show();

                $("#cover_depan").val("1");
            }
            else {
                $('.sub_cover_depan').hide();

                $("#cover_depan").val("");
                $("#jml_halaman_cover").val("");
                $("#jml_warna_cover").val("");
                $("#jenis_kertas_cover").val("");
            }
        });

        $("#ukuran_cetak_lebar").on('keyup', function () {
            $("#mesin_id").empty();

            var formData = {
                lebar: $('#ukuran_cetak_lebar').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('home.ukuran_cetak_detail') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $("#mesin_id").empty();
                    $.each(response.data, function(index, value) {
                        var data_mesin = "<option value=\"" + value.id + "\">" + value.nama_mesin + "</option>";

                        $("#mesin_id").append(data_mesin);
                    });
                }
            })
        })

        $("#form-kalender-dinding").submit(function (e) {
            e.preventDefault();
            $(".hasil_hitung").empty();

            var cover_depan = $("#cover_depan").val();
            var jml_halaman_cover = $("#jml_halaman_cover").val();
            var jml_warna_cover = $("#jml_warna_cover").val();
            var jenis_kertas_cover = $("#jenis_kertas_cover").val();

            if (cover_depan != "") {
                if (jml_halaman_cover == "") {
                    alert('Jumlah Halaman Cover Harus Diisi');

                    return false;
                }
                if (jml_warna_cover == "") {
                    alert('Jumlah Warna Cover Harus Diisi');

                    return false;
                }
                if (jenis_kertas_cover == "") {
                    alert('Jenis Kertas Cover Harus Diisi');

                    return false;
                }
            }

            var formData = {
                jml_halaman_kalender: $("#jml_halaman_kalender").val(),
                jml_warna: $("#jml_warna").val(),
                ukuran_cetak_lebar: $("#ukuran_cetak_lebar").val(),
                ukuran_cetak_panjang: $("#ukuran_cetak_panjang").val(),
                jenis_kertas: $("#jenis_kertas").val(),
                jenis_finishing: $("#jenis_finishing").val(),
                mesin_id: $("#mesin_id").val(),
                laminasi: $("#laminasi").val(),
                jml_cetak: $("#jml_cetak").val(),
                biaya_potong: $("#biaya_potong").val(),
                biaya_design: $("#biaya_design").val(),
                biaya_akomodasi: $("#biaya_akomodasi").val(),
                nama_file: $("#nama_file").val(),
                cover_depan: $("#cover_depan").val(),
                jml_halaman_cover: $("#jml_halaman_cover").val(),
                jml_warna_cover: $("#jml_warna_cover").val(),
                jenis_kertas_cover: $("#jenis_kertas_cover").val(),
                _token: CSRF_TOKEN
            };


            $.ajax({
                url: '{{ URL::route('home.produk.kalender_dinding') }}',
                type: "POST",
                data: formData,
                success: function(response) {
                    // var url = '{{ route("home.produk.kalender_dinding_detail") }}';
                    // var total_biaya = $("#btn_total_biaya").val();
                    var harga_satuan_rp = formatRp(Math.round(response.harga_satuan));
                    var total_biaya_rp = formatRp(parseInt(response.grand_total));

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
                    // $("#btn_total_biaya").val(total_biaya_rp);


                    var dataHasilHitung = "" +
                        "<div class=\"col-md-12\">" +
                        "   <div class=\"card\">" +
                        "       <div class=\"card-header\">" +
                        "           Harga Jual" +
                        "       </div>" +
                        "       <div class=\"card-body\">" +
                                    "<div class=\"d-flex justify-content-between\">" +
                                        "<div class=\"p-2\">Rp. " + harga_satuan_rp + " / pcs</div>" +
                                        "<div class=\"p-2\">" + total_biaya_rp + "</div>" +
                                    "</div>" +
                        "       </div>" +
                        "   </div>" +
                        "<div class=\"row\">" +
                            "<div class=\"col-md-4 p-4\">" +
                                "<h4 class=\"text-uppercase\">Spesifikasi Item</h4>" +
                                "<table class=\"table\">" +
                                    "<tbody>" +
                                        "<tr>" +
                                            "<td>Jumlah Cetak</td>" +
                                            "<td>:</td>" +
                                            "<td style=\"text-align: right;\"><input readonly id=\"hitung_jml_cetak\" value=\"" + formatRp(response.jml_cetak) + "\" size=\"5\" style=\"border: none;text-align:right;\"></td>" +
                                        "</tr>" +
                                        "<tr>" +
                                            "<td>Jumlah Halaman</td>" +
                                            "<td>:</td>" +
                                            "<td style=\"text-align: right;\">" + response.jml_halaman + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                            "<td>Jumlah Warna</td>" +
                                            "<td>:</td>" +
                                            "<td style=\"text-align: right;\">";

                                            if (response.jml_warna == 4) {
                                                dataHasilHitung += "Full Color";
                                            } else if (response.jml_warna == 5) {
                                                dataHasilHitung += "Warna Khusus";
                                            } else {
                                                dataHasilHitung += response.jml_warna + " Warna";
                                            }

                                            dataHasilHitung += "</td></tr>" +
                                        "<tr>" +
                                            "<td>Ukuran Cetak</td>" +
                                            "<td>:</td>" +
                                            "<td style=\"text-align: right;\">" + response.ukuran_cetak + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                            "<td>Jenis Kertas</td>" +
                                            "<td>:</td>" +
                                            "<td style=\"text-align: right;\">" + response.jenis_kertas + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                            "<td>Ukuran Plano</td>" +
                                            "<td>:</td>" +
                                            "<td style=\"text-align: right;\">" + response.ukuran_plano + "</td>" +
                                        "</tr>" +
                                        "<tr>" +
                                            "<td>Finishing</td>" +
                                            "<td>:</td>" +
                                            "<td style=\"text-align: right;\">" + response.finishing + "</td>" +
                                        "</tr>" +
                                    "</tbody>" +
                                "</table>";
                                if (response.biaya_cover != 0) {
                                    dataHasilHitung += "<h4 class=\"text-uppercase\">Spesifikasi Cover</h4>" +
                                    "<table class=\"table\">" +
                                        "<tbody>" +
                                            "<tr>" +
                                                "<td>Jumlah Waran</td>" +
                                                "<td>:</td>" +
                                                "<td style=\"text-align: right;\">";

                                                if (response.jml_warna_cover == 4) {
                                                    dataHasilHitung += "Full Color";
                                                } else if (response.jml_warna_cover == 5) {
                                                    dataHasilHitung += "Warna Khusus";
                                                } else {
                                                    dataHasilHitung += response.jml_warna_cover + " Warna";
                                                }

                                            dataHasilHitung += "</td></tr>" +
                                            "<tr>" +
                                                "<td>Jenis Kertas</td>" +
                                                "<td>:</td>" +
                                                "<td style=\"text-align: right;\">" + response.kertas_cover + "</td>" +
                                            "</tr>" +
                                        "</tbody>" +
                                    "</table>";
                                }
                            dataHasilHitung += "</div>" +
                            "<div class=\"col-md-4 p-4\">" +
                                "<h4 class=\"text-uppercase\">Hasil Perhitungan</h4>" +
                                "<table class=\"table\">" +
                                    "<tr>" +
                                        "<td>Kertas + Insheet</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + response.insheet + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Mesin yg dipakai</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + response.mesin + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Jumlah Plat</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + response.jml_plat + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Ukuran Cetak Real</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + response.ukuran_cetak_real + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Ukuran Potong Kertas</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + response.ukuran_potong_kertas + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Varnish UV</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + response.laminasi + "</td>" +
                                    "</tr>" +
                                "</table>";
                                if (response.biaya_cover != 0) {
                                    dataHasilHitung += "<h4 class=\"text-uppercase\">Biaya Cover</h4>" +
                                    "<table class=\"table\">" +
                                        "<tbody>" +
                                            "<tr>" +
                                                "<td>Biaya Kertas</td>" +
                                                "<td>:</td>" +
                                                "<td style=\"text-align: right;\">" + formatRp(response.biaya_kertas_cover) + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td>Biaya Cetak</td>" +
                                                "<td>:</td>" +
                                                "<td style=\"text-align: right;\">" + formatRp(response.biaya_cetak_min_cover) + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td>Biaya Lebih</td>" +
                                                "<td>:</td>" +
                                                "<td style=\"text-align: right;\">" + formatRp(response.biaya_cetak_lebih_cover) + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td>Biaya Plat</td>" +
                                                "<td>:</td>" +
                                                "<td style=\"text-align: right;\">" + formatRp(response.biaya_plat_cover) + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td>Total Biaya</td>" +
                                                "<td>:</td>" +
                                                "<td style=\"text-align: right;\">" + formatRp(response.biaya_cover) + "</td>" +
                                            "</tr>" +
                                        "</tbody>" +
                                    "</table>";
                                }
                            dataHasilHitung += "</div>" +
                            "<div class=\"col-md-4 p-4\">" +
                                "<h4 class=\"text-uppercase\">Total</h4>" +
                                "<table class=\"table\">" +
                                    "<tr>" +
                                        "<td>Biaya Kertas</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + formatRp(response.biaya_kertas) + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Biaya Cetak Min</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + formatRp(response.biaya_cetak_min) + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Biaya Cetak Lebih</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + formatRp(response.biaya_cetak_lebih) + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Biaya Plat</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + formatRp(response.biaya_plat) + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Biaya Finishing</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" + formatRp(response.biaya_set_kalender) + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>HPP</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\"><input readonly id=\"hitung_total_biaya\" value=\"" + formatRp(response.total_biaya) + "\" size=\"10\" style=\"border: none;text-align:right;\"></td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Margin Profit</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\">" +
                                            "<div class=\"row\">" +
                                                "<div class=\"col-md-6\">" +
                                                    "<input type=\"text\" id=\"margin_profit\" name=\"margin_profit\" size=\"3\" value=\"20\" style=\"text-align:right; margin-right: -40px;\">" +
                                                "</div>" +
                                                "<div class=\"col-md-6\">" +
                                                    "%" +
                                                "</div>" +
                                            "</div>" +
                                        "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Profit</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\"><input readonly id=\"hitung_profit\" value=\"" + formatRp(Math.round(response.profit)) + "\" size=\"8\" style=\"border: none;text-align:right;\"></td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Total Harga Jual</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\"><input readonly id=\"hitung_grand_total\" value=\"" + formatRp(parseInt(response.grand_total)) + "\" size=\"8\" style=\"border: none;text-align:right;\"></td>" +
                                    "</tr>" +
                                    "<tr>" +
                                        "<td>Harga Jual Satuan</td>" +
                                        "<td>:</td>" +
                                        "<td style=\"text-align: right;\"><input readonly id=\"hitung_harga_satuan\" value=\"" + formatRp(Math.round(response.harga_satuan)) + "\" size=\"8\" style=\"border: none;text-align:right;\"></td>" +
                                    "</tr>" +
                                "</table>" +
                            "</div>" +
                            "</div>" +
                        "</div>";

                    $(".hasil_hitung").append(dataHasilHitung);

                    var jml_cetak_val = $("#hitung_jml_cetak").val();
                    var total_biaya_val = $("#hitung_total_biaya").val();
                    var profit_val = $("#hitung_profit").val();
                    var grand_total_val = $("#hitung_grand_total").val();
                    var harga_satuan_val = $("#hitung_harga_satuan").val();

                    var jml_cetak = jml_cetak_val.replace(/\./g,'');
                    var total_biaya = total_biaya_val.replace(/\./g,'');
                    var profit = profit_val.replace(/\./g,'');
                    var grand_total = grand_total_val.replace(/\./g,'');
                    var harga_satuan = harga_satuan_val.replace(/\./g,'');


                    $("#margin_profit").on('keyup', function() {
                        var margin_profit = $(this).val() / 100;
                        var hitung_profit = margin_profit * total_biaya;
                        var hitung_grand_total = parseInt(hitung_profit) + parseInt(total_biaya);
                        var hitung_harga_satuan = Math.round(hitung_grand_total / jml_cetak);

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
                        $("#hitung_grand_total").val(grand_total_rupiah);
                        $("#hitung_harga_satuan").val(harga_satuan_rupiah);

                    });
                }
            });
        })
    })
</script>
@endsection
