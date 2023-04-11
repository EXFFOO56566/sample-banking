@extends('admin')
@section('ads', 'active')
@section('title', 'Create Ad')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets\fileInput\bootstrap-fileinput.css')}}">

@stop
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Ads Management</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="">
                        <h2 style="display:inline-block">Create Ad</h2>
                        <a href="{{route('admin.allAdds')}}" class="float-right btn btn-outline-primary">View All Ads</a>
                        <p style="clear:both;margin:0px;"></p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                        <form action="{{route('admin.adds.post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <h5>  <label for="add_type"> Select Advertisement Type</label></h5>
                                <select name="type" class="form-control" id="add_type" onchange="changeForm(this.value)">
                                    <option value="1">Banner</option>
                                    <option value="2">Script</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h5><label for="add_size"> Select Advertisement Size</label></h5>
                                <select name="size" class="form-control" id="add_size">
                                    <option value="1">300x250</option>
                                    <option value="2">728x90</option>
                                    <option value="3">300x600</option>
                                </select>
                            </div>

                            <div id="urlBannerDiv">
                               <div class="form-group">
                                   <h5><label for="redirect_url"> Redirect Url</label></h5>
                                       <input type="text" name="redirect_url" placeholder="http://thesoftking.com" class="form-control">
                                   </div>

                                <div class="form-group">
                                    <h5> <label for="add_picture">Banner</label></h5>
                                    <input type="file" name="banner" class="form-control"></div>
                            </div>
                            <div id="scriptDiv"  style="display:none;">
                                <div class="form-group">
                                   <h5> <label for="script"> Script</label></h5>
                                    <textarea name="script"  id="script" cols="30" style="width: 100%!important;"   rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Submit">
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


    <script>
        function changeForm(adType) {
            console.log(adType);
            if(adType == 1) {
                document.getElementById('scriptDiv').style.display = 'none';
                document.getElementById('urlBannerDiv').style.display = 'block';
            } else {
                document.getElementById('scriptDiv').style.display = 'block';
                document.getElementById('urlBannerDiv').style.display = 'none';
            }
        }
    </script>
@stop



