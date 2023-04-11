
@extends('user')

@section('title')
    @lang('Transfer preview')
@endsection

@section('content')

    @include('user.breadcrumb')

    <section id="paymentMethod">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10 text-center">
                    <div class="heading-title padding-bottom-70">
                        <h2>
                            @lang('Other bank')
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>

            <div class="row calculate justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="box">

                        <form>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h5>  <label>@lang('Bank name')</label> </h5>
                                            <input   class="myForn" value="{{$tnfp['bank']}}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h5>  <label>@lang('Amount')</label></h5>
                                            <input   class="myForn" value="{{$tnfp['amount']}}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h5>   <label>@lang('Charge')</label></h5>
                                            <input   class="myForn" value="{{$tnfp['charge']}} {{$gnl->cur}}" readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <h5> <label>@lang('Total')</label></h5>
                                            <input   class="myForn" value="{{$tnfp['total']}} {{$gnl->cur}}" readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <h5> <label>@lang('Processing time')</label></h5>
                                            <input   class="myForn" value="{{$tnfp['p_time']}} " readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <h5> <label>@lang('Branch name')</label></h5>
                                            <input   class="myForn" value="{{$tnfp['branch_name']}} " readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <h5> <label>@lang('Account number')</label></h5>
                                            <input   class="myForn" value="{{$tnfp['account_number']}} " readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <h5> <label>@lang('Account Details')</label></h5>
                                            <textarea    rows="5"  class="form-control"  readonly>{{$tnfp['details']}}</textarea>
                                        </div>


                                    </div>
                                </div>

                                <div class="form-group padding-top-10 col-md-12">
                                    <button class="btn" data-toggle="modal"  data-target="#exampleModal" type="button">@lang('Transfer')</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Are you sure you wnat to transfer now?')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('user.ot.transfer.confirm')}}">
                        @csrf
                        <input type="hidden" name="bank_name" value="{{$tnfp['bank_id']}}">
                        <input type="hidden" name="amount" value="{{$tnfp['amount']}}">
                        <input type="hidden" name="branch_name" value="{{$tnfp['branch_name']}}">
                        <input type="hidden" name="account_number" value="{{$tnfp['account_number']}}">
                        <input type="hidden" name="details" value="{{$tnfp['details']}}">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">@lang('Yes')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('No')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

   
@endsection

