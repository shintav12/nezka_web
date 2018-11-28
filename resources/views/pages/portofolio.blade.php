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
        <h1>Portafolio {{$client_name}}</h1>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <ul class="portfolio-filter clearfix" data-container="#portfolio">
                <li class="activeFilter"><a href="#" data-filter="*">Ver Todas</a></li>
                @foreach($categories as $category)
                    <li><a href="#" data-filter=".{{$category->slug}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
            <div class="clear"></div>
            <div id="portfolio" class="portfolio grid-container clearfix">
                @foreach($works as $work)
                    <article class="portfolio-item {{$work->type_slug}}">
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
        </div>
    </div>
</section>
@endsection