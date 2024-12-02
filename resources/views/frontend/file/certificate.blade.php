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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Certificate
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Certificate</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($certificates as $certificate)
                    <div class="col-md-12 col-lg-12 col-12 pb-3">
                        <div class="certificate-box">
                            <div class="certificate-image">
                                <div class="certificate-content text-center">
                                    <h4>{{ $certificate->title }}</h4>
                                </div>
                                <img src="{{ $certificate->image ? '/' . $certificate->image : '/demo.svg' }}"
                                    width="100%" alt="{{$certificate->title}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
