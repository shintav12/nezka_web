<!DOCTYPE html>
<html lang="es-PE">

<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nezka Studio</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="shortcut icon" href="http://18.222.199.10/nezka_web/public/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/owl/assets/owl.carousel.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/owl/assets/owl.theme.default.css')}}" />
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
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#quien_eres">¿Quién eres?</a></li>
                    <li><a href="#portafolio">Portafolio</a></li>
                    <li><a href="#noticias">Noticias</a></li>
                    <li><a href="#clientes">Clientes</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </div>
        </nav>
        <div class="home-wrapper">
            <div id="slider" class="owl-carousel owl-theme">
                @foreach($sliders as $slider)
                    <div class="">
                        <img src="{{$slider->image}}" >
                        <div class="home-wrapper">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-10 col-xs-12 col-xs-offset-1">
                                        <div class="home-content button_slider">
                                            <h1 class="white-text" style="letter-spacing: 5px;font-size:60px;margin:0px">{{$slider->title}}</h1>
                                            <p class="white-text" style="font-size:25px">{{$slider->subtitle}}</p>
                                            <a class="outline-btn" href="#portafolio"  style="color:white!important; border-color: white!important; font-weight: bolder;font-size: 15px">Nuestros proyectos</a>
                                            <a class="white-btn" href="#quien_eres" style="font-weight: bolder; font-size: 15px" >¿Quién eres?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </header>
    @yield('content')
    <footer id="footer" class="sm-padding bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12" style="padding-right: 0px">
                    <div class="col-md-6 col-xs-12" style="padding-left: 0px">
                        <div>
                            <span class="footer-logo">
                            <a href="index.html"><img src="img/logo_alt_footer.png" alt="logo" style="margin-bottom:-20px;"></a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="padding-right: 0px">
                        <div class="footer-title col-md-12" style="text-align: right;padding-right: 0px">Síguenos aquí</div>
                        <div class="col-md-12">
                            <ul class="footer-follow" style="text-align: right!important;padding-right: 0px">
                                @foreach($social_medias as $social_media)
                                    <li style="margin-right: -10px;"><a target="_blank" style="background-color: #61666d; font-size: 0.7em" href="{{$social_media->url}}"><i class="fa fa-{{$social_media->name}} "></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="padding: 0px">
                <div class="row">
                    <div class="col-md-12 col-xs-12" style="padding: 0px">
                        <div class="col-md-4">
                            <div class="row col-xs-12">
                                <div class="col-md-12 col-xs-12" style="padding: 0px">
                                    <div class="footer-title">estudio digital</div>
                                    <ul class="">
                                        <li><i class="fa fa-whatsapp"></i><a target="_blank" style="color:#868F9B" href="https://api.whatsapp.com/send?phone=51932119264"> (+51) 932 119 264 </a></li>
                                        <li><i class="fa fa-whatsapp"></i><a target="_blank" style="color:#868F9B" href="https://api.whatsapp.com/send?phone=51986652816"> (+51) 986 652 816 </a></li>
                                        <li><i class="fa fa-envelope"></i> nezkastudio@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xs-12" style="padding-right: 0px; padding-top: 25px">
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Portafolio</span></div>
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Cotizar</span></div>
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Quien Eres?</span></div>
                                    <div class="col-md-6 white-text" style="padding-left: 0px;padding-right: 5px; padding-bottom: 10px"><span style="font-weight: bolder; font-size: large">Servicios</span></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="footer-title">
                                    <span>nuestros aliados</span>
                                </div>
                                <a href="https://www.facebook.com/MORPHaudiovisual/" target="_blank">
                                    <img  src="{{asset("img/morph.png")}}" alt="logo"  width="50%">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4"  style="border-left-color: black; border-left-width: 2px;">
                            <span>En Nezka Studio tenemos como objetivo transmitir los mensajes visuales y audiovisuales de manera directa por diferentes medios</span>
                            </br>
                            </br>
                            <span>Teniendo como base: La comunicación es la clave para una buena gestión.</span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="container-fluid">
                    <div class="footer-copyright" style="margin-top: 25px; margin-bottom: -35px">
                        <p>© 2018 Copyright Nezka Studio.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="back-to-top"></div>
    <div id="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>


    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/owl/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script src="{{asset("assets/jquery-validation/js/jquery.validate.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/jquery-validation/js/additional-methods.js")}}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#slider').owlCarousel({
            items:1,
            lazyLoad:true,
            loop:true,
            margin:0,
            autoHeight: false,
            responsiveClass:true,
            autoWidth: false,
            autoHeightClass: 'owl-height',
            autoplay:true,
            dots: false,
            nav:false,
            smartSpeed :900
        });
    </script>
    @yield('scripts')

</body>

</html>
