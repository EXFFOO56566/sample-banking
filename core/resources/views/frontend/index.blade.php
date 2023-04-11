@extends('layout')

@section('home', 'active')
@section('title')
    @lang('Home')
@endsection
@section('style')

    <link rel="stylesheet"   href="{{asset('assets/frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/animate.css')}}">
@stop

@section('content')


<section id="welcomeArea" class="hero-area owl-carousel">

    @foreach($slider as $data)
        <div class="single-hero-area dark-overlay" style="background: url({{asset('assets/image/banner/'.$data->banner)}}) no-repeat">
            <div class="hero-content">
                <div class="table-cell col-md-10 col-lg-8">
                    <h1>{{__($data->title)}}</h1>
                    <h2>{{__($data->subtitle)}}</h2>
                    <a href="{{$data->btn_link}}" class="bttn-mid btn-fill">{{__($data->btn_name)}}</a>
                </div>
            </div>

        </div>
    @endforeach

</section>

<section  id="aboutUs" class="about-content-area about-padding">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 text-center">
            <div class="heading-title">
                <h2>
                    {{__($gnl->about_title)}}
                </h2>
                <div class="sectionSeparator"></div>
                <p>
                    {{__($gnl->about_subtitle)}}
                </p>
            </div>
        </div>
    </div>
</div>

</section>

<section  class="about-content-area">

    <div class="video-btn">
        <a href="{{$gnl->video_link}}" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
    </div>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-lg-6 p-0 left-content-area left-content-bg"  style="background-image: url({{asset('assets/image/video-banner.jpg')}}); background-size: cover;">
                <div class="left-content-area left-content-bg" ></div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="right-content-area bg-gray">
                    <div class="heading-title">
                        <h2>
                            {{__($gnl->video_section_title)}}
                        </h2>

                        <p style="padding-top: 30px">
                            {{ __($gnl->video_section_dec) }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Feature Area Start -->
<section id="services"  >
    <div class="container" id="feature" >
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                      {{__($gnl->service_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{__($gnl->service_subtitle)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="box">
                    <div class="topHeader d-flex">
                        <i class=" {{$service->icon}}"></i>
                        <div class="title d-flex align-self-center">
                            <div class="title d-flex align-self-center">
                                <h3>
                                    {{__($service->name)}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="content">
                            <p>
                                {{ __($service->description) }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
    </div>
</section>
<!-- Feature Area End -->







<!-- FAQ Area Start -->
<section id="faq">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                       {{__($gnl->faq_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{__($gnl->faq_subtitle)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faq-accordian">
                    <div class="panel-group accordion" id="accordionId">

                        <div class="row">
                            <div class="col-12">
                                <div class="faq-accordian">
                                    <div class="panel-group accordion" id="accordionId">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($faqs as $faq)

                                                    @endforeach

                                            </div>
                                            <div class="col-md-12">
                                                @foreach($faqs as $faq)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a  data-toggle="collapse" data-target="#collapse{{$faq->id}}"  aria-expanded="false"    aria-controls="collapse{{$faq->id}}">
                                                                {{__($faq->title)}}</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionId">
                                                        <div class="panel-body">
                                                         <p>
                                                             {{ __($faq->description)}}
                                                         </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ Area End -->


<section id="wcu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                        {{__($gnl->blog_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{__($gnl->blog_subtitle)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="box">
                    <div class="img">
                        <a href="{{route('single.blog',[$blog->id, strtolower(urlencode($blog->title))])}}">  <img class="img-fluid" src="{{asset('assets/image/blog/'.$blog->image)}}" alt=""> </a>
                    </div>
                    <div class="content">
                        <a href="{{route('single.blog',[$blog->id, strtolower(urlencode($blog->title))])}}"> <h3>
                           {{__($blog->title)}}
                        </h3> </a>
                        <p>
                            {{__(str_limit( $blog->description, $limit = 250, $end = '....')) }}
                        </p>

                    </div>
                </div>
            </div>
                @endforeach


        </div>
    </div>
</section>



<!-- brand begin-->

<!-- brand end -->
@endsection
@section('script')
    <script src="{{asset('assets/frontend/js/jquery.magnific-popup.js')}}"></script>

    <script>

        // banner content animation
        $(".hero-area").on("translate.owl.carousel", function() {
            $(".hero-content h3").removeClass("animated fadeIn").css("opacity", "0"),
                $(".hero-content h2").removeClass("animated flipInX").css("opacity", "0"),
                $(".hero-content p").removeClass("animated fadeIn").css("opacity", "0"),
                $(".hero-content a").removeClass("animated flipInX").css("opacity", "0")
        }),
            $(".hero-area").on("translated.owl.carousel", function() {
                $(".hero-content h3").addClass("animated fadeIn").css("opacity", "1"),
                    $(".hero-content h2").addClass("animated flipInX").css("opacity", "1"),
                    $(".hero-content p").addClass("animated fadeIn").css("opacity", "1"),
                    $(".hero-content a").addClass("animated flipInX").css("opacity", "1")
            });

        //======================================
        //========== magnificPopup video ============
        //======================================
        $('.mfp-iframe').magnificPopup({
            type: 'video'
        });
        $('.image-popup').magnificPopup({
            type: 'image'
        });


    </script>
    <script>
        $('.hero-area').owlCarousel({
            loop:true,
            dots: true,
            mouseDrag: true,
            autoplay: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplayTimeout: 10000,
            smartSpeed: 1000,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        // Partner Slider
        $('.single-partners').owlCarousel({
            loop:true,
            dots: false,
            autoplay: true,
            margin:30,
            smartSpeed: 1500,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });

    </script>
@stop
