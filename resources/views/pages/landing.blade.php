@extends('layout')

@section('styles')
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
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
            margin:20,
            autoHeight: false,
            autoWidth: false,
            autoHeightClass: 'owl-height',
            autoplay:true,
            dots: true,
            nav: true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
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
            nav: true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
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
            <div class="col-md-4 col-xs-6 work">
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
            <div class="col-md-4 col-xs-6 work">
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
                        <div class="col-md-4">
                            <label for="company_type">¿Quién eres?</label><br>
                            <select class="input" name="company_type">
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
<div class="container" style="padding:25px 30px 100px;">
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
@endsection


