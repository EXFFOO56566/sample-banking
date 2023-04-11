@extends('admin')
@section('faq', 'active')
@section('title', 'All Faq')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> All Faq </h1>
            </div>
            <a href="{{route('admin.faq.add')}}"> <button type="button"  class="btn btn-info"><i class="fa fa-plus"></i> Add new faq</button> </a>


        </div>
        <div class="tile">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    @if(count($faq) == 0)
                        <tr>
                            <td class="text-center">
                                <h2>No data found </h2>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($faq as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->title}}</td>
                            <td>
                                <a href="{{route('admin.faq.edit', $data->id)}}"> <button type="button" class="btn btn-info"><i class="fa fa-edit"></i>  </button></a>
                                 <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-danger"><i class="fa fa-trash"></i>  </button>
                            </td>
                        </tr>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure, you want to delete this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form method="post" action="{{route('admin.faq.delete', $data->id)}}">
                       @csrf
                       <div class="modal-footer">
                           <button type="submit" class="btn btn-danger">Yes</button>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                       </div>
                   </form>
                </div>

            </div>
        </div>
    </div>

                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-row-reverse">
                {{$faq->links()}}
            </div>
        </div>



    </main>


    
@endsection



