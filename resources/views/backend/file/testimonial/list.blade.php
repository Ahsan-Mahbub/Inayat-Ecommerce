@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Testimonial Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                        class="fa fa-plus"></i> Add Testimonial</button>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Name &nbsp;</th>
                            <th class="text-center">Designation &nbsp;</th>
                            <th class="text-center">Image &nbsp;</th>
                            <th class="text-center">Access &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_testimonial as $testimonial)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $testimonial->testimonial_name }}</td>
                                <td class="text-center">{{ $testimonial->designation }}</td>
                                <td class="text-center"><img style="width: auto; height: 50px;"
                                        src="{{ $testimonial->image ? '/' . $testimonial->image : '/demo.svg' }}"></td>
                                <td class="text-center">
                                    @if ($testimonial->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('testimonial.status', $testimonial->id) }}"
                                                class="btn btn-sm  {{ $testimonial->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-refresh"></i>
                                            </a>

                                            <a data-bs-toggle="modal" data-bs-target="#edit_modal" id="tditTestimonial"
                                                data="{{ $testimonial->id }}"
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
                        <h3 class="block-title">Add Testimonial</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Name" required name="testimonial_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Designation <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Designation" required name="designation" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Details <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" name="details" required placeholder="Details"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='file' class="form-group" required name="image"
                                        onchange="readURL(this);" />
                                    <img id="blah" src="/demo.svg" class="pt-2" height="200" width="auto"
                                        alt="testimonial" /><br>
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

    <!-- Edit Modal -->
    <div class="modal" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Update Testimonial</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('testimonial.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="testimonial_id">
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" id="priority" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder=" Name" id="testimonial_name" required name="testimonial_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Designation <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" id="designation" placeholder=" Designation" required name="designation" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Details <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" name="details" id="details" required placeholder="Details"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='file' class="form-group" name="image"
                                        onchange="readURL2(this);" />
                                    <img id="blah2" src="" class="testimonial_image pt-2" height="200"
                                        width="auto" alt="testimonial" /><br>
                                </div>
                            </div>
                            <div class="form-group text-center mt-4 mb-4">
                                <button type="submit" class="btn btn-square btn-primary min-width-125">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Edit Modal -->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).on("click", "#tditTestimonial", function() {
            let id = $(this).attr("data");
            $.ajax({
                url: "/admin/testimonial/edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $("#testimonial_id").val(response.id);
                    $("#testimonial_name").val(response.testimonial_name);
                    $("#designation").val(response.designation);
                    $("#priority").val(response.priority);
                    $("#details").val(response.details);
                    $('.testimonial_image').attr('src', response.image ? '/' + response.image : '/demo.svg');
                }
            })
        })

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

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
