@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Project Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                        class="fa fa-plus"></i> Add Project</button>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Priority &nbsp;</th>
                            <th class="text-center">Name &nbsp;</th>
                            <th class="text-center">Company Name &nbsp;</th>
                            <th class="text-center">Location &nbsp;</th>
                            <th class="text-center">Image &nbsp;</th>
                            <th class="text-center">Access &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_project as $project)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $project->priority }}</td>
                                <td class="text-center">{{ $project->project_name }}</td>
                                <td class="text-center">{{ $project->company_name }}</td>
                                <td class="text-center">{{ $project->location }}</td>
                                <td class="text-center"><img style="width: auto; height: 50px;"
                                        src="{{ $project->image ? '/' . $project->image : '/demo.svg' }}"></td>
                                <td class="text-center">
                                    @if ($project->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('project.destroy', $project->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('project.status', $project->id) }}"
                                                class="btn btn-sm  {{ $project->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <a href="{{ route('project.image', $project->id) }}"
                                                class="btn btn-sm btn-info mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-camera"></i>
                                            </a>

                                            <a href="{{ route('project.edit', $project->id) }}"
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
                        <h3 class="block-title">Add Project</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Project Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder="Project Name" required name="project_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Size</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Size" name="size" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Company Name</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Company Name" name="company_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Location </label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Location" name="location" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Website Link </label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Website Link" name="website" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Details </label>
                                <div class="col-lg-12">
                                    <textarea class="form-control form-control-lg editor" name="details"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='file' class="form-group" required name="image"
                                        onchange="readURL(this);" />
                                    <img id="blah" src="/demo.svg" class="pt-2" height="200" width="auto"
                                        alt="project" /><br>
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
