@extends('templates.intern')

@section('styles')   

@endsection

@section('scripts')
@endsection

@section('content')
<section id="page-title" style="background:white;">
    <div class="container clearfix">
        <h1 class="mb-3">{{$customer_type->name}}</h1>
        <h4 class="mb-1">{{$customer_type->description}}</h4>
    </div>
</section>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row">
            @foreach($services_customer as $item)
                <div class="col-lg-4 mb-3 pb-3">
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
        </div>
    </div>
</section>
@endsection