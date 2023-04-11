@extends('admin')
@section('features', 'active')
@section('title', 'features')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets\fileInput\bootstrap-fileinput.css')}}">
@stop

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bars"></i> Features </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <button  type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModalCenter" >Add New features </button>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title"> All features</h3>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> name </th>
                            <th> icon </th>
                            <th> status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($features as $value)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$value->name}} </td>
                                <td> <div class="fileinput-new thumbnail" data-trigger="fileinput">
                                        <img style="width: 30px" src="{{asset('assets/image/feature/'.$value->icon)}}" alt="...">

                                    </div> </td>
                                <td> @if($value->status == 1 ) Active  @else Deactivate  @endif </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{ $value->id }}"> <i class="fa fa-edit"></i>Edit </button>
                                </td>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="edit-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"> Are you sure you want to edit?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('admin.features.update')}}" enctype="multipart/form-data">
                                            @csrf
                                            <input  name="id" value="{{$value->id}}"  type="hidden" >
                                            <div class="portlet-body form">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Features<span class="required">*</span></label>
                                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                                            <input id="name" class="form-control col-md-12 col-xs-12" name="name" value="{{$value->name}}" placeholder="Categories" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Icon</label>
                                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail"  data-trigger="fileinput">
                                                                    <img style="width: 30px" src="{{asset('assets/image/feature/'.$value->icon)}}" alt="...">
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                                                <div>
                                                                     <span class="btn btn-info btn-file">
                                                                         <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select Icon</span>
                                                                         <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                                         <input type="file" name="icon" accept="image/*">
                                                                     </span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Status<span class="required">*</span></label>
                                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                                            <select name="status" class="form-control" id="sel1" >
                                                                @if($value-> status == 1)
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Deactivate </option>
                                                                @else
                                                                    <option value="0">Deactivate </option>
                                                                    <option value="1">Active</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </table>
                    <div class="d-flex flex-row-reverse">
                        {{$features->links()}}
                    </div>
                </div>
            </div>
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
                <div class="modal-body" >
                    <form method="post" action="{{route('admin.featuresPost')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <h5> <label for="recipient-name" class="col-form-label">Name</label></h5>
                            <input class="form-control"  type="text" name="name">
                        </div>
                        <div class="form-group  col-md-12" id="scriptDiv" >
                            <h5> <label for="add_picture">Icon</label></h5>
                            <input type="file" name="icon">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script type="text/javascript" src="{{asset('assets\fileInput\bootstrap-fileinput.js')}}"></script>

@stop