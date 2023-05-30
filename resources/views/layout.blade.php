<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <title>Online Library - @yield('title')</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img alt="Brand" src="{{asset('images/timedoor-academy-pro-logo-black.png')}}" width="150px">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./index.html">Home</a></li>
                    </ul>
                    <form action="{{route('books.index')}}" method="get" class="navbar-form navbar-left">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"
                                        aria-hidden="true"></span></button>
                            </div>
                        </div>
                        <!-- <button type="submit" class="btn btn-default"></button> -->
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>

                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>

                        @endif
                        @endguest

                        @auth

                        <li class="nav-item-dropdown">

                            <a href="#" id="navbarDropdown" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true">
                                {{Auth::user()->name}}
                                <span class="caret"></span>
                            </a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-light">Logout</button>
                            </form>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit()">Logout</a>
                                </li>

                                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>

                        @endauth
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        @yield('content')

        @section('pagination')

        @show

        <div class="panel panel-default">
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="text-center" id="center-content">
                            <img src="{{asset('/images/timedoor-academy-pro-logo-black.png')}}" alt="logo"
                                width="150px" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="text-center">
                            <h4>Timedoor Academy Pro - Online Library</h4>
                            <p>Copyright 2023 &copy; All Right Reserved</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="row" id="center-content">
                            <div class="col-sm-4 col-md-1">
                                <a href="#"><i class="fab fa-lg fa-facebook"></i></a>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <a href="#"><i class="fab fa-lg fa-instagram"></i></a>
                            </div>
                            <div class="col-sm-4 col-md-1">
                                <a href="#"><i class="fab fa-lg fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>