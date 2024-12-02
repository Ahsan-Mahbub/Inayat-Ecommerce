@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update Video</h3>
                <div class="block-options">
                    <a href="{{ route('video.index') }}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Video List</a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('video.update', $video->id) }}" method="post" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="col-12">Priority</label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control"
                                            value="{{ $video->priority }}" name="priority"
                                            placeholder="Priority">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Title</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control"
                                            value="{{ $video->title }}" name="title"
                                            placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Category Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="category_id" id="category_id" required
                                            onclick="getSubCategory()">
                                            <option value="">Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $video->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-12">Youtube Link <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input class="form-control" required name="video_link" placeholder="Youtube Link" value="@if($video->link) https://www.youtube.com/watch?v={{$video->link}} @endif">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-square btn-primary min-width-125">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
