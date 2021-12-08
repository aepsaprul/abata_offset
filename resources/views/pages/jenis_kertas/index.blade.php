@extends('layouts.app')

@section('style')
<link href="{{ asset('lib/datatables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('lib/select2/css/select2.min.css') }}">
@endsection

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center text-uppercase font-weight-bold"><span style="border-bottom: 1px solid #000; padding: 5px;">Data Kertas</span></h5>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <button
                id="button-create"
                type="button"
                class="btn btn-info text-white"
                title="Tambah">
                    <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="row mt-4">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr class="text-center bg-secondary text-white">
                    <th>No</th>
                    <th>Nama Kertas</th>
                    <th>Gramasi</th>
                    <th>Ukuran Kertas</th>
                    <th>Harga</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenis_kertas as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $item->nama_kertas }}</td>
                    <td>{{ $item->gramasi }}</td>
                    <td>
                        @if ($item->kertas)
                            {{ $item->kertas->nama_kertas }}
                        @else
                            Ukuran Kertas Kosong
                        @endif
                    </td>
                    <td class="text-end">{{ rupiah($item->harga) }}</td>
                    <td class="text-center">
                        <button
                            class="btn btn-info text-white btn-edit"
                            data-id="{{ $item->id }}"
                            title="Ubah">
                                <i class="fas fa-edit"></i>
                        </button> |
                        <button
                            class="btn btn-info text-white btn-delete"
                            data-id="{{ $item->id }}"
                            title="Hapus">
                                <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- modal create  --}}
<div class="modal fade modal-create" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_create">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Tambah Data Kertas</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create_nama_kertas" class="form-label">Nama Kertas</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_nama_kertas"
                            name="create_nama_kertas">
                    </div>
                    <div class="mb-3">
                        <label for="create_gramasi" class="form-label">Gramasi</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_gramasi"
                            name="create_gramasi">
                    </div>
                    <div class="mb-3">
                        <label for="create_kertas_id" class="form-label">Ukuran Kertas</label>
                        <select name="create_kertas_id" id="create_kertas_id" class="form-control select_kertas_id">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_harga" class="form-label">Harga</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_harga"
                            name="create_harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="border-0 text-white bg-primary" style="padding: 5px 10px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal edit  --}}
<div class="modal fade modal-edit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_edit">

                {{-- id  --}}
                <input
                    type="hidden"
                    id="edit_id"
                    name="edit_id">

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Ubah Data Kertas</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama_kertas" class="form-label">Nama Kertas</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_nama_kertas"
                            name="edit_nama_kertas">
                    </div>
                    <div class="mb-3">
                        <label for="edit_gramasi" class="form-label">Gramasi</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_gramasi"
                            name="edit_gramasi">
                    </div>
                    <div class="mb-3">
                        <label for="edit_kertas_id" class="form-label">Ukuran Kertas</label>
                        <select name="edit_kertas_id" id="edit_kertas_id" class="form-control">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_harga" class="form-label">Harga</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_harga"
                            name="edit_harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="border-0 text-white bg-primary" style="padding: 5px 10px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete  --}}
<div class="modal fade modal-delete" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_delete">

                {{-- id  --}}
                <input type="hidden" id="delete_id" name="delete_id">

                <div class="modal-header">
                    <h5 class="modal-title">Yakin akan dihapus <span class="delete_title text-decoration-underline"></span> ?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary text-center" data-bs-dismiss="modal" style="width: 100px;">Tidak</button>
                    <button type="submit" class="btn btn-primary text-center" style="width: 100px;">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal proses berhasil  --}}
<div class="modal fade modal-proses" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                Proses sukses.... <i class="fas fa-check text-success"></i>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('lib/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('lib/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#example').DataTable({
            "ordering": false
        });

        $('#button-create').on('click', function() {
            $('#create_kertas_id').empty();

            var formData = {
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jenis_kertas.create') }}',
                type: 'GET',
                data: formData,
                success: function(response) {

                    var value = "<option value=\"\">--Pilih Ukuran Kertas--</option>";
                    $.each(response.kertas, function(index, item) {
                        value += "<option value=\"" + item.id + "\">" + item.nama_kertas + "</option>";
                    });

                    $('#create_kertas_id').append(value);
                    $('.modal-create').modal('show');
                }
            });
        });

        $(document).on('shown.bs.modal', '.modal-create', function() {
            $('#create_nama_kertas').focus();

            $('.select_kertas_id').select2({
                dropdownParent: $('.modal-create')
            });

            var harga = document.getElementById("create_harga");
            harga.addEventListener("keyup", function(e) {
                harga.value = formatRupiah(this.value, "");
            });
        });

        $('#form_create').submit(function(e) {
            e.preventDefault();

            var formData = {
                nama_kertas: $('#create_nama_kertas').val(),
                gramasi: $('#create_gramasi').val(),
                kertas_id: $('#create_kertas_id').val(),
                harga: $('#create_harga').val().replace(/\./g,''),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jenis_kertas.store') }} ',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal-create').modal('hide');
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            $('#edit_kertas_id').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("jenis_kertas.edit", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: id,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'GET',
                data: formData,
                success: function(response) {
                    $('#edit_id').val(response.id);
                    $('#edit_nama_kertas').val(response.nama_kertas);
                    $('#edit_gramasi').val(response.gramasi);
                    $('#edit_harga').val(format_rupiah(response.harga));

                    var value = "<option value=\"\">--Pilih Kertas--</option>";
                    $.each(response.kertas, function(index, item) {
                        value += "<option value=\"" + item.id + "\"";

                        if (item.id == response.kertas_id) {
                            value += "selected";
                        }
                        value += ">" + item.nama_kertas + "</option>";
                    });

                    $('#edit_kertas_id').append(value);
                    $('.modal-edit').modal('show');
                }
            })
        });

        $(document).on('shown.bs.modal', '.modal-edit', function() {
            $('#edit_nama_kertas').focus();

            $('.select_kertas_id').select2({
                dropdownParent: $('.modal-edit')
            });

            var harga = document.getElementById("edit_harga");
            harga.addEventListener("keyup", function(e) {
                harga.value = formatRupiah(this.value, "");
            });
        });

        $('#form_edit').submit(function(e) {
            e.preventDefault();

            var id = $('#edit_id').val();
            var url = '{{ route("jenis_kertas.update", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: $('#edit_id').val(),
                nama_kertas: $('#edit_nama_kertas').val(),
                gramasi: $('#edit_gramasi').val(),
                kertas_id: $('#edit_kertas_id').val(),
                harga: $('#edit_harga').val().replace(/\./g,''),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    $('.modal-edit').modal('hide');
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        $('.modal-proses').modal('hide');
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.btn-delete', function(e) {
            e.preventDefault();

            $('.delete_title').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("jenis_kertas.delete_btn", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: id,
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'GET',
                data: formData,
                success: function(response) {
                    $('.delete_title').append(response.nama_kertas);
                    $('#delete_id').val(response.id);
                    $('.modal-delete').modal('show');
                }
            });
        });

        $('#form_delete').submit(function(e) {
            e.preventDefault();

            $('.modal-delete').modal('hide');

            var formData = {
                id: $('#delete_id').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jenis_kertas.delete') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });
    } );
</script>
@endsection

