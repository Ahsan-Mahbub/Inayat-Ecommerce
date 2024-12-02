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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Our Team
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Our Team</h1>
                        </div>

                        <div class="row">
                            @foreach ($teams as $team)
                                <div class="col-md-4 col-lg-3 col-12 pb-3">
                                    <a href="/team/{{$team->slug}}">
                                        <div class="category-box">
                                            <div class="category-image team-image">
                                                <img src="{{ $team->image ? '/' . $team->image : '/demo.svg' }}"
                                                    width="100%">
                                                <div class="team-content">
                                                    <h4 class="text-center">{{ $team->name }}</h4>
                                                    <span>{{ $team->designation }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
