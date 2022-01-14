@extends('layouts.app')

@section('style')

<!-- Datatables -->
<link href="{{ asset('theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Mesin</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="col-md-4 mb-3">
                                        <button
                                            id="button-create"
                                            type="button"
                                            class="btn btn-primary btn-sm text-white pl-3 pr-3"
                                            title="Tambah">
                                                <i class="fa fa-plus"></i> Tambah
                                        </button>
                                        <div class="clearfix"></div>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Mesin</th>
                                                <th class="text-center">Area Cetak</th>
                                                <th class="text-center">Harga Plat</th>
                                                <th class="text-center">#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mesins as $key => $item)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $item->nama_mesin }}</td>
                                                <td class="text-center">{{ $item->area_cetak_panjang }}  cm x {{ $item->area_cetak_lebar }} cm</td>
                                                <td class="text-end">{{ rupiah($item->harga_plat) }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a
                                                            class="dropdown-toggle"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                                <i class="fa fa-cog"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a
                                                                class="dropdown-item btn-edit"
                                                                href="#"
                                                                data-id="{{ $item->id }}">
                                                                    <i class="fa fa-pencil px-2"></i> Ubah
                                                            </a>
                                                            <a
                                                                class="dropdown-item btn-delete"
                                                                href="#"
                                                                data-id="{{ $item->id }}">
                                                                    <i class="fa fa-trash px-2"></i> Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

{{-- modal create  --}}
<div class="modal fade modal-create" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_create">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Tambah Data Mesin</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">
                            <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create_nama_mesin" class="form-label">Nama Mesin</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_nama_mesin"
                            name="create_nama_mesin">
                    </div>
                    <div class="mb-3">
                        <label for="create_area_cetak_panjang" class="form-label">Panjang Area Cetak</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_area_cetak_panjang"
                            name="create_area_cetak_panjang">
                    </div>
                    <div class="mb-3">
                        <label for="create_area_cetak_lebar" class="form-label">Lebar Area Cetak</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_area_cetak_lebar"
                            name="create_area_cetak_lebar">
                    </div>
                    <div class="mb-3">
                        <label for="create_harga_plat" class="form-label">Harga Plat</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_harga_plat"
                            name="create_harga_plat">
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
                    <h5 class="modal-title text-white">Ubah Data Mesin</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">
                            <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama_mesin" class="form-label">Nama Mesin</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_nama_mesin"
                            name="edit_nama_mesin">
                    </div>
                    <div class="mb-3">
                        <label for="edit_area_cetak_panjang" class="form-label">Panjang Area Cetak</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_area_cetak_panjang"
                            name="edit_area_cetak_panjang">
                    </div>
                    <div class="mb-3">
                        <label for="edit_area_cetak_lebar" class="form-label">Lebar Area Cetak</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_area_cetak_lebar"
                            name="edit_area_cetak_lebar">
                    </div>
                    <div class="mb-3">
                        <label for="edit_harga_plat" class="form-label">Harga Plat</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_harga_plat"
                            name="edit_harga_plat">
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

<!-- Datatables -->
<script src="{{ asset('theme/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('theme/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('theme/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('theme/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#example').DataTable({
            "ordering": false
        });

        $('#button-create').on('click', function() {
            $('.modal-create').modal('show');
        });

        $(document).on('shown.bs.modal', '.modal-create', function() {
            $('#create_nama_mesin').focus();

            var plat = document.getElementById("create_harga_plat");
            plat.addEventListener("keyup", function(e) {
                plat.value = formatRupiah(this.value, "");
            });
        });

        $('#form_create').submit(function(e) {
            e.preventDefault();
            $('.modal-create').modal('hide');

            var formData = {
                nama_mesin: $('#create_nama_mesin').val(),
                area_cetak_panjang: $('#create_area_cetak_panjang').val(),
                area_cetak_lebar: $('#create_area_cetak_lebar').val(),
                harga_plat: $('#create_harga_plat').val().replace(/\./g,''),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('mesin.store') }} ',
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

        $('body').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            $('.edit_id').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("mesin.edit", ":id") }}';
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
                    $('#edit_nama_mesin').val(response.nama_mesin);
                    $('#edit_area_cetak_panjang').val(response.area_cetak_panjang);
                    $('#edit_area_cetak_lebar').val(response.area_cetak_lebar);
                    $('#edit_harga_plat').val(format_rupiah(response.harga_plat));

                    $('.modal-edit').modal('show');
                }
            })
        });

        $(document).on('shown.bs.modal', '.modal-edit', function() {
            $('#edit_nama_mesin').focus();

            var plat = document.getElementById("edit_harga_plat");
            plat.addEventListener("keyup", function(e) {
                plat.value = formatRupiah(this.value, "");
            });
        });

        $('#form_edit').submit(function(e) {
            e.preventDefault();

            $('.modal-edit').modal('hide');

            var id = $('#edit_id').val();
            var url = '{{ route("mesin.update", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: $('#edit_id').val(),
                nama_mesin: $('#edit_nama_mesin').val(),
                area_cetak_panjang: $('#edit_area_cetak_panjang').val(),
                area_cetak_lebar: $('#edit_area_cetak_lebar').val(),
                harga_plat: $('#edit_harga_plat').val().replace(/\./g,''),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: url,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.btn-delete', function(e) {
            e.preventDefault();

            $('.delete_title').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("mesin.delete_btn", ":id") }}';
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
                    $('.delete_title').append(response.nama_mesin);
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
                url: '{{ URL::route('mesin.delete') }}',
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

