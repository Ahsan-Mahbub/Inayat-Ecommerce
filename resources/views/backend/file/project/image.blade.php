@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{$project->project_name}} Project Image Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                        class="fa fa-plus"></i> Add Image</button>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Image &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($images as $image)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center"><img style="width: auto; height: 50px;"
                                        src="{{ $image->image ? '/' . $image->image : '/demo.svg' }}"></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('project.image.destroy', $image->id) }}" method="post"
                                            accept-charset="utf-8">
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
                        <h3 class="block-title">Add Project Image</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('project.image.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project->id }}" />
                            <div id="image-input-container">
                                <div class="form-group row image-input">
                                    <label class="col-12">Image (1050*550) <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="file" class="form-group" required name="images[]" onchange="previewImage(this);" />
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-sm btn-success add-image"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger remove-image d-none"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="col-lg-12 pt-2">
                                        <img class="preview-img" src="/demo.svg" height="200" width="auto" alt="preview" />
                                    </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('image-input-container');

        // Add new image input field
        container.addEventListener('click', function (e) {
            if (e.target.closest('.add-image')) {
                addImageField();
            } else if (e.target.closest('.remove-image')) {
                removeImageField(e.target.closest('.image-input'));
            }
        });

        function addImageField() {
            const newField = document.querySelector('.image-input').cloneNode(true);
            newField.querySelector('input[type="file"]').value = '';
            newField.querySelector('.preview-img').src = '/demo.svg';
            newField.querySelector('.remove-image').classList.remove('d-none');
            container.appendChild(newField);
        }

        function removeImageField(field) {
            if (container.children.length > 1) {
                field.remove();
            }
        }

        // Preview the selected image
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    input.closest('.image-input').querySelector('.preview-img').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Make the previewImage function available globally
        window.previewImage = previewImage;
    });
</script>
@endsection
