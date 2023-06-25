@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px; position: fixed;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Edit Tag</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('material.update',$find_material->id)}}" method="POST" role="form">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$find_material->id}}">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            @if($errors->any())
                                <input type="text" class="form-control" value="{{$find_material->name}}" name="name" placeholder="Enter name" id="errors">
                                @foreach($errors->all() as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" value="{{$find_material->name}}" name="name" placeholder="Enter name" >
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <br>
                            <input type="radio" name="status" value="0" {{($find_material->status == 0) ? 'checked' : ''}}> Hidden
                            <input type="radio" name="status" value="1" {{($find_material->status == 1) ? 'checked' : ''}}> Show
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop()