@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px; position: fixed;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Add Brand</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('brand.store')}}" method="POST" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            @if($errors->has('name'))
                                <input type="text" class="form-control" name="name" placeholder="Enter name" id="errors">
                                @foreach($errors->get('name') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="name" placeholder="Enter name" >
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Logo</label>
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