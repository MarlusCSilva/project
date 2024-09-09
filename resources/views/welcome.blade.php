<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="background-image"></div> 

    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="text-center mb-4">
            <img src="../img/logo-eventflow.png" alt="Logo">
            <h1 class="display-1">Bem-vindo ao EventFlow</h1>
            <p class="lead">O seu site de eventos</p>
        </div>

        @if (Route::has('login'))
            <div class="login-register-buttons">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-success text-white btn-lg">Home</a> 
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
