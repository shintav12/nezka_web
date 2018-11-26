@extends('templates.intern')

@section('styles')   
<style>
    .portfolio-overlay a.right-icon {
        left: auto;
        right: 50%;
        margin-left: 0;
        margin-right: -20px;
    }
</style>
@endsection

@section('scripts')
@endsection

@section('content')
<section id="page-title" style="background:white;">
    <div class="container clearfix">
        <h1>{{$project->title}}</h1>
        <div id="portfolio-navigation">
            <a href="{{url('/portofolio')}}"><i class="icon-plus"></i></a>
        </div>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col_two_third portfolio-single-image nobottommargin">
                <div class="fslider" data-arrows="false" data-thumbs="true" data-animation="fade">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            @foreach($images as $image)
                                @if($image->type == "gallery")
                                <div class="slide" data-thumb="{{$image->image}}"><a href="#"><img src="{{$image->image}}" alt=""></a></div>
                                @else
                                <div class="slide" video data-thumb="{{$image->image}}"><?php echo $image->video?></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col_one_third portfolio-single-content col_last nobottommargin">
                <div class="fancy-title mb-0">
                    <h2>Informaci&oacute;n del proyecto:</h2>
                </div>
                <div class="line mb-4 mt-2"></div>
                <p>{{$work->description}}</p>
                <div class="fancy-title  mb-2">
                    <h2>Detalle del proyecto:</h2>
                </div>
                <p>{{$work->detail}}</p>
                <div class="line mb-4"></div>
                <ul class="portfolio-meta bottommargin">
                    <li><span><i class="icon-user"></i>Cliente:</span> {{$client->name}}</li>
                    <li><span><i class="icon-link"></i>Categor&iacute;as:</span> <span>{{$work->categories}}</span></li>
                </ul>
            </div>
            <div class="clear"></div>
            @if(count($related_works) > 0)
            <div class="divider divider-center"><i class="icon-circle"></i></div>
            <h4>Proyectos relacionados:</h4>
            <div id="related-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="30" data-nav="false" data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-xl="4">
                @foreach($related_works as $rwork)
                    <div class="oc-item">
                        <div class="iportfolio">
                            <div class="portfolio-image">
                                <a href="{{url('projects/')}}/{{$rwork->work_slug}}"><img src="{{$rwork->image}}" alt="Open Imagination"></a>
                                <div class="portfolio-overlay">
                                    <a href="{{url('projects/')}}/{{$rwork->work_slug}}" class="right-icon">
                                    @if($rwork->type_slug == 'animacion' || $rwork->type_slug == 'contenido-digital' || $rwork->type_slug == 'audiovisual')
                                    <i class="icon-line-play"></i>
                                    @else
                                    <i class="icon-line-stack"></i>
                                    @endif
                                    </a>
                                </div>
                            </div>
                            <div class="portfolio-desc">
                                <h3><a href="{{url('projects/')}}/{{$work->work_slug}}"></a>{{$rwork->name}}</h3>
                                <span>{{$rwork->client_name}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endsection