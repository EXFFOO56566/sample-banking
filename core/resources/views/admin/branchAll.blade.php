@extends('admin')
@section('branch', 'active')
@section('title', 'All Branch')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> All Branch </h1>
            </div>
            <a href="{{route('admin.branch.add')}}"> <button type="button"  class="btn btn-info"><i class="fa fa-plus"></i> Add new</button> </a>


        </div>
        <div class="tile">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    @if(count($branches) == 0)
                        <tr>
                            <td class="text-center">
                                <h2>No data found </h2>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($branches as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->name}}</td>
                            <td>
                                @if($data->status == 1) <span class="badge badge-success">active</span>
                                @else <span class="badge badge-danger">deactivate</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{route('admin.branch.edit', $data->id)}}"> <button type="button" class="btn btn-info"><i class="fa fa-edit"></i>  </button></a>

                                <button type="button" class="btn btn-danger delete" data-toggle="modal" data-name="{{$data->name}}" data-gate="{{$data->id}}" data-target="#exampleModalCenter">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-row-reverse">

            </div>
        </div>



    </main>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure, you want to delete this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form action="{{route('admin.blog.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="blog" id="blog"/>

                        <div class="modal-gorup">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $(document).on('click','.delete', function(){

                $('#blog').val($(this).data('gate'));
            });
        });
    </script>

@endsection

