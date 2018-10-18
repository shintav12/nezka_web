<!DOCTYPE html>
<html lang="es-PE">

<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nezka Studio</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

    <link type="text/css" rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />

    <link rel="shortcut icon" href="http://18.222.199.10/nezka_web/public/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />

    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <style>
        .button_slider {
            z-index: 99999999;
        }
        img {
            margin: 0px!important;
        }
        .exit-button {
            color: #61666d;
            font-weight: bold;
            font-size: 1.8em;
        }
        #nav{
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px; 
            border-bottom: 4mm ridge rgb(0,255,221,.6);
        }
    </style>

    @yield('styles')
</head>

<body>
    <header id="home" style="height: 100%;">
        <nav id="nav" class="navbar">
            <div class="container">
                <div class="navbar-header" style="padding-left: 5px;">
                    <div class="navbar-brand">
                        <a href="{{url('/')}}">
                            <img class="logo" src="{{asset('img/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <div class="nav-collapse">
                        <span></span>
                    </div>
                </div>
                <div class="main-nav nav navbar-nav navbar-right">
                    <a href="{{url('/')}}"><span class="exit-button">X</span></a>
                </div>
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
                            <a href="index.html"><img src="{{asset('img/logo-alt.png')}}" alt="logo" style="margin-bottom:-20px;">
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
                            <span>Teniendo como base: La comunicación es la clave para una buena gestión.</span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="container">
                    <div class="footer-copyright">
                        <p>© 2018 Copyright by Nezka Studio.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="back-to-top"></div>
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/owl/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    @yield('scripts')

</body>

</html>
