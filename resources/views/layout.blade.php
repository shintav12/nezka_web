<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
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
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    @yield('head')
</head>

<body>
    <!-- Header -->
    <header id="home">
        <!-- Background Image -->
        <div class="bg-img" style="background-image: url('./img/background4.jpg');">
            <!--image source: https://www.pexels.com/photo/adult-business-computer-contemporary-380769/ -->
            <div class="overlay"></div>
        </div>
        <!-- /Background Image -->

        <!-- Nav -->
        <nav id="nav" class="navbar nav-transparent">
            <div class="container">

                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="navbar-brand">
                        <a href="index.html">
                            <img class="logo" src="img/logo.png" alt="logo">
                            <img class="logo-alt" src="img/logo-alt.png" alt="logo">
                            <!--div style="max-height: 50px;" class="logo">
                                <span style="color:#fff; font-weight:bold; font-size: 2.5em">Nez</span><span style="color: #00FFDD;font-weight:bold; font-size: 2.5em">ka</span>
                            </div-->
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Collapse nav button -->
                    <div class="nav-collapse">
                        <span></span>
                    </div>
                    <!-- /Collapse nav button -->
                </div>

                <!--  Main navigation  -->
                <ul class="main-nav nav navbar-nav navbar-right">
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#quien_eres">¿Quién eres?</a></li>
                    <li><a href="#portafolio">Portafolio</a></li>
                    <li><a href="#clientes">Clientes</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="#blog">Nuestro Blog</a></li>
                </ul>
                <!-- /Main navigation -->

            </div>
        </nav>
        <!-- /Nav -->

        <!-- home wrapper -->
        <div class="home-wrapper">
            <div class="container">
                <div class="row">

                    <!-- home content -->
                    <div class="col-md-10 col-md-offset-1">
                        <div class="home-content">
                            <h1 class="white-text" style="letter-spacing: 7px;">CONEXIÓN & USUARIOS</h1>
                            <p class="white-text" style="font-size:30px">Creamos un vínculo más cercano entre la marca
                                y usuarios</p>
                            <button class=" outline-btn">Nuestros proyectos</button>
                            <button class="white-btn">¿Quién eres?</button>
                        </div>
                    </div>
                    <!-- /home content -->

                </div>
            </div>
        </div>
        <!-- /home wrapper -->

    </header>
    <!-- /Header -->


    @yield('content')





    <!-- Footer -->
    <footer id="footer" class="sm-padding bg-dark">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <div class="col-md-1 ">

                    <!-- footer logo -->
                    <div class=>
                        <span class="footer-logo">
                        <a href="index.html"><img src="img/logo-alt.png" alt="logo" style="margin-bottom:-20px;">
                            <br><span style="color:#fff;margin-top:-10px">Studio</span></a>
                        </span>
                    </div>
                    <!-- /footer logo -->

                </div>

                <div class="col-md-6 col-md-offset-4">
                    <div class="footer-title">Síguenos aquí</div>
                    <ul class="footer-follow">
                        <li><i class="fa fa-facebook"></i></a></li>
                        <li><i class="fa fa-twitter"></i></a></li>
                        <li><i class="fa fa-flickr"></i></a></li>
                        <li><i class="fa fa-linkedin"></i></a></li>
                        <li><i class="fa fa-vimeo"></i></a></li>
                    </ul>


                </div>

            </div>



            <!-- Row -->
            <div class="row">

                <div class="container">
                        <div class="col-md-4">
        
                                <div class="footer-title">estudio digital</div>
        
                            <!-- footer follow -->
                            <ul class="">
                                <li><i class="fa fa-phone"></i> (+51) 982 087 547 <span style="color:#00FFDD">|</span> 986 352
                                    816</li>
                                <li><i class="fa fa-envelope"></i> nezkastudio@gmail.com</li>
                            </ul>
                            <!-- /footer follow -->
                        </div>
        
                        <div class="col-md-4">
        
                                <div class="footer-title">nuestros aliados</div>
                            <img src="https://i0.wp.com/www.themonitordaily.com/wp-content/uploads/2015/11/Morph-and-Designer-for-PowerPoint-2016.png?resize=1024%2C328&ssl=1" alt="logo" style="margin-bottom:-20px;" width="70%">
                            
                        </div>

                </div>

            </div>
            <!-- /Row -->
            <br>
            <div class="row">
                <div class="container">

                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        <p>© 2021 Copyright Nezka Studio. designed by Ex Calcetin con RombosMan y Wizardcool93</p>
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
    @yield('scripts')
</body>

</html>
