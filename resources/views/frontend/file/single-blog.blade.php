@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $blog->meta_description }}">
<meta name="keywords" content="{{ $blog->meta_keyword }}">
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="details-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / <a href="/blog">Blog</a> / {{$blog->blog_name}}
            </div>
            <div class="row pt-5">
                <div class="col-md-12">
                    <div class="category-box">
                        <div class="text-center">
                            <img src="{{ $blog->image ? '/' . $blog->image : '/demo.svg' }}"
                            alt="{{$blog->image_alt ? $blog->image_alt : $blog->blog_name}}" width="100%" style="height: 250px;
                                object-fit: contain;">
                            <div class="blog-content">
                                <h1 class="mt-5">{{ $blog->blog_name }}</h1>
                                <p>{!! $blog->details !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
