@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $main_category->meta_description }}">
<meta name="keywords" content="{{ $main_category->meta_keyword }}">
@endsection
<style>
    .section-title h2.title{
        margin: 0px!important; 
    }
</style>
@section('content')
    <section class="product-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / <a href="/categories">Category</a> / {{$main_category->category_name}}
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-xl-3 order-2 order-md-1">
                    <div class="filter-box">
                        <form id="filterForm">
                            <div>
                                <div for="collapse-categories" data-toggle="collapse" data-target="#checkboxes-categories">
                                    <label class="form-check-label label-header">
                                        Product Categories
                                      </label>
                                      <i class="collapse-icon fa fa-minus"></i>
                                </div>
                                <div class="collapse show pt-3" id="checkboxes-categories">
                                    <input id="main_category" value="{{$main_category->id}}" type="hidden">
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input side_category" type="checkbox" value="{{$category->id}}" id="{{$category->id}}">
                                            <label class="form-check-label" for="{{$category->id}}" style="font-size: 16px; font-weight: 500; padding-bottom: 10px;">{{$category->category_name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <div class="mt-4" for="collapse-status" data-toggle="collapse" data-target="#checkboxes-status">
                                    <label class="form-check-label label-header">
                                        Stock Status
                                      </label>
                                      <i class="collapse-icon fa fa-minus"></i>
                                </div>
                                <div class="collapse show pt-3" id="checkboxes-status">
                                    <div class="form-check">
                                        <input class="form-check-input side_status" type="checkbox" value="1" id="status-1">
                                        <label class="form-check-label" for="status-1" style="font-size: 16px; font-weight: 500; padding-bottom: 10px;">In Stock</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input side_status" type="checkbox" value="0" id="status-0">
                                        <label class="form-check-label" for="status-0" style="font-size: 16px; font-weight: 500; padding-bottom: 10px;">Pre Order</label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="mt-4" for="collapse-price" data-toggle="collapse" data-target="#checkboxes-price">
                                    <label class="form-check-label label-header">
                                        Filter By Price
                                      </label>
                                      <i class="collapse-icon fa fa-minus"></i>
                                </div>
                                <div class="collapse show pt-3" id="checkboxes-price">
                                    <div class="price-input">
                                        <div class="field">
                                        <span>Min</span>
                                        <input type="number" class="input-min" value="0" readonly>
                                        </div>
                                        <div class="separator">-</div>
                                        <div class="field">
                                        <span>Max</span>
                                        <input type="number" class="input-max" value="500000" readonly>
                                        </div>
                                    </div>
                                    <div class="slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input type="range" class="range-min side_minimum" min="0" max="490000" value="0" step="500">
                                        <input type="range" class="range-max side_maximum" min="5000" max="500000" value="500000" step="500">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9 order-1 order-md-2">
                    <div class="get-product-box">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                                <!-- section title -->
                                <div class="section-title title-style-center_text style2">
                                    <div class="title-header">
                                        <h1 class="title">{{ $main_category->category_name }}</h1>
                                    </div>
                                </div><!-- section title end -->
                            </div>
                            @if (count($subcategories) > 0)
                                <div class="col-lg-12 d-flex justify-content-center pb-3">
                                    <ul id="menu-flters">
                                        @foreach ($subcategories as $subcategory)
                                            <li class="sub-link"><a
                                                    href="/subcat/product/{{ $subcategory->slug }}">{{ $subcategory->subcategory_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div><!-- row end -->
                        @include('frontend.file.product.include-product')
                        <div class="text-center">
                        {{ $products->appends(request()->except('page'))->links() }}
                        </div>
                    </div>
                    <div class="article pt-2 pb-2">
                        @if($main_category->article_title)
                        <div class="section-title title-style-center_text style2">
                            <div class="title-header">
                                <h2 class="title">{{$main_category->article_title}}</h2>
                            </div>
                        </div>
                        @endif
                        {!! $main_category->article !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('javascript')
    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
        priceInput = document.querySelectorAll(".price-input input"),
        range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>


    <script>
        function get_sidebar_filter(class_name) {

            var filter = {
                side_category: [],
                side_status: [],
                side_minimum: $(".input-min").val(),
                side_maximum: $(".input-max").val()
            };

            $(".side_category:checked").each(function() {
                filter.side_category.push($(this).val());
            });
            $(".side_status:checked").each(function() {
                filter.side_status.push($(this).val());
            });

            return filter;
        }

        // CategoryBy Filter
        $(".side_category").on("change", function() {
            var get_filter = get_sidebar_filter();

            if(get_filter.side_category.length === 0)
            {
                var main_category = $('#main_category').val();
                get_filter.side_category = [main_category];
            }
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/get-sidebar-product',
                method: 'GET',
                data: get_filter,
                success: function(data) {
                    $(".get-product-box").html(data.view);
                },
                error: function() {
                    toastr.error('Something is wrong!', 'Error');
                }
            });
        });
        // Status Filter
        $(".side_status").on("change", function() {
            var get_filter = get_sidebar_filter();

            if(get_filter.side_category.length === 0)
            {
                var main_category = $('#main_category').val();
                get_filter.side_category = [main_category];
            }
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/get-sidebar-product',
                method: 'GET',
                data: get_filter,
                success: function(data) {
                    $(".get-product-box").html(data.view);
                },
                error: function() {
                    toastr.error('Something is wrong!', 'Error');
                }
            });
        });
        //  Minimum By Filter
        $(".side_minimum").on("change", function() {
            var get_filter = get_sidebar_filter();

            if(get_filter.side_category.length === 0)
            {
                var main_category = $('#main_category').val();
                get_filter.side_category = [main_category];
            }
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/get-sidebar-product',
                method: 'GET',
                data: get_filter,
                success: function(data) {
                    $(".get-product-box").html(data.view);
                },
                error: function() {
                    toastr.error('Something is wrong!', 'Error');
                }
            });
        });
        //  Maximum By Filter
        $(".side_maximum").on("change", function() {
            var get_filter = get_sidebar_filter();

            if(get_filter.side_category.length === 0)
            {
                var main_category = $('#main_category').val();
                get_filter.side_category = [main_category];
            }
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/get-sidebar-product',
                method: 'GET',
                data: get_filter,
                success: function(data) {
                    $(".get-product-box").html(data.view);
                },
                error: function() {
                    toastr.error('Something is wrong!', 'Error');
                }
            });
        });
        
    </script>
@endsection