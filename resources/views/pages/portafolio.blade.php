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

        .portfolioFilter a.current {
            color: #52ffdd;
            background-color: transparent;
        }
        .portfolioFilter a {
            margin-right: 6px;
            text-decoration: none;
            border: 0px solid transparent !important;
            padding: 4px 15px;
            border-radius: 50px;
            font-weight: bolder;
            text-transform: uppercase;
            display: inline-block;
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
@endsection
@section('scripts')
    <script src="{{asset("assets/jquery-validation/js/jquery.validate.js")}}"></script>
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

    <div id="portafolio" class="section md-padding bg-grey" style="padding-top: 60px!important; background-color: white!important;">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="title_color">{{$client->name}}<span class="punto">.</span> </h2>
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
                            <a href="{{url('projects/')}}/{{$work->work_slug}}">
                            <img class="img-responsive" src="{{$work->image}}" alt="">
                            <div class="overlay" style="margin: 10px"></div>
                            <div class="work-content" style="position: relative">
                                <div style="position: absolute;bottom: 0;left: 0;width: 100%">
                                    <div style="margin: 15px">
                                        <span style="text-align: left">{{$work->client_name}}</span>
                                        <h3 style="text-align: left" >{{$work->name}}</h3>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection