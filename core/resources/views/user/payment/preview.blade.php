



@extends('user')
@section('deposit', 'active')
@section('title')
    @lang('Deposit Preview')
@stop
@section('breadcrumb-title')
    @lang('Deposit Preview')
@stop
@section('content')
    @include('user.breadcrumb')






    <section id="investors">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <form  class="contact-form" method="POST" action="{{ route('user.deposit.confirm') }}">
                        @csrf
                        <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                        <div class="box">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="image">
                                        <img class="img-fluid" src="{{asset('assets/image/gateway')}}/{{$data->gateway_id}}.jpg" style="width:100%;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="info">
                                <ul class="list-group text-center">

                                    <li class="list-group-item">Amount: <strong>{{$data->amount}} {{$gnl->cur}}</strong></li>
                                    <li class="list-group-item">Charge: <strong>{{$data->charge}} {{$gnl->cur}}</strong></li>
                                    <li class="list-group-item">Payable: <strong>{{$data->charge + $data->amount}} {{$gnl->cur}}</strong></li>
                                    <li class="list-group-item">In USD: <strong>${{$data->usd_amo}}</strong></li>

                                </ul>
                                <div class="panel-footer">
                                    <button type="submit" class="btn viweBtn" style="width:100%;">
                                        Pay Now
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </section>




@endsection


