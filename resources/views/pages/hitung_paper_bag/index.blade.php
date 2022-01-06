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
                        <h2>Pehitungan Paper Bag</h2>
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
                                            <label for="jml_warna" class="col-sm-4 col-form-label">Jumlah Cetak</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jml_halaman_kalender" class="col-sm-4 col-form-label">Ukuran Paper Bag</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Panjang">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Lebar">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Tinggi">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jenis_kertas" class="col-sm-4 col-form-label">Jenis Kertas</label>
                                            <div class="col-sm-8">
                                                <select class="form-control form-control-sm" id="jenis_kertas" name="jenis_kertas">
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
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="laminasi" class="col-sm-4 col-form-label">Biaya Finishing</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="" id="" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
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
                                            <label for="biaya_design" class="col-sm-4 col-form-label">Biaya Design</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="biaya_design" name="biaya_design">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="biaya_akomodasi" class="col-sm-4 col-form-label">Biaya Akomodasi</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="biaya_akomodasi" name="biaya_akomodasi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label for="jml_cetak" class="col-sm-4 col-form-label">Lain - lain</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="jml_cetak" name="jml_cetak">
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
    });
</script>
@endsection
