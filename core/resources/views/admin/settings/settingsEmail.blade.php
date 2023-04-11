
@extends('admin')
@section('setting-email', 'active')
@section('title', 'Email Settings')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Email Settings</h1>
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
                            <td>@{{name}} </td>
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
                            <form action="{{route('admin.email.settings')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                   <h5> <label for="exampleInputEmail1">Email Form</label></h5>
                                    <input class="form-control" id="exampleInputEmail1" type="email" name="email_from" value="{{$data-> email_from}}" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                   <h5> <label for="exampleTextarea">Email Body</label></h5>
                                    <textarea id="area2" class="form-control" name="email_body" id="exampleTextarea" style="width: 100%;" rows="10">@php echo $data-> email_body; @endphp</textarea>
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
    <script type="text/javascript" src="{{asset('assets/admin/nicEdit/nicEdit-latest.js')}}"></script>
<script type="text/javascript"> bkLib.onDomLoaded(function() {new nicEditor({fullPanel : true}).panelInstance('area2'); }); </script>
@stop
