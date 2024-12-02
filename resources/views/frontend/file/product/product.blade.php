@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <section class="product-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / All Products
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-7 col-md-8 ml-auto mr-auto">
                    <!-- section title -->
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">All Products</h1>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div><!-- row end -->
            @include('frontend.file.product.include-product')

            {{ $products->links() }}
        </div>
    </section>
@endsection
