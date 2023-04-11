@extends('admin')
@section('Profile', 'active')
@section('title', 'User DETAILS')


@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-user"></i> ADMIN PROFILE</h1>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="tile">
                    <form action="{{route('admin.profile.post')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf

                        <input  type="hidden" name="id" value="{{$admin->id}}">
                        <div class="row">
                            <div class="form-group col-md-12">
                               <h5> <label for="exampleInputEmail1">Name</label></h5>
                                <input class="form-control form-control-lg" type="text" name="name" value="{{$admin->name}}">
                            </div>
                            <div class="form-group col-md-12">
                               <h5> <label for="exampleInputEmail1">Username</label></h5>
                                <input class="form-control form-control-lg" type="text" name="username" value="{{$admin->username}}">
                            </div>
                            <div class="form-group col-md-12">
                                <h5><label for="exampleInputEmail1">Email</label></h5>
                                <input class="form-control form-control-lg" type="text" name="email" value="{{$admin->email}}">
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
