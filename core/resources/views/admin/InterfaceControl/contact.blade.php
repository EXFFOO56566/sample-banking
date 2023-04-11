@extends('admin')
@section('contacts', 'active')
@section('title', 'Contract Information')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets\fileInput\bootstrap-fileinput.css')}}">

@stop
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bars"></i> Contract Information</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3>Contract Information</h3>
                        <button data-toggle="modal" data-target="#btn_add" name="btn_add" class="btn btn-primary pull-right bold"><i class="fa fa-plus"></i> Add New Contract </button>
                    </div>
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($contracts as $contact)
                                    <tr id="product3">
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$contact->title}}</td>
                                        <td  style="font-size: 20px"><i class="{{$contact->icon}}"></i></td>
                                        <td >{{$contact-> name}}</td>
                                        <td data-label="Action">
                                            <button  type="button"class="btn btn-primary btn-detail open_modal bold uppercase" data-toggle="modal" data-target="#edit-{{ $contact->id }}" ><i class="fa fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger bold" data-toggle="modal" data-target="#delete-{{ $contact->id }}" > <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <form method="post" action="{{route('admin.contacts.update')}}">
                                                            @csrf
                                                            <input  name="id" value="{{$contact->id}}"  type="hidden" >
                                                            <div class="form-group error">
                                                                <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Name :</strong> </label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control has-error bold "  name="title"  value="{{$contact->title}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group error">
                                                                <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Icon Code :</strong> </label>
                                                                <div class="col-sm-12 iconpicker-container">
                                                                    <input type="text" class="form-control has-error bold demo iconpicker-element iconpicker-input"  name="icon"  value="{{$contact->icon}}">
                                                                    <code>For code visit : https://fontawesome.com/v4.7.0/icons/</code>
                                                                </div>
                                                            </div>
                                                            <div class="form-group error">
                                                                <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Link :</strong> </label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control has-error bold " name="name"  value="{{$contact->name}}">
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
                                    <div class="modal fade" id="delete-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title danger" id="myModalLabel2"><i class='fa fa-trash '></i> <span class="danger">Are you sure you want to delete this?</span></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{route('admin.contact.delete',$contact->id)}}" class="action-route">
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
                                {{$contracts->links()}}
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form method="post" action="{{route('admin.contacts.index')}}">
                                @csrf
                                <div class="form-group error">
                                    <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Title :</strong> </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control has-error bold " name="title" placeholder="Title" value="">
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Icon Code :</strong> </label>
                                    <div class="col-sm-12 iconpicker-container">
                                        <input type="text" class="form-control has-error bold demo iconpicker-element iconpicker-input"  name="icon" placeholder="Icon Fontawesome Code" value="">
                                        <code>For code visit : https://fontawesome.com/v4.7.0/icons/</code>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="inputName" class="col-sm-3 control-label bold uppercase"><strong>Name :</strong> </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control has-error bold " name="name" placeholder="Name" value="">
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
@section('script')
    <script type="text/javascript" src="{{asset('assets\fileInput\bootstrap-fileinput.js')}}"></script>
@stop
