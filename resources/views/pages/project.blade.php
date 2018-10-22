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
            text-transform: uppercase;
            letter-spacing: 2px;
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
            letter-spacing: 2px;
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


        nav.fixed-nav {
            position: absolute !important;
            left: 0;
            right: 0;
            padding: 0px 0px;
            background-color: #FFF !important;
            border-bottom: 1px solid #EEE;
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
    <link type="text/css" rel="stylesheet" href="{{asset('assets/owl/assets/owl.carousel.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/owl/assets/owl.theme.green.min.css')}}" />
@endsection
@section('scripts')
    <script>
        $('#projects').owlCarousel({
            items:1,
            lazyLoad:true,
            loop:true,
            autoHeight: false,
            autoWidth: false,
            autoHeightClass: 'owl-height',
            autoplay:true,
            dots: true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
        });
    </script>
@endsection
@section('content')
    <div class="container margin-80">
        <div class="row text-center margin-60">
            <h1 class="sub-page_title__h1">{{$project->title}} <span class="punto">.</span></h1>
            <p class="sub-page_p"></p>
        </div>
        <div class="row">
            <div  class="col-md-6 text-center">
                <div  id="projects" class="owl-carousel owl-theme">
                    @foreach($images as $image)
                        <img class="item" src="{{$image->image}}" alt="" >
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="sub-page_title__icon">descripción del proyecto</h2>
                <p class="sub-page_description">{{$work->description}}</p>
                <h2 class="sub-page_title__icon">detalles</h2>
                <p class="sub-page_description">{{$type->detail}}</p>
                <h3 class="sub-page_title__icon">Caetegor&iacute;as</h3>
                <p class="sub-page_description">{{$client->catgories}}</p>
                <br>
            </div>
        </div>
    </div>
@endsection