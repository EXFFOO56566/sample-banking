


@extends('layout')

@section('title')
    @lang('Sign Up')
@endsection

@section('content')

    @include('frontend.breadcrumb')

    <section id="paymentMethod">
        <div class="container">
           
            <div class="row calculate justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="box">

                        <form method="post" action="{{route('register')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">

                                            <input type="text" name="first_name" class="myForn" placeholder="@lang('First Name')" required>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <input type="text"  name="last_name" class="myForn" placeholder="@lang('Last Name')"  required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type="email"  name="email" class="myForn" placeholder="@lang('Email')"  required>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <input type="text"  name="phone" class="myForn" placeholder="@lang('Phone Number')"  required>
                                        </div>

                                        <div class="form-group col-md-12">

                                            <input type="text" name="username" class="myForn" placeholder="@lang('Username')"  required>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <input type="password"  name="password" class="myForn" placeholder="@lang('Password')"  required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password"   class="myForn" name="password_confirmation"  placeholder="@lang('Confirm Password')"  required>
                                        </div>
                                    </div>
                                </div>

                                        <div class="form-group padding-top-10 col-md-12">
                                            <button class="btn" type="submit">@lang('Register')</button>
                                        </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection


