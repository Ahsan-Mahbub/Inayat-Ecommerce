@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <section class="category-box-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Category
                </div>
              </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-7 col-md-8 ml-auto mr-auto">
                    <!-- section title -->
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Category</h1>
                        </div>
                    </div><!-- section title end -->
                </div>
            </div><!-- row end -->
            <div class="row">
                @foreach ($categories as $category)
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
@endsection

