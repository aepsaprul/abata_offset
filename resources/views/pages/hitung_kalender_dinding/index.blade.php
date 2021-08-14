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
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jml_halaman_kalender" class="col-sm-6 col-form-label">Jumlah Halaman Kalender</label>
                                            <div class="col-sm-6">
                                                <select class="form-select form-select-sm" id="jml_halaman_kalender" name="jml_halaman_kalender">
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
                                                <select class="form-select form-select-sm" id="jml_warna" name="jml_warna">
                                                    <option value="">--Pilih Jumlah--</option>
                                                    <option value="1">1 Warna</option>
                                                    <option value="2">2 Warna</option>
                                                    <option value="3">3 Warna</option>
                                                    <option value="4">Full Color</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="ukuran_cetak" class="col-sm-6 col-form-label">Ukuran Cetak</label>
                                            <div class="col-sm-6">
                                                <select class="form-select form-select-sm" id="ukuran_cetak" name="ukuran_cetak">
                                                    <option value="">--Pilih Ukuran--</option>
                                                    @foreach ($ukuran_cetaks as $ukuran_cetak)
                                                        <option value="{{ $ukuran_cetak->id }}">{{ $ukuran_cetak->lebar }} x {{ $ukuran_cetak->panjang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jenis_kertas" class="col-sm-6 col-form-label">Jenis Kertas</label>
                                            <div class="col-sm-6">
                                                <select class="form-select form-select-sm" id="jenis_kertas" name="jenis_kertas">
                                                    <option value="">--Pilih Kertas--</option>
                                                    @foreach ($produk_relasi->kertas as $kertas)
                                                        <option value="{{ $kertas->kertas->id }}">{{ $kertas->kertas->nama_kertas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jenis_finishing" class="col-sm-6 col-form-label">Jenis Finishing</label>
                                            <div class="col-sm-6">
                                                <select class="form-select form-select-sm" id="jenis_finishing" name="jenis_finishing">
                                                    <option value="">--Pilih Finishing--</option>
                                                    @foreach ($produk_relasi->finishing as $finishing)
                                                        <option value="{{ $finishing->finishing->nama_finishing }}">{{ $finishing->finishing->nama_finishing }}</option>
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
                                                <select class="form-select form-select-sm" id="laminasi" name="laminasi">
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
                                                <select class="form-select form-select-sm" id="mesin_id" name="mesin_id">
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
                                        <input class="form-check-input" type="checkbox" id="cover_depan" name="cover_depan" value="">
                                        <label class="form-check-label" for="cover_depan">
                                            Cover Depan
                                        </label>
                                    </div>
                                    <div class="sub_cover_depan">
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="jml_warna_cover" class="col-sm-6 col-form-label">Jumlah Warna Cover</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select form-select-sm" id="jml_warna_cover" name="jml_warna_cover">
                                                        <option value="">--Pilih Jumlah--</option>
                                                        <option value="1">1 Warna</option>
                                                        <option value="2">2 Warna</option>
                                                        <option value="3">3 Warna</option>
                                                        <option value="4">Full Color</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="jenis_kertas_cover" class="col-sm-6 col-form-label">Jenis Kertas Cover</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select form-select-sm" id="jenis_kertas_cover" name="jenis_kertas_cover">
                                                        <option value="">--Pilih Kertas--</option>
                                                        @foreach ($produk_relasi->kertas as $kertas)
                                                            <option value="{{ $kertas->kertas->id }}">{{ $kertas->kertas->nama_kertas }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-sm btn-block">HITUNG</button>
                            </div>
                        </div>
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
                $("#jml_warna_cover").val("");
                $("#jenis_kertas_cover").val("");
            }
        });

        $("#ukuran_cetak").on('change', function () {
            var id = $(this).val();
            $("#mesin_id").empty();

            $.ajax({
                url: '{{ URL::route('home.ukuran_cetak_detail') }}',
                type: 'POST',
                data: {
                    id: id,
                    _token: CSRF_TOKEN
                },
                success: function(response) {
                    console.log(response);
                    $.each(response.data, function(index, value) {
                        var data_mesin = "<option value=\"" + value.mesin.id + "\">" + value.mesin.nama_mesin + "</option>";

                        $("#mesin_id").append(data_mesin);
                    });
                }
            })
        })

        $("#form-kalender-dinding").submit(function (e) {
            e.preventDefault();
            $(".hasil_hitung").empty();

            var cover_depan = $("#cover_depan").val();
            var jml_warna_cover = $("#jml_warna_cover").val();
            var jenis_kertas_cover = $("#jenis_kertas_cover").val();

            if (cover_depan != "") {
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
                ukuran_cetak: $("#ukuran_cetak").val(),
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
                jml_warna_cover: $("#jml_warna_cover").val(),
                jenis_kertas_cover: $("#jenis_kertas_cover").val(),
                _token: CSRF_TOKEN
            };


            $.ajax({
                url: '{{ URL::route('home.produk.kalender_dinding') }}',
                type: "POST",
                data: formData,
                success: function(response) {
                    console.log(response);
                    // var url = '{{ route("home.produk.kalender_dinding_detail") }}';
                    // var total_biaya = $("#btn_total_biaya").val();
                    var harga_satuan_rp = formatRp(Math.round(response.harga_satuan));
                    var total_biaya_rp = formatRp(response.total_biaya);

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
                        "           <div class=\"row\">" +
                        "               <div class=\"d-flex justify-content-between\">" +
                        "                   <div class=\"p-2\">Rp. " + harga_satuan_rp + " / pcs</div>" +
                        "                   <div class=\"p-2\"><button type=\"submit\" id=\"btn_total_biaya\" class=\"btn\">Rp. " + total_biaya_rp + "</button></div>" +
                        "               </div>" +
                        "           </div>" +
                        "       </div>" +
                        "   </div>" +
                        "   <div class=\"row\">" +
                        "       <input type=\"hidden\" id=\"jml_cetak\" name=\"jml_cetak\" value=\"" + response.jml_cetak + "\">" +
                        "       <input type=\"hidden\" id=\"jml_halaman\" name=\"jml_halaman\" value=\"" + response.jml_halaman + "\">" +
                        "       <input type=\"hidden\" id=\"jml_warna\" name=\"jml_warna\" value=\"" + response.jml_warna + "\">" +
                        "       <input type=\"hidden\" id=\"ukuran_cetak\" name=\"ukuran_cetak\" value=\"" + response.ukuran_cetak + "\">" +
                        "       <input type=\"hidden\" id=\"jenis_kertas\" name=\"jenis_kertas\" value=\"" + response.jenis_kertas + "\">" +
                        "       <input type=\"hidden\" id=\"finishing\" name=\"finishing\" value=\"" + response.finishing + "\">" +
                        "       <input type=\"hidden\" id=\"kertas\" name=\"kertas\" value=\"" + response.kertas + "\">" +
                        "       <input type=\"hidden\" id=\"mesin\" name=\"mesin\" value=\"" + response.mesin + "\">" +
                        "       <input type=\"hidden\" id=\"jml_plat\" name=\"jml_plat\" value=\"" + response.jml_plat + "\">" +
                        "       <input type=\"hidden\" id=\"insheet\" name=\"insheet\" value=\"" + response.insheet + "\">" +
                        "       <input type=\"hidden\" id=\"ukuran_cetak_real\" name=\"ukuran_cetak_real\" value=\"" + response.ukuran_cetak_real + "\">" +
                        "       <input type=\"hidden\" id=\"ukuran_potong_kertas\" name=\"ukuran_potong_kertas\" value=\"" + response.ukuran_potong_kertas + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_kertas\" name=\"biaya_kertas\" value=\"" + response.biaya_kertas + "\">" +
                        "       <input type=\"hidden\" id=\"total_biaya\" name=\"total_biaya\" value=\"" + response.total_biaya + "\">" +
                        "       <input type=\"hidden\" id=\"profit\" name=\"profit\" value=\"" + response.profit + "\">" +
                        "       <input type=\"hidden\" id=\"grand_total\" name=\"grand_total\" value=\"" + response.grand_total + "\">" +
                        "       <input type=\"hidden\" id=\"harga_satuan\" name=\"harga_satuan\" value=\"" + response.harga_satuan + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_cetak_min\" name=\"biaya_cetak_min\" value=\"" + response.biaya_cetak_min + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_cetak_lebih\" name=\"biaya_cetak_lebih\" value=\"" + response.biaya_cetak_lebih + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_plat\" name=\"biaya_plat\" value=\"" + response.biaya_plat + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_susun\" name=\"biaya_susun\" value=\"" + response.biaya_susun + "\">" +
                        "       <input type=\"hidden\" id=\"laminasi\" name=\"laminasi\" value=\"" + response.laminasi + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_set_kalender\" name=\"biaya_set_kalender\" value=\"" + response.biaya_set_kalender + "\">" +
                        "       <input type=\"hidden\" id=\"jenis_kertas_cover\" name=\"jenis_kertas_cover\" value=\"" + response.jenis_kertas_cover + "\">" +
                        "       <input type=\"hidden\" id=\"jml_kertas_insheet_cover\" name=\"jml_kertas_insheet_cover\" value=\"" + response.jml_kertas_insheet_cover + "\">" +
                        "       <input type=\"hidden\" id=\"jml_plat_cover\" name=\"jml_plat_cover\" value=\"" + response.jml_plat_cover + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_kertas_cover\" name=\"biaya_kertas_cover\" value=\"" + response.biaya_kertas_cover + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_cetak_min_cover\" name=\"biaya_cetak_min_cover\" value=\"" + response.biaya_cetak_min_cover + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_cetak_lebih_cover\" name=\"biaya_cetak_lebih_cover\" value=\"" + response.biaya_cetak_lebih_cover + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_plat_cover\" name=\"biaya_plat_cover\" value=\"" + response.biaya_plat_cover + "\">" +
                        "       <input type=\"hidden\" id=\"biaya_cover\" name=\"biaya_cover\" value=\"" + response.biaya_cover + "\">" +
                        "   </div>"
                        "</div>";

                    $(".hasil_hitung").append(dataHasilHitung);
                }
            });
        })
    })
</script>
@endsection
