@extends('admin')
@section('user', 'active')
@section('title')
    @lang('Transaction Report')
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
                                <th>@lang('Date')</th>
                                <th>@lang('Description')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('After Balance')</th>
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
                                    <td>{{$log->created_at}}</td>
                                    <td>{{$log->details}} @if($log->type == 7) @lang('Processing time') {{$log->p_time}} @endif. </td>
                                    <td>{{$log->amount}} {{$gnl->cur}}</td>
                                    <td>{{$log->balance}} {{$gnl->cur}}</td>
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
