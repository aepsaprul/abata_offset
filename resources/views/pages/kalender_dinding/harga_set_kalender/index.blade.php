@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-uppercase font-weight-bold"><span style="border-bottom: 1px solid #000; padding: 5px;">Data Set Kalender</span></h5>
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
            <a href="{{ route('kertas.create') }}" class="btn btn-info text-white" title="Tambah"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="row mt-4">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr class="text-center bg-secondary text-white">
                    <th>No</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                    <th>Biaya Susun</th>
                    <th>Klem</th>
                    <th>Spiral</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kertas as $key => $kertas)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kertas->nama_kertas }}</td>
                    <td class="text-center">{{ $kertas->panjang }} cm</td>
                    <td class="text-center">{{ $kertas->lebar }} cm</td>
                    <td class="text-center">
                        <a href="{{ route('kertas.edit', [$kertas->id]) }}" class="btn btn-info text-white" title="Ubah"><i class="fas fa-edit"></i></a> |
                        <a href="{{ route('kertas.delete', [$kertas->id]) }}" class="btn btn-info text-white" title="Hapus" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash"></i></a>
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

