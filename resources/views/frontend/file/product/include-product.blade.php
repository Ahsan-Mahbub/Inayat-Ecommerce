@if (count($products) > 0)
    <div class="row">
        @foreach ($products as $product)
            <!-- product -->
            <div class="product col-xl-3 col-md-6 col-12 col-xs-12">
                <a href="/product/{{ $product->slug }}">
                    <div class="product-box">
                        <!-- product-box-inner -->
                        <div class="product-box-inner">
                            <div class="product-image-box">
                                @if ($product->stock_status == 1)
                                    <div class="in-stock">In Stock</div>
                                @else
                                    <div class="pre-order">Pre Order</div>
                                @endif
                                <img class="img-fluid pro-image-front" src="/{{ $product->image }}" alt="{{$product->image_alt ? $product->image_alt : $product->product_name}}">
                                <img class="img-fluid pro-image-back" src="/{{ !empty($product->image2) && file_exists($product->image2) ? $product->image2 : $product->image }}"
                                alt="{{$product->image_alt2 ? $product->image_alt2 : $product->product_name}}">
                            </div>
                        </div><!-- product-box-inner end -->
                        <div class="product-content-box">
                            <a class="product-title" href="/product/{{ $product->slug }}">
                                <h2>{{ $product->product_name }}</h2>
                            </a>
                            <span class="price">
                                <ins><span class="product-Price-amount">
                                        <span class="product-Price-currencySymbol">৳</span>{{ $product->main_price }}
                                    </span>
                                </ins>
                                @if ($product->discount)
                                    <del><span class="product-Price-amount">
                                            <span class="product-Price-currencySymbol">৳</span>{{ $product->price }}
                                        </span>
                                    </del>
                                @endif
                            </span>
                            {{-- <div class="text-center">
                                <button type="button" product_id="{{ $product->id }}"
                                    class="text-white cart-btn addToCart" data-toggle="modal"
                                    data-target="#quickAddToCartModel">Add To Cart</button>
                                <button type="button" product_id="{{ $product->id }}"
                                        class="text-white cart-btn buyNowBtn custom-warning-btn" data-toggle="modal"
                                        data-target="#quickBuyNowModel">Buy Now</button>
                            </div> --}}
                        </div>
                    </div>
                </a>
            </div><!-- product end -->
        @endforeach
    </div>
@else
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img src="/no-product-found.png" width="100%">
        </div>
    </div>
@endif
