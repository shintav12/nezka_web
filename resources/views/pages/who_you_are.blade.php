@extends('other')

@section('styles')
<style>
    .margin-20 {
        margin-bottom: 20px;
    }
    .margin-40 {
        margin-bottom: 40px;
    }
    .margin-60 {
        margin-bottom: 60px;
    }
    .margin-80 {
        margin-top: 40px;
        margin-bottom: 80px;
    }
    .sub-page_icons{
        text-align: center;
        padding-bottom: 25px;
        font-size: 14px !important;
        border: 3px solid transparent!important;
        border-radius: 10px;
        padding:10px;
    }
    .sub-page_title__h1 {
        font-size: 2em;
        color: #333;
        font-weight: 900;
    }
    .sub-page_p{
        font-size: 0.8em;
        padding: 0 20px;
    }
    .sub-page_title__icon{
        font-size: 1.1em;
        font-weight: 900;
        text-transform: uppercase;
        color: #333;
    }
    .sub-page_description {
        font-size: 0.9em;
        line-height: -8px;
    }
    .sub-page_icons:hover { opacity: .5; -webkit-filter: grayscale(100%); }
    .item-selected:hover { opacity: .5; -webkit-filter: grayscale(100%); }

    nav.fixed-nav {
        position: absolute !important;
        left: 0;
        right: 0;
        padding: 0px 0px;
        background-color: #FFF !important;
        border-bottom: 1px solid #EEE;
    }

    .item-selected {
        text-align: center;
        padding-bottom: 25px;
        font-size: 14px !important;
        border: 3px solid #7bffed!important;
        border-radius: 10px;
        padding:10px;
    }

    .loading {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0,0,0,.5);
    }
    .loading-wheel {
        width: 20px;
        height: 20px;
        margin-top: -40px;
        margin-left: -40px;

        position: absolute;
        top: 50%;
        left: 50%;

        border-width: 30px;
        border-radius: 50%;
        -webkit-animation: spin 1s linear infinite;
    }
    .style-2 .loading-wheel {
        border-style: double;
        border-color: #ccc transparent;
    }

    .error{
        font-size: small !important;
        letter-spacing: 1px !important;
    }
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(-360deg);
        }
}
</style>
@endsection
@section('scripts')
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
                    url: "{{ url('/who_you_are/save') }}",
                    data: new FormData($("#contact-form")[0]),
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $(".loading").show();
                    },
                    success: function () {
                        $(".loading").fadeOut("fast");
                        $("#form_services").fadeOut("fast");
                        $("#message").fadeIn("slow");
                    }
                });
            }
        });
        var text = "";
        var values = "";
        $(document).ready({

        });
        $(".item").click(function(){
            var div = $(this).find("#icon")
            if(div.hasClass("sub-page_icons")){
                div.removeClass("sub-page_icons");
                div.addClass("item-selected");
                $(this).addClass("selected_div");
            }else{
                div.addClass("sub-page_icons");
                div.removeClass("item-selected");
                $(this).removeClass("selected_div");
            }
            text = "";
            values = "";
            var divs_names =  $(".selected_div");
            for( var i = 0; i < divs_names.length; i++) {
                text = text + "<span style='padding-right: 20px;padding-left: 20px;'>" + divs_names.eq(i).attr("name") + "</span>";
                values = values + " " + divs_names.eq(i).attr("name")
            }
            $("#services_types").val(values);
            $("#selected_items").html();
            $("#selected_items").html(text);


        });
        $("#next_btn").click(function(e){
            if(text == ""){
                alert("Debe seleccionar por lo menos un servicio");
                return;
            }
            window.scrollTo(0, 0);
            $("#select_services").fadeOut("slow");
            $("#form_services").fadeIn("slow");

        });

        $("#return_btn").click(function(e){
            window.scrollTo(0, 0);
            $("#select_services").fadeIn("slow");
            $("#form_services").fadeOut("slow");

        });
    </script>
@endsection
@section('content')

<div class="container margin-80" id="select_services">
    <div class="row text-center margin-60">
        <h1 class="sub-page_title__h1">{{$customer_type->name}}</h1>
        <p class="sub-page_p" style="font-size: 20px!important;">{{$customer_type->description}}</p>
    </div>
    <div class="row">
        @foreach($services_customer as $item)
            <div class="col-md-4 col-sm-6 col-xs-12 item" style="padding-bottom: 15px" name="{{$item->name}}">
                <div id="icon" class="sub-page_icons">
                    <img src="{{$item->image}}" width="25%"> <!-- Imagen del icono del representante de marca -->
                    <h3 class="sub-page_title__icon" style="margin-top: 40px">{{$item->name}}</h3> <!-- titlo del representante de marca -->
                    <p class="sub-page_description">{{$item->description}}</p> <!-- descripcion dle representante de marca -->
                </div>
            </div>
        @endforeach
    </div>
    <div class="row text-center" style="padding-top: 25px">
        <button id="next_btn" class="main-btn"><strong>Siguiente</strong></button>
    </div>
</div>
<div class="loading style-2" style="display: none">
    <div class="loading-wheel" ></div>
</div>

<div class="container margin-80" id="message" style="display: none">
    <div class="row text-center margin-60">
        <h1 class="sub-page_title__h1">Enviando con &eacute;xito</h1>
        <p class="sub-page_p" style="font-size: 20px!important;">Nos estaremos contactando a la brevedad</p>
    </div>
    <div class="row text-center" style="padding-top: 25px">
        <a id="redirect_home" href="{{url("/")}}#quien_eres" class="main-btn"><strong>Regresar a Nezka</strong></a>
    </div>
</div>
<div class="loading style-2" style="display: none">
    <div class="loading-wheel" ></div>
</div>

<div class="container margin-80" id="form_services" style="display: none;padding: 0 160px 0 160px">
    <div class="row text-center margin-40">
        <h1 class="sub-page_title__h1">COLOCA TUS DATOS</h1>
        <p class="sub-page_p" style="font-size: 20px !important;">Estamos casi listos para empezar a realizar tu proyecto, coloca bien tus datos y en breves momentos te haremos llegar a tu correo la cotización con todos los servicios que has escogido.</p>
    </div>
    <form id="contact-form">
        <input name="customer_type" value="{{$customer_type->id}}" hidden>
        <input id="services_types" name="services_types" value="" hidden>
        <div class="row">
            <div class="row" style="padding: 0 160px 0 160px">
                <div class="col-md-6 col-sm-6 col-xs-12 margin-20">
                    <input type="text" name="name" placeholder="Nombre">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 margin-20">
                    <input type="text" name="company" placeholder="Empresa">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 margin-20">
                    <input type="text" name="email" type="email" placeholder="Correo">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 margin-20">
                    <input type="text" name="phone" placeholder="Teléfono">
                </div>
            </div>
            <div class="text-center row" style="margin-top: 25px">
                <h3 class="sub-page_title__icon" style="text-transform: capitalize; margin-top: 40px"> Has seleccionado los siguientes servicios</h3>
            </div>
            <div class="text-center row" style="">
                <div id="selected_items" style="text-transform: capitalize; margin-top: 40px; color:#868f9b; font-weight: bold;"></div>
            </div>
            <div class="row text-center" style="padding-top: 25px">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <a id="return_btn" style="float: right" class="main-btn col-xs-6"><strong>Retroceder</strong></a>
                    </div>
                    <div class="col-xs-6" style="text-align: left;">
                        <button class="main-btn col-xs-6"><strong>Enviar</strong></button>
                    </div>
                </div>

            </div>
        </div>

    </form>
</div>
@endsection