@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <?php
    $all_cart = Cart::content();
    ?>
    <div class="shopping-cart-area padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Cart
                </div>
            </div>
            <div id="appendCartItems">
                @include('frontend.file.cart-item')
            </div>
        </div>
    </div>
@endsection
