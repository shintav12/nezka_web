<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <title>{{$page}}} | Nezka Studio</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="NezkaStudio" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @yield('styles')
</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
        @include('includes.header_intern')
        <section id="content">
            @yield('content')
        </section>
        @include('includes.footer')
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    @yield('scripts')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130112687-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-130112687-1');
    </script>
</body>