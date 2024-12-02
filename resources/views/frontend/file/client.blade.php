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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Client List
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Client List</h1>
                        </div>

                        <div class="row">
                            @foreach ($clients as $client)
                                <div class="col-md-3 col-lg-2 col-6 pb-3">
                                    <div class="category-box">
                                        <div class="category-image">
                                            <img src="{{ $client->image ? '/' . $client->image : '/demo.svg' }}"
                                                width="100%">
                                            <div class="category-content">
                                                <h4 class="text-center">{{ $client->client_name }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
