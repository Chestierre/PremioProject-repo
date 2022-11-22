<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ "Premio" }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="{{ url('img/Desmark logo.jpg') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class = "bg-primary d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href= "{{ url('/') }}">
                    <div class = ><img src = "img/Desmark logo.jpg" alt="" style ="height: 75px; weight = 75px;"></div>
                </a>

                
            </div>
        </nav>
        <main class = "py-4">
            @yield('content')
        </main> 
    <div>
    <footer class="page-footer font-small bg-white mt-auto">
        <div class="container">  
        </div>
        <div class="footer-copyright text-center py-3">© 2022 Copyright:
            <a href="/"> Premio.com</a>. All Rights Reserved.
        </div>
    </footer>
</body>