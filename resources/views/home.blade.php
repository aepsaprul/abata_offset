@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-warning">
            <ul class="list-group list-produks">

            </ul>
        </div>
        <div class="col-md-10 bg-primary">
            <div class="row">
                <h3 class="text-center">Formulir</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        produks();

        function produks() {
            $.ajax({
                url: '{{ URL::route('home.produk') }}',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN
                },
                success: function (response) {
                    $.each(response.data, function (index, value) {
                        var dataProduk = "<li class=\"list-group-item\">" + value.nama_produk + "</li>";
                        $('.list-produks').append(dataProduk);
                    });
                }
            });
        }
    });
</script>
@endsection
