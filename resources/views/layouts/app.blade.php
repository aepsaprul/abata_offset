@guest

@yield('content')

@else

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/maskot.png') }}">

    <title>{{ config('app.name', 'Offset') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('theme/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- PNotify -->
    <link href="{{ asset('theme/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('theme/build/css/custom.min.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><img src="{{ asset('img/maskot.png') }}" alt="" style="max-width: 30px;"> <span>Wahana Satria</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="http://localhost/abata_ho/storage/app/public/{{ Auth::user()->karyawan->foto }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li>
                                    <a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-database"></i> Master <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('finishing') }}">Finishing</a></li>
                                        <li><a href="{{ url('jenis_kertas') }}">Kertas</a></li>
                                        <li><a href="{{ url('mesin') }}">Mesin</a></li>
                                        <li><a href="{{ url('produk') }}">Produk</a></li>
                                        <li><a href="{{ url('jasa_cetak') }}">Jasa Cetak</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-archive"></i> Produk <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        @foreach ($produks as $item)
                                            <li><a href="{{ route('home.produk', ['kode_produk' => $item->kode_produk]) }}">{{ $item->nama_produk }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                {{-- <li>
                                    <a href="{{ url('transaksi') }}"><i class="fa fa-exchange"></i> Transaksi</a>
                                </li>
                                <li>
                                    <a href="{{ url('laporan') }}"><i class="fa fa-copy"></i> Laporan</a>
                                </li>
                                <li>
                                    <a href="{{ url('pelanggan') }}"><i class="fa fa-users"></i> Pelanggan</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a
                                    href="javascript:;"
                                    class="user-profile dropdown-toggle"
                                    aria-haspopup="true"
                                    id="navbarDropdown"
                                    data-toggle="dropdown"
                                    aria-expanded="false">
                                        <img
                                            src="http://localhost/abata_ho/storage/app/public/{{ Auth::user()->karyawan->foto }}"
                                            alt="">
                                                {{ Auth::user()->name }}
                                </a>
                                <div
                                    class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i>
                                                Log Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            @yield('content')

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('theme/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('theme/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- PNotify -->
    <script src="{{ asset('theme/vendors/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset('theme/vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('theme/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('theme/build/js/custom.min.js') }}"></script>

    @yield('script')

    <script>
        function format_rupiah(bilangan) {
            var	number_string = bilangan.toString(),
                split	= number_string.split(','),
                sisa 	= split[0].length % 3,
                rupiah 	= split[0].substr(0, sisa),
                ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            return rupiah;
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
        }
    </script>
</body>
</html>
@endguest
