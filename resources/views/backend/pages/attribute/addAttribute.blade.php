@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px; position: fixed;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Add Attribute</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('attribute.store')}}" method="POST" role="form">
                    <div class="card-body">
                    @csrf

                        <div class="form-group">
                          <label for="">Attribute</label>
                          <select class="form-control" name="attribute" id="attribute">
                            <option value="0">Color</option>
                            <option value="1">Size</option>
                          </select>
                        </div>

                        <div class="form-group attr_name">
                            <label for="exampleInputEmail1">Color Name</label>
                            @if($errors->any())
                                <input type="text" class="form-control" name="name" placeholder="Enter name" id="errors vl_name">
                                @foreach($errors->all() as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="name" placeholder="Enter name" id="vl_name">
                            @endif
                        </div>

                        <div class="form-group color">
                            <label for="exampleInputEmail1">Value</label>
                            @if($errors->any())
                                <input type="color" class="form-control" name="value" id="errors vl1">
                                @foreach($errors->all() as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="color" class="form-control" name="value" id="vl1">
                            @endif
                        </div> 

                        <div class="form-group size" style="display: none;">
                            <label for="exampleInputEmail1">Size</label>
                            @if($errors->any())
                                <input type="text" class="form-control" name="" placeholder="Enter size XL L M..." id="errors vl2">
                                @foreach($errors->all() as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="" placeholder="Enter size XL L M..." id="vl2">
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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $('#attribute').change(function(event){
            var input = $('#attribute').val();
            if(input == 1){
                $('.size').show();
                $('#vl2').attr({
                    name: 'value',
                });
                $('.color').hide();
                $('#vl1').attr({
                    name: '',
                })
                $('.attr_name').hide();
                $('#vl_name').attr({
                    value: 'Size',
                })

            }
            else{
                $('.color').show();
                $('#vl1').attr({
                    name: 'value',
                });
                $('.size').hide();
                $('#vl2').attr({
                    name: '',
                });
                $('#vl_name').attr({
                    value: '',
                })
                $('.attr_name').show();
                
            }
        })
    </script>
@stop()
