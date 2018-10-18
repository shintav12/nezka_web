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
            width: 75px !important;
        }

        .client_img {
            width: 250px !important;
        }

        .center {
            display: block;
            margin-left: auto !important;
            margin-right: auto !important;
            width: 50%;
        }

        .portfolioFilter {
        padding: 15px 0;
        }

        .portfolioFilter a {
        margin-right: 6px;
        color: #666;
        text-decoration: none;
        border: 0px solid #fff;
        padding: 4px 15px;
        border-radius: 50px;
        display: inline-block;
        }

        .portfolioFilter a.current {
        border: 1px solid #1e1e1e;
        color: #fff;
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

        .title_color{
            color: #4d4d4d;
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 20px;
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

        .grow { transition: all .2s ease-in-out; }
        .grow:hover {
            transform: scale(1.25);
        }
        .quien_eres:after {
            content: "";
            background-color: transparent!important;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0%;
            z-index: -1;
            -webkit-transition: 0.2s width;
            transition: 0.2s width;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            text-indent: 10px;
            text-overflow: '';
        }
    </style>
@endsection

@section('scripts')
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset("assets/jquery-validation/js/jquery.validate.js")}}"></script>
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
            nav: false,
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            },
        });
        $('#clients').owlCarousel({
            items:4,
            lazyLoad:true,
            loop:true,
            margin:30,
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            },
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
                <h2 class="title_color">Nuestros Servicios<span class="punto">.</span> </h2>
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
                    <h2 class="title_color">¿Quién eres?<span class="punto">.</span> <br>
                        <small style="color: white;font-weight: bold;"> Queremos conocerte mejor, cuentanos m&aacute;s sobre ti</small>
                    </h2>
                </div>
                @for($i = 0; $i < count($client_types); $i++)
                    @if($client_types[$i]->type == "mains")
                        <?php if($i == 1){ ?>
                            <div class="col-md-4" style="border-right: 1px solid #333; border-left: 1px solid #333;">
                        <?php }else{?>
                            <div class="col-md-4">
                        <?php }?>
                            <div class="quien_eres grow"  style="cursor: pointer;" href="{{url('who_you_are')}}/{{$client_types[$i]->slug}}">
                                <div style="text-align: center; padding-bottom: 25px">
                                    <a><img class="services_img center" src="{{$client_types[$i]->image}}"></a>
                                </div>
                                <h3 style="color:#666666">{{strtoupper($client_types[$i]->name)}}</h3>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
	    </div>
	</div>
</div>
<div id="portafolio" class="section md-padding bg-grey">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title_color">portafolio de proyectos<span class="punto">.</span> </h2>
            </div>
            <div class="col-lg-12">
                <div class="portfolioFilter clearfix text-center">
                    <a href="#" data-filter="*" class="current">Todas las categorías</a>
                    @foreach($categories as $category)
                        <a href="#" data-filter=".{{$category->slug}}">{{$category->name}}</a>
                    @endforeach

                </div>
            </div>

            <div class="portfolioContainer">
                @foreach($works as $work)
                    <div class="col-md-4 col-xs-4 work {{$work->type_slug}}">
                        <img class="img-responsive" src="{{$work->image}}" alt="">
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
                @endforeach
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
                <h2 class="title_color">Nuestros Clientes</h2>
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
                                <img class="client_img center" src="{{$client->image}}">
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
        <div style="padding-right: 50px;padding-right: 50px;">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="title_color">¿CÓMO TE PODEMOS AYUDAR?<span class="punto">.</span></h2>
                </div>
                <div class="col-md-12">
                    <form id="contact-form">
                        <div class="row" style="padding-bottom: 15px">
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
                                <label for="phone">Teléfono</label><br>
                                <input type="tel" name="phone" class="input">
                            </div>
                            <div class="col-md-4" >
                                <label for="company_type">¿Quién eres?</label><br>
                                <select class="input styled-select rounded" name="company_type" >
                                    @foreach($client_types as $client_type)
                                        <option value="{{$client_type->id}}">{{$client_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12" style="padding-top: 15px">
                                <label for="message">Asunto</label> <br>
                                <textarea class="input" name="message" rows="30"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center; padding-top: 30px">
                            <button class="main-btn" style="font-weight: bold; font-size: 18px;border-radius: 15px;">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

