@extends('admin')
@section('title', 'DEPOSITS')
@section('DEPOSITS', 'active')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="icon fa fa-desktop"></i> @lang('DEPOSITS')</h1>
            </div>
        </div>
        <div class="tile">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        @lang('Username')
                    </th>
                    <th>
                       @lang('Amount')
                    </th>
                     <th>
                       @lang('Charge')
                    </th>
                    <th>
                        @lang('Gateway')
                    </th>
                    <th>
                        @lang('Status')
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($deposits as $depo)
                    <tr>
                        <td>
                            <a href="{{route('admin.userDetails',$depo->user_id)}}">{{$depo->userName->username}}</a>
                        </td>
                        <td>
                            {{$depo->amount}} {{$gnl->cur}}
                        </td>
                        <td>
                            {{$depo->charge}} {{$gnl->cur}}
                        </td>
                        <td>
                        {{$depo->gateway->name}}

                        <td>
                            <span class="badge {{$depo->status==1?'badge-success':'badge-warning'}}">{{$depo->status==1?'Complete':'Pending'}}</span>
                        </td>
                    </tr>
                @endforeach
                <tbody>
            </table>
            {{$deposits->links()}}
        </div>
    </main>
@endsection
