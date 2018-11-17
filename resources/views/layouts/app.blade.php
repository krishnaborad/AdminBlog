<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Home</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="{{url('f-css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('f-css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('f-css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('f-css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('f-css/animate.css')}}">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="{{url('f-css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('style.css')}}">
    <link rel="stylesheet" href="{{url('f-css/responsive.css')}}">
    <script src="{{url('f-js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="" data-target="">

    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <!--Mainmenu-area-->
    <div class="mainmenu-area" data-spy="affix" style="background-color:black;" data-offset-top="100">
        <div class="container">
            <!--Logo-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand logo">
                    <h2>colid</h2>
                </a>
            </div>
            <!--Logo/-->
            <nav class="collapse navbar-collapse" id="primary-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{url ('/')}}">Home</a></li>
                    <li><a href="{{url('timeline')}}">TimeLine</a></li>
                    <li><a href="{{url('universities')}}">Universities</a></li>
                    <li><a href="{{url('products')}}">Products</a></li>
                    <li><a href="#contact-page">Contact</a></li>
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                      <li><a href="{{('admin')}}" style="border:solid;">
                        {{ Auth::user()->name }}</a></li>
                    @endguest
                </ul>
            </nav>
        </div>
    </div>
    <!--Mainmenu-area/-->

<div class="gray-bg section-padding" >
  <div class="row">
        @yield('content')
  </div>

</div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!--Vendor-JS-->
    <script src="{{asset('f-js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('f-js/vendor/bootstrap.min.js')}}"></script>
    <!--Plugin-JS-->
    <script src="{{asset('f-js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('f-js/contact-form.js')}}"></script>
    <script src="{{asset('f-js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset('f-js/scrollUp.min.js')}}"></script>
    <script src="{{asset('f-js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('f-js/wow.min.js')}}"></script>
    <!--Main-active-JS-->
    <script src="{{asset('f-js/main.js')}}"></script>
</body>

</html>
