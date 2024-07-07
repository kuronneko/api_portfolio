<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/img/logo.png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PortfolioGestor9000</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
            body::after {
                content: "";
                background-image: url(../img/toja.png);
                background-repeat: no-repeat;
                background-position: center bottom -150px;
                opacity: 0.3;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                position: fixed;
                z-index: -1;
            }
    </style>
</head>

<body class="bg-dark">
    <div class="container mt-5 mb-3 py-4" id="app">

    </div>
    <footer class="fixed-bottom bg-dark text-center text-white">This website is powered by <a
            class="text-success text-decoration-none" href="https://cyberpunkwaifus.xyz" target="_black">CBPW Technologies.</a>
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>
