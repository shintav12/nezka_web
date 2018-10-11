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
    margin-bottom: 80px;
}
.sub-page_icons{
    text-align: center;
    padding-bottom: 25px;
    font-size: 14px !important;
}
.sub-page_title__h1 {
    font-size: 2em;
    color: #333;
    font-weight: 900;
}
.sub-page_p{
    font-size: 0.8em;
}
.sub-page_title__icon{
    font-size: 1.1em;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #333;
}
.sub-page_description {
    font-size: 0.9em;
    line-height: -8px;
    padding: 0 20px 0 20px;
    letter-spacing: 2px;
}
</style>
@endsection
@section('scripts')
@endsection
@section('content')

<!-- REPRESENTANTE DE MARCA CONTAINER-->
<div class="container margin-60">
    <div class="row text-center">
        <h1 class="sub-page_title__h1">{{$customer_type->name}}</h1>
        <p class="sub-page_p">{{$customer_type->description}}</p>
    </div>
    <div class="row">
        <!-- Bloque a Copiar -->
        @foreach($services_customer as $item)
            <div class="col-xs-4">
                <div class="sub-page_icons">
                    <img src="{{$item->image}}" width="30%"> <!-- Imagen del icono del representante de marca -->
                    <h3 class="sub-page_title__icon">{{$item->name}}</h3> <!-- titlo del representante de marca -->
                    <span class="sub-page_description">{{$item->description}}</span> <!-- descripcion dle representante de marca -->
                </div>
            </div>
        @endforeach
        <!-- Fin de  Bloque a Copiar -->
    </div>
</div>
<!-- REPRESENTANTE DE MARCA CONTAINER-->

<!-- COLOCA TUS DATOS CONTAINER-->
<div class="container margin-60">
    <div class="row text-center margin-60">
            <h1 class="sub-page_title__h1">COLOCA TUS DATOS</h1>
            <p class="sub-page_p">Estamos casi listos para empezar a realizar tu proyecto, coloca bien tus datos y en breves momentos te haremos llegar a tu correo la cotización con todos los servicios que has escogido.</p>
    </div>
    <div class="row">
        <form action="">
            <div class="col-md-6 col-sm-6 col-xs-12 margin-20">
                <input type="text" placeholder="Nombre">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-20">
                <input type="text" placeholder="Empresa">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-20">
                <input type="text" placeholder="Correo">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-80">
                <input type="text" placeholder="Teléfono">
            </div>

            <div class="text-center">
                <h3 class="sub-page_title__icon" style="text-transform: capitalize"> Has seleccionado los siguientes servicios</h3>
            </div>
        </form>
    </div>
</div>
<!-- COLOCA TUS DATOS CONTAINER-->
@endsection