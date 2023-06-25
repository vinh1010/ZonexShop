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
                        <h3 class="card-title">List Attribute</h3>
                        <div class="card-tools">
                            <form action="">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" value="{{request()->input('key')}}" name="key" class="form-control float-right" placeholder="Enter Name">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Attribute</th>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Status</th>    
                                    <th style="width: 10%">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_attribute as $value)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{($value->attribute == 0)? 'Color' : 'Size'}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->value}}</td>
                                    <td>{{($value->status == 1)? 'Show' : 'Hidden'}}</td>
                                    <td>
                                    <span style="display: flex;" class="reason">
                                        <a href="{{route('attribute.edit',$value->id)}}" title="Edit"><i class="fas fa-edit" style="padding-right: 10px;color: green"></i></a>
                                        <form action="{{route('attribute.destroy',$value->id)}}" method="POST">
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
                        <div class="float-right" style="margin-right: 20px;">
                            {{$list_attribute->appends(request()->all())->links()}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@stop()