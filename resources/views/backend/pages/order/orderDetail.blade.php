@extends('backend.master')
@section('main')
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        {{$order->note}}
                    </div>         
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Zonex Shop.
                                    <small class="float-right">Date: {{$order->created_at->format('Y/m/d')}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Zonex Shop</strong><br>
                                    236 - Hoàng Quốc Việt - Hà Nội<br>
                                    Phone: 0971976699<br>
                                    Email: zonexshop8888@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                
                                <address>
                                    <strong>{{$order->user->name}}</strong><br>
                                   {{$order->address_ship}}<br>
                                    Phone: {{$order->phone}}<br>
                                    Email: {{$order->user->email}}
                                </address>
                                
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice</b>
                                <br>
                                <b>Order ID:</b> {{$order->id}}<br>
                                <b>Order Date:</b> {{$order->created_at->format('Y-m-d')}}<br>
                                <b>Account:</b> {{$order->user->id}}
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th style="width: 20%;">Product</th>
                                            <th style="width: 10%;">Image</th>
                                            <th style="width: 20%;padding-left: 50px;">Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderDetail as $value)
                                            <tr>
                                                <td style="padding-top: 25px">{{$loop->index + 1}}</td>
                                                <td style="padding-top: 25px">{{$value->product->name}}</td>
                                                <td><img src="{{url('images/products')}}/{{$value->product->image}}" alt="" width="60%"></td>
                                                <td style="padding-top: 25px;padding-left: 50px">${{number_format($value->price,0)}}</td>
                                                <td style="padding-top: 25px">{{$value->quantity}}</td>
                                                <td style="padding-top: 25px">${{number_format($value->price * $value->quantity,0)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="{{url('assets')}}/backend/dist/img/credit/visa.png" alt="Visa">
                                <img src="{{url('assets')}}/backend/dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="{{url('assets')}}/backend/dist/img/credit/american-express.png" alt="American Express">
                                <img src="{{url('assets')}}/backend/dist/img/credit/paypal2.png" alt="Paypal">

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Amount Due 2/22/2014</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                      
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>${{number_format($order->total_price,0)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (0%)</th>
                                                <td>$0.00</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping:</th>
                                                <td>$0.00</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>${{number_format($order->total_price,0)}}</td>
                                            </tr>
                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop()