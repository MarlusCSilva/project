<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Personalizações adicionais */
        body {
            background-color: #212529; /* Fundo azul escuro */
            color: #ffffff; /* Texto branco */
        }
        .background-image {
            position: fixed; /* Imagem de fundo */
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1; /* Mantém a imagem atrás do conteúdo */
            opacity: 0.5; /* Transparência da imagem de fundo */
            background: url('logo-eventflow.png') no-repeat center center fixed;
            background-size: cover;
        }
        .login-register-buttons a {
            width: 150px; /* Largura fixa para os botões */
            margin: 10px; /* Espaçamento entre botões */
        }
    </style>
</head>
<body>
    <div class="background-image"></div> <!-- Imagem de fundo -->

    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="text-center mb-4">
            <img src="../img/logo-eventflow.png" alt="Logo"> <!-- Inclui a logo -->
            <h1 class="display-1">Bem-vindo ao EventFlow</h1>
            <p class="lead">O seu site de eventos</p>
        </div>

        <!-- Botões Login e Register abaixo do texto de boas-vindas com Bootstrap estilização -->
        @if (Route::has('login'))
            <div class="login-register-buttons">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-success text-white btn-lg">Home</a> <!-- Botão Home para usuários autenticados -->
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
