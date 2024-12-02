@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="details-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Shop By Space
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Shop By Space</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($spaces as $space)
                    <div class="col-md-4 col-lg-3 col-12 pb-3">
                        <a href="/shop-by-space/product/{{$space->slug}}">
                            <div class="category-box">
                                <div class="category-image space-image">
                                    <img src="{{ $space->image ? '/' . $space->image : '/demo.svg' }}"
                                        width="100%" alt="{{$space->image_alt}}">
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
    </div>
@endsection
