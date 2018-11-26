@extends('templates.layout')

@section('styles')   
<link rel="stylesheet" href="{{asset('assets/sweet-alert/sweetalert2.min.css')}}" type="text/css" />
<style>
    .flex-control-nav {
        top:90px !important;
        position:absolute !important;
        left:47% !important;

    }
    .portfolio-overlay a.right-icon {
        left: auto;
        right: 50%;
        margin-left: 0;
        margin-right: -20px;
    }
</style>
@endsection

@section('scripts')
<script src="{{asset('assets/sweet-alert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/jquery-validation/js/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery-validation/js/additional-methods.js')}}" type="text/javascript"></script>
<script>
    $("#form").validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
                rules: {
                    name: "required",
                    email: "required",
                    company: "required",
                    phone: "required",
                    message: "required"
                },
                messages: {
                    name: "Requerido",
                    email: "Requerido",
                    company: "Requerido",
                    phone: "Requerido",
                    message: "Requerido"
                },
                submitHandler: function (form) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ route('contact_save') }}",
                            data: new FormData($("#form")[0]),
                            contentType: false,
                            processData: false,
                            beforeSend: function () {
                                swal({
                                    title: 'Cargando...',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    onOpen: function () {
                                        swal.showLoading()
                                    }
                                });
                            },
                            success: function (data) {
                                var error = data.error;
                                if (error == 0) {
                                    swal.close();
                                    swal({
                                        type: 'success',
                                        title: 'Enviado con éxito',
                                        text: 'Nos estaremos contactando a la brevedad',
                                        showConfirmButton: true,
                                    });
                                    $("#show_message").fadeIn("slow");
                                    $("#contact2").fadeOut("slow");
                                } else {
                                    swal.close();
                                    swal(
                                        'Oops...',
                                        'Algo ocurrió!',
                                        'error'
                                    );
                                }
                            }, error: function () {
                                swal.close();
                                swal(
                                    'Oops...',
                                    'Algo ocurrió!',
                                    'error'
                                );
                            }
                        });

                }
            });
</script>
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
            @foreach($services as $service)
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
<section id="section-testimonials" class="section parallax nobottommargin page-section dark" style="background-image: url('img/pilars.jpg'); padding: 140px 0; background-size: cover"  data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div class="container clearfix" style="text-align:center">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-block nobottomborder mb-3">
                    <h1>¿Por qu&eacute; elegirnos?</h1>
                </div>
                <div class="fslider restaurant-reviews" data-arrows="false" data-animation="slide">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            @foreach($sliders as $slider)
                            <div class="slide">
                                <p class="lead mb-0">"{{$slider->subtitle}}"</p>
                                <h3 class="mt-0">{{$slider->title}}</h3>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="quien_eres" class="section nomargin clearfix dark pt-4" style="background: #121212;" >
    <div class="container clearfix dark pt-4">
        <div class="heading-block center nobottommargin">
            <h2 style="color:#00ffdc">¿Qui&eacute;n eres?</h2>
            <span>Queremos conocerte mejor, cuentanos m&aacute;s sobre ti</span>
        </div>
    </div>
    <div class="row common-height clearfix">
    @foreach($client_types as $client)
        @if($client->type == "mains")
        <div class="col-lg-4 dark" style="background: center center no-repeat; background-size: cover;">
            <div class="col-padding clearfix">
                <div class="fbox-icon mb-4">
                    <img style="width:15%" class="img-responsive inline-block" src="{{$client->image}}" alt="Open Imagination">
                </div>
                <div class="heading-block noborder" style="margin-bottom: 20px;">
                    <h4 >{{$client->name}}</h4>
                </div>
                <p>{{$client->description}}</p>
                <a href="{{url('who_you_are')}}/{{$client->slug}}" class="button button-rounded button-white bgcolor button-light nomargin">Empecemos</a>
            </div>
        </div>
        @endif
    @endforeach
    </div>
</div>
<div id="portofolio" class="section notopmargin mb-0 notopborder"  style="background:white">
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>Portafolio</h3>
        </div>
    </div>
</div>
<div  class="portfolio grid-container portfolio-nomargin portfolio-notitle portfolio-full clearfix">
    @foreach($works as $work)
        <article class="portfolio-item pf-media pf-icons">
            <div class="portfolio-image">
                <a href="{{url('projects/')}}/{{$work->work_slug}}"><img src="{{$work->image}}" alt="Open Imagination"></a>
                <div class="portfolio-overlay">
                    <a href="{{url('projects/')}}/{{$work->work_slug}}" class="right-icon">
                    @if($work->type_slug == 'animacion' || $work->type_slug == 'contenido-digital' || $work->type_slug == 'audiovisual')
                    <i class="icon-line-play"></i>
                    @else
                    <i class="icon-line-stack"></i>
                    @endif
                    </a>
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
<div  id="news" class="section notopmargin mb-0 notopborder"  style="background:white">>
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>Nuestras &Uacute;ltimas Noticias</h3>
        </div>
    </div>
</div>
<div class="container clearfix"  style="background:white">
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
                <div class="entry-content" style="margin:0px">
                    <p>{{$new->subtitle}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div id="clients" class="section notopmargin noborder nobottommargin" style="background:white;l" >
    <div class="container clearfix">
        <div class="heading-block center nobottommargin">
            <h2>Nuestros Clientes</h2>
        </div>
    </div>
</div>
<div  class="section topmargin-lg pt-0 clearfix" style="background:white;margin-top:0px!important">
    <div class="container">
        <div id="oc-clients" class="owl-carousel topmargin image-carousel carousel-widget" data-margin="80" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false"data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="5">
            @foreach($clients as $client)
                <div class="oc-item"><a href="{{url('clients')}}/{{$client->slug}}"><img src="{{$client->image}}" alt="Clients"></a></div>
            @endforeach    
        </div>
    </div>
</div>
<div class="section mt-0 pt-0" id="contact" style="background:white;background-image: url('img/1.png');margin:0px;height:550px">
    <div class="container">
        <div id="contact" class="row common-height page-section notoppadding clearfix">
            <div id="show_message" class="col-lg-6 col-padding" style="display:none">
                <div>
                    <h3 class="uppercase" style="font-weight: 600;color:white">Gracias por contactarnos</h3>
                    <p style="line-height: 1.8;color:white">Pronto nos estaremos comunicando contigo para atender tu solicitud</p>
                </div>
            </div>
            <div id="contact2" class="col-lg-6 col-padding">
                <div class="contact-widget">
                <h3 class="uppercase" style="color:white">CONTACTO</h3>
                    <form class="nobottommargin" id="form">
                        <div class="form-process"></div>
                        <div class="col_half">
                            <input type="text" name="name" class="sm-form-control border-form-control required" placeholder="Nombre" />
                        </div>
                        <div class="col_half col_last">
                            <input type="email" name="email" class="required email sm-form-control border-form-control" placeholder="Correo" />
                        </div>
                        <div class="clear"></div>
                        <div class="col_one_third">
                            <input type="text" name="phone" class="sm-form-control border-form-control" placeholder="Telefono" />
                        </div>
                        <div class="col_two_third col_last">
                            <input type="text" name="company" class="required sm-form-control border-form-control" placeholder="Empresa" />
                        </div>
                        <div class="clear"></div>
                        <div class="col_full">
                            <textarea class="required sm-form-control border-form-control" name="message" rows="7" cols="30" placeholder="Tu Mensaje"></textarea>
                        </div>
                        <div class="col_full nobottommargin">
                            <button class="button button-large button-color noleftmargin topmargin-sm" style="color:white;" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Enviar</button>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-padding">
                <div class="max-height">
                    <div class="row topmargin-sm clearfix" style="font-size: 16px; line-height: 1.7;">
                        <div class="col-lg-12" style="color:white">
                            <i class="icon-call mr-2"></i>  (+51) 986 652 816
                            <br>
                            <i class="icon-call mr-2"></i>   (+51) 932 119 264
                            <br>
                            <i class="icon-email3 mr-2"></i>  nezkastudio@gmail.com
                        </div>
                        <div class="col-lg-12 mt-3">
                            <h3 class="uppercase mt-4 mb-2" style="color:white">NUESTRO ALIADO</h3>
                            <a href="https://www.facebook.com/MORPHaudiovisual/" target="_blank">
                                <img src="{{asset('img/morph.png')}}" alt="logo" width="40%">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection