@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $product->meta_description }}">
<meta name="keywords" content="{{ $product->meta_keyword }}">
@endsection
@section('content')
    <section class="product-details-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> @if($product->category) / <a href="/cat/product/{{$product->category->slug}}">{{$product->category->category_name}}</a> @if($product->subcategory) / <a href="/subcat/product/{{$product->subcategory->slug}}">{{$product->subcategory->subcategory_name}}</a> @endif @endif / {{ $product->product_name }}
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-5 col-12 pb-2">
                    <div class="product-image-box pt-2">
                        <img src="/{{ $product->image }}" class="main-product-img" alt="{{$product->image_alt ? $product->image_alt : $product->product_name}}">

                        <ul>
                            @if($product->image3 || $product->image4 || $product->image5 || $product->image6 || $product->image7 || $product->image8)
                            <div class="image-slide-inner owl-carousel">
                                <li>
                                    <img src="/{{ $product->image }}" class="product-thumbnail" alt="{{$product->image_alt ? $product->image_alt : $product->product_name}}">
                                </li>
                                <li>
                                    <img src="/{{ !empty($product->image2) && file_exists($product->image2) ? $product->image2 : $product->image }}" class="product-thumbnail" alt="{{$product->image_alt2 ? $product->image_alt2 : $product->product_name}}">
                                </li>
                            @if ($product->image3)
                                <li>
                                    <img src="/{{ $product->image3 }}" class="product-thumbnail">
                                </li>
                            @endif
                            @if ($product->image4)
                                <li>
                                    <img src="/{{ $product->image4 }}" class="product-thumbnail">
                                </li>
                            @endif
                            @if ($product->image5)
                                <li>
                                    <img src="/{{ $product->image5 }}" class="product-thumbnail">
                                </li>
                            @endif
                            @if ($product->image6)
                                <li>
                                    <img src="/{{ $product->image6 }}" class="product-thumbnail">
                                </li>
                            @endif
                            @if ($product->image7)
                                <li>
                                    <img src="/{{ $product->image7 }}" class="product-thumbnail">
                                </li>
                            @endif
                            @if ($product->image8)
                                <li>
                                    <img src="/{{ $product->image8 }}" class="product-thumbnail">
                                </li>
                            @endif
                            </div>
                            @else
                            <li>
                                <img src="/{{ $product->image }}" class="product-thumbnail" alt="{{$product->image_alt ? $product->image_alt : $product->product_name}}">
                            </li>
                            <li>
                                <img src="/{{ !empty($product->image2) && file_exists($product->image2) ? $product->image2 : $product->image }}" class="product-thumbnail" alt="{{$product->image_alt2 ? $product->image_alt2 : $product->product_name}}">
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <form action="{{ route('add_to_cart_product') }}" method="post" id="addToCartProduct">
                        @csrf
                        <input type="hidden" id="product_id" name="product_id" value="{{ $product->id}}">
                        <div class="content">
                            <h4 class="pb-2">
                                <h1 class="single-product-title">{{ $product->product_name}}</h1>
                                @if ($product->stock_status == 1)
                                    <div class="single-in-stock">In Stock</div>
                                @else
                                    <div class="single-pre-order">Pre Order</div>
                                @endif
                                <input type="hidden" name="product_name" value="{{ $product->product_name}}">
                                <input type="hidden" name="product_price" id="product_price" value="{{ $product->main_price}}">
                                <input type="hidden" name="category_name"
                                    value="{{ $product->category ? $product->category->category_name : 'No Category' }}">
                                <input type="hidden" name="product_img" value="{{ $product->image}}">
                            </h4>
                            <div class="mt-2 mb-2 text-dark">
                                <p class="text-dark d-inline" style="font-weight: 600;">Product Code : &nbsp; {{ $product->product_code }}</p>
                            </div>
                            @if($product->category)
                            <div class="mt-2 mb-2 text-dark">
                                <p class="text-dark d-inline" style="font-weight: 600">Category : &nbsp;
                                    <a class="text-dark" href="/cat/product/{{$product->category->slug}}">{{ $product->category->category_name}}</a>
                                    @if ($product->subcategory)
                                        > <a class="text-dark" href="/cat/subcategory/{{$product->subcategory->slug}}">{{ $product->subcategory->subcategory_name }}</a>
                                    @endif
                                </p>
                            </div>
                            @endif
                            
                            @if ($product->color)
                                <div class="mt-2 mb-3 text-dark">
                                    <p class="text-dark mb-1" style="font-weight: 600">Product Color : &nbsp; </p>
                                    @foreach ($product_colors as $color)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="color" id="color{{$color}}" value="{{ strtolower($color) }}" onclick="priceByColor()" required>
                                        <label class="form-check-label text-dark" for="color{{$color}}">{{ $color }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                            @if ($product->size)
                                <div class="mt-2 mb-3 text-dark">
                                    <p class="text-dark mb-1" style="font-weight: 600">Product Watt : &nbsp; </p>
                                    @foreach ($product_sizes as $size)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="watt" id="watt{{$size}}" value="{{ strtolower($size) }}" onclick="priceByWatt()" required>
                                        <label class="form-check-label text-dark" for="watt{{$size}}">{{ $size }}</label>
                                    </div>
                                    @endforeach  
                                </div>
                            @endif

                            @if ($product->temperature)
                                <div class="mt-2 mb-3 text-dark">
                                    <p class="text-dark mb-1" style="font-weight: 600">Product Temperature : &nbsp; </p>
                                    @foreach ($product_temperatures as $temperature)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="temperature" id="temperature{{$temperature}}" value="{{ strtolower($temperature) }}" onclick="priceByTemperature()" required>
                                        <label class="form-check-label text-dark" for="temperature{{$temperature}}">{{ $temperature }}</label>
                                    </div>
                                    @endforeach  
                                </div>
                            @endif

                            @if ($product->dimmable_type)
                                <div class="mt-2 mb-3 text-dark">
                                    <p class="text-dark mb-1" style="font-weight: 600">Dimmable Type : &nbsp; </p>
                                    @foreach ($product_dimmable_type as $dimmable_type)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dimmable_type" id="dimmable_type{{$dimmable_type}}" value="{{ strtolower($dimmable_type) }}" onclick="priceByDimmable()" required>
                                        <label class="form-check-label text-dark" for="dimmable_type{{$dimmable_type}}">{{ $dimmable_type }}</label>
                                    </div>
                                    @endforeach  
                                </div>
                            @endif
                            <p class="text-dark mb-1 single-menu-price" style="font-weight: 600">Price :
                                <span class="price">
                                    <ins><span style="font-size: 17px" class="product-Price-amount">
                                            <span class="product-Price-currencySymbol">৳ </span>{{ $product->main_price}}
                                        </span>
                                    </ins>
                                    @if ($product->discount)
                                        <del><span style="font-size: 17px" class="product-Price-amount">
                                                <span class="product-Price-currencySymbol">৳ </span>{{ $product->price}}
                                            </span>
                                        </del>
                                    @endif
                                </span>
                            </p>
                        </div>
                        <div class="single-content pb-3">
                            <div class="form-group form-action mt-2 text-dark">
                                <strong class="text-dark mb-1" style="font-weight: 600">Quantity :&nbsp;</strong>
                                <button type="button" class="value-button decrease updateModalQuantity">
                                    -
                                </button>
                                <input type="number" class="custom-qntnumber" name="quantity" id="qty" min="1"
                                    value="1" />
                                <button type="button" class="value-button increase updateModalQuantity">
                                    +
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="text-white cart-btn">@if($product->stock_status == 1) Add To Cart @else Pre Order @endif</button> <span class="call-price"><a href="tel:{{$information->call_price}}">Call for Price</a></span>

                        {{-- <button type="button" product_id="{{$product->id}}" class="text-white preOrder" data-toggle="modal" data-target="#quickPreOrder">Pre Order</button> --}}
                    </form>
                </div>

                <div class="col-md-12 mt-4">
                    <ul class="nav nav-tabs mb-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" data-target="#description" role="tab">Description
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" data-target="#youtube" role="tab">
                                Youtube Video
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" data-target="#review" role="tab">
                                Customers Review
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="description">
                            {!! $product->details !!}
                        </div>
                        <div class="tab-pane" id="youtube">
                            {!!  $product->youtube_link  !!}
                        </div>
                        <div class="tab-pane" id="review">
                            <h1 class="rating-head text-left ">Review and rating</h1>
                            <div class="main-review-box text-left">
                                @if(count($reviews) > 0)
                                @foreach($reviews as $review)
                                <div class="review-box">
                                    @if($review->customer_id)
                                        <img class="reviewer-img" src="{{$review->customer->image ? '/' . $review->customer->image :  '/demo.svg'}}">
                                        <span class="reviewer-name">{{$review->customer ? $review->customer->name : 'Null'}}</span>
                                    @else
                                        <img class="reviewer-img" src="/demo.svg">
                                        <span class="reviewer-name">{{$review->customer_name}}</span>
                                    @endif
                                    <div class="review-stars-box">
                                        @if($review->review == 1)
                                        <i class="star fa fa-star"></i>
                                        @elseif($review->review == 2)
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        @elseif($review->review == 3)
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        @elseif($review->review == 4)
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        @elseif($review->review == 5)
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        <i class="star fa fa-star"></i>
                                        @endif
                                    </div>
                                    <p>{{$review->comments}}</p>
                                </div>
                                @endforeach
                                @else
                                <p class="text-center text-danger"> No Review Found </p>
                                @endif
                            </div>
                            @if(Auth::guard('customers')->user())
                            <h1 class="rating-head text-left mt-3">Write a New Review</h1>
                            <form action="{{route('Customer.review.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                      <div class="rating-component">
                                        <div class="stars-box">
                                            <i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
                                            <i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
                                            <i class="star fa fa-star" title="3 stars" data-message="Average quality" data-value="3"></i>
                                            <i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
                                            <i class="star fa fa-star" title="5 stars" data-message="very good qality" data-value="5"></i>
                                        </div>
                                        <div class="status-msg">
                                            <label>
                                                <input  class="rating_msg" type="hidden" name="rating_msg" value=""/>
                                            </label>
                                        </div>
                                        
                                        <div class="starrate">
                                            <label>
                                                <input  class="ratevalue" type="hidden" name="rate_value" value=""/>
                                            </label>
                                        </div>
                                      </div>
                                      <div class="tags-box">
                                        <textarea name="comments" id="inlineFormInputName" placeholder="Write a comment on ({{$product->product_name}}) this product......" rows="3" required></textarea>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                      </div>
                                  
                                      <div class="button-box">
                                        <input type="submit" class="done text-white cart-btn custom-warning-btn" disabled="disabled" value="Submit Review" />
                                      </div>
                                    </div>
                                  
                                </div>
                            </form>
                            @else
                                <span>
                                    To share your review of this product, please <a class="text-success" href="/customer-login"><b>Login</b></a>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
        </div>
    </section>
    @if (count($products) > 0)
        <section class="product-section pt-3">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                        <!-- section title -->
                        <div class="section-title title-style-center_text style2">
                            <div class="title-header">
                                <h1 class="title">Related Products </h1>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
                <div class="related-slide-inner owl-carousel">
                    @foreach ($products as $product)
                        <!-- product -->
                        <div class="product" style="width: 100%">
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
                                            <img class="img-fluid pro-image-front" src="/{{ $product->image }}"
                                            alt="{{$product->image_alt ? $product->image_alt : $product->product_name}}">
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
                                                    <span
                                                        class="product-Price-currencySymbol">৳</span>{{ $product->main_price }}
                                                </span>
                                            </ins>
                                            @if ($product->discount)
                                                <del><span class="product-Price-amount">
                                                        <span
                                                            class="product-Price-currencySymbol">৳</span>{{ $product->price }}
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
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
@section('javascript')
    <script type="text/javascript">
        function increase() {
            var a = 1;
            var textBox = document.getElementById("qntnumber");
            textBox.value++;
        }

        function decrease() {
            var textBox = document.getElementById("qntnumber");
            textBox.value--;
            var descreseValue = $("#qntnumber").val();
            if (descreseValue <= 1) {
                document.getElementById("qntnumber").value = "1";
            }
        }


        $(".rating-component .star").on("mouseover", function () {
            var onStar = parseInt($(this).data("value"), 10); //
            $(this).parent().children("i.star").each(function (e) {
                if (e < onStar) {
                $(this).addClass("hover");
                } else {
                $(this).removeClass("hover");
                }
            });
            }).on("mouseout", function () {
            $(this).parent().children("i.star").each(function (e) {
                $(this).removeClass("hover");
            });
            });

            $(".rating-component .stars-box .star").on("click", function () {
            var onStar = parseInt($(this).data("value"), 10);
            var stars = $(this).parent().children("i.star");
            var ratingMessage = $(this).data("message");

            var msg = "";
            if (onStar > 1) {
                msg = onStar;
            } else {
                msg = onStar;
            }
            $('.rating-component .starrate .ratevalue').val(msg);
            

            
            $(".fa-smile-wink").show();
            
            $(".button-box .done").show();

            if (onStar != null) {
                $(".button-box .done").removeAttr("disabled");
            } else {
                $(".button-box .done").attr("disabled", "true");
            }

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass("selected");
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass("selected");
            }

            $(".status-msg .rating_msg").val(ratingMessage);
            $(".status-msg").html(ratingMessage);
            $("[data-tag-set]").hide();
            $("[data-tag-set=" + onStar + "]").show();
            });

            $(".feedback-tags  ").on("click", function () {
            var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
            choosedTagsLength = choosedTagsLength + 1;

            if ($(this).hasClass("choosed")) {
                $(this).removeClass("choosed");
                choosedTagsLength = choosedTagsLength - 2;
            } else {
                $(this).addClass("choosed");
                $(".button-box .done").removeAttr("disabled");
            }

            console.log(choosedTagsLength);

            if (choosedTagsLength <= 0) {
                $(".button-box .done").attr("enabled", "false");
            }
            });



            $(".compliment-container .fa-smile-wink").on("click", function () {
            $(this).fadeOut("slow", function () {
                $(".list-of-compliment").fadeIn();
            });
            });
    </script>
    <script>
        function priceByColor() {
            let product_id = $("#product_id").val();
            let color = $("input[name='color']:checked").val();
            let watt = $("input[name='watt']:checked").val();
            let temperature = $("input[name='temperature']:checked").val();
            let dimmable_type = $("input[name='dimmable_type']:checked").val();

            console.log(color);
            console.log(watt);
            console.log(temperature);
            console.log(dimmable_type);
    
            let url = '/get-product-price/';
    
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
    
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    _token: csrfToken,
                    product_id: product_id,
                    watt: watt,
                    color: color,
                    temperature: temperature,
                    dimmable_type: dimmable_type
                },
                success: function(response) {
                    console.log(response);
    
                    let price_text = `<ins><span style="font-size: 17px" class="product-Price-amount">
                                        <span class="product-Price-currencySymbol">৳ </span>` + (response.price ? response.price : response.main_price) + `
                                    </span></ins>`;
                    $(".price").html(price_text);
                    $("#product_price").val(response.price ? response.price : response.main_price);
                },
                error: function(xhr, status, error) {
                    toastr.error(" Something is wrong", "Error");
                }
            });
        }  
        function priceByWatt() {
            let product_id = $("#product_id").val();
            let color = $("input[name='color']:checked").val();
            let watt = $("input[name='watt']:checked").val();
            let temperature = $("input[name='temperature']:checked").val();
            let dimmable_type = $("input[name='dimmable_type']:checked").val();

            console.log(color);
            console.log(watt);
            console.log(temperature);
            console.log(dimmable_type);
    
            let url = '/get-product-price/';
    
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
    
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    _token: csrfToken,
                    product_id: product_id,
                    watt: watt,
                    color: color,
                    temperature: temperature,
                    dimmable_type: dimmable_type
                },
                success: function(response) {
                    console.log(response);
    
                    let price_text = `<ins><span style="font-size: 17px" class="product-Price-amount">
                                        <span class="product-Price-currencySymbol">৳ </span>` + (response.price ? response.price : response.main_price) + `
                                    </span></ins>`;
                    $(".price").html(price_text);
                    $("#product_price").val(response.price ? response.price : response.main_price);
                },
                error: function(xhr, status, error) {
                    toastr.error(" Something is wrong", "Error");
                }
            });
        } 
        function priceByTemperature() {
            let product_id = $("#product_id").val();
            let color = $("input[name='color']:checked").val();
            let watt = $("input[name='watt']:checked").val();
            let temperature = $("input[name='temperature']:checked").val();
            let dimmable_type = $("input[name='dimmable_type']:checked").val();

            console.log(color);
            console.log(watt);
            console.log(temperature);
            console.log(dimmable_type);

            let url = '/get-product-price/';
    
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
    
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    _token: csrfToken,
                    product_id: product_id,
                    watt: watt,
                    color: color,
                    temperature: temperature,
                    dimmable_type: dimmable_type
                },
                success: function(response) {
                    console.log(response);
    
                    let price_text = `<ins><span style="font-size: 17px" class="product-Price-amount">
                                        <span class="product-Price-currencySymbol">৳ </span>` + (response.price ? response.price : response.main_price) + `
                                    </span></ins>`;
                    $(".price").html(price_text);
                    $("#product_price").val(response.price ? response.price : response.main_price);
                },
                error: function(xhr, status, error) {
                    toastr.error(" Something is wrong", "Error");
                }
            });
        }   
        function priceByDimmable() {
            let product_id = $("#product_id").val();
            let color = $("input[name='color']:checked").val();
            let watt = $("input[name='watt']:checked").val();
            let temperature = $("input[name='temperature']:checked").val();
            let dimmable_type = $("input[name='dimmable_type']:checked").val();
    
            let url = '/get-product-price/';
    
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
    
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    _token: csrfToken,
                    product_id: product_id,
                    watt: watt,
                    color: color,
                    temperature: temperature,
                    dimmable_type: dimmable_type
                },
                success: function(response) {
                    console.log(response);
    
                    let price_text = `<ins><span style="font-size: 17px" class="product-Price-amount">
                                        <span class="product-Price-currencySymbol">৳ </span>` + (response.price ? response.price : response.main_price) + `
                                    </span></ins>`;
                    $(".price").html(price_text);
                    $("#product_price").val(response.price ? response.price : response.main_price);
                },
                error: function(xhr, status, error) {
                    toastr.error(" Something is wrong", "Error");
                }
            });
        }  
    </script>
@endsection
