@extends('layout')

@section('styles')
    <link rel="stylesheet" type="text/css" href="include/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="include/rs-plugin/css/layers.css">
    <link rel="stylesheet" type="text/css" href="include/rs-plugin/css/navigation.css">
    
    <style>
        .flex-control-nav {
            top:80px !important;
            right:0 !important;
            text-align: left !important;
            position: initial !important;
        }
    </style>
@endsection

@section('scripts')
@endsection

@section('content')
<div id="services" class="section pt-0" style="background:white">
    <div class="container clearfix">
        <div class="content-wrap pt-0">
            <div class="container clearfix">
                <div class="divcenter center clearfix" style="max-width: 900px;">
                    <h2>Nuestros Servicios<span>.</span></h2>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row clearfix">
            @foreach($services as $service)5
            <div class="col-lg-4 bottommargin">
                <div class="feature-box fbox-plain fbox-dark">
                    <div class="fbox-icon">
                        <img class="img-responsive" src="{{$service->image}}" alt="Open Imagination">
                    </div>
                    <h3>{{$service->name}}</h3>
                    <p>{{$service->description}}</p>
                </div>
            </div>
            @endforeach
        </div>    
    </div>
</div>
<section id="section-testimonials" class="section parallax nobottommargin page-section dark" style="background-image: url('img/bg-testimonials.jpg'); padding: 140px 0; background-size: cover"  data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div class="container clearfix">
        <div class="row">
            <div class="col-lg-8">
                <div class="heading-block nobottomborder mb-3">
                    <h1>¿Por qu&eacute; elegirnos?</h1>
                </div>
                <div class="fslider restaurant-reviews" data-arrows="false" data-animation="slide">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            @foreach($sliders as $slider)
                            <div class="slide">
                                <h3 class="mb-0">{{$slider->title}}</h3>
                                <p class="lead">"{{$slider->subtitle}}"</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="quien_eres" class="section nomargin clearfix dark bgcolor pt-4">
    <div class="container clearfix dark bgcolor pt-4">
        <div class="heading-block center nobottommargin">
            <h2>¿Qui&eacute;n eres?</h2>
            <span>Queremos conocerte mejor, cuentanos m&aacute;s sobre ti?</span>
        </div>
    </div>
    <div class="row common-height clearfix">
    @foreach($client_types as $client)
        @if($client->type == "mains")
        <div class="col-lg-4 dark bgcolor" style="background: url('demos/car/images/5.jpg') center center no-repeat; background-size: cover;">
            <div class="col-padding clearfix">
                <div class="fbox-icon mb-4">
                    <img style="width:15%" class="img-responsive inline-block" src="{{$client->image}}" alt="Open Imagination">
                </div>
                <div class="heading-block noborder" style="margin-bottom: 20px;">
                    <h4>{{$client->name}}</h4>
                </div>
                <p>{{$client->description}}</p>
                <a href="#" class="button button-rounded button-white button-light nomargin">Empecemos</a>
            </div>
        </div>
        @endif
    @endforeach
    </div>
</div>
<div id="portofolio" class="portfolio grid-container portfolio-nomargin portfolio-notitle portfolio-full clearfix">
    @foreach($works as $work)
        <article class="portfolio-item pf-media pf-icons">
            <div class="portfolio-image">
                <a href="portfolio-single.html"><img src="{{$work->image}}" alt="Open Imagination"></a>
                <div class="portfolio-overlay">
                    <a href="{{$work->image}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                    <a href="{{url('projects/')}}/{{$work->work_slug}}" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                </div>
            </div>
            <div class="portfolio-desc">
                <h3><a href="{{url('projects/')}}/{{$work->work_slug}}"></a>{{$work->name}}</h3>
                <span>{{$work->client_name}}</span>
            </div>
        </article>
    @endforeach
</div>
<div class="clear"></div>
<a href="{{url('portofolio/')}}" class="button button-full button-dark center">
    <div class="container clearfix">
        <strong style="border-bottom:0px">Ver m&aacute;s proyectos</strong>
    </div>
</a>
<div class="section notopmargin noborder nobottommargin" style="background:white;l" >
    <div class="container clearfix">
        <div class="heading-block center nobottommargin">
            <h2>Nuestros Clientes</h2>
        </div>
    </div>
</div>
<div id="clients" class="section topmargin-lg pt-0 clearfix" style="background:white;margin-top:0px!important">
    <div class="container">
        <div id="oc-clients" class="owl-carousel topmargin image-carousel carousel-widget" data-margin="80" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false"data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="5">
            @foreach($clients as $client)
                <div class="oc-item"><a href="#"><img src="{{$client->image}}" alt="Clients"></a></div>
            @endforeach    
        </div>
    </div>
</div>
<div class="section notopmargin mb-0 notopborder"  style="background:white">>
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>Nuestras &Uacute;ltimas Noticias</h3>
        </div>
    </div>
</div>
<div class="container clearfix" style="background:white">
    <div class="row">
        @foreach($news as $new)
        <div class="col-lg-4 col-md-6 bottommargin">
            <div class="ipost clearfix">
                <div class="entry-image">
                    <a href="{{$new->url}}"><img class="image_fade" src="{{$new->image}}" alt="Image"></a>
                </div>
                <div class="entry-title">
                    <h3><a href="{{$new->url}}">{{$new->title}}</a></h3>
                </div>
                <div class="entry-content">
                    <p>{{$new->subtitle}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="section notopmargin mb-0 pb-3 notopborder"  style="background:white">>
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>Contacto</h3>
        </div>
    </div>
</div>
<div class="section mt-0 pt-0" style="background:white">
    <div class="container">
        <div id="contact" class="row common-height page-section notoppadding clearfix">
            <div class="col-lg-6 col-padding">
                <div class="contact-widget">
                    <div class="contact-form-result"></div>
                    <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">
                        <div class="form-process"></div>
                        <div class="col_half">
                            <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control border-form-control required" placeholder="Nombre" />
                        </div>
                        <div class="col_half col_last">
                            <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control border-form-control" placeholder="Correo" />
                        </div>
                        <div class="clear"></div>
                        <div class="col_one_third">
                            <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control border-form-control" placeholder="Telefono" />
                        </div>
                        <div class="col_two_third col_last">
                            <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control border-form-control" placeholder="Asunto" />
                        </div>
                        <div class="clear"></div>
                        <div class="col_full">
                            <textarea class="required sm-form-control border-form-control" id="template-contactform-message" name="template-contactform-message" rows="7" cols="30" placeholder="Tu Mensaje"></textarea>
                        </div>
                        <div class="col_full nobottommargin">
                            <button class="button button-large button-color noleftmargin topmargin-sm" style="color:white;" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Enviar</button>
                        </div>
                        <div class="clear"></div>
                        <div class="col_full hidden">
                            <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-padding">
                <div class="max-height">
                    <h3 class="uppercase">Nosotros</h3>
                    <div class="row topmargin-sm clearfix" style="font-size: 16px; line-height: 1.7;">
                    <div class="col-lg-6">
                            <a href="https://www.facebook.com/MORPHaudiovisual/" target="_blank">
                                <img src="{{asset('img/morph.png')}}" alt="logo" width="70%%">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <abbr title="Phone Number"><strong>Telefono:</strong></abbr>  (+51) 986 652 816 | (+51) 932 119 264<br>
                            <abbr title="Email Address"><strong>Correo:</strong></abbr> nezkastudio@gmail.com
                        </div>
                        <div class="col-lg-12 mt-3">
                            <p>En Nezka Studio tenemos como objetivo transmitir los mensajes visuales y audiovisuales de manera directa por diferentes medios </p>
                            <p>Teniendo como base: La comunicación es la clave para una buena gestión.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection