
@extends('admin')
@section('coverImageChange', 'active')
@section('title', 'Cover Image Change')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets\fileInput\bootstrap-fileinput.css')}}">
    <link href="//gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Cover Image Change</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('admin.general.updateCoverImage')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                       <h5> <label for="exampleInputEmail1">Cover Title</label></h5>
                                        <input class="form-control"   name="cover_title" value="{{$data->cover_title}}"  placeholder="Enter title">
                                    </div>

                                    <div class="form-group col-md-12">
                                       <h5> <label for="exampleInputEmail1">Short Description</label></h5>
                                        <input class="form-control"   name="description" value="{{$data->description}}"  placeholder="Enter title">
                                    </div>
                                    <div class="form-group col-md-12">
                                      <h5>  <label for="exampleInputEmail1">Cover Image</label></h5>
                                            <div class="d-flex ">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 100%; max-height: 100%;">
                                                        <img src="{{asset('assets/image/cover/'.$data->cover_image)}}" alt="*" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 500px;"> </div>
                                                    <div>
                                            <span class="btn btn-info btn-file">
                                                 <span class="fileinput-new"> Change Cover </span>
                                                <span class="fileinput-exists"> Change </span>
                                             <input type="file" name="cover_image"> </span>
                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <small class="form-text text-muted">For better quality upload 1920px X 700px image</small>
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" style="width: 100%!important;" type="submit">Update</button>
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
    <script type="text/javascript" src="{{asset('assets\fileInput\bootstrap-fileinput.js')}}"></script>
@stop
