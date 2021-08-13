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
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Spesifikasi Item</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-right">Jumlah Cetak</td>
                                        <td>:</td>
                                        <td style="text-align: right;"><input readonly id="jml_cetak" value="{{ rupiah($jml_cetak) }}" size="5" style="border: none;text-align:right;"></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Halaman</td>
                                        <td>:</td>
                                        <td style="text-align: right;">{{ $jml_halaman }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Warna</td>
                                        <td>:</td>
                                        <td style="text-align: right;">{{ $jml_warna }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ukuran Cetak</td>
                                        <td>:</td>
                                        <td style="text-align: right;">{{ $ukuran_cetak }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kertas</td>
                                        <td>:</td>
                                        <td style="text-align: right;">{{ $jenis_kertas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Finishing</td>
                                        <td>:</td>
                                        <td style="text-align: right;">{{ $finishing }}</td>
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
                                    <td style="text-align: right;">{{ $insheet }}</td>
                                </tr>
                                <tr>
                                    <td>Mesin yg dipakai</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ $mesin }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Plat</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ $jml_plat }}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran Cetak Real</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ $ukuran_cetak_real }}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran Potong Kertas</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ $ukuran_potong_kertas }}</td>
                                </tr>
                                <tr>
                                    <td>Biaya Kertas</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ rupiah($biaya_kertas) }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <h4>Total</h4>
                            <table class="table">
                                <tr>
                                    <td>Biaya Cetak Min</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ rupiah($biaya_cetak_min) }}</td>
                                </tr>
                                <tr>
                                    <td>Biaya Cetak Lebih</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ rupiah($biaya_cetak_lebih) }}</td>
                                </tr>
                                <tr>
                                    <td>Biaya Plat</td>
                                    <td>:</td>
                                    <td style="text-align: right;">{{ rupiah($biaya_plat) }}</td>
                                </tr>
                                <tr>
                                    <td>Total Biaya</td>
                                    <td>:</td>
                                    <td style="text-align: right;"><input readonly id="total_biaya" value="{{ rupiah($total_biaya) }}" size="5" style="border: none;text-align:right;"></td>
                                </tr>
                                <tr>
                                    <td>Margin Profit</td>
                                    <td>:</td>
                                    <td style="text-align: right;">
                                        <div class="row">
                                            <div class="col-md-6 ml-4">
                                                <input type="text" id="margin_profit" name="margin_profit" size="3" value="20" style="text-align:right; margin-right: -35px;">
                                            </div>
                                            <div class="col-md-6">
                                                %
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Profit</td>
                                    <td>:</td>
                                    <td style="text-align: right;"><input readonly id="profit" value="{{ rupiah($profit) }}" size="5" style="border: none;text-align:right;"></td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td>:</td>
                                    <td style="text-align: right;"><input readonly id="grand_total" value="{{ rupiah($grand_total) }}" size="5" style="border: none;text-align:right;"></td>
                                </tr>
                                <tr>
                                    <td>Harga Satuan</td>
                                    <td>:</td>
                                    <td style="text-align: right;"><input readonly id="harga_satuan" value="{{ rupiah($harga_satuan) }}" size="5" style="border: none;text-align:right;"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>


    $(document).ready(function () {
        var jml_cetak_val = $("#jml_cetak").val();
        var total_biaya_val = $("#total_biaya").val();
        var profit_val = $("#profit").val();
        var grand_total_val = $("#grand_total").val();
        var harga_satuan_val = $("#harga_satuan").val();

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

            var profit_rupiah = formatRupiah(hitung_profit);
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


            $("#profit").val(profit_rupiah);
            $("#grand_total").val(grand_total_rupiah);
            $("#harga_satuan").val(harga_satuan_rupiah);

            console.log(hitung_harga_satuan);
        })
    })
</script>
@endsection
