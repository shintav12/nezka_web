<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Nezka Studio</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link rel="shortcut icon" href="http://18.222.199.10/nezka_web/public/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="http://18.222.199.10/nezka_web/public/favicon.ico" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <style>
        .button_slider {
            z-index: 99999999;
        }
        img {
            margin: 0px!important;
        }
    </style>

    @yield('styles')
</head>

<body>
    <header id="home">
        <div class="bg-img">
            <div id="slider" class="owl-carousel owl-theme bg-img">
                @foreach($sliders as $slider)
                    <div class="">
                        <img src="{{$slider->image}}" >
                        <div class="home-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="home-content button_slider">
                                            <h1 class="white-text" style="letter-spacing: 7px;">{{$slider->title}}</h1>
                                            <p class="white-text" style="font-size:30px">{{$slider->subtitle}}</p>
                                            <button class="outline-btn">Nuestros proyectos</button>
                                            <button class="white-btn">¿Quién eres?</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <nav id="nav" class="navbar nav-transparent">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a href="{{url('/')}}">
                            <img class="logo" src="img/logo.png" alt="logo">
                            <img class="logo-alt" src="img/logo-alt.png" alt="logo">
                        </a>
                    </div>
                    <div class="nav-collapse">
                        <span></span>
                    </div>
                </div>
                <ul class="main-nav nav navbar-nav navbar-right">
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#quien_eres">¿Quién eres?</a></li>
                    <li><a href="#portafolio">Portafolio</a></li>
                    <li><a href="#clientes">Clientes</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <!--li><a href="#blog">Nuestro Blog</a></li-->
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer id="footer" class="sm-padding bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div>
                            <span class="footer-logo">
                            <a href="index.html"><img src="img/logo-alt.png" alt="logo" style="margin-bottom:-20px;">
                                <br><span style="color:#fff;margin-top:-10px">Studio</span></a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-title col-md-12" style="text-align: right">Síguenos aquí</div>
                        <div class="col-md-12">
                            <ul class="footer-follow" style="text-align: right!important;">
                                @foreach($social_medias as $social_media)
                                    <li><a target="_blank" style="background-color: #61666d" href="{{$social_media->url}}"><i class="fa fa-{{$social_media->name}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="padding: 0px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="footer-title">estudio digital</div>
                                    <ul class="">
                                        <li><i class="fa fa-phone"></i> (+51) 982 087 547 <span style="color:#00FFDD">|</span> 986 352
                                            816</li>
                                        <li><i class="fa fa-envelope"></i> nezkastudio@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="padding-right: 0px; padding-top: 25px">
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Portafolio</span></div>
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Cotizar</span></div>
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Quien Eres?</span></div>
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Servicios</span></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="footer-title">nuestros aliados</div>
                            <a href="https://www.facebook.com/MORPHaudiovisual/" target="_blank">
                                <img  src="{{asset("img/morph.png")}}" alt="logo"  width="50%">
                            </a>
                        </div>
                        <div class="col-md-4"  style="border-left-color: black; border-left-width: 2px;">
                            <span>En Nezka Studio tenemos como objetivo transmitir los mensajes visuales y audiovisuales de manera directa por diferentes medios</span>
                            </br>
                            </br>
                            <span>Teniendo como base: La comunicación es la clava para una buena gestión.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
            <br>
            <div class="row">
                <div class="container">

                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        <p>© 2018 Copyright by Nezka Studio.</p>
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>

        </div>
        <!-- /Container -->

    </footer>
    <!-- /Footer -->

    <!-- Back to top -->
    <div id="back-to-top"></div>
    <!-- /Back to top -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- /Preloader -->
    <!-- jQuery Plugins -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="{{asset("assets/jquery-validation/js/jquery.validate.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/jquery-validation/js/additional-methods.js")}}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#slider').owlCarousel({
            items:1,
            lazyLoad:true,
            loop:true,
            margin:0,
            autoHeight: false,
            autoWidth: false,
            autoHeightClass: 'owl-height',
            autoplay:true,
            dots: false,
        });
    </script>
    @yield('scripts')

</body>

</html>
