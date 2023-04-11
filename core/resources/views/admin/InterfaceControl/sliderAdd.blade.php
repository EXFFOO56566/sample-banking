@extends('admin')

@section('title', 'Add new slider')
@section('slider', 'active')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-plus"></i> Add new slider</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <form action="{{route('admin.slider.store')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                     <div class="col-md-6 col-lg-5">
                                      <div class="form-group">
                                          <h5> <label  class="col-form-label">Title</label></h5>
                                          <div class="input-group">
                                              <input type="text" name="title"  class="form-control form-control-lg">
                                          </div>
                                      </div>
                                     </div>
                                     <div class="col-md-6 col-lg-7">
                                         <div class="form-group">
                                             <h5> <label  class="col-form-label">Subtitle</label></h5>
                                             <div class="input-group">
                                                 <input type="text" name="subtitle"  class="form-control form-control-lg">
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-lg-5">
                                         <div class="form-group">
                                             <h5> <label  class="col-form-label">Button name</label></h5>
                                             <div class="input-group">
                                                 <input type="text" name="btn_name"  class="form-control form-control-lg">
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 col-lg-7">
                                         <div class="form-group">
                                             <h5> <label  class="col-form-label">Button link</label></h5>
                                             <div class="input-group">
                                                 <input type="text" name="btn_link"  class="form-control form-control-lg">
                                             </div>
                                         </div>
                                     </div>
                                    <div class="form-group col-lg-12 col-md-6">
                                        <h5> <label for="exampleInputEmail1">Banner</label></h5>

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 1920px; max-height: 800px;"> </div>
                                                <div>
                                                <span class="btn btn-info btn-file">
                                                     <span class="fileinput-new"> Change banner </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                 <input type="file" name="banner"> </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>

                                        <small class="form-text text-muted">For better quality upload 1920px X 800px banner</small>
                                    </div>

                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" style="width: 100%!important;" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    </main>

@endsection
