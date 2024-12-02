@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <?php
    $all_cart = Cart::content();
    $data = Cart::content()->count();
    $total = Cart::subtotal();
    ?>
    <form class="form-horizontal form-payment pt-4 pb-3" action="{{ url('/guest-order-store') }}" method="post">
        @csrf
        <div class="checkout-area padding-100-20 text-dark">
            <div class="container">
                <div class="navigation-bar">
                    <div class="navigation-line">
                        <i class="fa fa-home"></i> <a href="/">Home</a> / Checkout
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title title-style-center_text style2">
                            <div class="title-header">
                                <h1 class="title">Checkout</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="section-left">
                            <div class="checkout-content checkout-payment-form">
                                <h2 class="secondary-title">Billing Address </h2>
                                <div class="box-inner">
                                    <div id="payment-new" style="display: block">
                                        <div class="form-group required">
                                            <input type="text" name="name" required placeholder="Name *"
                                                class="form-control">
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group required">
					                    <input type="email" name="email" placeholder="Email" class="form-control">
					                </div> --}}
                                        <div class="form-group company-input">
                                            <input type="tel" name="phone" required placeholder="Phone *"
                                                class="form-control">
                                            @error('phone')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group required">
                                            <input type="text" name="address" required placeholder="Address *"
                                                class="form-control">
                                            @error('address')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>  
                                        <div class="form-group required">
                                            <select name="delivery_area" id="delivery_area" class="form-control" required>
                                                <option value="">Delivery Area</option>
                                                <option value="insite_dhaka">Inside Dhaka</option>
                                                <option value="outsite_dhaka">Outside Dhaka</option>
                                            </select>
                                            @error('delivery_area')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-3 pt-3 company-input">
                                            {{-- <label class="pb-2" style="font-weight: 700; color: #444444">Payment Method
                                                :</label> --}}
                                            <div class="form-check pb-2">
                                                <input class="form-check-input" type="radio" required
                                                    name="payment_method" id="cash" value="Cash" checked />
                                                <label class="form-check-label" for="cash">
                                                    Cash On Delivery
                                                </label>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="section-right">
                            <div class="checkout-content checkout-cart">
                                <h2 class="secondary-title">Shopping Cart </h2>
                                <div class="box-inner">
                                    <div class="cart-container" id="cart">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Specification</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_cart as $data)
                                                    <tr class="text-center">
                                                        <td>
                                                            <input type="hidden" name="product_id[]"
                                                                value="{{ $data->id }}">

                                                            <img class="img-fluid" width="50"
                                                                src="/{{ $data->options->product_img }}">
                                                            <input type="hidden" name="product_img[]"
                                                                value="{{ $data->options->product_img }}">

                                                        </td>
                                                        <td class="txt-cart">
                                                            {{ $data->name }} <br>
                                                            <input type="hidden" name="product_name[]"
                                                                value="{{ $data->name }}">
                                                            ({{ $data->options->category_name }})
                                                            <input type="hidden" name="category_name[]"
                                                                value="{{ $data->options->category_name }}">
                                                        </td>
                                                        <td class="txt-cart">
                                                            @if ($data->options->color)
                                                                Color: {{ $data->options->color }}<br>
                                                            @endif
                                                            <input type="hidden" name="color[]"
                                                                value="{{ $data->options->color }}">

                                                            @if ($data->options->watt)
                                                                Watt: {{ $data->options->watt }}<br>
                                                            @endif
                                                            <input type="hidden" name="watt[]"
                                                                value="{{ $data->options->watt }}">

                                                            @if ($data->options->temperature)
                                                                Temperature: {{ $data->options->temperature }}<br>
                                                            @endif
                                                            <input type="hidden" name="temperature[]"
                                                                value="{{ $data->options->temperature }}">

                                                            @if ($data->options->dimmable_type)
                                                                Dimmable Type: {{ $data->options->dimmable_type }}<br>
                                                            @endif
                                                            <input type="hidden" name="dimmable_type[]"
                                                                value="{{ $data->options->dimmable_type }}">
                                                        </td>
                                                        <td class="txt-cart">
                                                            {{ $data->price }}
                                                            <input type="hidden" name="price[]"
                                                                value="{{ $data->price }}">
                                                        </td>
                                                        <td class="txt-cart">
                                                            {{ $data->qty }}
                                                            <input type="hidden" name="qty[]"
                                                                value="{{ $data->qty }}">
                                                        </td>
                                                        <td class="txt-cart">
                                                            {{ $data->options->total_price }}
                                                            <input type="hidden" name="total_price[]"
                                                                value="{{ $data->options->total_price }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-hover">
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-left">Sub Total:</td>
                                                    <td class="text-right">৳ {{ $total }}</td>
                                                    <input type="hidden" name="sub_total_ammount" id="sub_total_ammount" value="{{ $total }}">
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-left">Delivery Charge:</td>
                                                    <td class="text-right">৳ <span id="delivery_charge_amount">0</span></td>
                                                    <input type="hidden" name="delivery_charge" id="delivery_charge" value="0">
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-left">Grand Total:</td>
                                                    <td class="text-right">৳ <span id="set_total_ammount">{{ $total }}</span></td>
                                                    <input type="hidden" name="total_ammount" id="total_ammount" value="{{ $total }}">
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="text-center">
                                            <button type="submit" class="btn main-btn text-white">Confirm Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
    <!-- End Chekout Product Area-->
@endsection

@section('javascript')
    <script>
        $(document).on('change', '#delivery_area', function(){
            var delivery_area = $(this).val();
            if (delivery_area == 'outsite_dhaka') {
                $('#delivery_charge_amount').text('150');
                $('#delivery_charge').val(150);
            }
            else{
                $('#delivery_charge_amount').text('80');
                $('#delivery_charge').val(80);
            }
            total_amount_calculation();
        });

        function total_amount_calculation(){
            var sub_total_ammount = $('#sub_total_ammount').val();
            var delivery_charge = $('#delivery_charge').val();
            sub_total_ammount = parseInt(sub_total_ammount.replace(/,/g, ''));
            let total_amount = sub_total_ammount + parseInt(delivery_charge);
            $('#set_total_ammount').text(total_amount);
            $('#total_ammount').val(total_amount);
        }
        total_amount_calculation();

    </script>
@endsection
