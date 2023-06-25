@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px; position: fixed;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    @if($find_attribute->attribute == 0)
                        <h3 class="card-title">Edit Color Attribute</h3>
                    @else
                        <h3 class="card-title">Edit Size Attribute</h3>
                    @endif      
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('attribute.update',$find_attribute->id)}}" method="POST" role="form">
                    <div class="card-body">
                    @csrf
                    @method('PUT')
                        @if($find_attribute->attribute == 0)

                            <div class="form-group">
                                <label for="exampleInputEmail1">Color Name</label>
                                @if($errors->any())
                                    <input type="text" class="form-control" value="{{$find_attribute->name}}" name="name" placeholder="Enter name" id="errors">
                                    @foreach($errors->all() as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <input type="text" class="form-control" value="{{$find_attribute->name}}"  name="name" placeholder="Enter name">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Value</label>
                                @if($errors->any())
                                    <input type="color" class="form-control" value="{{$find_attribute->value}}" name="value" id="errors">
                                    @foreach($errors->all() as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <input type="color" class="form-control" value="{{$find_attribute->value}}" name="value">
                                @endif
                            </div> 
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <br>
                                <input type="radio" name="status" value="0" {{($find_attribute->status == 0) ? 'checked' : ''}}> Hidden
                                <input type="radio" name="status" value="1" {{($find_attribute->status == 1) ? 'checked' : ''}}> Show
                            </div>
                        @else
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                @if($errors->any())
                                    <input type="text" class="form-control" value="{{$find_attribute->value}}" name="value" placeholder="Enter size XL L M..." id="errors vl2">
                                    @foreach($errors->all() as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <input type="text" class="form-control" value="{{$find_attribute->value}}" name="value" placeholder="Enter size XL L M..." id="vl2">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <br>
                                <input type="radio" name="status" value="0" {{($find_attribute->status == 0) ? 'checked' : ''}}> Hidden
                                <input type="radio" name="status" value="1" {{($find_attribute->status == 1) ? 'checked' : ''}}> Show
                            </div>    
                        @endif
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
