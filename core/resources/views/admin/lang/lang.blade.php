@extends('admin')
@section('Language', 'active')
@section('title', 'Language Manager')


@section('content')
    <main class="app-content">
        <div class="card">
            <div class="card-header bg-white font-weight-bold">

                <h3 class="float-left">Language Manager </h3>
                <button data-toggle="modal" data-target="#myModal" class="btn btn-primary bold float-right"><i
                            class="fa fa-plus"></i> Add New Language
                </button>

            </div>

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($social as $product)
                        <tr>
                            <td><img src="{{asset('assets/image/lang/'.$product->icon)}}"></td>
                            <td>{{$product->name}}</td>
                            <td style="font-size: 22px;">{{$product->code}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.language-key', $product->id)}}"><i
                                            class="fa fa-code"></i> Keyword Edit</a>
                                <a class="btn btn-primary" href="#editModal{{$product->id}}" data-toggle="modal"><i
                                            class="fa fa-edit"></i> Edit</a>
                                <button type="button" class="btn btn-danger bold uppercase delete_button"
                                        data-toggle="modal" data-target="#DelModal{{$product->id}}"><i
                                            class='fa fa-trash'></i> DELETE
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i>Edit
                                            Language</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">×</span></button>
                                    </div>
                                    <form method="post" action="{{route('admin.language-manage-update', $product->id)}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                            <div class="form-group error">
                                                <div class="col-sm-12 mx-auto">
                                                    <img class="mx-auto" width="100px"
                                                         src="{{asset('assets/image/lang/'.$product->icon)}}">
                                                </div>

                                                <label for="inputName" class="col-sm-12 ">Flag Icon (PNG must) : </label>
                                                <div class="col-sm-12">
                                                    <input type="file" class="form-control form-control-lg has-error bold " name="icon">
                                                </div>
                                            </div>
                                            <div class="form-group error">
                                                <label for="inputName" class="col-sm-12 ">Language Name : </label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control form-control-lg has-error bold " id="code"
                                                           name="name" value="{{$product->name}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary bold uppercase" id="btn-save"
                                                    value="add"><i class="fa fa-send"></i> Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="DelModal{{$product->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel"><i class='fa fa-trash'></i> Delete !</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <strong>Are you sure you want to Delete ?</strong>
                                    </div>

                                    <div class="modal-footer">
                                        <form method="post" action="{{route('admin.language-manage-del', $product->id)}}"
                                              class="form-inline">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <input type="hidden" name="delete_id" id="delete_id" class="delete_id"
                                                   value="0">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                                        class="fa fa-times"></i> Close
                                            </button>
                                            <button type="submit" class="btn btn-danger deleteButton"><i
                                                        class="fa fa-trash"></i> DELETE
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> Add New Language</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                    </div>
                    <form class="form-horizontal" method="post" action="{{route('admin.language-manage-store')}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">

                            <div class="form-group error">

                                <label for="inputName" class="col-sm-12 ">Flag Icon (PNG must) : </label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control form-control-lg has-error bold " name="icon">
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 ">Language Name : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-lg has-error bold " id="code" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12">Language Code : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-lg has-error bold " id="link" name="code" value="">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary bold uppercase" id="btn-save" value="add"><i
                                        class="fa fa-send"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>



@endsection
@section('script')
    @if (session('alert'))
        <script type="text/javascript">
            $(document).ready(function () {
                swal("Sorry!", "{{ session('alert') }}", "error");

            });
        </script>
    @endif
@endsection