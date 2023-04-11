

@extends('admin')
@section('setting-SmsApi', 'active')
@section('title', 'Sms Api Settings')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Sms Api Settings</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Short Code</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>@{{message}}</td>
                            <td>Details Text Form Script</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>@{{number}} </td>
                            <td>User name. Will Pull Form Database and Use in EMAIL text</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('admin.sms.settings.update')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                   <h5> <label for="exampleInputEmail1">Sms Api</label></h5>
                                    <input class="form-control" id="exampleInputEmail1" type="text" name="sms_api" value="{{$data-> sms_api}}" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" style="width: 100%" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@stop

