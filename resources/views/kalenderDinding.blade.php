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
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jml_halaman_kalender" class="col-sm-6 col-form-label">Jumlah Halaman Kalender</label>
                                            <div class="col-sm-6">
                                                <select class="form-select form-select-sm" id="jml_halaman_kalender" name="jml_halaman_kalender" required>
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
                                                <select class="form-select form-select-sm" id="jml_warna" name="jml_warna" required>
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
                                                <select class="form-select form-select-sm" id="ukuran_cetak" name="ukuran_kertas" required>
                                                    <option value="">--Pilih Jumlah--</option>
                                                    <option value="32 x 48">32 x 48</option>
                                                    <option value="38 x 52">38 x 52</option>
                                                    <option value="40 x 56">40 x 56</option>
                                                    <option value="44 x 64">44 x 64</option>
                                                    <option value="50 x 70">50 x 70</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jenis_kertas" class="col-sm-6 col-form-label">Jenis Kertas</label>
                                            <div class="col-sm-6">
                                                <select class="form-select form-select-sm" id="jenis_kertas" name="jenis_kertas" required>
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
                                                <select class="form-select form-select-sm" id="jenis_finishing" name="jenis_finishing" required>
                                                    <option value="">--Pilih Finishing--</option>
                                                    @foreach ($produk_relasi->finishing as $finishing)
                                                        <option value="{{ $finishing->finishing->id }}">{{ $finishing->finishing->nama_finishing }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="laminasi" class="col-sm-6 col-form-label">Laminasi</label>
                                            <div class="col-sm-6">
                                                <select class="form-select form-select-sm" id="laminasi" name="laminasi" required>
                                                    <option value="">--Pilih Laminasi--</option>
                                                    <option value="ya">Ya</option>
                                                    <option value="tidak">Tidak</option>
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
                                                <input type="number" class="form-control form-control-sm" id="jml_cetak" name="jml_cetak" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="biaya_potong" class="col-sm-6 col-form-label">Biaya Potong</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control form-control-sm" id="biaya_potong" name="biaya_potong" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="biaya_design" class="col-sm-6 col-form-label">Biaya Design</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control form-control-sm" id="biaya_design" name="biaya_design" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="biaya_akomodasi" class="col-sm-6 col-form-label">Biaya Akomodasi</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control form-control-sm" id="biaya_akomodasi" name="biaya_akomodasi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input class="form-check-input" type="checkbox" id="cover_depan" name="cover_depan" value="cover_depan">
                                        <label class="form-check-label" for="cover_depan">
                                            Cover Depan
                                        </label>
                                    </div>
                                    <div class="sub_cover_depan">
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="jml_warna_cover" class="col-sm-6 col-form-label">Jumlah Warna Cover</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select form-select-sm" id="jml_warna_cover" name="jml_warna_cover" required>
                                                        <option value="">--Pilih Jumlah--</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row mb-3">
                                                <label for="jenis_kertas_cover" class="col-sm-6 col-form-label">Jenis Kertas Cover</label>
                                                <div class="col-sm-6">
                                                    <select class="form-select form-select-sm" id="jenis_kertas_cover" name="jenis_kertas_cover" required>
                                                        <option value="">--Pilih Kertas--</option>
                                                        <option value="IVORY 230">IVORY 230</option>
                                                        <option value="AP 120">AP 120</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        $('.sub_cover_depan').hide();

        $('#cover_depan').change(function() {
            if (this.checked == true) {
                $('.sub_cover_depan').show();
            }
            else {
                $('.sub_cover_depan').hide();
            }
        });
    })
</script>
@endsection
