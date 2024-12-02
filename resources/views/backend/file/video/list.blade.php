@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Video Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                        class="fa fa-plus"></i> Add Video</button>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Priority &nbsp;</th>
                            <th class="text-center">Category &nbsp;</th>
                            <th class="text-center">Title &nbsp;</th>
                            <th class="text-center">Link &nbsp;</th>
                            <th class="text-center">Access &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_video as $video)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $video->priority }}</td>
                                <td class="text-center">{{ $video->title }}</td>
                                <td class="text-center">
                                    {{ $video->category ? $video->category->category_name : 'N/A' }}</td>
                                <td class="text-center"><a href="https://www.youtube.com/watch?v={{ $video->link }}">https://www.youtube.com/watch?v={{ $video->link }}</a></td>
                                <td class="text-center">
                                    @if ($video->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('video.destroy', $video->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('video.status', $video->id) }}"
                                                class="btn btn-sm {{ $video->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-refresh"></i>
                                            </a>

                                            <a href="{{route('video.edit', $video->id)}}"
                                                class="btn btn-sm btn-info mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger mb-2 js-bs-tooltip-enabled delete-confirm">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Video</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Title</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Title" name="title" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Category Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select One</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Video Link <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" required name="video_link"
                                        placeholder="Video Link">
                                </div>
                            </div>
                            <div class="form-group text-center mt-4 mb-4">
                                <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Add Modal -->
@endsection
