@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('product.update',$find_product->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            @if($errors->has('name'))
                                <input type="text" class="form-control" name="name" value="{{$find_product->name}}" placeholder="Enter name" id="errors">
                                @foreach($errors->get('name') as $err)
                                    <p style="color: red">{{$err}}.</p>
                                @endforeach
                            @else
                                <input type="text" class="form-control" name="name" value="{{$find_product->name}}" placeholder="Enter name" >
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Avatar</label>
                                    <br>
                                    <img src="{{url('images/products')}}/{{$find_product->image}}" alt="" width="20%">
                                    <br>
                                    @if($errors->has('image'))
                                        <input type="file" class="form-control" name="image" placeholder="Choose image" style="width: 95%" id="errors">
                                        @foreach($errors->get('image') as $err)
                                            <p style="color: red">{{$err}}.</p>
                                        @endforeach
                                    @else
                                        <input type="file" class="form-control" name="image" placeholder="Choose image" style="width: 95%">
                                    @endif      
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" style="width: 95%;float: right">Related Image</label>
                                    <br>
                                    @foreach($find_relatedImage as $value)
                                        <img src="{{url('images/relate_images')}}/{{$value->image}}" alt="" width="20%">
                                    @endforeach
                                    <br>
                                    @if($errors->has('image_related'))
                                        <input type="file" class="form-control" name="image_related[]" style="width: 95%;float: right" multiple id="errors">
                                        @foreach($errors->get('image_related') as $err)
                                        <p style="color: red;width: 95%;float: right">{{$err}}.</p>
                                        @endforeach
                                    @else
                                        <input type="file" class="form-control" name="image_related[]" style="width: 95%;float: right" multiple>
                                    @endif   
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Price</label>
                                    @if($errors->has('price'))
                                        <input type="number" class="form-control" name="price" value="{{$find_product->price}}" placeholder="Enter Price" style="width: 95%" id="errors">
                                        @foreach($errors->get('price') as $err)
                                            <p style="color: red">{{$err}}.</p>
                                        @endforeach
                                    @else
                                        <input type="number" class="form-control" name="price" value="{{$find_product->price}}" placeholder="Enter Price" style="width: 95%">
                                    @endif      
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" style="width: 95%;float: right">Sale Price</label>
                                    @if($errors->has('sale_price'))
                                        <input type="number" class="form-control" name="sale_price" value="{{$find_product->sale_price}}" value="0" id="errors" style="width: 95%;float: right">
                                        @foreach($errors->get('sale_price') as $err)
                                            <p style="color: red;width: 95%;float: right">{{$err}}.</p>
                                        @endforeach
                                    @else
                                        <input type="number" class="form-control" name="sale_price" value="{{$find_product->sale_price}}" value="0" style="width: 95%;float: right">
                                    @endif  
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Category</label>
                                    @if($errors->has('category_id'))
                                    <select class="form-control" name="category_id" id="errors" style="width: 95%">
                                        <option value=""> ---------- Please Select Category ---------- </option>
                                        @foreach($list_category as $value)
                                        <option value="{{$value->id}}" {{($value->id == $find_product->category_id ? 'selected' : '')}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                        @foreach($errors->get('category_id') as $err)
                                            <p style="color: red">{{$err}}.</p>
                                        @endforeach
                                    @else
                                    <select class="form-control" name="category_id" style="width: 95%">
                                        <option value=""> ---------- Please Select Category ---------- </option>
                                        @foreach($list_category as $value)
                                        <option value="{{$value->id}}" {{($value->id == $find_product->category_id) ? 'selected' : ''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @endif   
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" style="width: 95%;float: right">Brand</label>
                                    @if($errors->has('brand_id'))
                                    <select class="form-control" name="brand_id" id="errors" style="width: 95%;float: right">
                                        <option value=""> ---------- Please Select Brand ---------- </option>
                                        @foreach($list_brand as $value)
                                        <option value="{{$value->id}}" {{($value->id == $find_product->brand_id) ? 'selected' : ''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                        @foreach($errors->get('brand_id') as $err)
                                        <p style="color: red;width: 95%;float: right">{{$err}}.</p>
                                        @endforeach
                                    @else
                                    <select class="form-control" name="brand_id" style="width: 95%;float: right">
                                        <option value=""> ---------- Please Select Brand ---------- </option>
                                        @foreach($list_brand as $value)
                                        <option value="{{$value->id}}" {{($value->id == $find_product->brand_id) ? 'selected' : ''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @endif             
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="exampleInputEmail1">Color</label>
                                    <br>
                                    @if($errors->has('attributes'))
                                        @foreach($list_color as $value)
                                            <input type="checkbox" value="{{$value->id}}" name="attributes[]" style="margin-left: 5px;" {{(in_array($value->id,$find_productAttribute)) ? 'checked' : ''}}><span>{{$value->name}}<i class="fas fa-square" style="padding-left: 5px; padding-right: 10px; color: {{$value->value}}"></i></span>
                                        @endforeach
                                        @foreach($errors->get('attributes') as $err)
                                            <p style="color: red">{{$err}}.</p>
                                        @endforeach
                                    @else
                                        @foreach($list_color as $value)
                                            <input type="checkbox" value="{{$value->id}}" name="attributes[]" style="margin-left: 5px;" {{(in_array($value->id,$find_productAttribute)) ? 'checked' : ''}}><span>{{$value->name}}<i class="fas fa-square" style="padding-left: 5px; padding-right: 10px; color: {{$value->value}}"></i></span>
                                        @endforeach
                                    @endif   
                                </div>
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Size</label>
                                    <br>
                                    <div>
                                        @if($errors->has('attributes'))
                                            @foreach($list_size as $value)
                                                <input type="checkbox" value="{{$value->id}}" name="attributes[]" style="margin-left: 5px;" {{(in_array($value->id,$find_productAttribute)) ? 'checked' : ''}}>{{$value->value}}
                                            @endforeach
                                            @foreach($errors->get('attributes') as $err)
                                                <p style="color: red">{{$err}}.</p>
                                            @endforeach
                                        @else
                                            @foreach($list_size as $value)
                                                <input type="checkbox" value="{{$value->id}}" name="attributes[]" style="margin-left: 5px;" {{(in_array($value->id,$find_productAttribute)) ? 'checked' : ''}}>{{$value->value}}
                                            @endforeach
                                        @endif       
                                    </div>     
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Material</label>
                                    <br>
                                    @if($errors->has('material'))
                                        @foreach($list_material as $value)
                                            <input type="checkbox" value="{{$value->id}}" name="material[]" style="margin-left: 5px;" {{(in_array($value->id,$find_productMaterial)) ? 'checked' : ''}}>{{$value->name}}
                                        @endforeach
                                        @foreach($errors->get('material') as $err)
                                            <p style="color: red">{{$err}}.</p>
                                        @endforeach
                                    @else
                                        @foreach($list_material as $value)
                                            <input type="checkbox" value="{{$value->id}}" name="material[]" style="margin-left: 5px;" {{(in_array($value->id,$find_productMaterial)) ? 'checked' : ''}}>{{$value->name}}
                                        @endforeach
                                    @endif   
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="4">{{$find_product->description}}</textarea>
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