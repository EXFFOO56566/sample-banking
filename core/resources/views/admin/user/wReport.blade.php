@extends('admin')
@section('user', 'active')
@section('title')
    @lang('Withdrawal Report')
@stop

@section('content')
    <main class="app-content">

        <div class="raw">
            <div class="col-lg-12">
                <div class="tile">
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
                            @if(count($data)==0)
                                <tr>
                                    <td colspan="5"><h2>@lang('No Data Available')</h2></td>
                                </tr>
                            @endif
                            @foreach($data as $log)
                                <tr>
                                    <td>{{$log->amount}} {{$gnl->cur}}</td>
                                    <td>{{$log->wmethod->name}}</td>
                                    <td>{{$log->account}}</td>
                                    <td>{{$log->created_at}}</td>
                                    <td>@if($log->status == 0) <span class="badge badge-warning">@lang('Pending')</span> @elseif($log->status == 1) <span class="badge badge-success">@lang('Paid')</span>   @elseif($log->status == 2) <span class="badge badge-danger">@lang('Refund')</span>   @endif</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
