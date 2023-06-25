@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px; position: fixed;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('category.update',$find_category->id)}}" method="POST" role="form">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$find_category->id}}">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            @if($errors->any())
                                <input type="text" class="form-control" value="{{$find_category->name}}" name="name" placeholder="Enter name" id="errors">
                                @foreach($errors->all() as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" value="{{$find_category->name}}" name="name" placeholder="Enter name" >
                            @endif
                        </div>

                        <div class="form-group">
                          <label for="">Small Catalog Name</label>
                          <select class="form-control" name="parent_id">
                            <option value="0">Big Catalog</option>
                            @foreach($get_big_catalog as $value)
                            <option value="{{$value->id}}" {{($find_category->parent_id == $value->id) ? 'selected' : ''}}>{{$value->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <br>
                            <input type="radio" name="status" value="0" {{($find_category->status == 0) ? 'checked' : ''}}> Hidden
                            <input type="radio" name="status" value="1" {{($find_category->status == 1) ? 'checked' : ''}}> Show
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