@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-sliders">
            <div class="hero-slide-inner owl-carousel">
                @foreach ($sliders as $slider)
                    <img class="hero-slide-item bg-img" src="/{{ $slider->image }}" width="100%" height="100%">
                @endforeach
            </div>
        </div>
    </div>

    <section class="promo-section info-box">
        <div class="container">
            <div class="row">
                <div class="col-md-3 pb-3 text-center">
                   <span> <strong class="text-dark">{{$information->promo1}} </strong></span>
                </div>
                <div class="col-md-3 pb-3 text-center">
                   <span> <strong class="text-dark">{{$information->promo2}} </strong></span>
                </div>
                <div class="col-md-3 pb-3 text-center">
                   <span> <strong class="text-dark">{{$information->promo3}} </strong></span>
                </div>
                <div class="col-md-3 pb-3 text-center">
                   <span> <strong class="text-dark">{{$information->promo4}} </strong></span>
                </div>
                {{-- <div class="col-md-3 col-6 pb-3 text-center">
                    <span> <strong class="text-dark">{{$information->promo5}} </strong></span>
                </div> --}}
            </div>
        </div>
    </section>
    @if (count($short_categories) > 0)
        <section class="category-box-section clearfix pt-5">
            <div class="container">
                <!-- section title -->
                <div class="section-title title-style-center_text style2">
                    <div class="title-header">
                        <h1 class="title">Top Categories </h1>
                    </div>
                </div><!-- section title end -->
                <div class="row">
                    @foreach ($short_categories as $category)
                        <div class="col-md-3 col-lg-2 col-6 pb-3">
                            <a href="/cat/product/{{ $category->slug }}">
                                <div class="category-box">
                                    <div class="category-image">
                                        <img src="{{ $category->image ? '/' . $category->image : '/demo.svg' }}"
                                            width="100%" alt="{{$category->image_alt}}">
                                        <div class="category-content">
                                            <h4 class="text-center">{{ $category->category_name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if (count($short_space) > 0)
    <section class="category-box-section clearfix pt-5">
        <div class="container">
            <!-- section title -->
            <div class="section-title title-style-center_text style2">
                <div class="title-header">
                    <h1 class="title">Shop by Space </h1>
                </div>
            </div><!-- section title end -->
            <div class="row">
                @foreach ($short_space->take(1) as $space)
                    <div class="col-md-6 col-lg-6 col-12 pb-3">
                        <a href="/shop-by-space/product/{{$space->slug}}">
                            <div class="category-box">
                                <div class="category-image space-image">
                                    <img class="space-first-image" src="{{ $space->image ? '/' . $space->image : '/demo.svg' }}"
                                        width="100%" alt="{{$space->alt}}">
                                    <div class="category-content">
                                        <h4 class="text-center">{{ $space->space_name }}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-6 col-lg-6 col-12">
                    <div class="row">
                        @foreach ($short_space->slice(1, 4) as $space)
                            <div class="col-md-6 col-lg-6 col-12 pb-3">
                                <a href="/shop-by-space/product/{{$space->slug}}"">
                                    <div class="category-box">
                                        <div class="category-image space-image">
                                            <img src="{{ $space->image ? '/' . $space->image : '/demo.svg' }}"
                                                width="100%">
                                            <div class="category-content">
                                                <h4 class="text-center">{{ $space->space_name }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 text-center mb-4">
                    <a class="text-white main-btn" href="/shop-by-space">
                        View More
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="banner-section clearfix pt-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- banner-image -->
                    @if ($banner->status5 == 1 && $banner->image5)
                        <div class="banner-image">
                            <figure class="ttm-figure">
                                <a href="{{ $banner->link5 }}"><img class="img-fluid" src="/{{ $banner->image5 }}"
                                        width="100%" alt="banner" width="100%"></a>
                            </figure>
                        </div>
                    @endif
                    <!-- banner-image end -->
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
                                <h1 class="title">Our featured items </h1>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div><!-- row end -->
                <div class="feature-slide-inner owl-carousel">
                    @foreach ($products as $product)
                        <!-- product -->
                        <div class="product" style="width: 100%">
                            <a href="/product/{{ $product->slug }}">
                                <div class="product-box">
                                    <!-- product-box-inner -->
                                    <div class="product-box-inner">
                                        <div class="product-image-box">
                                            {{-- @if ($product->stock <= 0)
                                                <div class="onsale">Stock Out</div>
                                            @endif --}}
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
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- @foreach ($home_categories as $category)
        <section class="product-section pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                        <div class="section-title title-style-center_text style2">
                            <div class="title-header">
                                <h1 class="title">{{ $category->category_name }} items </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($category['product'] as $product)
                        <div class="product col-xl-3 col-md-6 col-12 col-xs-12">
                            <a href="/product/{{ $product->slug }}">
                                <div class="product-box">
                                    <div class="product-box-inner">
                                        <div class="product-image-box">
                                            <img class="img-fluid pro-image-front" src="/{{ $product->image }}" alt="{{$product->image_alt ? $product->image_alt : $product->product_name}}">
                                            <img class="img-fluid pro-image-back" src="/{{ !empty($product->image2) && file_exists($product->image2) ? $product->image2 : $product->image }}"
                                            alt="{{$product->image_alt2 ? $product->image_alt2 : $product->product_name}}">
                                        </div>
                                    </div>
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
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach --}}

    <section class="banner-section clearfix pt-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- banner-image -->
                    @if ($banner->status6 == 1 && $banner->image6)
                        <div class="banner-image pt-2">
                            <figure class="ttm-figure">
                                <a href="{{ $banner->link6 }}"><img class="img-fluid" src="/{{ $banner->image6 }}"
                                        alt="banner" width="100%"></a>
                            </figure>
                        </div>
                    @endif
                    <!-- banner-image end -->
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section pt-3">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <!-- section title -->
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Love From Clients </h1>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div><!-- row end -->
            <div class="testimonial-slide-inner owl-carousel">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-box">
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p class="testimonial">
                        {{$testimonial->details}}
                    </p>
                    <div class="user">
                        <img src="/{{$testimonial->image}}" alt="user" class="user-image" />
                        <div class="user-details">
                          <h4 class="username">{{$testimonial->testimonial_name}}</h4>
                          <p class="role">{{$testimonial->designation}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection

