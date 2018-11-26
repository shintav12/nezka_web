@extends('templates.intern')

@section('styles')   
<link rel="stylesheet" href="{{asset('assets/sweet-alert/sweetalert2.min.css')}}" type="text/css" />
<style>
    .border-form-control {
        height: 48px;
        padding: 8px 4px;
        font-size: 21px;
        letter-spacing: 1px;
        background-color: transparent!important;
        border-top: transparent;
        border-right: transparent;
        border-left: transparent;
        border-bottom-width: 1px;
        font-family: source sans pro,sans-serif;
    }

    .option{
        cursor: pointer;
    }

    .selected:hover{
        border-bottom: 3px solid #45ffe5 !important;
    }

    .selected{
        border-bottom: 3px solid #45ffe5 !important;
    }

    .option:hover{
        border-bottom: 3px solid lightgrey;
    }

    .seleccion{
        margin-left:15px;
        margin-right:15px;
        font-weight: bold;
        font-size: 18px;
    }


</style>
@endsection

@section('scripts')
<script src="{{asset('assets/sweet-alert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/jquery-validation/js/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jquery-validation/js/additional-methods.js')}}" type="text/javascript"></script>
<script>
    $(".option").click(function(){
        if($(this).hasClass("selected")){
            $(this).removeClass("selected");
        }else{
            $(this).addClass("selected");
        }
        
    });
    $("#siguiente").click(function(){
        
        var selecciones = $(".selected");
        if(selecciones.length === 0){
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Debes elegir por lo menos una de las opciones',
            })
            return;
        }
        value = "";
        $("#selecciones").html("");
        for(i = 0; i < selecciones.length; i++){
            $("#selecciones").append("<span class='seleccion'>"+ selecciones.eq(i).data("name") +"</span>");
            value = value + " " + selecciones.eq(i).data("name");
        }
        $("#services_types").val(value);
        $("#selecciones").append("<br>");
        $("#content2").fadeOut();
        $("#section-contact").fadeIn("slow");
    });
    $("#anterior").click(function(){
        $("#section-contact").fadeOut();
        $("#content2").fadeIn();
    });
    $("#form").validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
                rules: {
                    name: "required",
                    email: "required",
                    company: "required",
                    phone: "required"
                },
                messages: {
                    name: "Requerido",
                    email: "Requerido",
                    company: "Requerido",
                    phone: "Requerido"
                },
                submitHandler: function (form) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ route('save_who_your_area') }}",
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
                                        showConfirmButton: false,
                                    });
                                    window.location = "{{ url('/')}}";

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
<section id="page-title" style="background:white;">
    <div class="container clearfix">
        <h1 class="mb-3">{{$customer_type->name}}</h1>
        <h4 class="mb-1">{{$customer_type->description}}</h4>
    </div>
</section>
<section id="content">
    <div id="content2" class="content-wrap">
        <div class="container clearfix">
            <div class="row">
            @foreach($services_customer as $item)
                <div data-name="{{$item->name}}" class="col-lg-4 mb-3 pb-3 option">
                    <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
                        <div class="fbox-icon">
                            <img src="{{$item->image}}" width="25%">
                        </div>
                        <h3>{{$item->name}}</h3>
                        <p>{{$item->description}}</p>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="clear"></div>
            <div class="col_full center">
                <button class="button button-border button-circle t500 noleftmargin topmargin-sm" id="siguiente" name="template-contactform-submit" value="submit">Siguiente</button>
                <br>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="section-contact" class="page-section notoppadding" style="display:none;" >
        <div class="container clearfix">
            <div class="divcenter topmargin" style="max-width: 850px;">
                <div class="contact-widget">
                    <div class="contact-form-result"></div>
                    <form class="nobottommargin" id="form">
                        <div class="form-process"></div>
                        <input name="services_types" hidden id="services_types"/>
                        <input name="customer_type" value="{{$customer_type->id}}" hidden id="customer_type"/>
                        <div class="col_half">
                            <input type="text" id="template-contactform-name" name="name" class="sm-form-control border-form-control" placeholder="Nombre" />
                        </div>
                        <div class="col_half col_last">
                            <input type="text" id="template-contactform-subject" name="company" class="sm-form-control border-form-control" placeholder="Empresa" />
                        </div>
                        <div class="clear"></div>
                        <div class="col_half">
                            <input type="text" id="template-contactform-phone" name="phone" class="sm-form-control border-form-control" placeholder="Tel&eacute;fono" />
                        </div>
                        <div class="col_half col_last">
                            <input type="email" id="template-contactform-email" name="email" class="email sm-form-control border-form-control" placeholder="Correo" />
                        </div>
                        <div class="clear"></div>
                        <div class="col_full center pt-3">
                            <h4>Has seleccionado las siguientes soluciones</h4>
                            <br>
                        </div>
                        <div class="clear"></div>
                        <div id="selecciones" class="col_full center pb-3">
                        </div>
                        <div class="col_full center">
                            <a id="anterior" class="button button-border button-circle t500 noleftmargin topmargin-sm">Anterior</a>
                            <button type="submit" class="button button-border button-circle t500 noleftmargin topmargin-sm">Enviar</button>
                            <br>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection