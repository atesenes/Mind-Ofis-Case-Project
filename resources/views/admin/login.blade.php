<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Login</title>
    <!-- CSS files -->
    <link href="{{ asset('adminas/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminas/css/demo.min.css') }}" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        @if(Session::has('basarimesaji'))
            <div class="alert alert-success">
                {{ Session::get('basarimesaji') }}
            </div>
        @endif
        @if(Session::has('hatamesaji'))
            <div class="alert alert-danger">
                {{ Session::get('hatamesaji') }}
            </div>
        @endif
        <form class="card card-md" action="{{route('adminGirisYap')}}" method="post" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Giriş Yap</h2>
                <div class="mb-3">
                    <label class="form-label">Email Adresi</label>
                    <input type="email" class="form-control" name="email" placeholder="Email Adresi">
                </div>
                <div class="mb-2">
                    <label class="form-label">Şifreniz</label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" placeholder="Şifreniz" name="password" autocomplete="off">
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="{{asset('adminas/js/tabler.min.js')}}"></script>
<script src="{{asset('adminas/js/demo.min.js')}}"></script>
</body>

</html>
