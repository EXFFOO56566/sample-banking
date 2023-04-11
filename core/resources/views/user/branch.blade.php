
@extends('user')

@section('title')
    @lang('Our Branches')
@stop

@section('content')
    @include('user.breadcrumb')






    <section id="wcu">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 text-center">
                    <div class="heading-title">
                        <h2>
                            @lang('Branch List')
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($branches as $branch)
                <div class="col-md-4">
                    <div class="box">

                        <div class="content">
                            <h3>
                             {{__($branch->name)}}
                            </h3>
                            <p>


                               {{nl2br( __($branch->description)) }}

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