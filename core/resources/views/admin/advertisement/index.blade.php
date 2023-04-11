
@extends('admin')
@section('ads', 'active')
@section('title', 'Ads Management')

@section('content')


    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Ads Management</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title pull-left">Ads List</h3>
                    <a href="{{route('admin.adds')}}" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i> Add New</a>
                    <p style="margin:0px;clear:both;"></p>
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            @if(count($ads) == 0)
                            <tr>
                                <h1 style="text-align: center" >No data found</h1>
                            </tr>
                            @else
                            <tr>
                                <th scope="col">Ad Type</th>
                                <th scope="col">Ad Size</th>
                                <th scope="col">Impression</th>
                                <th scope="col">Click</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $ad)
                            <tr>
                                <td data-label="type">
                                    @if($ad->type == 1)
                                    <h5>Banner</h5>
                                    @else
                                        <h5>Script</h5>
                                    @endif
                                </td>
                                <td data-label="size">
                                    @if($ad->size == 1)
                                        <h6>300 x 250</h6>
                                    @elseif($ad->size == 2)
                                        <h6>728 x 90</h6>
                                      @else
                                        <h6> 300 x 600</h6>
                                    @endif
                                </td>
                                <td data-label="view">
                                   {{$ad->impression}}
                                </td>
                                <td data-label="view">
                                   {{$ad->click}}
                                </td>

                                <td data-label="status">
                                  @if($ad->status == 0)<span class="badge badge-danger"> Deactivate </span>@else <span class="badge badge-success"> Active </span>  @endif
                                </td>
                                <td>
                                    @if($ad->status == 0 )
                                        <form method="post" action="{{route('admin.ads.active',$ad->id)}}">
                                            @csrf
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#advertise-show-{{$ad->id}}"><i class="fa fa-eye"></i> Show</button>
                                            <button class="btn btn-outline-success" type="submit">Active</button>
                                        </form>
                                   @else
                                        <form method="post" action="{{route('admin.ads.deactivate',$ad->id)}}">
                                            @csrf
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#advertise-show-{{$ad->id}}"><i class="fa fa-eye"></i> Show</button>
                                            <button class="btn btn-outline-danger" type="submit">Deactivate</button>
                                        </form>

                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="advertise-show-{{$ad->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Advertise Remove</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if($ad->type == 1)
                                            <img style="width:100%;" id="adImage" src="{{asset('assets/image/ads/'.$ad->image)}}" alt="image">
                                            @else
                                            <textarea id="script" name="name" rows="8" cols="80" class="form-control" readonly>{{$ad->script}}</textarea>
                                                @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            </tbody>

                            @endif
                        </table>
                        <div class="d-flex justify-content-end">
                            {{$ads->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="advertise-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Advertise Remove</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text text-danger"><strong></strong></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="advertise-delete-data49" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Advertise Remove</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text text-danger"><strong>Are you sure you want to delete this ?</strong></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form style="display:inline-block;" action="https://pratik.thesoftking.com/travel_agency/admin/Ad/delete" method="post"></form>
                    <input type="hidden" name="_token" value="h6iTaamfvPhO7AKq7ZcxuVKcaDrRqHdkIZbgniSQ">
                    <input type="hidden" name="adID" value="39">
                    <button type="submit" class="btn btn-danger" id="delete_confirm">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

