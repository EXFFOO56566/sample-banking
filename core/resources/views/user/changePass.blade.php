

@extends('user')
@section('changePass', 'active')
@section('title')
    @lang('Change Password')
@endsection


@section('content')
    @include('user.breadcrumb')




    <section id="paymentMethod">
        <div class="container">
           
            <div class="row calculate justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <div class="box">

                        <form action="{{route('user.password.change')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">@lang('Old Password')</label>
                                    <input class="form-control" name="old_password" type="password"  placeholder="@lang('Old Password')" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">@lang('New Password')</label>
                                    <input class="form-control" name="password" type="password"  placeholder="@lang('New Password')" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label" for="readOnlyInput">@lang('Confirm Password')</label>
                                    <input class="form-control"  name="password_confirmation"  type="password" placeholder="@lang('Confirm Password')" required>
                                </div>

                            </div>
                            <div class="tile-footer">
                                <button class="btn mr_btn_solid" style="  width: 100%!important; margin-bottom: 20px;" type="submit">@lang('Change')</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


