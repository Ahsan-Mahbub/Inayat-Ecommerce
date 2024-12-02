<div class="row">
    <div class="col-md-12 text-center">
        <div class="section-title title-style-center_text style2">
            <div class="title-header">
                <h2 class="title">Shopping Cart</h2>
            </div>
        </div>
    </div>

    <div class="col-md-8" id="cart">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr class="text-center text-dark">
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Specification</th>
                    <th>Price</th>
                    <th style="width: 14%">Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($all_cart as $data)
                    <tr class="text-center">
                        <td><img class="img-fluid" width="50" src="/{{ $data->options->product_img }}"></td>
                        <td class="txt-cart">
                            {{ $data->name }} <br> ({{ $data->options->category_name }})
                        </td>
                        <td class="txt-cart">
                            @if ($data->options->color)
                                Color: {{ $data->options->color }}
                                <br>
                            @endif 
                            @if ($data->options->watt)
                                Watt: {{ $data->options->watt }}
                                <br>
                            @endif 
                            @if ($data->options->temperature)
                                Temperature: {{ $data->options->temperature }}
                                <br>
                            @endif 
                            @if ($data->options->dimmable_type)
                                Dimmable Type: {{ $data->options->dimmable_type }}
                            @endif
                        </td>
                        <td class="txt-cart">৳ {{ $data->price }}</td>
                        <td class="txt-cart">
                            <a class="minus-btn updateCartItem btn btn-sm btn-danger" data-cartid="{{ $data->rowId }}"
                                data-qty="{{ $data->qty }}" data-min="0">&#45;</a>
                            <span class="px-3">{{ $data->qty }}</span>
                            <a class="plus-btn updateCartItem btn btn-sm btn-info" data-cartid="{{ $data->rowId }}"
                                data-qty="{{ $data->qty }}" data-max="1000">&#43;</a>
                        </td>
                        <td class="txt-cart">৳ <?php
                        $total_product_price = $data->price * $data->qty;
                        ?>{{ $total_product_price }}</td>
                        <td class="txt-cart"><a href="javascript:void(0)" data-id="{{ $data->rowId }}"
                                class="btn btn-danger cartDelete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6"><img src="/cart-is-empty.png" width="50%"></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="checkout cart-detailed-actions">
            <div class="text-center mb-3">
                <a href="/" class="btn main-btn text-white">Continue Shopping</a>
            </div>
        </div>
    </div>

    <aside class="col-md-4 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas">
        <div class="cart-summary bg-white">
            <div class="cart-detailed-totals text-dark">
                <div class="cart-summary-products">
                    <?php
                    $data = Cart::content()->count();
                    $total = Cart::subtotal();
                    ?>
                    <div class="summary-label">{{ $data }} - items in your cart</div>
                </div>

                <div class="group-price">
                    <div class="cart-summary-line" id="cart-subtotal-products">
                        <span class="label js-subtotal">
                            Total Cart Items:
                        </span>
                        <span class="value">{{ $data }}</span>
                    </div>
                </div>
                <div class="cart-summary-line cart-total has_border">
                    <div class="d-flex">
                        <span>
                            <span class="label">Total</span>
                        </span>
                        <span class="value ml-auto label">৳ {{ $total }}</span>
                    </div>
                </div>
            </div>
            <div class="checkout cart-detailed-actions">
                <div class="text-center">
                    @if($data > 0)
                        @if (Auth::guard('customers')->user())
                            <a href="/customer/checkout" class="btn btn-primary">Checkout</a>
                        @else
                            <a href="/guest-checkout" class="btn btn-primary">Checkout</a>
                        @endif
                    @else
                        <a href="/" disabled class="btn btn-primary">Continue Shopping</a>
                    @endif
                </div>
            </div>
        </div>
    </aside>
</div>
