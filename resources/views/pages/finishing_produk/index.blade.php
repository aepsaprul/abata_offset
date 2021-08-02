@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-uppercase font-weight-bold"><span style="border-bottom: 1px solid #000; padding: 5px;">Data Finishing Produk</span></h5>
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
            <a href="{{ route('finishing_produk.create') }}" class="btn btn-info text-white" title="Tambah"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="row mt-4">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr class="text-center bg-secondary text-white">
                    <th>No</th>
                    <th>Nama Finishing</th>
                    <th>Produk</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finishing_produks as $key => $finishing_produk)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $finishing_produk->finishing->nama_finishing }}</td>
                    <td class="text-right">{{ $finishing_produk->produk->nama_produk }}</td>
                    <td class="text-center">
                        <a href="{{ route('finishing_produk.edit', [$finishing_produk->id]) }}" class="btn btn-info text-white" title="Ubah"><i class="fas fa-edit"></i></a> |
                        <a href="{{ route('finishing_produk.delete', [$finishing_produk->id]) }}" class="btn btn-info text-white" title="Hapus" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash"></i></a>
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

