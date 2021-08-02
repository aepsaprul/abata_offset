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

    <title>{{ config('app.name', 'Offset') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('lib/fontawesome-5/css/all.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('lib/bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">OFFSET</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item {{ (request()->is('home*')) ? 'active' : '' }}">
                        <a class="nav-link text-uppercase" aria-current="page" href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item text-uppercase" href="{{ url('bahan') }}">Bahan</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('biaya_cetak') }}">Biaya Cetak</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('biaya_finishing') }}">Biaya Finishing</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('finishing') }}">Finishing</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('finishing_produk') }}">Finishing Produk</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('jenis_kertas') }}">Jenis Kertas</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('kertas') }}">Kertas</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('kertas_produk') }}">Kertas Produk</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('master_mesin') }}">Mesin</a></li>
                          <li><a class="dropdown-item text-uppercase" href="{{ url('produk') }}">Produk</a></li>
                        </ul>
                      </li>
                    <li class="nav-item {{ (request()->is('transaksi*')) ? 'active' : '' }}">
                        <a class="nav-link text-uppercase" href="{{ url('transaksi') }}">Transaksi</a>
                    </li>
                    <li class="nav-item {{ (request()->is('laporan*')) ? 'active' : '' }}">
                        <a class="nav-link text-uppercase" href="{{ url('laporan') }}">Laporan</a>
                    </li>
                    <li class="nav-item {{ (request()->is('pelanggan*')) ? 'active' : '' }}">
                        <a class="nav-link text-uppercase" href="{{ url('pelanggan') }}">Pelanggan</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('lib/bootstrap-5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('lib/fontawesome-5/js/fontawesome.min.js') }}"></script>

    @yield('script')
</body>
</html>
@endguest
