@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Edit Brand</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('brand.update',$find_brand->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                    <input type="hidden" name="id" value="{{$find_brand->id}}">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            @if($errors->has('name'))
                                <input type="text" class="form-control" name="name" value="{{$find_brand->name}}" placeholder="Enter name" id="errors">
                                @foreach($errors->get('name') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="name" value="{{$find_brand->name}}" placeholder="Enter name" >
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Logo</label>
                            <br>
                            <img src="{{url('images/brands')}}/{{$find_brand->logo}}" alt="" width="20%">
                            <br>
                            @if($errors->has('logo'))
                                <input type="file" class="form-control" name="logo" placeholder="Choose image" id="errors">
                                @foreach($errors->get('logo') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="file" class="form-control" name="logo" placeholder="Choose image">
                            @endif 
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <br>
                            <input type="radio" name="status" value="0" {{($find_brand->status == 0)? 'checked' : ''}}> Hidden
                            <input type="radio" name="status" value="1" {{($find_brand->status == 1)? 'checked' : ''}}> Show
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