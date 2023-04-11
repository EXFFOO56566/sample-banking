


@extends('user')

@section('title')
    @lang('Verify Account')
@stop


@section('content')


    @include('user.breadcrumb')



    <section id="paymentMethod">
        <div class="container">
            @if(Auth::user()->email_verified !=1)
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 text-center">
                        <div class="heading-title padding-bottom-70">
                            <h2>
                                @lang('Verify your email')
                            </h2>
                            <div class="sectionSeparator"></div>

                        </div>
                    </div>
                </div>
                <div class="row calculate justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="box">

                            <form method="post" action="{{route('user.verify.email')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">

                                                <input type="text" name="email_code" class="myForn" placeholder="@lang('Email code')" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button type="submit">@lang('Submit')</button>
                                            </div>
                                        </div>
                                        <a href="{{route('user.resend-mail-code')}}" class="anchor">@lang('Rest code')</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif(Auth::user()->sms_verified !=1)
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 text-center">
                        <div class="heading-title padding-bottom-70">
                            <h2>
                                @lang('Verify your Number')
                            </h2>
                            <div class="sectionSeparator"></div>

                        </div>
                    </div>
                </div>
                <div class="row calculate justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="box">

                            <form method="post" action="{{route('user.verify.number')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">

                                                <input type="text" name="sms_code" class="myForn" placeholder="@lang('Sms code')" required>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button type="submit">@lang('Submit')</button>
                                            </div>
                                        </div>
                                        <a href="{{route('user.resend-sms-code')}}" class="anchor">@lang('Rest code')</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection


@section('script')

@stop