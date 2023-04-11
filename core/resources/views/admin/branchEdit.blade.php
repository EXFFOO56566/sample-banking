@extends('admin')

@section('branch', 'active')

@section('title', 'edit branch')

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


                    <form action="{{route('admin.branch.update', $branch->id)}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-7">
                                <div class="form-group">
                                    <h5> <label  class="col-form-label">Title</label></h5>
                                    <div class="input-group">
                                        <input type="text" name="name" value="{{$branch->name}}"  class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="form-group">
                                    <h5>  <label class="col-form-label">Status</label> </h5>
                                    <select class="form-control form-control-lg" name="status">
                                        <option value="1" {{ $branch->status == "1" ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $branch->status == "0" ? 'selected' : '' }}>Deactivate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <h5>  <label for="exampleInputEmail1">Description</label></h5>
                                <textarea  class="form-control" type="text" rows="15" name="description" >{{$branch->description}}</textarea>
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
