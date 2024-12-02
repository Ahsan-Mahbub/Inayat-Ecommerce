@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $space->meta_description }}">
<meta name="keywords" content="{{ $space->meta_keyword }}">
@endsection
@section('content')
    <section class="product-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / <a href="/shop-by-space">Shop By Space</a> / {{$space->space_name}}
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <!-- section title -->
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">{{ $space->space_name }}</h1>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div><!-- row end -->


            @include('frontend.file.product.include-product')

            {{ $products->appends(request()->except('page'))->links() }}
        </div>
    </section>
@endsection
