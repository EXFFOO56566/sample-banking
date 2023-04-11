@extends('layout')

@section('title')
    @lang('Sign in')
@endsection

@section('content')

@include('frontend.breadcrumb')

    <section id="paymentMethod">
        <div class="container">
           

            <div class="row calculate justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="box">

                        <form method="post" action="{{route('login')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">

                                            <input type="text" name="username" class="myForn" placeholder="@lang('Username')" required>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input type="password"  name="password" class="myForn" placeholder="@lang('Password')" required>
                                        </div>
                                    </div>
                                </div>


                                        <div class="form-group padding-top-10 col-md-12">
                                            <button class="btn" type="submit">@lang('Sign in')</button>
                                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection