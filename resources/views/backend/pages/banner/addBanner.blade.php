@extends('backend.master')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 50px;padding-left: 20px; position: fixed;width: 83%;">
    <div class="container-fluid">
        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Add Banner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('banner.store')}}" method="POST" role="form" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Banner Name</label>
                        @if($errors->has('name'))
                        <input type="text" class="form-control" name="name" placeholder="Enter name" id="errors">
                        @foreach($errors->get('name') as $err)
                        <p style="color: red">{{$err}}.</p>
                        @endforeach
                        @else
                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Banner Catalog</label>
                        @if($errors->has('category_id'))
                        <select class="form-control" name="category_id" id="errors">
                            <option value=""> ---------- Please Select Banner Catalog ---------- </option>
                            @foreach($get_category as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                            @foreach($errors->get('category_id') as $err)
                                <p style="color: red">{{$err}}.</p>
                            @endforeach
                        @else
                        <select class="form-control" name="category_id">
                            <option value=""> ---------- Please Select Banner Catalog ---------- </option>
                            @foreach($get_category as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                     
                    <div class="form-group">
                        <label for="">Position</label>
                        <select class="form-control" name="position" id="">
                            <option value="1">Home 1</option>
                            <option value="2">Home 2</option>
                            <option value="3">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <br>
                        @if($errors->has('image'))
                        <input type="file" class="form-control" name="image" placeholder="Choose image" id="errors">
                        @foreach($errors->get('image') as $err)
                        <p style="color: red">{{$err}}.</p>
                        @endforeach
                        @else
                        <input type="file" class="form-control" name="image" placeholder="Choose image">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <br>
                        <input type="radio" name="status" value="0"> Hidden
                        <input type="radio" name="status" value="1" checked> Show
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