@extends('admin')
@section('user', 'active')
@section('title')
    {{$title}}
    @stop

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-users"></i> {{$title}}</h1>
            </div>
        </div>
        <div class="raw">
            <div class="col-lg-12">
                <div class="tile">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            @if(count($data) == 0)
                                <tr>
                                    <td class="text-center">
                                        <h2>@lang('No data found') </h2>
                                    </td>
                                </tr>
                            @else
                            <tr>
                                <th>#</th>
                                <th>@lang('First Name')</th>
                                <th>@lang('Last Name')</th>
                                <th>@lang('Username')</th>
                                <th>@lang('Account Number')</th>
                                <th>@lang('EMAIL')</th>
                                <th>@lang('MOBILE')</th>
                                <th>@lang('Balance')</th>
                                <th>@lang('ACTION')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <th>{{$value->first_name}}</th>
                                <th>{{$value->last_name}}</th>
                                <th>{{$value->username}}</th>
                                <th>{{$value->account_number}}</th>
                                <th>{{$value->email}}</th>
                                <th>{{$value->phone}}</th>
                                <th>{{$gnl->cur_symbol}} {{$value->balance}} {{$gnl->cur}}</th>
                                <th >
                                    <a href="{{route('admin.userDetails',$value->id)}}"> <button title="DETAILS" type="button" class="btn btn-info"><i class="fa fa-eye"></i></button></a>                            </th>
                            </tr>
                            @endforeach
                            @endif
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
