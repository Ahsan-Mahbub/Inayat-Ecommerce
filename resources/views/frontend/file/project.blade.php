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
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Projects
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title title-style-center_text style2">
                        <div class="title-header">
                            <h1 class="title">Projects</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-6 col-lg-6 col-12 pb-3">
                        <a href="/project/{{$project->slug}}">
                            <div class="category-box">
                                <div class="category-image project-image">
                                    <img src="{{ $project->image ? '/' . $project->image : '/demo.svg' }}"
                                        width="100%">
                                    <div class="category-content project-content pl-0">
                                        <h4>{{ $project->project_name }}</h4>
                                        @if($project->size)
                                        <span class="d-block">Size : {{ $project->size }}</span>
                                        @endif
                                        @if($project->company_name)
                                        <span class="d-block">Company Name : {{ $project->company_name }}</span>
                                        @endif
                                        @if($project->location)
                                        <span>Location : {{ $project->location }}</span>
                                        @endif
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
