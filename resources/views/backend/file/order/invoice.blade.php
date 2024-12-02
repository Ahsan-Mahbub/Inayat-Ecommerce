@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">#{{ $order->invoice }}</h3>
                <button type="button" class="btn-block-option" onclick="printDiv('printableArea')">
                    <i class="si si-printer"></i> Print Invoice
                </button>
            </div>
            <div class="block-content" id="printableArea">
                <!-- Invoice Info -->
                <div class="row my-3 fs-sm">
                    <!-- Company Info -->
                    <div class="col-sm-4" style="width: 50%">
                        <img class="mb-2" src="{{ $information->image ? '/' . $information->image : '/demo.svg' }}" width="50%">
                        <address style="width: 100%">
                            {{ $information->location }}<br>
                            Order Create : {{ $order->type }}
                        </address>
                    </div>
                    <!-- END Company Info -->

                    <!-- Client Info -->
                    <div class="col-sm-8 text-end" style="width: 40%">
                        <address>
                            #{{ $order->invoice }}<br>
                            ৳ {{ $order->total_ammount }}<br>
                            @if ($order->status == 1)
                                <span class="badge bg-success">Deliverd</span>
                            @elseif($order->status == 2)
                                <span class="badge bg-warning">Pending</span>
                            @elseif($order->status == 0)
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                            <br>
                            @if ($order->payment_method == 'Cash')
                            <span class="badge bg-success">Cash On Delivery</span>
                            @endif
                        </address>
                        <address>
                            {{ $order->name }}<br>
                            @if ($order->email)
                                {{ $order->email }}<br>
                            @endif
                            {{ $order->phone }}<br>
                            {{ $order->address }}
                        </address>
                    </div>
                    <!-- END Client Info -->
                    <!-- END Invoice Info -->

                    <!-- Table -->
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">S/L</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Specification</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl = 1; @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $sl++ }}</td>
                                        <td>
                                            <img style="width: 50px; height: 50px;"
                                                src="{{ $product->product_img ? '/' . $product->product_img : '/demo.svg' }}">
                                        </td>
                                        <td class="text-center">
                                            {{-- @php dd($product->product->stock_status) @endphp --}}
                                            {{ $product->product_name }} @if($product->product->stock_status == 0) <span class="text-danger">(Pre Order)</span> @endif<br>
                                            ({{ $product->category_name }})
                                        </td>
                                        <td class="text-center">
                                            @if ($product->watt)
                                                Watt : {{ $product->watt }} <br>
                                            @endif

                                            @if ($product->color)
                                                Color : {{ $product->color }} <br>
                                            @endif

                                            @if ($product->temperature)
                                                Temperature : {{ $product->temperature }} <br>
                                            @endif

                                            @if ($product->dimmable_type)
                                                Dimmable Type : {{ $product->dimmable_type }} <br>
                                            @endif
                                        </td>
                                        <td class="text-center">৳ {{ $product->price }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-primary">{{ $product->qty }}</span>
                                        </td>
                                        <td class="text-end">৳ {{ $product->total_price }}</td>
                                    </tr>
                                @endforeach
                                <tr class="table-info">
                                    <td colspan="6" class="fw-bold text-uppercase text-end">Sub Total</td>
                                    <td class="fw-bold text-end">৳ {{ $order->sub_total_ammount }}</td>
                                </tr>
                                <tr class="table-warning">
                                    <td colspan="6" class="fw-bold text-uppercase text-end">Delivery Charge</td>
                                    <td class="fw-bold text-end">৳ {{ $order->delivery_charge }}</td>
                                </tr>
                                <tr class="table-info">
                                    <td colspan="6" class="fw-bold text-uppercase text-end">Grand Total</td>
                                    <td class="fw-bold text-end">৳ {{ $order->total_ammount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->

                    <!-- Footer -->
                    <p class="fa-sm text-muted">
                        {!! $information->return_policy !!}
                    </p>
                    <!-- END Footer -->
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    @endsection
