@extends('layouts.app')

@section('style')

<!-- Datatables -->
<link href="{{ asset('theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
{{-- select2 --}}
<link rel="stylesheet" href="{{ asset('theme/vendors/select2/dist/css/select2.min.css') }}">

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
                        <h2>Data Kertas</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="kertas-tab" data-toggle="tab" href="#kertas" role="tab" aria-controls="kertas" aria-selected="true">Kertas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="ukuran-kertas-tab" data-toggle="tab" href="#ukuran-kertas" role="tab" aria-controls="ukuran-kertas" aria-selected="false">Ukuran Kertas</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="kertas" role="tabpanel" aria-labelledby="kertas-tab">
                                        <div class="card-box table-responsive">
                                            <div class="col-md-4 mb-3">
                                                <button
                                                    id="button-create"
                                                    type="button"
                                                    class="btn btn-info btn-sm text-white"
                                                    title="Tambah">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Kertas</th>
                                                        <th class="text-center">Gramasi</th>
                                                        <th class="text-center">Ukuran Kertas</th>
                                                        <th class="text-center">Harga</th>
                                                        <th class="text-center">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($jenis_kertas as $key => $item)
                                                        <tr>
                                                            <td class="text-center">{{ $key + 1 }}</td>
                                                            <td>{{ $item->nama_kertas }}</td>
                                                            <td>{{ $item->gramasi }} cm</td>
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
                                                                    class="btn btn-info btn-sm text-white btn-edit"
                                                                    data-id="{{ $item->id }}"
                                                                    title="Ubah">
                                                                        <i class="fa fa-edit"></i>
                                                                </button> |
                                                                <button
                                                                    class="btn btn-info btn-sm text-white btn-delete"
                                                                    data-id="{{ $item->id }}"
                                                                    title="Hapus">
                                                                        <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ukuran-kertas" role="tabpanel" aria-labelledby="ukuran-kertas-tab">
                                        <div class="card-box table-responsive">
                                            <div class="col-md-4 mb-3">
                                                <button
                                                    id="button-create-ukuran-kertas"
                                                    type="button"
                                                    class="btn btn-info btn-sm text-white"
                                                    title="Tambah">
                                                        <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <table id="table_two" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Kategori Ukuran Kertas</th>
                                                        <th class="text-center">Panjang</th>
                                                        <th class="text-center">Lebar</th>
                                                        <th class="text-center">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ukuran_kertas as $key => $item)
                                                        <tr>
                                                            <td class="text-center">{{ $key + 1 }}</td>
                                                            <td>{{ $item->nama_kertas }}</td>
                                                            <td class="text-center">{{ $item->panjang }} cm</td>
                                                            <td class="text-center">{{ $item->lebar }} cm</td>
                                                            <td class="text-center">
                                                                <button
                                                                    class="btn btn-info btn-sm text-white btn-edit-ukuran-kertas"
                                                                    data-id="{{ $item->id }}"
                                                                    title="Ubah">
                                                                        <i class="fa fa-edit"></i>
                                                                </button> |
                                                                <button
                                                                    class="btn btn-info btn-sm text-white btn-delete-ukuran-kertas"
                                                                    data-id="{{ $item->id }}"
                                                                    title="Hapus">
                                                                        <i class="fa fa-trash"></i>
                                                                </button>
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
    </div>
</div>
<!-- /page content -->

{{-- modal create  --}}
<div class="modal fade modal-create" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_create">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Tambah Data Kertas</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">
                            <span aria-hidden="true">x</span>
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
                        <label for="create_gramasi" class="form-label">Gramasi (cm)</label>
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
                    <div class="mb-3">
                        <label for="create_produk_id" class="form-label">Jenis Produk Jadi</label>
                        <div id="create_produk_id" class="border p-3">

                        </div>
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
                        class="close"
                        data-dismiss="modal">
                            <span aria-hidden="true">x</span>
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
                        <label for="edit_gramasi" class="form-label">Gramasi (cm)</label>
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
                    <div class="mb-3">
                        <label for="edit_produk_id" class="form-label">Jenis Produk Jadi</label>
                        <div id="edit_produk_id" class="border p-3">

                        </div>
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

{{-- modal create ukuran kertas --}}
<div class="modal fade modal-create-ukuran-kertas" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_create_ukuran_kertas">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Tambah Data Ukuran Kertas</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">
                            <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create_ukuran_kertas_nama_kertas" class="form-label">Nama Kertas</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_ukuran_kertas_nama_kertas"
                            name="create_ukuran_kertas_nama_kertas">
                    </div>
                    <div class="mb-3">
                        <label for="create_ukuran_kertas_lebar" class="form-label">Lebar</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_ukuran_kertas_lebar"
                            name="create_ukuran_kertas_lebar">
                    </div>
                    <div class="mb-3">
                        <label for="create_ukuran_kertas_panjang" class="form-label">Panjang</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_ukuran_kertas_panjang"
                            name="create_ukuran_kertas_panjang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="border-0 text-white bg-primary" style="padding: 5px 10px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal edit ukuran kertas --}}
<div class="modal fade modal-edit-ukuran-kertas" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_edit_ukuran_kertas">

                {{-- id  --}}
                <input
                    type="hidden"
                    id="edit_ukuran_kertas_id"
                    name="edit_ukuran_kertas_id">

                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Ubah Data Ukuran Kertas</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">
                            <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_ukuran_kertas_nama_kertas" class="form-label">Nama Kertas</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_ukuran_kertas_nama_kertas"
                            name="edit_ukuran_kertas_nama_kertas">
                    </div>
                    <div class="mb-3">
                        <label for="edit_ukuran_kertas_lebar" class="form-label">Lebar</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_ukuran_kertas_lebar"
                            name="edit_ukuran_kertas_lebar">
                    </div>
                    <div class="mb-3">
                        <label for="edit_ukuran_kertas_panjang" class="form-label">Panjang</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_ukuran_kertas_panjang"
                            name="edit_ukuran_kertas_panjang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="border-0 text-white bg-primary" style="padding: 5px 10px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete ukuran kertas --}}
<div class="modal fade modal-delete-ukuran-kertas" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form_delete_ukuran_kertas">

                {{-- id  --}}
                <input type="hidden" id="delete_ukuran_kertas_id" name="delete_ukuran_kertas_id">

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
<script src="{{ asset('theme/vendors/select2/dist/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#example').DataTable({
            "ordering": false
        });

        $('#table_two').DataTable({
            "ordering": false
        });

        $('#button-create').on('click', function() {
            $('#create_kertas_id').empty();
            $('#create_produk_id').empty();

            var formData = {
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jenis_kertas.create') }}',
                type: 'GET',
                data: formData,
                success: function(response) {

                    var value_kertas = "<option value=\"\">--Pilih Ukuran Kertas--</option>";
                    $.each(response.kertas, function(index, item) {
                        value_kertas += "<option value=\"" + item.id + "\">" + item.nama_kertas + "</option>";
                    });
                    $('#create_kertas_id').append(value_kertas);


                    $.each(response.produks, function(index, item) {
                        var value_produk = "" +
                            "<div class=\"checkbox\">" +
                                "<label>" +
                                    "<input type=\"checkbox\"name=\"produk_id\" value=\"" + item.id + "\" id=\"produk_id_" + item.id + "\"> " + item.nama_produk +
                                "</label>" +
                            "</div>";
                        $('#create_produk_id').append(value_produk);
                    });

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

            var produk_id = [];
            $('input[name=produk_id]:checked').each(function() {
                produk_id.push(this.value);
            });

            var formData = {
                nama_kertas: $('#create_nama_kertas').val(),
                gramasi: $('#create_gramasi').val(),
                kertas_id: $('#create_kertas_id').val(),
                harga: $('#create_harga').val().replace(/\./g,''),
                produk: produk_id.toString(),
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
            $('#edit_produk_id').empty();

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


                        $.each(response.produks, function(index, item) {
                            var value_produk = "" +
                                "<div class=\"checkbox\">" +
                                    "<label>" +
                                        "<input type=\"checkbox\" name=\"produk_id\" value=\"" + item.id + "\" id=\"produk_id_" + item.id + "\"";
                                        if (response.produk != null) {
                                            var produk_split = response.produk.split(',');
                                            $.each(produk_split, function(index, value) {
                                                if (item.id == value) {
                                                    value_produk += " checked";
                                                }
                                            });
                                        }
                                        value_produk += "> " + item.nama_produk +
                                    "</label>" +
                                "</div>";
                            $('#edit_produk_id').append(value_produk);
                        });


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

            var produk_id = [];
            $('input[name=produk_id]:checked').each(function() {
                produk_id.push(this.value);
            });

            var id = $('#edit_id').val();
            var url = '{{ route("jenis_kertas.update", ":id") }}';
            url = url.replace(':id', id );

            var formData = {
                id: $('#edit_id').val(),
                nama_kertas: $('#edit_nama_kertas').val(),
                gramasi: $('#edit_gramasi').val(),
                kertas_id: $('#edit_kertas_id').val(),
                harga: $('#edit_harga').val().replace(/\./g,''),
                produk: produk_id.toString(),
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

        // ukuran kertas
        $('#button-create-ukuran-kertas').on('click', function() {
            $('.modal-create-ukuran-kertas').modal('show');
        });

        $(document).on('shown.bs.modal', '.modal-create-ukuran-kertas', function() {
            $('#create_ukuran_kertas_nama_kertas').focus();
        });

        $('#form_create_ukuran_kertas').submit(function(e) {
            e.preventDefault();

            var formData = {
                nama_kertas: $('#create_ukuran_kertas_nama_kertas').val(),
                lebar: $('#create_ukuran_kertas_lebar').val(),
                panjang: $('#create_ukuran_kertas_panjang').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jenis_kertas.ukuran_kertas_store') }} ',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal-create-ukuran-kertas').modal('hide');
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.btn-edit-ukuran-kertas', function(e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            var url = '{{ route("jenis_kertas.ukuran_kertas_edit", ":id") }}';
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
                    $('#edit_ukuran_kertas_id').val(response.id);
                    $('#edit_ukuran_kertas_nama_kertas').val(response.nama_kertas);
                    $('#edit_ukuran_kertas_lebar').val(response.lebar);
                    $('#edit_ukuran_kertas_panjang').val(format_rupiah(response.panjang));

                    $('.modal-edit-ukuran-kertas').modal('show');
                }
            })
        });

        $(document).on('shown.bs.modal', '.modal-edit-ukuran-kertas', function() {
            $('#edit_ukuran_kertas_nama_kertas').focus();
        });

        $('#form_edit_ukuran_kertas').submit(function(e) {
            e.preventDefault();

            var formData = {
                id: $('#edit_ukuran_kertas_id').val(),
                nama_kertas: $('#edit_ukuran_kertas_nama_kertas').val(),
                lebar: $('#edit_ukuran_kertas_lebar').val(),
                panjang: $('#edit_ukuran_kertas_panjang').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jenis_kertas.ukuran_kertas_update') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('.modal-edit-ukuran-kertas').modal('hide');
                    $('.modal-proses').modal('show');
                    setTimeout(() => {
                        $('.modal-proses').modal('hide');
                        window.location.reload(1);
                    }, 1000);
                }
            });
        });

        $('body').on('click', '.btn-delete-ukuran-kertas', function(e) {
            e.preventDefault();

            $('.delete_title').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("jenis_kertas.ukuran_kertas_delete_btn", ":id") }}';
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
                    $('#delete_ukuran_kertas_id').val(response.id);
                    $('.modal-delete-ukuran-kertas').modal('show');
                }
            });
        });

        $('#form_delete_ukuran_kertas').submit(function(e) {
            e.preventDefault();

            $('.modal-delete-ukuran-kertas').modal('hide');

            var formData = {
                id: $('#delete_ukuran_kertas_id').val(),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jenis_kertas.ukuran_kertas_delete') }}',
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

