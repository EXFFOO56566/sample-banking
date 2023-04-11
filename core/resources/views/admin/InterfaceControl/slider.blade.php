@extends('admin')
@section('slider', 'active')
@section('title', 'Sliders')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-image"></i> Sliders</h1>

            </div>
          <a href="{{route('admin.slider.add')}}">  <button class="btn btn-primary pull-right bold"><i class="fa fa-plus"></i> Add New Slider</button> </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                    <div class="tile-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Subtitle</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($sliders as $data)
                                    <tr id="product3">
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$data->title}}</td>
                                        <td > {{$data->subtitle}}</td>

                                        <td data-label="Action">
                                          <a href="{{route('admin.slider.edit', $data->id)}}" > <button type="button" class="btn btn-primary btn-detail open_modal bold uppercase"><i class="fa fa-edit"></i></button> </a>
                                            <button type="submit" class="btn btn-danger bold"data-toggle="modal" data-target="#delete-{{ $data->id }}"> <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="delete-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title danger" id="myModalLabel2"><i class='fa fa-trash '></i> <span class="danger">Are you sure you want to delete this?</span></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{route('admin.slider.delete',$data->id)}}" class="action-route">
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

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>


@endsection
