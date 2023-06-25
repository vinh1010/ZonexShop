@extends('backend.master')
@section('main')
<div class="content-wrapper" style="margin-top: 50px;padding-left: 20px;width: 83%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: red">&times;</button>
                        <strong>Title!</strong> {{Session::get('success')}}.
                    </div>
                    @elseif(Session::has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Title!</strong> {{Session::get('error')}}.
                    </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">List Product</h3>
                        <div class="card-tools" style="float: left;margin-left: 50px;">
                            <div class="shop-tab-pill">
                                <form>
                                <div class="show-label showing">
                                    <label>Finters : </label>
                                    <select name="finter" id="finter">
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'pro_new'])}}" {{(Request::get('find_by') == 'pro_new') ? 'selected' : ''}}>Product New</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'max'])}}" {{(Request::get('find_by') == 'max') ? 'selected' : ''}}>Low to high price</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'min'])}}" {{(Request::get('find_by') == 'min') ? 'selected' : ''}}>High to low price</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'pro_sale'])}}" {{(Request::get('find_by') == 'pro_sale') ? 'selected' : ''}}>Discount Products</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'status_hidden'])}}" {{(Request::get('find_by') == 'status_hidden') ? 'selected' : ''}}>Status Hidden</option>
                                    </select>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-tools">
                            <form action="">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" value="{{request()->input('key')}}" name="key" class="form-control float-right" placeholder="Enter Name">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Product Name</th>
                                    <th style="width:15%">Image</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_product as $value)
                                <tr>
                                    <td style="padding-top: 25px">{{$loop->index + 1}}</td>
                                    <td style="padding-top: 25px">{{$value->name}}</td>
                                    <td><img src="{{url('images/products')}}/{{$value->image}}" alt="" width="35%"></td>
                                    <td style="padding-top: 25px">{{number_format($value->price,0)}}</td>
                                    <td style="padding-top: 25px">{{number_format($value->sale_price,0)}}</td>
                                    <td style="padding-top: 25px">{{$value->category->name}}</td>
                                    <td style="padding-top: 25px">{{$value->brand->name}}</td>
                                    <td style="padding-top: 25px">{{($value->status == 1)? 'Show' : 'Hidden'}}</td>
                                    <td style="padding-top: 25px">
                                    <span style="display: flex;" class="reason">
                                        <a href="{{route('product.edit',$value->id)}}" title="Edit"><i class="fas fa-edit" style="padding-right: 10px;color: green"></i></a>
                                        <form action="{{route('product.destroy',$value->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fa fa-trash" aria-hidden="true" style="color: red"></i></button>
                                        </form>
                                    </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right" style="margin-right: 20px;">
                            {{$list_product->appends(request()->all())->links()}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@stop()