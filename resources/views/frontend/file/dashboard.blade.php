@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <!-- Begin Chekout Area-->
    <section class="my-account-area padding-100-20 bg-F7F8FA">
        <div class="container">
            <div class="row">

                @include('frontend.file.customer.sidebar')

                <div class="col-12 col-md-9 pt-4">
                    <div class="seller-dashboard-main-content-area">
                        <div class="content-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="page-header"><i class="fa fa-dashboard mr-2"></i>Dashboard</h1>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <a href="javascript::void(0)">
                                        <div class="card gradient-blackberry">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body white text-left">
                                                            <h3 class="font-large-1 mb-0">{{ $all }}</h3>
                                                            <span>Total Orders</span>
                                                        </div>
                                                        <div class="media-right white text-right">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <a href="javascript::void(0)">
                                        <div class="card gradient-ibiza-sunset">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body white text-left">
                                                            <h3 class="font-large-1 mb-0">{{ $deliverd }}</h3>
                                                            <span>Delivered Orders</span>
                                                        </div>
                                                        <div class="media-right white text-right">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="Widget-line-chart1"
                                                    class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <a href="javascript::void(0)">
                                        <div class="card gradient-green-tea">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body white text-left">
                                                            <h3 class="font-large-1 mb-0">{{ $pandding }}</h3>
                                                            <span>Pending Orders</span>
                                                        </div>
                                                        <div class="media-right white text-right">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                    <a href="javascript::void(0)">
                                        <div class="card gradient-pomegranate">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body white text-left">
                                                            <h3 class="font-large-1 mb-0">{{ $rejected }}</h3>
                                                            <span>Rejected Orders</span>
                                                        </div>
                                                        <div class="media-right white text-right">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="Widget-line-chart3"
                                                    class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="seller-dashboard-main-content-area">
                        <div class="content-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="page-header"><i class="fa fa-shopping-cart mr-2"></i>Order History <small>(
                                            Last 10 Order )</small></h1>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-default">
                                        <tr class="text-dark">
                                            <th class="text-center">Order Invoice</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Total Price</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="text-dark">
                                                <th class="text-center">#{{ $order->invoice }}</th>
                                                <td class="text-center">{{ $order->created_at }}</td>
                                                <td class="text-center">৳ {{ $order->total_ammount }}</td>
                                                <td class="text-center">
                                                    @if ($order->status == 1)
                                                        <span class="badge badge-success bright">Deliverd</span>
                                                    @elseif($order->status == 2)
                                                        <span class="badge badge-warning">Panding</span>
                                                    @elseif($order->status == 0)
                                                        <span class="badge badge-danger">Rejected</span>
                                                    @endif

                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('/customer/order/invoice', $order->id) }}"><i
                                                            class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Chekout Product Area-->
@endsection
