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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Projects / {{$project->project_name}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title style2">
                        <div class="title-header">
                            <h1 class="title">{{$project->project_name}}</h1>
                            @if($project->size)
                            <span class="d-block">Size : {{ $project->size }}</span>
                            @endif
                            @if($project->company_name)
                            <span class="d-block">Company Name : <a style="text-decoration: underline;" href="{{$project->website}}">{{ $project->company_name }}</a></span>
                            @endif
                            @if($project->location)
                            <span>Location : {{ $project->location }}</span>
                            @endif
                        </div>
                        <div style="text-align: justify">
                            {!! $project->details !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-12 pb-3">
                    <div class="category-box">
                        <div class="category-image space-image">
                            <img src="{{ $project->image ? '/' . $project->image : '/demo.svg' }}"
                                width="100%">
                        </div>
                    </div>
                </div>
                @if(count($images) > 0)
                    @foreach($images as $image)
                    <div class="col-md-6 col-lg-6 col-12 pb-3">
                        <div class="category-box">
                            <div class="category-image space-image">
                                <img src="{{ $image->image ? '/' . $image->image : '/demo.svg' }}"
                                    width="100%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
