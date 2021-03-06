@extends('templates.layout')

@section('styles')   
<link rel="stylesheet" href="{{asset('assets/sweet-alert/sweetalert2.min.css')}}" type="text/css" />
<style>
    .flex-control-nav {
        top:110px !important;
        position:absolute !important;
        left:45% !important;

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
                    <h2>Nuestros Servicios<span style="font-weight: bolder;font-size: 55px;margin-left: 8px;">.</span></h2>
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

<div id="quien_eres" class="section nomargin clearfix dark pt-4 pb-2" style="background: white;" >
    <div class="container clearfix dark pt-4">
        <div class="heading-block center nobottommargin">
            <h2 style="color: #444;">¿Qui&eacute;n eres?<span style="font-weight: bolder;font-size: 55px;margin-left: 8px;">.</span></h2>
            <span style="color: #333;">Queremos conocerte mejor, cuentanos m&aacute;s sobre ti</span>
        </div>
    </div>
    <div class="row common-height clearfix">
    @foreach($client_types as $client)
        @if($client->type == "mains")
        <div class="col-lg-4" style="background: center center no-repeat; background-size: cover;">
            <div class="col-padding clearfix">
                <div class="fbox-icon mb-4">
                    <img style="width:15%" class="img-responsive inline-block" src="{{$client->image}}" alt="Open Imagination">
                </div>
                <div class="heading-block noborder" style="margin-bottom: 20px;">
                    <h4 style="color: #333;">{{$client->name}}</h4>
                </div>
                <p style="color: #333;">{{$client->description}}</p>
                <a href="{{url('who_you_are')}}/{{$client->slug}}" class="button button-rounded button-white bgcolor button-light nomargin">Empecemos</a>
            </div>
        </div>
        @endif
    @endforeach
    </div>
</div>
<div id="portofolio" class="section notopmargin mb-0 notopborder"  style="background:white;padding-top:15px">
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h2>Portafolio<span style="font-weight: bolder;font-size: 55px;margin-left: 8px;">.</span></h2>
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
                    @if($work->type_slug == 'animacion' || $work->type_slug == 'audiovisual')
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
        <strong style="border-bottom:0px">Ver m&aacute;s</strong>
    </div>
</a>
<div id="clients" class="section notopmargin noborder nobottommargin" style="background:white;padding-bottom: 15px;" >
    <div class="container clearfix">
        <div class="heading-block center nobottommargin">
            <h2>Nuestros Clientes<span style="font-weight: bolder;font-size: 55px;margin-left: 8px;">.</span></h2>
        </div>
    </div>
</div>
<div  class="section topmargin-lg pt-0 clearfix" style="background:white;margin-top:0px!important">
    <div class="container">
        <div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-margin="50" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false"data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="5">
            @foreach($clients as $client)
                <div class="oc-item"><a href="{{url('clients')}}/{{$client->slug}}"><img src="{{$client->image}}" alt="Clients"></a></div>
            @endforeach    
        </div>
    </div>
</div>
<div class="section nomargin nopadding clearfix">
    <div class="row common-height clearfix" >
        <div class="col-lg-6 clearfix " style="background-image: url('img/4.jpg');display:flex;align-items:center">
            <div class="col-padding clearfix">
                <div style="color:white; font-size:x-large;">
                    <img src="{{asset('img/estudio1.png')}}" alt="logo" width="50%">    
                </div>
            </div>
        </div>
        <div class="col-lg-6 dark" >
            <div class="col-padding clearfix">
                <h3 class="uppercase" style="color:#444">CONTACTO</h3>
                <div class="row topmargin-sm clearfix mb-3" style="font-size: 16px; line-height: 1.7;">
                    <div class="col-lg-6 pb-4">
                        <strong class="mt-4 mb-2" style="color:#444">Nuestro aliado</strong>
                        <div style="padding-top:12px">
                            <a href="https://www.facebook.com/MORPHaudiovisual/" target="_blank">
                                <img src="{{asset('img/morph.png')}}" alt="logo" width="50%">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12 px-0" style="color:#444">
                        <i class="icon-call mr-2"></i>  (+51) 986 652 816
                        </div>
                        <div class="col-lg-12 px-0" style="color:#444">
                            <i class="icon-call mr-2"></i>   (+51) 932 119 264
                        </div>
                        <div class="col-lg-12 px-0" style="color:#444">
                            <i class="icon-email3 mr-2"></i>  nezkastudio@gmail.com
                        </div>
                    </div>
                </div>
                <div class="contact-widget pt-3">
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
                            <button class="button button-circle button-color noleftmargin topmargin-sm" style="color:white;" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Enviar</button>
                        </div>
                        <div class="clear"></div>
                    </form>
                    <div id="show_message" class="col-md-6 col-xs-12 col-padding" style="display:none">
                        <div>
                            <h3 class="uppercase" style="font-weight: 600;color:#444">Gracias por contactarnos</h3>
                            <p style="line-height: 1.8;color:#444">Pronto nos estaremos comunicando contigo para atender tu solicitud</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection