<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('lib/images/logo-daun.png') }}" rel="icon" type="image/x-icon">
<title>Abata</title>

<!-- Bootstrap -->
<link href="{{ asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('theme/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- NProgress -->
<link href="{{ asset('theme/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{ asset('theme/build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content p-4 bg-white shadow-sm border rounded">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1>Login</h1>
                        <div>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" required="" />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="checkbox text-left">
                            <label>
                                <input type="checkbox" class="flat" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Tetap Masuk') }}
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block submit">Log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><img src="{{ asset('img/maskot.png') }}" alt="Logo Biru Abata" style="max-width: 80px;"> Wahana Satria</h1>
                                <p>©2021 All Rights Reserved. Abata Group</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

	<!-- jQuery -->
	<script src="{{ asset('theme/vendors/jquery/dist/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('theme/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('theme/vendors/fastclick/lib/fastclick.js') }}"></script>
	<!-- NProgress -->
	<script src="{{ asset('theme/vendors/nprogress/nprogress.js') }}"></script>
	<!-- bootstrap-progressbar -->
	<script src="{{ asset('theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
</body>
</html>
