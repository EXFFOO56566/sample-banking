@extends('admin')

@section('faq', 'active')

@section('title', 'Add new faq')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-plus"></i> Add new faq</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">


                    <form action="{{route('admin.faq.store')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <h5> <label  class="col-form-label">Title</label></h5>
                                    <div class="input-group">
                                        <input type="text" name="title"  class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <h5>  <label for="exampleInputEmail1">Description</label></h5>
                                <textarea id="area2" class="form-control" type="text" rows="15" name="description" ></textarea>
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
