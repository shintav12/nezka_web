<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/settings.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('include/rs-plugin/css/navigation.css')}}">
	<link rel="stylesheet" href="css/barber.css" type="text/css" />

    <title>Nezka Studio</title>
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
	<header id="header" class="full-header transparent-header static-sticky" data-sticky-offset="full" data-sticky-offset-negative="100">
		<div id="header-wrap" style="border:0px">
			<div class="container clearfix">
				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
				<div id="logo" style="border:0px">
					<a href="index.html" class="standard-logo" data-dark-logo="{{asset('img/logo-alt.png')}}"><img src="{{asset('img/logo.png')}}" alt="Canvas Logo"></a>
					<a href="index.html" class="retina-logo" data-dark-logo="{{asset('img/logo-alt.png')}}"><img src="{{asset('img/logo.png')}}" alt="Canvas Logo"></a>
				</div>
				<nav id="primary-menu" style="border:0px">
				<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" style="border:0px">
					<li><a href="#" data-href="#services"><div>Servicios</div></a></li>
					<li><a href="#" data-href="#quien_eres"><div>¿Qui&eacute;n eres?</div></a></li>
					<li><a href="#" data-href="#portofolio"><div>Portafolio</div></a></li>
					<li><a href="#" data-href="#news"><div>Noticias</div></a></li>
					<li><a href="#" data-href="#clients"><div>Clientes</div></a></li>
					<li><a href="#" data-href="#contact_us"><div>Contacto</div></a></li>
				</ul>
				</nav>
			</div>
		</div>
		</header>
		<section id="slider" class="slider-element slider-parallax full-screen force-full-screen">
		<div class="slider-parallax-inner">
			<div class="full-screen force-full-screen section nopadding nomargin noborder ohidden">
				<div class="container center">
					<div class="vertical-middle ignore-header">
						<div class="emphasis-title">
							<h1 style="font-size:64px"> 
								<span class="text-rotater nocolor" data-separator="|" data-rotate="fadeIn" data-speed="4000">
									<span class="t-rotate t700 font-body opm-large-word">Inspiraci&oacute;n.|Confianza.|Identidad.|Marca.</span>
								</span>
							</h1>
						</div>
						<a href="#" class="button button-border button-circle" data-href="#quien_eres" data-scrollto="#quien_eres" data-easing="easeInOutExpo" data-speed="1250" data-offset="70">Dejanos qui&eacute;n eres</a>
					</div>
				</div>
				<div class="video-wrap">
					<video poster="images/videos/3.jpg" preload="auto" loop autoplay muted>
						<source src="{{asset('videos/video1.webm')}}" type='video/webm' />
						<source src="{{asset('videos/video1.mp4')}}" type='video/mp4' />
					</video>
					<div class="video-overlay" style="background: rgba(255,255,255,0.40);"></div>
				</div>
				<a href="#" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
			</div>
		</div>
		</section>
        <section id="content">
			@yield('content')
    	</section>
		<footer id="footer" class="dark" style="background-color: #121212; padding: 60px 0">
			<div class="container clearfix">
				<div class="footer-widgets-wrap center clearfix">
					<img src="{{asset('img/logo_alt_footer.png')}}" width="200" alt="">
					<div class="topmargin-lg clearfix">
						<a href="https://www.facebook.com/nezkastudio/" class="social-icon si-small si-borderless inline-block si-facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>

						<a href="https://vimeo.com/user86210896" class="social-icon si-small si-borderless inline-block si-vimeo">
							<i class="icon-vimeo"></i>
							<i class="icon-vimeo"></i>
						</a>
						<a href="https://www.instagram.com/nezkastudio/" class="social-icon si-small si-borderless inline-block si-instagram">
							<i class="icon-instagram"></i>
							<i class="icon-instagram"></i>
						</a>
						<a href="https://www.linkedin.com/company/nezka-studio" class="social-icon inline-block  si-small si-borderless si-linkedin">
							<i class="icon-linkedin"></i>
							<i class="icon-linkedin"></i>
						</a>
					</div>
					<div class="uppercase ls3" style="color: #333; margin-top: 10px">&copy; Nezkastudio 2018. All Rights Reserved.</div>
				</div>
			</div>
		</footer>
    </div>

    <div id="gotoTop" class="icon-angle-up"></div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>

    <script src="js/functions.js"></script>

    <script src="include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
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
        }); /*ready*/
	</script>
	@yield('scripts')
</body>

<!-- Mirrored from themes.semicolonweb.com/html/canvas/index-corporate.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Nov 2018 08:30:41 GMT -->

</html>