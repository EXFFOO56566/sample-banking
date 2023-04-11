<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="zxx">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title> {{$gnl->title}} | @yield('title') </title>
    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('assets/image/favicon.png')}}" type="image/x-icon">
    <!--Bootstrap Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.css')}}">
    <!--Font Awesome Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/all.min.css')}}">
    <!--Animate Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.carousel.css')}}">




    <!--Main Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style.css')}}">

    <!--Responsive Stylesheet-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
    <link href="{{url('/')}}/assets/frontend/css/color.php?color={{$gnl->color1}}" rel="stylesheet">

</head>

<body class="body-class">
<!--Start Preloader-->
<div class="site-preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--End Preloader-->

<!-- Main Menu Area Start -->
<header id="mainHeader" class="header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light p-0">
        <div class="container">
            <a class="navbar-brand" href="{{route('homePage')}}">
                <img src="{{asset('assets/image/logo.png')}}" style="max-width: 220px; max-height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('homePage')}}">@lang('Home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="@if(request()->route()->getName() == 'homePage')#aboutUs @else{{route('homePage')}}#aboutUs @endif">@lang('About')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="@if(request()->route()->getName() == 'homePage')#services @else{{route('homePage')}}#services @endif">@lang('Services')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">@lang('Latest News')</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="@if(request()->route()->getName() == 'homePage')#faq @else{{route('homePage')}}#faq @endif">@lang('Faq')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">@lang('Contact')</a>
                    </li>
                    <select id="langSel">
                        <option style="color: black" value="en"> English</option>
                        @foreach($lang as $data)
                            <option value="{{strtolower($data->code)}}" @if(Session::get('lang') == strtolower($data->code)) selected="selected" @endif style="color: black"><img src="{{ asset('assets/image/lang/'.$data->icon)}}"> {{$data->name}}</option>
                        @endforeach
                    </select>

                </ul>
                <div class="viewPlan">
                    <a href="{{route('login')}}">
                        @lang('Sign in')
                    </a>
                </div>
                <div class="viewPlan">
                    <a href="{{route('register')}}">
                        @lang('Sign up')
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
    <div class="clearfix"></div>
</header>
<!-- Main Menu Area End -->

@yield('content')

<!-- Footer Area Start -->
<footer id="footer">
    <div class="container">
        <div class="row newslatterBox">
            <div class="col-12">
                <div class="box d-flex">
                    <div class="left">
                        <h2>
                            @lang('Join Our Newsletter')
                        </h2>
                        <div class="sectionSeparator"></div>
                    </div>
                    <div class="right">
                        <form action="{{route('subscribePost')}}" method="post">
                            @csrf
                            <input type="text" name="email" placeholder="@lang('Enter your email')">
                            <button type="submit">@lang('Subscribe')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="box">
                    <div class="logo">
                        <a href="{{route('homePage')}}">
                            {{$gnl->title}}
                        </a>
                    </div>
                    <p>
                         {{__($gnl->about_subtitle)}}
                    </p>
                    <div class="social_links">
                        <ul>


                            @foreach($socials as $social)
                                <li>
                                    <a href="{{$social->link}}">
                                        <i title="{{$social->name}}" class="{{$social->icon}}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

            </div>
            <div class="col-lg-3">
                <div class="box box4">
                    <h2 >
                       @lang(' Contact Us')
                    </h2>
                    @foreach($contacts as $contact)
                        <p style="padding-top: 10px">
                            {{$contact->name}}
                        </p>

                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="copyright">
        <p class="text-center">
            {{$gnl->branding}}
        </p>
    </div>
</footer>


<!--Start ClickToTop-->
<div class="totop">
    <a href="#top"><i class="fa fa-arrow-up"></i></a>
</div>
<!--End ClickToTop-->


<!--jQuery JS-->
<script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
<!--Bootstrap JS-->
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/popper.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>

<!--YTPlayer-->

<script>
    $(document).on('change', '#langSel', function () {
        var code = $(this).val();
        window.location.href = "{{url('/')}}/change-lang/"+code ;
    });
</script>
<!-- main js -->
<script src="{{asset('assets/frontend/js/main.js')}}"></script>
@yield('script')
<script type="text/javascript" src="{{asset('assets/frontend/js/toastr.min.js')}}"></script>
@include('notification.notification')
</body>