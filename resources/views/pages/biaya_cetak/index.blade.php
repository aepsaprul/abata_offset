@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-uppercase font-weight-bold"><span style="border-bottom: 1px solid #000; padding: 5px;">Data Biaya Cetak</span></h5>
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
        <div class="col-md-4">
            <a href="{{ route('biaya_cetak.create') }}" class="btn btn-info text-white" title="Tambah"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="row mt-4">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr class="text-center bg-secondary text-white">
                    <th>No</th>
                    <th>Nama Biaya</th>
                    <th>Mesin</th>
                    <th>Warna</th>
                    <th>Jumlah Min</th>
                    <th>Harga Min</th>
                    <th>Harga Lebih</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biaya_cetaks as $key => $biaya_cetak)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $biaya_cetak->nama_biaya }}</td>
                    <td class="text-center">{{ $biaya_cetak->mesin->nama_mesin }}</td>
                    <td class="text-center">{{ $biaya_cetak->kategori_warna }}</td>
                    <td class="text-center">{{ $biaya_cetak->jumlah_min }}</td>
                    <td class="text-right">{{ rupiah($biaya_cetak->harga_cetak_min) }}</td>
                    <td class="text-right">{{ rupiah($biaya_cetak->harga_cetak_lebih) }}</td>
                    <td class="text-center">
                        <a href="{{ route('biaya_cetak.edit', [$biaya_cetak->id]) }}" class="btn btn-info text-white" title="Ubah"><i class="fas fa-edit"></i></a> |
                        <a href="{{ route('biaya_cetak.delete', [$biaya_cetak->id]) }}" class="btn btn-info text-white" title="Hapus" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('lib/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/buttons.html5.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "ordering": false
        });
    } );
</script>
@endsection

