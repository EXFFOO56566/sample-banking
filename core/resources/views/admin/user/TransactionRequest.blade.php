@extends('admin')
@section('user', 'active')
@section('title')
    @lang('Transaction request')
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
                                <th> @lang('TRX Time')</th>
                                <th> @lang('Processing Time')</th>
                                <th> @lang('Status')</th>
                                <th> @lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($reqs)==0)
                                <tr>
                                    <td colspan="7"><h2>@lang('No Data Available')</h2></td>
                                </tr>
                            @endif
                            @foreach($reqs as $log)
                                <tr>
                                    <td> <a href="{{route('admin.userDetails',$log->user->id)}}"> {{$log->user->username}} </a></td>
                                    <td>{{$log->amount}} {{$gnl->cur}}</td>
                                    <td>{{$log->fee}} {{$gnl->cur}}</td>
                                    <td>{{$log->details}}</td>
                                    <td>{{$log->created_at->diffForHumans()}}</td>
                                    <td>{{$log->p_time}}</td>
                                    <td>@if($log->status == 0) <span class="badge badge-warning">@lang('Pending')</span> @elseif($log->status == 1) <span class="badge badge-success">@lang('Approve')</span>   @elseif($log->status == 2) <span class="badge badge-danger">@lang('Refund')</span>   @endif</td>

                                    <td>
                                        <button class="btn btn-success approveButton" data-toggle="modal"  data-gate="{{$log->id}}"  data-target="#approveModal" ><i class="fa fa-check "></i> Approve</button>
                                        <button  class="btn btn-danger rejectButton" data-toggle="modal"  data-gate="{{$log->id}}"  data-target="#rejectModal" ><i class="fa fa-times"></i>  Reject</button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{$reqs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">@lang('Are you sure you wnat to approve this?'))</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.transaction.ot.bank.confirm')}}" method="POST">
                        @csrf
                        <input type="hidden" name="transaction" id="withdrawApprove"/>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">@lang('Approve')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">@lang('Are you sure you wnat to reject this?')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.transaction.ot.bank.reject')}}" method="POST">
                        @csrf
                        <input type="hidden" name="transaction" id="withdrawReject"/>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-danger">@lang('Reject')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        $(document).ready(function(){
            $(document).on('click','.approveButton', function(){
                $('#withdrawApprove').val($(this).data('gate'));
            });
            $(document).on('click','.rejectButton', function(){
                $('#withdrawReject').val($(this).data('gate'));
            });
        });
    </script>

@endsection
