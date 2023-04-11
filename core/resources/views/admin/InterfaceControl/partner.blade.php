@extends('admin')
@section('partners', 'active')
@section('title', 'Partners')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Partners</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <button  type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModalCenter" >Add New partner</button>
            </ul>
        </div>
        <div class="row">
                @foreach($partners as $partner)
            <div class="col-md-3">
                <div class="tile">
                    <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <div class="">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 100%; height: 86px;">
                                        <img src="{{ asset('assets/admin/img/partner-logo/'.$partner->logo) }}" alt="*" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 86px;"> </div>

                                </div>
                                <div class="d-flex justify-content-center">
                                    {{$partner->url}}
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button  type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-{{$partner->id}}" ><i class="fa fa-edit"></i>Edit</button>
                        <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$partner->id}}" ><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
                    </div>
                </div>
            </div>
                    <div class="modal fade" id="edit-{{$partner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add new</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POSt" action="{{route('admin.partnerUpdate', $partner->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label for="recipient-name" class="col-form-label">Url</label>
                                                <input class="form-control" id="title" type="text" name="url" value="{{$partner->url}}" placeholder="Enter url">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="recipient-name" class="col-form-label">Logo</label>
                                                <div class="">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 280px; max-height: 86px;">
                                                            <img src="{{ asset('assets/admin/img/partner-logo/'.$partner->logo) }}" alt="*" />
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 300px;"> </div>

                                                        <div>
                                            <span class="btn btn-info btn-file">
                                                 <span class="fileinput-new">choose </span>
                                                <span class="fileinput-exists"> Change </span>
                                             <input type="file" name="logo"> </span>
                                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tile-footer">
                                            <button class="btn btn-primary btn-md btn-block"  type="submit">Add New</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="delete-{{$partner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete this?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POSt" action="{{route('admin.partner.delete',$partner->id)}}">
                                        @csrf
                                        <div class="row">

                                        </div>
                                        <div class="tile-footer">
                                            <button class="btn btn-danger btn-md btn-block"  type="submit">Delete</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </main>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POSt" action="{{route('admin.partner')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="recipient-name" class="col-form-label">Url</label>
                                <input class="form-control" id="title" type="text" name="url"  placeholder="Enter url">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="recipient-name" class="col-form-label">Logo</label>
                                <div class="">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 280px; max-height: 86px;">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; max-height: 300px;"> </div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                                 <span class="fileinput-new">choose </span>
                                                <span class="fileinput-exists"> Change </span>
                                             <input type="file" name="logo"> </span>
                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary btn-md btn-block"  type="submit">Add New</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
