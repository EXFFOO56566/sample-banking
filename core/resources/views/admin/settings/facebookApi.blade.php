

@extends('admin')
@section('setting-api', 'active')
@section('title', 'Facebook Api Settings')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Facebook Api Settings</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('admin.facebook.settings.update')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5> <label for="exampleTextarea">Facebook app Id</label></h5>
                                    <input  class="form-control" name="facebook_api" value="{{ $data->facebook_api }}" >
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" style="width: 100%" type="submit">Update</button>
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


    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=205856110142667&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@stop
