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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / <a href="/blog">Team</a> / {{$team->name}}
            </div>
            <div class="row pt-5">
                <div class="col-md-12">
                    <div class="team-box">
                        <div>
                            <div class="col-md-4 col-xl-3">
                                <img src="{{ $team->image ? '/' . $team->image : '/demo.svg' }}" alt="{{$team->name }}" width="100%" style="height: 250px;
                                object-fit: contain;">
                            </div>
                            <div class="blog-content">
                                <h4 class="mt-2">{{ $team->name }}</h4>
                                <h4 class="mt-1 mb-1">{{ $team->designation }}</h4>
                                <p>{!! $team->details !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
