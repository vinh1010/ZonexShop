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
                        <h3 class="card-title">List Order</h3>
                        <br>
                        <div class="card-tools" style="float: left;margin-top: 20px;">                   
                            <form class="form-inline">
                                <div class="form-group" action="{{request()->fullUrlWithQuery(['start' => request()->input('start') , 'end' => request()->input('end')])}}">
                                    <input type="date" value="{{request()->input('start')}}" name="start" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" value="{{request()->input('end')}}" name="end" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="card-tools" style="float: left;margin-left: 100px;margin-top: 30px">
                            <div class="shop-tab-pill">
                                <form>
                                <div class="show-label showing">
                                    <label>Finters : </label>
                                    <select name="finter" id="finter">
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'ord_new'])}}" {{(Request::get('find_by') == 'ord_new') ? 'selected' : ''}}>Order New</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'wait'])}}" {{(Request::get('find_by') == 'wait') ? 'selected' : ''}}>Wait for confirmation</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'confirmed'])}}" {{(Request::get('find_by') == 'confirmed') ? 'selected' : ''}}>Confirmed Orders</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'delivery'])}}" {{(Request::get('find_by') == 'delivery') ? 'selected' : ''}}>Delivery</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'completed'])}}" {{(Request::get('find_by') == 'completed') ? 'selected' : ''}}>Order Completed</option>
                                        <option value="{{request()->fullUrlWithQuery(['find_by' => 'canceled'])}}" {{(Request::get('find_by') == 'canceled') ? 'selected' : ''}}>Order Canceled</option>
                                        
                                    </select>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-tools">
                            <form action="">
                                <div class="input-group" style="width: 160px;margin-top: 20px">
                                    <input type="text" value="{{request()->input('key')}}" name="key" class="form-control float-right" placeholder="Enter Name Cus">
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
                                    <th>Id Order</th>
                                    <th>Name Customer</th>
                                    <th>Phone</th>
                                    <th>Address Ship</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th style="width: 10%">Tools</th>
                                </tr>
                            </thead>
                            <tbody>     
                                @foreach($list_order as $value)
                                <form action="{{route('order.update_status',$value->id)}}" method="POST" id="form">
                                @csrf
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->user->name}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->address_ship}}</td>
                                        <td>${{number_format($value->total_price,0)}}</td>
                                        <td>
                                            @if($value->status == 1)
                                            Wait for confirmation
                                            @elseif($value->status == 2)
                                            Confirmed
                                            @elseif($value->status == 3)
                                            Delivery
                                            @elseif($value->status == 4)
                                            Accomplished
                                            @else
                                            Cancelled
                                            @endif
                                        </td>
                                        <td>{{$value->created_at->format('Y-m-d')}}</td>
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
                        <div class="float-right" style="margin-right: 20px;">
                            {{$list_order->appends(request()->all())->links()}}
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