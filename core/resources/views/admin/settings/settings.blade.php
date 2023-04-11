

@extends('admin')
@section('setting', 'active')
@section('title', 'General Settings')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> General Settings</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('admin.general.settings')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">
                                      <h5>  <label for="exampleInputEmail1">WEBSITE TITLE</label></h5>
                                        <input class="form-control" type="text" name="title" value="{{$data->title}}"  placeholder="Enter title">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                      <h5>  <label for="exampleInputEmail1">WEBSITE COLOR</label></h5>
                                        <input class="form-control jscolor"  name="color1" value="{{$data->color1}}"  placeholder="Website color">
                                    </div>
                                    <div class="form-group  col-md-4">
                                        <h6>BASE CURRENCY </h6>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg" value="{{$data->cur}}" name="currency">
                                            <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-money"></i>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group  col-md-4">
                                        <h6>CURRENCY SYMBOL </h6>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg" value="{{$data->cur_symbol}}" name="currency_symbol">
                                            <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-exclamation-circle"></i>
                                            </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <h5> <label for="exampleInputEmail1">REGISTRATION</label></h5>
                                        <input type="checkbox" name="registration" @if($data->registration == 1) checked @endif data-toggle="toggle" data-on="ON" data-off="OFF" data-onstyle="success" data-offstyle="danger" data-width="100%">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <h5><label for="exampleInputEmail1">EMAIL NOTIFICATION</label></h5>
                                        <input type="checkbox" name="email_notification"
                                               @if($data->email_notification == 1) checked @endif
                                               data-toggle="toggle"   data-on="ON" data-off="OFF"  data-onstyle="success" data-offstyle="danger" data-width="100%">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <h5><label for="exampleInputEmail1">SMS NOTIFICATION</label></h5>
                                        <input  type="checkbox" name="sms_notification" @if($data->sms_notification == 1) checked @endif data-toggle="toggle"  data-on="ON" data-off="OFF" data-onstyle="success"  data-offstyle="danger" data-width="100%">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <h5><label for="email_verification">EMAIL VERIFICATION</label></h5>
                                        <input type="checkbox" name="email_verification" @if($data->email_verification == 1 ) checked @endif data-toggle="toggle" data-on="ON" data-off="OFF" data-onstyle="success" data-offstyle="danger" data-width="100%">
                                    </div>
                                    <div class=" form-group col-md-4 mb-3">
                                        <h5><label for="sms_verification">SMS VERIFICATION</label></h5>
                                        <input type="checkbox" name="sms_verification" @if($data->sms_verification == 1 ) checked @endif data-toggle="toggle" data-on="ON" data-off="OFF" data-onstyle="success" data-offstyle="danger" data-width="100%">
                                    </div>
                                    <div class="form-group  col-md-12">
                                        <h5>BRANDING </h5>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg" value="{{$data->branding}}" name="branding">
                                            <div class="input-group-append"><span class="input-group-text">
                                            ©
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" style="width: 100%!important;" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@stop
