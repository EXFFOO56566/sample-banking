

@extends('admin')
@section('charge', 'active')
@section('title', 'Manage Charge')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Manage Charge</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title ">Own Bank Transfer Charge</h3>
                    <div class="tile-body">
                        <form role="form" method="POST" action="{{route('admin.tf.charges.update')}}">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Balance Transfer Fixed Charge</h6>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" value="{{$gnl->bal_trans_fixed_charge}}" name="bal_trans_fixed_charge">
                                        <div class="input-group-append"><span class="input-group-text">
                                        {{$gnl->cur}}
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h6>Balance Transfer Percentage Charge </h6>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" value="{{$gnl->bal_trans_per_charge}}" name="bal_trans_per_charge">
                                        <div class="input-group-append"><span class="input-group-text">
                                        %
                                        </span>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <br>
                            <div class="row">
                                <hr>
                                <div class="col-md-12 ">
                                    <button class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </main>
@endsection
@section('script')

@stop
