@extends('admin')
@section('user', 'active')
@section('title')
   @lang('Transaction Approved')
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
                                <th> @lang('Username')</th>
                                <th> @lang('Amount')</th>
                                <th> @lang('Charge')</th>
                                <th> @lang('Account')</th>
                                <th> @lang('Request at')</th>
                                <th> @lang('Approved at')</th>
                                <th> @lang('Processing Time')</th>
                                <th> @lang('Status')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($approve)==0)
                                <tr>
                                    <td colspan="7"><h2>@lang('No Data Available')</h2></td>
                                </tr>
                            @endif
                            @foreach($approve as $log)
                                <tr>
                                    <td> <a href="{{route('admin.userDetails',$log->user->id)}}"> {{$log->user->username}} </a></td>
                                    <td>{{$log->amount}} {{$gnl->cur}}</td>
                                    <td>{{$log->fee}} {{$gnl->cur}}</td>
                                    <td>{{$log->details}}</td>
                                    <td>{{$log->created_at->diffForHumans()}}</td>
                                    <td>{{$log->updated_at->diffForHumans()}}</td>
                                    <td>{{$log->p_time}}</td>
                                    <td> <span class="badge badge-success">Approve</span> </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{$approve->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

@section('script')


@endsection
