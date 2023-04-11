@extends('admin')

@section('title', 'Change Password')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> Change Password</h1>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="tile">

                    <form action="{{route('admin.change.password.post')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-12">
                               <h5> <label for="exampleInputEmail1">Old password</label></h5>
                                <input class="form-control form-control-lg" type="password" name="old_password">
                            </div>
                            <div class="form-group col-md-12">
                               <h5> <label for="exampleInputEmail1">New password</label></h5>
                                <input class="form-control form-control-lg" type="password" name="new_password">
                            </div>
                            <div class="form-group col-md-12">
                                <h5><label for="exampleInputEmail1">Confirm password</label></h5>
                                <input class="form-control form-control-lg" type="password" name="new_password_confirmation">
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
