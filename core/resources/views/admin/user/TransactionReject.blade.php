@extends('admin')
@section('user', 'active')
@section('title')
   @lang('Transaction Rejected')
@stop

@section('content')
    <main class="app-content">
        <div class="app-title">

        </div>
        <div class="raw">
            <div class="col-lg-12">
                <div class="tile">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th> @lang('Username')</th>
                                <th> @lang('Amount')</th>
                                <th> @lang('Charge')</th>
                                <th> @lang('Account')</th>
                                <th> @lang('Request at')</th>
                                <th> @lang('Reject at')</th>
                                <th> @lang('Processing Time')</th>
                                <th> @lang('Status')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($reject)==0)
                                <tr>
                                    <td colspan="7"><h2>@lang('No Data Available')</h2></td>
                                </tr>
                            @endif
                            @foreach($reject as $log)
                                <tr>
                                    <td> <a href="{{route('admin.userDetails',$log->user->id)}}"> {{$log->user->username}} </a></td>
                                    <td>{{$log->amount}} {{$gnl->cur}}</td>
                                    <td>{{$log->fee}} {{$gnl->cur}}</td>
                                    <td>{{$log->details}}</td>
                                    <td>{{$log->created_at->diffForHumans()}}</td>
                                    <td>{{$log->updated_at->diffForHumans()}}</td>
                                    <td>{{$log->p_time}}</td>
                                    <td>@if($log->status == 0) <span class="badge badge-warning">Pending</span> @elseif($log->status == 1) <span class="badge badge-success">Approve</span>   @elseif($log->status == 2) <span class="badge badge-danger">Refund</span>   @endif</td>


                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{$reject->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

@section('script')

@endsection
