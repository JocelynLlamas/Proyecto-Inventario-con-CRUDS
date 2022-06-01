@section('title', 'Home')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recicla Bazar</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap');
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #cee6f7;
        }

        a {
            text-decoration: none;
            color: white;
            font-family: 'Montserrat', sans-serif;
        }

        .loginButton {
            background-color: rgba(231, 59, 119, 1);
            border: none;
            border-radius: 50px;
            display: block;
            transition: all .5s ease;
        }

        .loginButton:hover {
            background-color: #cbda7b;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container" style="display: flex; justify-content: center; align-items: center;">
        <div class="row">
            <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid rounded mx-auto d-block" alt="..." style="border-radius: 50%; width:100%; margin-top:10%">
        </div>
    </div>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="display: flex; justify-content: center; align-items: center;">
        @if (Route::has('login'))
        <div>
            @auth
            <button type="button" class="loginButton">
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><h1>Inicio</h1></a>
            </button>
            @else
            <button type="button" class="loginButton">
                <a href="{{ route('login') }}" class="text-sm">
                    <h1>Iniciar Sesión</h1>
                </a>
            </button>

            @if (Route::has('register'))
            <button type="button" class="loginButton" style="margin-left:7%; margin-top:3%">
                <a href="{{ route('register') }}">
                    <h1>Registrarse</h1>
                </a>
            </button>
            @endif
            @endauth
        </div>
        @endif
    </div>
</body>

</html>