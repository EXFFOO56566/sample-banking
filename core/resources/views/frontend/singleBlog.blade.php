
@extends('layout')

@section('title')
    {{__($blog->title)}}
@endsection
@section('style')
    <style>
        ._5mdd span{
            color: #242424 !important;
        }
        .fb_iframe_widget,
        .fb_iframe_widget span,
        .fb_iframe_widget span iframe[style] {
            min-width: 100% !important;
            width: 100% !important;
        }


    </style>
    @endsection
@section('content')
    @include('frontend.breadcrumb')
<section id="wcu">


    <div class="container">


        <div class="row">

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="box">
                                <div class="img text-center">
                                    <a href="#">  <img class="img-fluid" src="{{asset('assets/image/blog/'.$blog->image)}}" alt=""> </a>
                                </div>
                                <div class="content">
                                    <h3>
                                        {{__($blog->title)}}
                                    </h3>
                                    <p>
                                        {{nl2br(__($blog->description))}}
                                    </p>

                                </div>
                            </div>
                            <div class="box">
                                <div class="comments-area">
                                    <div class="fb-comments"  data-width="100%"
                                         data-href="{{url()->current()}}"
                                         data-numposts="5"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <div class="col-md-4">


                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-6">
                        <div class="single-widget" id="recent-post">
                            <h3>@lang('Recent Posts')</h3>
                            @foreach($latest as $data)
                            <div class="single-recent">
                                <div class="part-img">
                                    <a href="{{route('single.blog',[$data->id, strtolower(urlencode($data->title))])}}"> <img src="{{asset('assets/image/blog/'.$data->image)}}" alt=""></a>
                                </div>
                                <div class="part-text">
                                    <h4><a href="{{route('single.blog',[$data->id, strtolower(urlencode($data->title))])}}">{{__($data->title)}}</a></h4>
                                    <span>{{$data->updated_at->diffForHumans()}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>


</section>
@endsection
@section('script')
<div id="fb-root"></div>

@if($gnl->facebook_api !== NULL)

<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId={{$gnl->facebook_api}}&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
    @endif

@endsection