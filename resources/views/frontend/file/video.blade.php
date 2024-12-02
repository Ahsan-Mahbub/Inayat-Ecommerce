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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / {{$category->category_name}} Videos
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">{{$category->category_name}} Videos</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-md-6 col-lg-6 col-12 mt-3">
                        <div style="width: 100%; height: 100%;">
                            <iframe width="100%" height="450" src="https://www.youtube.com/embed/{{ $video->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <div class="text-center">
                                <span class="video-title">{{$video->title}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
