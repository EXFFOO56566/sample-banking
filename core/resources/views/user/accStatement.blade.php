
@extends('user')
@section('deposit_ht', 'active')
@section('title')
    @lang('Account Statement')
@stop
@section('breadcrumb-title')
    @lang('Deposit history')
@stop
@section('content')
    @include('user.breadcrumb')




    <!-- Modal -->
    <section id="transaction">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="tab1">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="pills-deposit-tab" data-toggle="pill" href="#pills-deposit" role="tab" aria-controls="pills-deposit" aria-selected="true">
                                    <p>
                                       @lang('Own bank')
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-withdraw-tab" data-toggle="pill" href="#other-bank" role="tab" aria-controls="pills-withdraw" aria-selected="false">
                                    <p>
                                      @lang('Other bank')
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                                <div class="table-responsive">
                                    <table class="table">


                                        <thead>

                                        <tr>
                                            <th class="text-center">@lang('Date')</th>
                                            <th class="text-center">@lang('Description')</th>
                                            <th class="text-center">@lang('Amount')</th>
                                            <th class="text-center">@lang('After Balance')</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(count($ownBankStatements) == 0)
                                            <tr>
                                                <td colspan="4"><h2>@lang('No Data Available')</h2></td>
                                            </tr>
                                        @else


                                        @foreach($ownBankStatements as $statement)
                                        <tr>
                                            <td>
                                                {{$statement->created_at}}
                                            </td>
                                            <td>
                                                {{$statement->details}}
                                            </td>
                                            <td>
                                                {{$statement->amount}} {{$gnl->cur_symbol}}
                                            </td>
                                            <td>
                                                {{$statement->balance}} {{$gnl->cur_symbol}}
                                            </td>



                                        </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="other-bank" role="tabpanel" aria-labelledby="pills-withdraw-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>

                                            <tr>
                                                <th class="text-center">@lang('Date')</th>
                                                <th class="text-center">@lang('Amount')</th>
                                                <th class="text-center">@lang('After balance')</th>
                                                <th class="text-center">@lang('Account info')</th>
                                                <th class="text-center">@lang('Processing time')</th>
                                                <th class="text-center">@lang('Status')</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(count($otherBankStatements) == 0)
                                            <tr>
                                                <td colspan="6"><h2>@lang('No Data Available')</h2></td>
                                            </tr>
                                        @else

                                            @foreach($otherBankStatements as $data)
                                        <tr>
                                            <td>
                                                {{$data->created_at}}
                                            </td>

                                            <td>
                                                {{$data->amount}} {{$gnl->cur_symbol}}
                                            </td>
                                            <td>
                                                {{$data->balance}} {{$gnl->cur_symbol}}
                                            </td>
                                            <td>
                                                 {{$data->details}}
                                            </td>

                                            <td>
                                                {{$data->p_time}}
                                            </td>
                                            <td>
                                                @if($data->status == 0) pending @elseif($data->status == 1) Confirm @elseif($data->status == 3) Refund @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection