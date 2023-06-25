@extends('backend.master')
@section('main')
<div class="content-wrapper" style="margin-top: 50px;padding-left: 20px;width: 83%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: red">&times;</button>
                        <strong>Title!</strong> {{Session::get('success')}}.
                    </div>
                    @elseif(Session::has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Title!</strong> {{Session::get('error')}}.
                    </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">List Banner</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Banner Name</th>
                                    <th style="width:15%">Image</th>
                                    <th>Category</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_banner as $value)
                                <tr>
                                    <td style="padding-top: 25px">{{$loop->index + 1}}</td>
                                    <td style="padding-top: 25px">{{$value->name}}</td>
                                    <td><img src="{{url('images/banners')}}/{{$value->image}}" alt="" width="100%"></td>
                                    <td style="padding-top: 25px">{{$value->category->name}}</td>
                                    <td style="padding-top: 25px">{{$value->position}}</td>
                                    <td style="padding-top: 25px">{{($value->status == 1)? 'Show' : 'Hidden'}}</td>
                                    <td style="padding-top: 25px">
                                    <span style="display: flex;" class="reason">
                                        <a href="{{route('banner.edit',$value->id)}}" title="Edit"><i class="fas fa-edit" style="padding-right: 10px;color: green"></i></a>
                                        <form action="{{route('banner.destroy',$value->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></button>
                                        </form>
                                    </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@stop()