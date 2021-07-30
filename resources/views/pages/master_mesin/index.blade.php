@extends('layouts.app')

@section('style')

@endsection

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-uppercase font-weight-bold"><span style="border-bottom: 1px solid #000; padding: 5px;">Data Mesin</span></h5>
        </div>
    </div>
    <div class="row mt-3">
        @if(session('status'))
            <div class="text-success">
                <i> {{ session('status') }} </i>
            </div>
        @endif
    </div>
    <div class="row mt-3">
        <a href="{{ route('master_mesin.create') }}" class="btn btn-info text-white" title="Tambah"><i class="fas fa-plus"></i></a>
    </div>
    <div class="row mt-4">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr class="text-center bg-secondary text-white">
                    <th><strong>No</strong></th>
                    <th><strong>Nama Mesin</strong></th>
                    <th><strong>Area Kertas</strong></th>
                    <th><strong>Area Cetak</strong></th>
                    <th><strong>#</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($master_mesins as $key => $master_mesin)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $master_mesin->nama_mesin }}</td>
                    <td class="text-center">{{ $master_mesin->area_kertas_panjang }} cm x {{ $master_mesin->area_kertas_lebar }} cm</td>
                    <td class="text-center">{{ $master_mesin->area_cetak_panjang }}  cm x {{ $master_mesin->area_cetak_lebar }} cm</td>
                    <td class="text-center">
                        <a href="{{ route('master_mesin.edit', [$master_mesin->id]) }}" class="btn btn-info text-white" title="Ubah"><i class="fas fa-edit"></i></a> |
                        <a href="{{ route('master_mesin.delete', [$master_mesin->id]) }}" class="btn btn-info text-white" title="Hapus" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

