@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Shop by Space Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                        class="fa fa-plus"></i> Add Space</button>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Priority &nbsp;</th>
                            <th class="text-center">Space Name &nbsp;</th>
                            <th class="text-center">Image &nbsp;</th>
                            <th class="text-center">Access &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_space as $space)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $space->priority }}</td>
                                <td class="text-center">{{ $space->space_name }}</td>
                                <td class="text-center"><img style="width: auto; height: 50px;"
                                        src="{{ $space->image ? '/' . $space->image : '/demo.svg' }}"></td>
                                <td class="text-center">
                                    @if ($space->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('space.destroy', $space->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('space.status', $space->id) }}"
                                                class="btn btn-sm {{ $space->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-refresh"></i>
                                            </a>

                                            <a data-bs-toggle="modal" data-bs-target="#edit_modal" id="editspace"
                                                data="{{ $space->id }}"
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
                        <h3 class="block-title">Add Space</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('space.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Space Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" required name="space_name"
                                        placeholder="Space Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Meta Keyword</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" name="meta_keyword"
                                        placeholder="Meta Keyword">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Meta Description</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" name="meta_description"
                                        placeholder="Meta Description">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='file' class="form-group" required name="image"
                                        onchange="readURL(this);" />
                                    <img id="blah" src="/demo.svg" class="pt-2" height="200" width="auto"
                                        alt="space" /><br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Image Alt Tag</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" name="image_alt"
                                        placeholder="Image Alt Tag">
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
                        <h3 class="block-title">Update Space</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('space.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="space_id">
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" id="priority" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Space Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" required name="space_name"
                                        id="space_name" placeholder="Space Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Meta Keyword</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" name="meta_keyword" id="meta_keyword"
                                        placeholder="Meta Keyword">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Meta Description</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" name="meta_description" id="meta_description"
                                        placeholder="Meta Description">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='file' class="form-group" name="image"
                                        onchange="readURL2(this);" />
                                    <img id="blah2" src="" class="space_image pt-2" height="200"
                                        width="auto" alt="space" /><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">Image Alt Tag</label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" name="image_alt" id="image_alt"
                                        placeholder="Image Alt Tag">
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
        $(document).on("click", "#editspace", function() {
            let id = $(this).attr("data");
            $.ajax({
                url: "/admin/space/edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $("#space_id").val(response.id);
                    $("#priority").val(response.priority);
                    $("#space_name").val(response.space_name);
                    $("#meta_keyword").val(response.meta_keyword);
                    $("#meta_description").val(response.meta_description);
                    $("#image_alt").val(response.image_alt);
                    $('.space_image').attr('src', response.image ? '/' + response.image :
                        '/demo.svg');
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
