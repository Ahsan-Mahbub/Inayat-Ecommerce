@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update Project</h3>
                <div class="block-options">
                    <a href="{{ route('project.index') }}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Project List</a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('project.update', $project->id) }}" method="post" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="col-12">Priority</label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control" value="{{$project->priority}}" name="priority"
                                            placeholder="Priority">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Project Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required
                                            value="{{ $project->project_name }}" name="project_name"
                                            placeholder="Project Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Size</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control"
                                            value="{{ $project->size }}" name="size"
                                            placeholder="Size">
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label class="col-12">Company Name</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control"
                                            value="{{ $project->company_name }}" name="company_name"
                                            placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Location</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control"
                                            value="{{ $project->location }}" name="location"
                                            placeholder="Location">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Website Link</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control"
                                            value="{{ $project->website }}" name="website"
                                            placeholder="Website Link">
                                    </div>
                                </div>



                                <div class="form-group col-md-12">
                                    <label class="col-12">Details <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control form-control-lg editor" id="mega-bio" name="details">{{ $project->details }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Image <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image"
                                            onchange="readURL(this);" />
                                        <img id="blah"
                                            src="{{ $project->image ? '/' . $project->image : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="project" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left mt-4 mb-4">
                        <button type="submit" class="btn btn-square btn-primary min-width-125">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
