@extends('templates.intern')

@section('styles')   
<style>
    .border-form-control {
        height: 48px;
        padding: 8px 4px;
        font-size: 21px;
        letter-spacing: 1px;
        background-color: transparent!important;
        border-top: transparent;
        border-right: transparent;
        border-left: transparent;
        border-bottom-width: 1px;
        font-family: source sans pro,sans-serif;
    }
</style>
@endsection

@section('scripts')
<script>
    
</script>
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
<div id="section-contact" class="page-section notoppadding">
    <div class="container clearfix">
        <div class="divcenter topmargin" style="max-width: 850px;">
            <div class="contact-widget">
                <div class="contact-form-result"></div>
                <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">
                    <div class="form-process"></div>
                    <div class="col_half">
                        <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control border-form-control required" placeholder="Name" />
                    </div>
                    <div class="col_half col_last">
                        <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control border-form-control" placeholder="Email Address" />
                    </div>
                    <div class="clear"></div>
                    <div class="col_half">
                        <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control border-form-control" placeholder="Phone" />
                    </div>
                    <div class="col_half col_last">
                        <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control border-form-control" placeholder="Subject" />
                    </div>
                    <div class="clear"></div>
                    <div class="col_full center">
                        <button class="button button-border button-circle t500 noleftmargin topmargin-sm" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                        <br>
                        <small style="display: block; font-size: 13px; margin-top: 15px;">We'll do our best to get back to you within 6-8 working hours.</small>
                    </div>
                    <div class="clear"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection