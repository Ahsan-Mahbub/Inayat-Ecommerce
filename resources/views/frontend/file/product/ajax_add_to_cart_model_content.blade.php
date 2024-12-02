<div class="row">
    <div class="col-lg-5">
        <div class="border-box">
            <div class="custom-product-details-image">
                @if (!empty($productDetails['image']) && file_exists($productDetails['image']))
                    <img src="{{ asset($productDetails['image']) }}" width="100%" />
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <form action="{{ route('add_to_cart_product') }}" method="post" id="addToCartProduct">
            @csrf
            <input type="hidden" id="product_id" name="product_id" value="{{ $productDetails['id'] }}">
            <div class="content">
                <h4 class="pb-2">
                    <strong>{{ $productDetails['product_name'] }}</strong>
                    <input type="hidden" name="product_name" value="{{ $productDetails['product_name'] }}">
                    <input type="hidden" name="product_price" id="product_price" value="{{ $productDetails['main_price'] }}">
                    <input type="hidden" name="category_name"
                        value="{{ $productDetails->category ? $productDetails->category->category_name : 'No Category' }}">
                    <input type="hidden" name="product_img" value="{{ $productDetails['image'] }}">
                </h4>
                <p style="font-size: 17px" class="single-menu-price">Product Code :
                    {{ $productDetails->product_code }}</p>
                <p style="font-size: 17px" class="single-menu-price">Category :
                    {{ $productDetails->category ? $productDetails->category->category_name : 'No Category' }}

                    @if ($productDetails->subcategory)
                        > {{ $productDetails->subcategory->subcategory_name }}
                    @endif
                </p>
                
                @if ($productDetails['color'])
                    <div class="mt-2 mb-2">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-size: 17px;" class="single-menu-price">Color :</p>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select form-control-sm" name="color" id="color" required onchange="priceByColor()">
                                    <option value="">Select One</option>
                                    @foreach ($product_colors as $color)
                                        <option value="{{ strtolower($color) }}">{{ $color }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                    </div>
                @endif
                @if ($productDetails['size'])
                    <div class="mt-2 mb-2">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-size: 17px;" class="single-menu-price">Watt :</p>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select form-control-sm" name="watt" id="watt" required onchange="priceByWatt()">
                                    <option value="">Select One</option>
                                    @foreach ($product_sizes as $size)
                                        <option value="{{ strtolower($size) }}">{{ $size }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                  
                    </div>
                @endif
                @if ($productDetails['temperature'])
                    <div class="mt-2 mb-2">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-size: 17px;" class="single-menu-price">Temperature :</p>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select form-control-sm" name="temperature" id="temperature" required onchange="priceByTemperature()">
                                    <option value="">Select One</option>
                                    @foreach ($product_temperatures as $temperature)
                                        <option value="{{ strtolower($temperature) }}">{{ $temperature }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                  
                    </div>
                @endif
                <div class="mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-size: 17px;" class="single-menu-price">Dimmable Type :</p>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select form-control-sm" name="dimmable_type" id="dimmable_type" required onchange="priceByDimmable()">
                                <option value="">Select One</option>
                                <option value="Dimmable">Dimmable</option>
								<option value="Non Dimmable">Non Dimmable</option>
                            </select>
                        </div>
                    </div>                                  
                </div>
                <p style="font-size: 17px" class="single-menu-price">Price :
                    <span class="price">
                        <ins><span style="font-size: 17px" class="product-Price-amount">
                                <span class="product-Price-currencySymbol">৳ </span>{{ $productDetails['main_price'] }}
                            </span>
                        </ins>
                        @if ($productDetails['discount'])
                            <del><span style="font-size: 17px" class="product-Price-amount">
                                    <span class="product-Price-currencySymbol">৳ </span>{{ $productDetails['price'] }}
                                </span>
                            </del>
                        @endif
                    </span>
                </p>
            </div>
            <div class="single-content pb-3">
                <div class="form-group form-action mt-2 text-dark">
                    <strong>Quantity :&nbsp;</strong>
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
            <button type="submit" class="text-white cart-btn">Add To Cart</button>
        </form>
    </div>
</div>

<script>
    function priceByColor() {
        let product_id = $("#product_id").val();
        let color = $("#color").val();
        let watt = $("#watt").val();
        let temperature = $("#temperature").val();
        let dimmable_type = $("#dimmable_type").val();

        let url = '/get-product-price/';

        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
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
        let color = $("#color").val();
        let watt = $("#watt").val();
        let temperature = $("#temperature").val();
        let dimmable_type = $("#dimmable_type").val();

        let url = '/get-product-price/';

        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
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
        let color = $("#color").val();
        let watt = $("#watt").val();
        let temperature = $("#temperature").val();
        let dimmable_type = $("#dimmable_type").val();

        let url = '/get-product-price/';

        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
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
        let color = $("#color").val();
        let watt = $("#watt").val();
        let temperature = $("#temperature").val();
        let dimmable_type = $("#dimmable_type").val();

        let url = '/get-product-price/';

        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
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