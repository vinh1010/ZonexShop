@extends('backend.master')
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top: 50px;padding-left: 20px;width: 83%;">
        <div class="container-fluid">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Edit Blog</h3>            
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('blog.update',$find_blog->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                @if($errors->has('title'))
                                    <input type="text" class="form-control" name="title" value="{{$find_blog->title}}" placeholder="Enter title" id="errors">
                                    @foreach($errors->get('title') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <input type="text" class="form-control" name="title" value="{{$find_blog->title}}" placeholder="Enter title" >
                                @endif
                            </div>

                            <div class="form-group">
                            <label for="">Blog Catalog</label>
                            @if($errors->has('category_id'))
                            <select class="form-control" name="category_id" id="errors">
                                <option value=""> ---------- Please Select Blog Catalog ---------- </option>
                                @foreach($get_category as $value)
                                <option value="{{$value->id}}" {{($find_blog->category_id == $value->id) ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @foreach($errors->get('category_id') as $err)
                                <p style="color: red">{{$err}}.</p>
                            @endforeach
                            @else
                            <select class="form-control" name="category_id">
                                <option value=""> ---------- Please Select Blog Catalog ---------- </option>
                                @foreach($get_category as $value)
                                <option value="{{$value->id}}" {{($find_blog->category_id == $value->id) ? 'selected' : ''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <br>
                                    <img src="{{url('images/blogs')}}/{{$find_blog->image}}" alt="" width="20%">
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
                                <label for="exampleInputEmail1">Summary</label>
                                @if($errors->has('summary'))
                                    <textarea class="form-control ckeditor" name="summary"  rows="4">{{$find_blog->summary}}</textarea>
                                    @foreach($errors->get('summary') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <textarea class="form-control ckeditor" name="summary"  rows="4">{{$find_blog->summary}}</textarea>
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                @if($errors->has('content'))
                                    <textarea class="form-control ckeditor" name="content" rows="4">{{$find_blog->content}}</textarea>
                                    @foreach($errors->get('content') as $err)
                                        <p style="color: red">{{$err}}.</p>
                                    @endforeach
                                @else
                                    <textarea class="form-control ckeditor" name="content" rows="4">{{$find_blog->content}}</textarea>
                                @endif
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <br>
                                <input type="radio" name="status" value="0" {{($find_blog->status == 0) ? 'checked' : ''}}> Hidden
                                <input type="radio" name="status" value="1" {{($find_blog->status == 1) ? 'checked' : ''}}> Show
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