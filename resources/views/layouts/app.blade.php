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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav col-6 mx-3">     
                        <li class = "nav-item">
                            <a class="nav-link active" href="{{ url('/') }}">Home</a>
                        </li>


                        <li class = "nav-item">
                            <a class="nav-link active" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                
                                @foreach ($brand as $brand)
                                <a class="dropdown-item" href="#">{{ $brand->brandname }}</a>                                
                                @endforeach
                            </div>
                        </li>
                        <li class = "nav-item">
                            <a class="nav-link active" href="/contact-us">Contact us</a>
                        </li>
                        <li class = "nav-item">
                            <a class="nav-link active" href="/about-us">About us</a>
                        </li>
                    </ul>

                    <form action="" class="form-inline d-flex col-4">
                        {{-- <select class="form-select form-control w-25" name="search_brand">
                            <option selected>{{ "..."}}</option>
                        </select> --}}

                        <input type="text" type="search" name="search_name" class="form-control rounded mr-sm-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                        <button type="button" class="btn btn-outline-primary my-sm-0">search</button>
                    </form>
                    <ul class="navbar-nav ms-auto ">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} ||
                                    {{Auth::user()->userrole}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href={{route("customer.AccountSetting")}}>
                                        {{ "Account Settings"}} 
                                    </a>
                                    <a class="dropdown-item" href={{route("customer.CustomerViewDetails")}}>
                                        {{ "Customer Details"}} 
                                    </a>
                                    <a class="dropdown-item" href={{route("customer.Orderdetails")}}>
                                        {{ "Order Information"}} 
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
        <main class = "py-4">
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

@yield('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

