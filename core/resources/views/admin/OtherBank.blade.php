@extends('admin')

@section('title', 'Other Banks')
@section('style')

@endsection

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> Other Banks</h1>
            </div>
            <div class="app-search">
                <button class="btn btn-circle  btn-primary" data-toggle="modal" data-target="#newMethod">
                    <i class="fa fa-plus"></i> Add New Bank
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        @foreach($banks as $data)
                            <div class="col-md-4" style="margin-top:10px;">
                                <div class="card text-white {{$data->status==1?'bg-dark':'bg-secondary'}}">
                                    <div class="card-header text-center">
                                        {{$data->name}}
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.other.banks.update', $data->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="1" {{ $data->status == "1" ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $data->status == "0" ? 'selected' : '' }}>Deactive</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-info btn-block btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample{{$data->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-eye"></i> DETAILS
                                            </button>
                                            <div class="collapse" id="collapseExample{{$data->id}}">
                                                <hr/>
                                                <div class="form-group">
                                                    <label>Bank name</label>
                                                    <input type="text" value="{{$data->name}}" class="form-control" id="name" name="name" >
                                                </div>

                                                <hr/>
                                                <div class="card text-center text-dark">
                                                    <div class="card-header">
                                                        Transaction Limit
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="minamo">Minimum Amount</label>
                                                                    <div class="input-group">
                                                                        <input type="text" value="{{$data->min_amount}}" class="form-control" id="minamo" name="min_amount" >
                                                                        <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            {{ $gnl->cur }}
                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="maxamo">Maximum Amount</label>
                                                                    <div class="input-group">
                                                                        <input type="text" value="{{$data->max_amount}}" class="form-control" id="maxamo" name="max_amount" >
                                                                        <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            {{ $gnl->cur }}
                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="card text-center text-dark">
                                                    <div class="card-header">
                                                        Transaction Charge
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="chargefx">Fixed Charge</label>
                                                                    <div class="input-group">
                                                                        <input type="text" value="{{$data->fixed_charge}}" class="form-control" id="chargefx" name="fixed_charge" >
                                                                        <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            {{ $gnl->cur }}
                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="chargepc">Charge in Percentage</label>
                                                                    <div class="input-group">
                                                                        <input type="text" value="{{$data->percent_charge}}" class="form-control" id="chargepc" name="percent_charge" >
                                                                        <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            %
                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                        <div class="card text-center text-dark">
                                                    <div class="card-header">
                                                        Processing time
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">

                                                                    <div class="input-group">
                                                                        <input type="text" value="{{$data->p_time}}" class="form-control" id="chargefx" name="processing_time" >
                                                                        <div class="input-group-append">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>

                                            </div>

                                            <hr/>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </main>


    <div id="newMethod" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Bank</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.other.banks.create')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Bank name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                        </div>

                        <hr/>
                        <div class="card text-center text-dark">
                            <div class="card-header">
                                Transaction  Limit
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="minamo">Minimum Amount</label>
                                            <div class="input-group">
                                                <input type="text"  class="form-control" id="minamo" name="min_amount" >
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                {{ $gnl->cur }}
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="maxamo">Maximum Amount</label>
                                            <div class="input-group">
                                                <input type="text"  class="form-control" id="maxamo" name="max_amount" >
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                {{ $gnl->cur }}
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="card text-center text-dark">
                            <div class="card-header">
                                Transaction  Charge
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="chargefx">Fixed Charge</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="chargefx" name="fixed_charge" >
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                {{ $gnl->cur }}
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="chargepc">Charge in Percentage</label>
                                            <div class="input-group">
                                                <input type="text"  class="form-control" id="chargepc" name="percent_charge" >
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                %
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="card text-center text-dark">
                            <div class="card-header">
                                Processing time
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="input-group">
                                                <input type="text"  class="form-control" name="processing_time" >
                                                <div class="input-group-append">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr/>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>


                        <hr/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endsection