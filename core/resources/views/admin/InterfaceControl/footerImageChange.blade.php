
@extends('admin')
@section('footer', 'active')
@section('title', 'Change footer image')


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
                            <form action="{{route('admin.general.updateFooterImage')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                      <h5>  <label for="exampleInputEmail1">Footer Image</label></h5>
                                            <div class="d-flex ">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 100%; max-height: 100%;">
                                                        <img src="{{asset('assets/image/footer/'.$data->footer_image)}}" alt="*" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 500px;"> </div>
                                                    <div>
                                            <span class="btn btn-info btn-file">
                                                 <span class="fileinput-new"> Change</span>
                                                <span class="fileinput-exists"> Change </span>
                                             <input type="file" name="footer_image"> </span>
                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <small class="form-text text-muted">For better quality upload 1920px X 300px image</small>
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
