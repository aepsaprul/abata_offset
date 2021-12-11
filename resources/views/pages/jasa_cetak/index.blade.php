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
            <h5 class="text-center text-uppercase font-weight-bold"><span style="border-bottom: 1px solid #000; padding: 5px;">Data Jasa Cetak</span></h5>
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
                    <th>Gramasi</th>
                    <th>Mesin</th>
                    <th>Jumlah Warna</th>
                    <th>Biaya Min Cetak</th>
                    <th>Biaya Cetak Lebih</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jasa_cetaks as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $item->gramasi->ukuran }}</td>
                    <td>{{ $item->mesin->nama_mesin }}</td>
                    <td>{{ $item->warna->nama }}</td>
                    <td class="text-end">{{ rupiah($item->harga_per_seribu) }}</td>
                    <td class="text-end">{{ rupiah($item->harga_lebih) }}</td>
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
                    <h5 class="modal-title text-white">Tambah Data Jasa Cetak</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="create_mesin_id" class="form-label">Mesin</label>
                        <select name="create_mesin_id" id="create_mesin_id" class="form-control">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_warna_id" class="form-label">Jumlah Warna</label>
                        <select name="create_warna_id" id="create_warna_id" class="form-control">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="create_harga_per_seribu" class="form-label">Biaya Min Cetak Per Seribu</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_harga_per_seribu"
                            name="create_harga_per_seribu">
                    </div>
                    <div class="mb-3">
                        <label for="create_harga_lebih" class="form-label">Biaya Cetak Lebih</label>
                        <input
                            type="text"
                            class="form-control"
                            id="create_harga_lebih"
                            name="create_harga_lebih">
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
                        <label for="edit_mesin_id" class="form-label">Mesin</label>
                        <select name="edit_mesin_id" id="edit_mesin_id" class="form-control">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_warna_id" class="form-label">Jumlah Warna</label>
                        <select name="edit_warna_id" id="edit_warna_id" class="form-control">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_harga_per_seribu" class="form-label">Biaya Min Cetak Per Seribu</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_harga_per_seribu"
                            name="edit_harga_per_seribu">
                    </div>
                    <div class="mb-3">
                        <label for="edit_harga_lebih" class="form-label">Biaya Cetak Lebih</label>
                        <input
                            type="text"
                            class="form-control"
                            id="edit_harga_lebih"
                            name="edit_harga_lebih">
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
            $('#create_mesin_id').empty();
            $('#create_warna_id').empty();

            var formData = {
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jasa_cetak.create') }}',
                type: 'GET',
                data: formData,
                success: function(response) {

                    var value_mesin = "<option value=\"\">--Pilih Mesin--</option>";
                    $.each(response.mesins, function(index, item) {
                        value_mesin += "<option value=\"" + item.id + "\">" + item.nama_mesin + "</option>";
                    });
                    $('#create_mesin_id').append(value_mesin);

                    var value_warna = "<option value=\"\">--Pilih Warna--</option>";
                    $.each(response.warnas, function(index, item) {
                        value_warna += "<option value=\"" + item.id + "\">" + item.nama + "</option>";
                    });
                    $('#create_warna_id').append(value_warna);

                    $('.modal-create').modal('show');
                }
            });
        });

        $(document).on('shown.bs.modal', '.modal-create', function() {
            $('#create_mesin_id').focus();

            var harga_per_seribu = document.getElementById("create_harga_per_seribu");
            harga_per_seribu.addEventListener("keyup", function(e) {
                harga_per_seribu.value = formatRupiah(this.value, "");
            });

            var harga_lebih = document.getElementById("create_harga_lebih");
            harga_lebih.addEventListener("keyup", function(e) {
                harga_lebih.value = formatRupiah(this.value, "");
            });
        });

        $('#form_create').submit(function(e) {
            e.preventDefault();

            var formData = {
                mesin_id: $('#create_mesin_id').val(),
                warna_id: $('#create_warna_id').val(),
                harga_per_seribu: $('#create_harga_per_seribu').val(),
                harga_lebih: $('#create_harga_lebih').val().replace(/\./g,''),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jasa_cetak.store') }} ',
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
            $('#edit_mesin_id').empty();
            $('#edit_warna_id').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("jasa_cetak.edit", ":id") }}';
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
                    $('#edit_harga_per_seribu').val(response.harga_per_seribu);
                    $('#edit_harga_lebih').val(response.harga_lebih);

                    var value_mesin = "<option value=\"\">--Pilih Mesin--</option>";
                    $.each(response.mesins, function(index, item) {
                        value_mesin += "<option value=\"" + item.id + "\"";

                        if (item.id == response.mesin_id) {
                            value_mesin += "selected";
                        }
                        value_mesin += ">" + item.nama_mesin + "</option>";
                    });
                    $('#edit_mesin_id').append(value_mesin);

                    var value_warna = "<option value=\"\">--Pilih Warna--</option>";
                    $.each(response.warnas, function(index, item) {
                        value_warna += "<option value=\"" + item.id + "\"";

                        if (item.id == response.warna_id) {
                            value_warna += "selected";
                        }
                        value_warna += ">" + item.nama + "</option>";
                    });
                    $('#edit_warna_id').append(value_warna);

                    $('.modal-edit').modal('show');
                }
            })
        });

        $(document).on('shown.bs.modal', '.modal-edit', function() {
            $('#edit_mesin_id').focus();

            var harga_per_seribu = document.getElementById("edit_harga_per_seribu");
            harga_per_seribu.addEventListener("keyup", function(e) {
                harga_per_seribu.value = formatRupiah(this.value, "");
            });

            var harga_lebih = document.getElementById("edit_harga_lebih");
            harga_lebih.addEventListener("keyup", function(e) {
                harga_lebih.value = formatRupiah(this.value, "");
            });
        });

        $('#form_edit').submit(function(e) {
            e.preventDefault();

            var formData = {
                id: $('#edit_id').val(),
                nama_kertas: $('#edit_nama_kertas').val(),
                gramasi: $('#edit_gramasi').val(),
                kertas_id: $('#edit_kertas_id').val(),
                harga: $('#edit_harga').val().replace(/\./g,''),
                _token: CSRF_TOKEN
            }

            $.ajax({
                url: '{{ URL::route('jasa_cetak.update') }}',
                type: 'POST',
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
            var url = '{{ route("jasa_cetak.delete_btn", ":id") }}';
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
                url: '{{ URL::route('jasa_cetak.delete') }}',
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

