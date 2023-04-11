@extends('admin')
@section('logo', 'active')
@section('title', 'Logo & Favicon Setting')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets\fileInput\bootstrap-fileinput.css')}}">
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bars"></i> Social Icon</h1>
            </div>
        </div>

        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Logo &amp; Favicon Setting</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('admin.logo.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 offset-md-2">
                                <div class="form-group">
                                    <h5>Logo</h5>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;background: #eeeeee" data-trigger="fileinput">
                                            <img style="width: 200px" src="{{asset('assets/image/logo.png')}}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select Logo</span>
                                                <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                <input type="file" name="logo" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="form-group">
                                    <h5>Favicon Image</h5>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; background: #eeeeee" data-trigger="fileinput">
                                            <img style="width: 200px" src="{{asset('assets/image/favicon.png/')}}" alt="...">

                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select favicon</span>
                                                <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                <input type="file" name="favicon" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit" style="width: 100%">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>


@endsection
@section('script')
    <script type="text/javascript" src="{{asset('assets\fileInput\bootstrap-fileinput.js')}}"></script>
@endsection