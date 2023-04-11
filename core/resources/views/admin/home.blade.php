@extends('admin')
@section('home-page', 'active')
@section('title', 'Change Breadcrumb')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bars"></i> Home Page</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                    <div class="row">

                        <form action="{{route('admin.home.page.update')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                            @csrf
                        <div class="col-lg-12">
                            <div class="row">



                                <div class="col-md-6 col-lg-12">
                                <div class="form-group">

                                    <h2>Service Section</h2>
                                </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Title</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="service_title" value="{{$gnl->service_title}}"  class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-8">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Subtitle</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="service_subtitle" value="{{$gnl->service_subtitle}}"  class="form-control form-control-lg">

                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">

                                        <h2>Latest News Section</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Title</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="blog_title" value="{{$gnl->blog_title}}"  class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-8">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Subtitle</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="blog_subtitle" value="{{$gnl->blog_subtitle}}"  class="form-control form-control-lg">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">

                                        <h2>Faq Section</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Title</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="faq_title" value=" {{$gnl->faq_title}}"  class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-8">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Subtitle</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="faq_subtitle" value="{{$gnl->faq_subtitle}}"  class="form-control form-control-lg">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">

                                        <h2>About Section</h2>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Title</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="about_title" value="{{$gnl->about_title}}"  class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-8">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Subtitle</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="about_subtitle" value="{{$gnl->about_subtitle}}"  class="form-control form-control-lg">

                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="col-md-6 col-lg-6">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">About Title</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="video_section_title" value="{{$gnl->video_section_title}}"  class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">Video link</label></h5>
                                            <div class="input-group">
                                                <input type="text" name="video_link" value="{{$gnl->video_link}}"  class="form-control form-control-lg">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <h5> <label  class="col-form-label">Banner</label></h5>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 100%;     max-height: 100%;">
                                                <img src="{{asset('assets/image/video-banner.jpg')}}" alt="*" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 500px;"> </div>
                                            <div>
                                            <span class="btn btn-info btn-file">
                                                 <span class="fileinput-new"> Change  </span>
                                                <span class="fileinput-exists"> Change </span>
                                             <input type="file" name="video_section_banner"> </span>
                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <code>For better quality upload 950px X 550px image</code>
                                    </div>

                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <div>
                                        <div class="form-group">
                                            <h5> <label  class="col-form-label">About Description</label></h5>
                                            <div class="input-group">
                                                <textarea type="text" id="area2" rows="15" name="video_section_dec"   class="form-control"> {{$gnl->video_section_dec}}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    </main>

@endsection
