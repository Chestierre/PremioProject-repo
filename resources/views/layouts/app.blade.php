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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    
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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav col-6 mx-3">     
                        <li class = "nav-item">
                            <a class="nav-link active" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class = "nav-item">
                            <a class="nav-link active" href="#">About us</a>
                        </li>
                        <li class = "nav-item">
                            <a class="nav-link active" href="#">Contact us</a>
                        </li>
                    </ul>

                    <form action="" class="form-inline d-flex col-6">
                        <select class="form-select form-control w-25" name="search_brand">
                            <option selected>{{ "..."}}</option>
                            <option>{{ "Honda"}}</option>  
                            <option>{{ "Kawasaki" }}</option>
                            <option>{{ "Toyota"}}</option>
                        </select>

                        <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                        <button type="button" class="btn btn-outline-primary my-sm-0">search</button>
                    </form>
{{--                     
                    <div class="input-group w-25 h-25 ml-25">
                        <input type="search" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                    {{Auth::user()->userrole}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        {{ "Account Settings"}} 
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                
            </div>
            
        </nav>
        {{-- <div class = "container">
            <div class = "ml-100"><img src = "img/Desmark logo.jpg" alt="" style ="height: 75px; weight = 75px;"/></div>
            <div class="input-group w-25 h-25 ml-25">
                
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button>
              </div>
        </div> --}}

        <main class="py-4">
            @yield('content')
        </main>


  
    </div>
    <footer class="page-footer font-small bg-white mt-auto">
        <div class="container">  
        </div>
        <div class="footer-copyright text-center py-3">© 2022 Copyright:
            <a href="/"> Premio.com</a>. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
