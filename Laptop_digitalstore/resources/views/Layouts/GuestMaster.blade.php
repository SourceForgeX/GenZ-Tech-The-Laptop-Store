<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>pcoint</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('Guest/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('Guest/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('Guest/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('Guest/images/fevicon.png" type="image/gif')}}" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('Guest/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{asset('Guest/images/loading.gif')}}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="head_top">
            <div class="header" style="background-color: #2c363d;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="#">
                                            <h2 style="color:green;">Laptop digtal</h2>
                                            <!-- <img src="{{asset('Guest/images/logo.png')}}"
                                                alt="#" /> -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('GuestHome')}}"> Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('customerreg')}}">Registration</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#contact"></a>
                                        </li>
                                    </ul>
                                    <div class="sign_btn"><a href="{{route('customerlogin')}}">Sign in</a></div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->

    </header>
    <!-- end banner -->
    <!-- about -->





    @yield('content')







    <!-- end testimonial -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cont">
                            <h3> <strong class="multi"> Your next great deal is waiting . . . log in now ! ! ! ! !
                                    !</strong>

                            </h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cont_call">
                            <h3> <strong class="multi"> </strong>

                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p> <a href="{{route('adminlogin')}}">Admin Login</a></p>

                            <p>© 2024 All Rights Reserved. Design by <a href=""> Alvin Antony
                                </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{asset('Guest/js/jquery.min.js')}}"></script>
    <script src="{{asset('Guest/js/popper.min.js')}}"></script>
    <script src="{{asset('Guest/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Guest/js/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset('Guest/js/plugin.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('Guest/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('Guest/js/custom.js')}}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>