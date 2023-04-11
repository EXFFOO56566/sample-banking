@extends('admin')

@section('faq', 'active')

@section('title', 'edit faq')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bars"></i> Edit</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">


                    <form action="{{route('admin.faq.update', $faq->id)}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <h5> <label  class="col-form-label">Title</label></h5>
                                    <div class="input-group">
                                        <input type="text" name="title" value="{{$faq->title}}"  class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <h5>  <label for="exampleInputEmail1">Description</label></h5>
                                <textarea id="area2" class="form-control" type="text" rows="15" name="description" >{{$faq->description}}</textarea>
                            </div>

                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" style="width: 100%!important;" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

@endsection
