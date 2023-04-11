@extends('admin')
@section('social', 'active')
@section('title', 'Social Icon')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bars"></i> Social Icon</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3>Manage Social</h3>

                        <button data-toggle="modal" data-target="#btn_add" name="btn_add" class="btn btn-primary pull-right bold"><i class="fa fa-plus"></i> Add New Social</button>
                    </div>
                    <div class="tile-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($icons as $icon)
                                <tr id="product3">
                                    <td data-label="Id">{{$loop->iteration}}</td>
                                    <td data-label="Name">{{$icon->name}}</td>
                                    <td data-label="Code" style="font-size: 20px"><i class="{{$icon->icon}}"></i></td>
                                    <td data-label="Link">{{$icon->link}}</td>
                                    <td data-label="Action">
                                        <button type="button" class="btn btn-primary btn-detail open_modal bold uppercase" data-toggle="modal" data-target="#edit-{{ $icon->id }}" ><i class="fa fa-edit"></i> Edit</button>
                                        <button type="submit" class="btn btn-danger bold"data-toggle="modal" data-target="#delete-{{ $icon->id }}"> <i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-{{ $icon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <form method="post" action="{{route('admin.social.update')}}">
                                                        @csrf
                                                        <input  name="id" value="{{$icon->id}}"  type="hidden" >
                                                        <div class="form-group error">
                                                            <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Name :</strong> </label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control has-error bold " id="name" name="name" placeholder="Social Name" value="{{$icon->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group error">
                                                            <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Icon Code :</strong> </label>
                                                            <div class="col-sm-12 iconpicker-container">
                                                                <input type="text" class="form-control has-error bold demo iconpicker-element iconpicker-input" id="code" name="icon" placeholder="Social Fontawesome Code" value="{{$icon->icon}}">
                                                                <code>For code visit : https://fontawesome.com/v4.7.0/icons/</code>
                                                            </div>
                                                        </div>
                                                        <div class="form-group error">
                                                            <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Link :</strong> </label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control has-error bold " id="link" name="link" placeholder="Social Link" value="{{$icon->link}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="delete-{{ $icon->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title danger" id="myModalLabel2"><i class='fa fa-trash '></i> <span class="danger">Are you sure you want to delete this?</span></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('admin.social.delete',$icon->id)}}" class="action-route">
                                                @csrf
                                                <div class="modal-body">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success"> Yes</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>&nbsp;
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                </tbody>
                                {{$icons->links()}}
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="btn_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form method="post" action="{{route('admin.social.index')}}">
                                @csrf
                                <div class="form-group error">
                                    <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Name :</strong> </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control has-error bold " id="name" name="name" placeholder="Social Name" value="">
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Icon Code :</strong> </label>
                                    <div class="col-sm-12 iconpicker-container">
                                        <input type="text" class="form-control has-error bold demo iconpicker-element iconpicker-input" id="code" name="icon" placeholder="Social Fontawesome Code" value="">
                                        <code>For code visit : https://fontawesome.com/v4.7.0/icons/</code>
                                    </div>
                                    </div>
                                <div class="form-group error">
                                    <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Link :</strong> </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control has-error bold " id="link" name="link" placeholder="Social Link" value="">
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>


@endsection
