@extends('admin')
@section('subscribeSection', 'active')
@section('title', 'subscribe Section')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bars"></i>Subscribe Section</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('admin.subscribeUpdate')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-12">
                                        <h5> <label> Title</label></h5>
                                        <input type="text" name="title"  value="{{$data->subscribe_title}}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h5> <label> Subtitle</label></h5>
                                        <input type="text" name="subtitle"  value="{{$data->subscribe_subtitle}}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h5> <label for="exampleInputEmail1">Background Image</label></h5>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 100%;     max-height: 100%;">
                                                <img src="{{asset('assets/image/subscribe/'.$data->subscribe_img)}}" alt="*" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 100%;"> </div>
                                            <div>
                                            <span class="btn btn-info btn-file">
                                                 <span class="fileinput-new"> Change  </span>
                                                <span class="fileinput-exists"> Change </span>
                                             <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>

                                        <small class="form-text text-muted">For better quality upload 1110px X 360px image</small>
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
