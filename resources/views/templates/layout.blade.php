<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<title>Nezka Studio</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/settings.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/navigation.css')}}">
	<link rel="stylesheet" href="{{asset('css/barber.css')}}" type="text/css" />
    <style>
        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }
        
        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }
        
        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }
        
        .tp-video-play-button {
            display: none !important;
        }
        
        .tp-caption {
            white-space: nowrap;
        }
    </style>
    @yield('styles')
</head>
<body class="stretched">
    <div id="wrapper" class="clearfix"> 
        @include('includes.header_landing')
        <section id="content">
            @yield('content')
        </section>
        @include('includes.footer')
    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script>
        var tpj = jQuery;

        var revapi202;
        tpj(document).ready(function () {
            if (tpj("#rev_slider_579_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_579_1");
            } else {
                revapi202 = tpj("#rev_slider_579_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "include/rs-plugin/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    responsiveLevels: [1140, 1024, 778, 480],
                    visibilityLevels: [1140, 1024, 778, 480],
                    gridwidth: [1140, 1024, 778, 480],
                    gridheight: [728, 768, 960, 720],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "on",
                    stopAfterLoops: 0,
                    stopAtSlide: 1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        disableFocusListener: false,
                    },
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 300,
                        levels: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 49, 50, 51, 55],
                    },
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "hermes",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div>	<div class="tp-arr-titleholder">title</div>	</div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        }
                    }
                });
                revapi202.bind("revolution.slide.onloaded", function (e) {
                    setTimeout(function () {
                        SEMICOLON.slider.sliderParallaxDimensions();
                    }, 200);
                });

                revapi202.bind("revolution.slide.onchange", function (e, data) {
                    SEMICOLON.slider.revolutionSliderMenu();
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>