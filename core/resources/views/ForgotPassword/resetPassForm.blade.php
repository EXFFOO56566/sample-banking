
@extends('homePage.master')

@section('title', 'Change  password')
@section('breadcrumb-title')
    @lang('Change Password')
    @stop

@section('content')

    @include('homePage.breadcrumb')



    <section id="contactUs" class="logRegForm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="contact_form_wrappre2">
                        <form method="post" action="{{route('user.resetPassword')}}">
                            @csrf
                        <input type="hidden" name="email" value="{{$ps->email}}">
                        <input type="hidden" name="code" value="{{$ps->token}}">
                            <div class="inputArea">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" type="password" name="password" placeholder="@lang('Password')" class="form-control" aria-describedby="Site" required>
                                            <div class="input-group-prepend">
						                        <span class="input-group-text" id="Site">
                                                  <i class="fas fa-key"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('Confirm Password')" aria-describedby="url" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="url">
                                                  <i class="fas fa-key"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button class="loginnow" type="submit">@lang('Change')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="lostPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Enter You Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="get" action="{{route('sendResetPassMail')}}">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input class="form-control" type="email" name="resetEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary btn-md btn-block"  type="submit">RESET PASSWORD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
