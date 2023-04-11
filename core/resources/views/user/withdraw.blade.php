



@extends('user')
@section('deposit', 'active')
@section('title')
    @lang('Transfer')
@stop

@section('content')
    @include('user.breadcrumb')

    <section id="package">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 text-center">
                    <div class="heading-title">
                        <h2>
                           @lang('E-currency Methods')
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($gates as $gate)
                <div class="col-lg-4">
                    <div class="priceBox normal">
                        <div class="header">
                            <h3>
                                {{__($gate->name)}}
                            </h3>

                        </div>
                        <div class="list">
                            <ul>
                                <li>
                                    <p>
                                        @lang('Limit'): <strong>{{$gnl->cur_symbol}} {{$gate->minamo}}</strong> ~ <strong>{{$gnl->cur_symbol}} {{$gate->maxamo}}</strong>

                                    </p>
                                </li>
                                <li>
                                    <p>
                                        @lang('Charge'): <strong>{{$gnl->cur_symbol}} {{$gate->fixed_charge}}</strong> + <strong>{{$gate->percent_charge}} %</strong>
                                    </p>
                                </li>

                            </ul>
                        </div>
                        <div class="footer">

                        </div>
                        <div class="button depoButton" data-toggle="modal" data-name="{{$gate->name}}" data-gate="{{$gate->id}}"  data-target="#depoModal">
                            <a href="#">
                                @lang('Transfer Now')
                            </a>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </section>


    <section id="transaction p-0">
        <div class="container" id="withdraw-log">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12 text-center">
                    <div class="heading-title">
                        <h2>
                            @lang('E-currency Log')
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="tab1">

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th class="text-center">@lang('Amount')</th>
                                            <th class="text-center">@lang('Method')</th>
                                            <th class="text-center">@lang('Account')</th>
                                            <th class="text-center">@lang('TRX Time')</th>
                                            <th class="text-center">@lang('Status')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($withdraw)==0)
                                            <tr>
                                                <td colspan="5"><h2>@lang('No Data Available')</h2></td>
                                            </tr>
                                        @endif
                                        @foreach($withdraw as $log)
                                            <tr>
                                                <td>{{$log->amount}} {{$gnl->cur}}</td>
                                                <td>{{$log->wmethod->name}}</td>
                                                <td>{{$log->account}}</td>
                                                <td>{{$log->created_at}}</td>
                                                <td>@if($log->status == 0) Pending @elseif($log->status == 1) Paid @elseif($log->status == 2) Refund @endif</td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="d-flex justify-content-end">
                    {{$withdraw->links()}}
                </div>
            </div>

        </div>

    </section>


<!-- Modal -->
<div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.withdraw.post')}}" method="POST">
                    @csrf
                    <input type="hidden" name="gateway" id="gateWay"/>
                    <div class="form-group">
                        <h5>Withdraw Amount</h5>
                        <div class="input-group-append">
                            <input type="text" name="amount" class="form-control"/>
                            <span class="input-group-text">{{$gnl->cur_symbol}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Account Details</h5>
                        <textarea class="form-control" name="account"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn viweBtn" style="width:100%;">@lang('Confirm Transfer')</button>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){

            $(document).on('click','.depoButton', function(){
                $('#ModalLabel').text($(this).data('name'));
                $('#gateWay').val($(this).data('gate'));
            });
        });
    </script>


@endsection
