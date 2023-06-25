@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px; position: fixed;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Add Material</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('material.store')}}" method="POST" role="form">
                    <div class="card-body">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Material Name</label>
                            @if($errors->any())
                                <input type="text" class="form-control" name="name" placeholder="Enter name" id="errors">
                                @foreach($errors->all() as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="name" placeholder="Enter name" >
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