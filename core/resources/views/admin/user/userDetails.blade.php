@extends('admin')
@section('Profile', 'active')
@section('title', 'User DETAILS')


@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user"></i> @lang('USER DETAILS')</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <div class="text-center">
                    @if($data->avatar == NULL)
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                      @else
                    <img style="max-height: 250px;" src="{{asset('assets/image/avatar/'.$data->avatar)}}" class="avatar img-circle img-thumbnail" alt="avatar">

                    @endif
                    <div class="col-md-12"><br>
                       <h5>{{$data->name}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-money" aria-hidden="true"></i>
                        <div class="info">
                             <h4>@lang('Current balance')</h4>
                            <p><b>{{$data->balance}} {{$gnl->cur}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-credit-card-alt"></i>
                        <div class="info">
                      <h4>@lang('Total Deposited')</h4>
                            <p><b>{{$totaldepo}} {{$gnl->cur}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="widget-small warning coloured-icon" ><i class="icon fa fa-reply" style="background-color: #28a745;"></i>
                        <div class="info">
                            <h4>@lang('Total Withdrawal')</h4>
                            <p><b>{{$totalwithd}} {{$gnl->cur}}</b></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tile">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block" href="{{route('admin.withdraw.report', $data->id)}}">Withdraw Report</a>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block" href="{{route('admin.transaction.report', $data->id)}}">Transaction Report  <br></a>
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
            </div>
            <div class="tile">
                <h3 class="tile-title">@lang('UPDATE PROFILE')</h3>
                <form action="{{route('admin.userDetails.update')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf

                    <input  type="hidden" name="id" value="{{$data->id}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('First Name')</label>
                            <input class="form-control" type="text" name="first_name" value="{{$data->first_name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Last Name')</label>
                            <input class="form-control" type="text" name="last_name" value="{{$data->last_name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Username')</label>
                            <input class="form-control" type="text" name="username" value="{{$data->username}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Account Number')</label>
                            <input class="form-control" type="text" name="account_number" value="{{$data->account_number}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Email')</label>
                            <input class="form-control" type="text" name="email" value="{{$data->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">@lang('Mobile')</label>
                            <input class="form-control" type="text" name="phone" value="{{$data->phone}}">
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">@lang('Status')
                            </label><br>
                            <input type="checkbox" name="user_banned"
                                   @if($data->user_banned == 0) checked @endif
                                   data-toggle="toggle"   data-on="Active" data-off="Blocked"  data-onstyle="success" data-offstyle="danger" data-width="100%">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">@lang('Email Verification')
                            </label><br>
                            <input type="checkbox" name="email_verified"
                                   @if($data->email_verified == 1) checked @endif
                                   data-toggle="toggle"   data-on="Verified" data-off="Unverified"  data-onstyle="success" data-offstyle="danger" data-width="100%">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">@lang('Mobile Verification')</label><br>
                            <input  type="checkbox" name="sms_verified"  @if($data->sms_verified == 1) checked @endif data-toggle="toggle"  data-on="Verified" data-off="Unverified" data-onstyle="success"  data-offstyle="danger" data-width="100%">
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" style="width: 100%!important;" type="submit">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>





@endsection
