@extends('admin')
@section('blog', 'active')
@section('title', 'All Blog')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-rss"></i> All Blog </h1>
            </div>
            <a href="{{route('admin.blog.add')}}"> <button type="button"  class="btn btn-info"><i class="fa fa-plus"></i> Add new blog</button> </a>


        </div>
        <div class="tile">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    @if(count($blog) == 0)
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
                    @foreach($blog as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->title}}</td>
                            <td>
                                @if($data->status == 1) <span class="badge badge-success">show</span>
                                @else <span class="badge badge-danger">hide</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{route('admin.blog.edit', $data->id)}}"> <button type="button" class="btn btn-info"><i class="fa fa-edit"></i>  </button></a>

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
                {{$blog->links()}}
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

