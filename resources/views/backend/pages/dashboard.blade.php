@extends('backend.master')
@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 20px">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check-alt"></i></span>

            <div class="info-box-content">
              @if($month < 10)
              <span class="info-box-text">Monthly Revenue (0{{$month}} - {{$year}})</span>
              @else
              <span class="info-box-text">Monthly Revenue ({{$month}} - {{$year}})</span>
              @endif
              <span class="info-box-number">
                {{$total_in_month}}
                <small>$</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Year Revenue ({{$year}})</span>
              <span class="info-box-number">
                {{$total_in_year}}
                <small>$</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Completed Orders</span>
              <span class="info-box-number">{{$order_complate}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">{{$user}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Orders wait for confirmation</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Total Money</th>
                      <th>Status</th>
                      <th>Order Date</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order_for_confirmation as $value)
                      <form action="{{route('order.update_status',$value->id)}}" method="POST" id="form">
                      @csrf
                        <tr>
                          <td><a href="pages/examples/invoice.html">{{$value->id}}</a></td>
                          <td>${{number_format($value->total_price,0)}}</td>
                          <td><span class="badge badge-danger">Wait For Confirmation</span></td>
                          <td>{{$value->created_at->format('Y-m-d')}}</td>
                          </td>
                          <input type="hidden" value="{{$value->id}}" name='id'>
                          <td>
                          <span style="display: flex;" class="reason">
                              <a href="{{route('order.detail_order',$value->id)}}" title="Edit"><i class="fas fa-eye" style="padding-right: 10px;color: green"></i></a>
                              <div class="dropdown">
                                  <p class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Action</p>
                                  <ul class="dropdown-menu">
                                      <li><button type="submit" name="value" value="2"><i class="fa fa-check-circle" aria-hidden="true"></i> Confirmed</button></li>
                                      <li><button type="submit" name="value" value="3"><i class="fa fa-truck" aria-hidden="true"></i> Delivery</button></li>
                                      <li><button type="submit" name="value" value="4"><i class="fa fa-credit-card" aria-hidden="true"></i> Accomplished</button></li>
                                      <li><button type="submit" name="value" value="5"><i class="fa fa-times-circle" aria-hidden="true"></i> Cancel</button></li>
                                  </ul>
                              </div> 
                          </span>
                          </td>
                        </tr>
                      </form>
                    @endforeach              
                  </tbody>
                </table>
                <div style="float: right; margin-right: 20px;">
                  {{$order_for_confirmation->links()}}
                </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="{{route('order')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- PRODUCT LIST -->
          <div class="card">
            <div class="card-header">
              @if($month < 10)
              <h3 class="card-title">Top selling products (0{{$month}} - {{$year}})</h3>
              @else
              <h3 class="card-title">Top selling products ({{$month}} - {{$year}})</h3>
              @endif
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              @foreach($sale_pro as $value)
              @php
                $get_infor = $order->get_image($value->product_id)
              @endphp
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                  <div class="product-img">
                    <img src="{{url('images/products')}}/{{$get_infor->image}}" alt="Product Image" class="img-size-50" width="100%">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">{{$get_infor->name}}
                      <span class="badge badge-warning float-right">{{$value->quantity}}</span>
                      @if($get_infor->sale_price > 0)
                      <span class="product-description">${{number_format($get_infor->sale_price,0)}}<strike style="margin-left: 15px; color: #6c757d">${{number_format($get_infor->price,0)}}</strike></span>
                      @else
                      <span class="product-description">${{number_format($get_infor->price,0)}}</span>
                      @endif
                    </a>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
              @endforeach
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="{{route('product.index')}}" class="uppercase">View All Products</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

       <!-- Main row -->
       <div class="row">
        <div class="col-md-4">
          <!-- PRODUCT LIST -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detailed Statistics</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                  <div class="product-info">
                    <a href="{{route('category.index')}}" class="product-title">Total number of categories
                      <span class="badge badge-warning float-right">{{$category->count()}}</span></a>
                  </div>
                </li>
                <li class="item">
                  <div class="product-info">
                    <a href="{{route('brand.index')}}" class="product-title">Total number of brands
                      <span class="badge badge-warning float-right">{{$brand->count()}}</span></a>
                  </div>
                </li>
                <li class="item">
                  <div class="product-info">
                    <a href="{{route('product.index')}}" class="product-title">Total number of products
                      <span class="badge badge-warning float-right">{{$product->count()}}</span></a>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="card">
            <div class="card-header border-transparent">
              @if($month < 10)
              <h3 class="card-title">Orders of the month (0{{$month}} - {{$year}})</h3>
              @else
              <h3 class="card-title">Orders of the month ({{$month}} - {{$year}})</h3>
              @endif
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    
                    <tr>
                      <th>Order ID</th>
                      <th>Total Money</th>
                      <th>Status</th>
                      <th>Order Date</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($list_order_month as $value)
                      <form action="{{route('order.update_status',$value->id)}}" method="POST" id="form">
                      @csrf
                        <tr>
                          <td><a href="pages/examples/invoice.html">{{$value->id}}</a></td>
                          <td>${{number_format($value->total_price,0)}}</td>
                          <td><span class="badge badge-success">Accomplished</span></td>
                          <td>{{$value->created_at->format('Y-m-d')}}</td>
                          </td>
                          <input type="hidden" value="{{$value->id}}" name='id'>
                          <td>
                          <span style="display: flex;" class="reason">
                              <a href="{{route('order.detail_order',$value->id)}}" title="Edit"><i class="fas fa-eye" style="padding-right: 10px;color: green"></i></a>
                          </span>
                          </td>
                        </tr>
                      </form>
                    @endforeach              
                  </tbody>
                </table>
                <div style="float: right; margin-right: 20px;">
                  {{$list_order_month->links()}}
                </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="{{route('order')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop()