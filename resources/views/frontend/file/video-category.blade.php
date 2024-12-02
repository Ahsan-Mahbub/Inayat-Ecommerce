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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Videos
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Videos</h1>
                        </div>
                    </div>
                </div>
            </div>
            @if($video)
                @if($video->link)
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div style="width: 100%; height: 100%;">
                                <iframe width="100%" height="450" src="https://www.youtube.com/embed/{{ $video->link }}?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-6 col-lg-6 col-12 pb-3">
                        <a href="/video/{{$category->slug}}">
                            <div class="category-box">
                                <div class="category-image video-image">
                                    <img src="{{ $category->image ? '/' . $category->image : '/demo.svg' }}"
                                        width="100%" alt="{{$category->category_name}}">
                                    <div class="video-content">
                                        <h4>{{ $category->category_name }} <span> – Video Gallery</span></h4>
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
