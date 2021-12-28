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
                        <h2>Tambah Data Finishing</h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="{{ route('finishing.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="mt-3" action="{{ route('finishing.store') }}" method="POST">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Finishing</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input
                                        type="text"
                                        required="required"
                                        class="form-control @error('nama_finishing') is-invalid @enderror"
                                        id="nama_finishing"
                                        placeholder="Nama Finishing"
                                        name="nama_finishing"
                                        onkeyup="this.value = this.value.toUpperCase()"
                                        value="{{ old('nama_finishing') }}">
                                </div>
                                @error('nama_finishing')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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

