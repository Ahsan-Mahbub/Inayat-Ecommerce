
    <div class="row">
        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
            <!-- section title -->
            <div class="section-title title-style-center_text style2">
                <div class="title-header">
                    <h2 class="title">Filter Product</h2>
                </div>
            </div><!-- section title end -->
        </div>
        @if (count($products) > 0)
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
                        </div>
                    </div>
                </a>
            </div><!-- product end -->
        @endforeach
        @else
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img src="/no-product-found.png" width="100%">
                </div>
            </div>
        @endif

    </div>
