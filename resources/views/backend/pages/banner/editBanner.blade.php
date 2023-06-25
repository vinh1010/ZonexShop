@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Edit Banner</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('banner.update',$find_banner->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                    <input type="hidden" name="id" value="{{$find_banner->id}}">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Banner Name</label>
                            @if($errors->has('name'))
                                <input type="text" class="form-control" name="name" value="{{$find_banner->name}}" placeholder="Enter name" id="errors">
                                @foreach($errors->get('name') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="name" value="{{$find_banner->name}}" placeholder="Enter name" >
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Banner Catalog</label>
                            @if($errors->has('category_id'))
                            <select class="form-control" name="category_id" id="errors">
                                <option value=""> ---------- Please Select Banner Catalog ---------- </option>
                                @foreach($get_category as $value)
                                <option value="{{$value->id}}" {{($find_banner->category_id == $value->id) ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                                @foreach($errors->get('category_id') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                            <select class="form-control" name="category_id">
                                <option value=""> ---------- Please Select Banner Catalog ---------- </option>
                                @foreach($get_category as $value)
                                <option value="{{$value->id}}" {{($find_banner->category_id == $value->id) ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Position</label>
                            <select class="form-control" name="position" id="">
                                <option value="1"  {{($find_banner->position == 1) ? 'selected' : ''}}>Home 1</option>
                                <option value="2" {{($find_banner->position == 2) ? 'selected' : ''}} >Home 2</option>
                                <option value="3" {{($find_banner->position == 3) ? 'selected' : ''}}>Others</option>
                            </select>
                         </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <br>
                                <img src="{{url('images/banners')}}/{{$find_banner->image}}" alt="" width="20%">
                            <br>
                            @if($errors->has('image'))
                                <input type="file" class="form-control" name="image" placeholder="Choose image" id="errors">
                                @foreach($errors->get('logo') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="file" class="form-control" name="image" placeholder="Choose image">
                            @endif 
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <br>
                            <input type="radio" name="status" value="0" {{($find_banner->status == 0)? 'checked' : ''}}> Hidden
                            <input type="radio" name="status" value="1" {{($find_banner->status == 1)? 'checked' : ''}}> Show
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