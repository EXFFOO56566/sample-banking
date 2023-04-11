
@extends('layout')

@section('title')
    @lang('Latest news')
@endsection
@section('style')

@endsection
@section('content')
    @include('frontend.breadcrumb')
    <section id="wcu">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 text-center">
                    <div class="heading-title">
                        <h2>
                            @lang('Latest news')
                        </h2>
                        <div class="sectionSeparator"></div>

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
@endsection
@section('script')

@endsection