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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Return Policy
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Return Policy</h1>
                        </div>
                    </div>
                    <p>
                        {!! $information->return_policy !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
