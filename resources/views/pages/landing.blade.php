@extends('layout')

@section('styles')
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://codepen.io/pramodkumarboda/pen/XdgxmQ.css">
    <style>
        .client_single img{
            width: 100%;
            display: block;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
            transition: 0.3s filter, 0.3s opacity;
            opacity: 0.5;
        }
        .client_single:hover img{
            -webkit-filter: grayscale(0%);
            filter: grayscale(0%);
            opacity: 1;
            transition: 0.3s filter, 0.3s opacity;
        }
        .client_single {
            display: inline-block;
            vertical-align: top;
            cursor: pointer;
            transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -webkit-transform: translateZ(0);
        }

        .services_img {
            width: 150px !important;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        /* PORTAFOLIO FILTRO */
        /*a:focus {
        outline: none;
        }*/

        .portfolioFilter {
        padding: 15px 0;
        }

        .portfolioFilter a {
        margin-right: 6px;
        color: #666;
        text-decoration: none;
        border: 1px solid #ccc;
        padding: 4px 15px;
        border-radius: 50px;
        display: inline-block;
        }

        .portfolioFilter a.current {
        background: #00FFDD;
        border: 1px solid #1e1e1e;
        color: black;
        }
        .portfolioContainer{
        border: 1px solid #eee;
        border-radius: 3px;
        }
        /*img {
        margin: 5px;
        max-width:100%;
        }*/

        .isotope-item {
        z-index: 2;
        }

        .isotope-hidden.isotope-item {
        pointer-events: none;
        z-index: 1;
        }

        .isotope,
        .isotope .isotope-item {
        /* change duration value to whatever you like */
        -webkit-transition-duration: 0.8s;
        -moz-transition-duration: 0.8s;
        transition-duration: 0.8s;
        }

        .isotope {
        -webkit-transition-property: height, width;
        -moz-transition-property: height, width;
        transition-property: height, width;
        }

        .isotope .isotope-item {
        -webkit-transition-property: -webkit-transform, opacity;
        -moz-transition-property: -moz-transform, opacity;
        transition-property: transform, opacity;
        }

        /* FORMULARIO DE CONTACTO*/
        .styled-select {
        background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
        height: 40px;
        overflow: hidden;
        width: 100%;
        border: 3px solid #868F9B;
        }

        .styled-select select {
        background: transparent;
        border: 1px solid grey;
        font-size: 14px;
        height: 33px;
        padding: 10px; /* If you add too much padding here, the options won't show in IE */
        width: 100%;
        }
        /* -------------------- Rounded Corners */
        .rounded {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        } 
    </style>
@endsection

@section('scripts')
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
    <script class="text/javascript">
        $("#contact-form").validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                name: "required",
                company: "required",
                email: "required",
                phone: "required",
                company_type: "required",
                message: "required"
            },
            messages: {
                name: "Campo requerido",
                company: "Campo requerido",
                email: "Campo requerido",
                phone: "Campo requerido",
                company_type: "Campo Requerido",
                message: "message"
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('/contact_us/save') }}",
                    data: new FormData($("#contact-form")[0]),
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                    },
                    success: function (data) {
                        
                    }
                });
            }
        });

        $('#services').owlCarousel({
            items:3,
            lazyLoad:true,
            loop:true,
            margin:30,
            autoHeight: false,
            autoWidth: false,
            autoHeightClass: 'owl-height',
            autoplay:true,
            dots: true,
            nav: false
        });
        $('#clients').owlCarousel({
            items:5,
            lazyLoad:true,
            loop:true,
            margin:20,
            autoHeight: false,
            autoWidth: false,
            autoHeightClass: 'owl-height',
            autoplay:true,
            dots: true,
            nav: false
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://isotope.metafizzy.co/v1/jquery.isotope.min.js"></script>
    <script class="text/javascript">
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
             
                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');
             
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                     });
                     return false;
                }); 
            });
    </script>
@endsection

@section('content')
<div id="servicios" class="section md-padding">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">Nuestros Servicios<span class="punto">.</span> </h2>
            </div>
            <div class="col-md-12">
                <div id="services" class="owl-carousel owl-theme">
                    @foreach($services as $service)
                        <div class="">
                            <div class="servicios">
                                <div style="text-align: center; padding-bottom: 25px">
                                    <img class="services_img center" src="{{$service->image}}">
                                </div>

                                <h3>{{$service->name}}</h3>
                                <p>{{$service->description}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div id="quien_eres" class="section nd padding">
	<div class="container-fluid" style="background:#00FFDD; padding: 15px 0px 50px 0px">
		<div class="container">
            <div class="row">
                <div class="section-header text-center" style="padding-top: 50px">
                    <h2 class="title">¿Quién eres?<span class="punto">.</span> </h2>
                </div>
                @for($i = 0; $i < count($client_types); $i++)
                    <?php if($i == 1){ ?>
                        <div class="col-md-4" style="border-right: 2px solid #333; border-left: 2px solid #333">
                    <?php }else{?>
                        <div class="col-md-4">
                    <?php }?>
                        <div class="quien_eres">
                            <div style="text-align: center; padding-bottom: 25px">
                                <img class="services_img center" src="{{$client_types[$i]->image}}">
                            </div>
                            <h3>{{strtoupper($client_types[$i]->name)}}</h3>
                        </div>
                    </div>
                @endfor
            </div>
	    </div>
	</div>
</div>
<div id="portafolio" class="section md-padding bg-grey">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">portafolio de proyectos<span class="punto">.</span> </h2>
            </div>
            <div class="col-lg-12">
                <div class="portfolioFilter clearfix text-center">
                    <a href="#" data-filter="*" class="current">All Categories</a>
                    <a href="#" data-filter=".webTemplates">Web Templates</a>
                    <a href="#" data-filter=".logos">Logos</a>
                    <a href="#" data-filter=".drawings">Drawings</a>
                    <a href="#" data-filter=".ui">UI Elements</a>
                </div>
            </div>
            <div class="portfolioContainer">
                <div class="col-md-4 col-xs-6 work webTemplates objects">
                    <img class="img-responsive" src="./img/work1.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span>Category</span>
                        <h3>Lorem ipsum dolor</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work1.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 work logos">
                    <img class="img-responsive" src="./img/work2.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span>Category</span>
                        <h3>Lorem ipsum dolor</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work2.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="./img/work3.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span>Category</span>
                        <h3>Lorem ipsum dolor</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work3.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="./img/work4.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span>Category</span>
                        <h3>Lorem ipsum dolor</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work4.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="./img/work5.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span>Category</span>
                        <h3>Lorem ipsum dolor</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work5.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="./img/work6.jpg" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <span>Category</span>
                        <h3>Lorem ipsum dolor</h3>
                        <div class="work-link">
                            <a href="#"><i class="fa fa-external-link"></i></a>
                            <a class="lightbox" href="./img/work6.jpg"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="team" class="section md-padding">
    <div class="container-fluid" style="background: #333; padding: 175px 0px; margin:0">
        <div class="row">
			<div style="color: #fff; letter-spacing: 8px; text-transform: uppercase; font-weight: bold; font-size: 35px; margin-bottom: 10px;" class="text-center">
				¿sabías que?
			</div>
			<div class="text-center">
					<a  href="text-center" style="color:#fff; text-transform:uppercase; letter-spacing: 8px; font-size: 17px; border-bottom: 1px solid #fff ">ver video</a>
			</div>
        </div>
    </div>
</div>
{{--<div id="blog" class="section md-padding bg-grey">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="section-header text-center">--}}
                {{--<h2 class="title">ultimas noticias de nuestro blog<span class="punto">.</span> </h2>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="blog">--}}
                    {{--<div class="blog-img">--}}
                        {{--<img class="img-responsive" src="./img/blog1.jpg" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="blog-content">--}}
                        {{--<h3 class="thumbnail-blog__title">TÍTULO NOTICIA</h3>--}}
                        {{--<ul class="blog-meta">--}}
                            {{--<li>Nezka Studio</li>--}}
                            {{--<li>13 May 2018</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="blog">--}}
                    {{--<div class="blog-img">--}}
                        {{--<img class="img-responsive" src="./img/blog2.jpg" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="blog-content">--}}
                        {{--<h3 class="thumbnail-blog__title">TÍTULO NOTICIA</h3>--}}
                        {{--<ul class="blog-meta">--}}
                            {{--<li>Nezka Studio</li>--}}
                            {{--<li>13 May 2018</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="blog">--}}
                    {{--<div class="blog-img">--}}
                        {{--<img class="img-responsive" src="./img/blog3.jpg" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="blog-content">--}}
                        {{--<h3 class="thumbnail-blog__title">TÍTULO NOTICIA</h3>--}}
                        {{--<ul class="blog-meta">--}}
                            {{--<li>Nezka Studio</li>--}}
                            {{--<li>13 May 2018</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row text-right">--}}

            {{--<a class="link" href="#">ver más ></a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div id ="clientes" class="container" style="padding:25px 30px 100px;">
    <div class="row">
        <div class="col-md-12" style="text-align: center; padding-top: 25px; padding-bottom: 45px;">
            <div class="section-header text-center">
                <h2 class="title">Nuestros Clientes</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div id="clients" class="owl-carousel owl-theme">
                @foreach($clients as $client)
                    <div class="client_single">
                        <div class="servicios">
                            <div style="text-align: center;" href="{{url('projects')}}/{{$client->slug}}">
                                <img class="services_img center" src="{{$client->image}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="contacto" class="section md-padding">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">¿CÓMO TE PODEMOS AYUDAR?<span class="punto">.</span></h2>
            </div>
            <div class="col-md-12">
                <form id="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nombre</label><br>
                            <input type="text" name="name" class="input">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Correo</label><br>
                            <input type="email" name="email" class="input">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="company">Empresa</label><br>
                            <input type="text" name="company" class="input">

                        </div>
                        <div class="col-md-4">
                            <label for="phone">teléfono</label><br>
                            <input type="tel" name="phone" class="input">
                        </div>
                        <div class="col-md-4" >
                            <label for="company_type">¿Quién eres?</label><br>
                            <select class="input styled-select rounded" name="company_type" >
                                <option value=" ">Escoge una opción</option>
                                <option value="1">Nuevo Emprendedor</option>
                                <option value="2">Representante de Marca</option>
                                <option value="3">Due&ntilde;o de Negocio</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Asunto</label> <br>
                            <textarea class="input" name="message" rows="30"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12" style="text-align: center; padding-top: 30px">
                        <button class="main-btn">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

>>>>>>> 57d1f7c85c8451809d61e08f252742012efeed58
@endsection

