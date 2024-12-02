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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Blog
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Blog</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-lg-6 col-12 pb-3">
                        <a href="/blog/{{$blog->slug}}"">
                            <div class="category-box">
                                <div class="category-image blog-image">
                                    <img src="{{ $blog->image ? '/' . $blog->image : '/demo.svg' }}"
                                        width="100%" alt="{{$blog->image_alt ? $blog->image_alt : $blog->blog_name}}">
                                    <div class="blog-content">
                                        <h4>{{ $blog->blog_name }}</h4>
                                        <p class="mt-2">{{$blog->short_details}}</p>
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
