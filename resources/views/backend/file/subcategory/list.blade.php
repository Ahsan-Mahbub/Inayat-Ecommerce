@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Sub Category Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                        class="fa fa-plus"></i> Add Sub Category</button>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Category &nbsp;</th>
                            <th class="text-center">Sub Category Name &nbsp;</th>
                            <th class="text-center">Access &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_subcategory as $subcategory)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">
                                    {{ $subcategory->category ? $subcategory->category->category_name : 'N/A' }}</td>
                                <td class="text-center">{{ $subcategory->subcategory_name }}</td>
                                <td class="text-center">
                                    @if ($subcategory->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('subcategory.status', $subcategory->id) }}"
                                                class="btn btn-sm {{ $subcategory->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-refresh"></i>
                                            </a>

                                            <a data-bs-toggle="modal" data-bs-target="#edit_modal" id="editsubcategory"
                                                data="{{ $subcategory->id }}"
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
                        <h3 class="block-title">Add Sub Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
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
                                <label class="col-12">Sub Category Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" required name="subcategory_name"
                                        placeholder="Sub Category Name">
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
                        <h3 class="block-title">Update Sub Category</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('subcategory.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="subcategory_id">
                            <div class="form-group row">
                                <label class="col-12">Category Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <option value="">Select One</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Sub Category Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" required name="subcategory_name"
                                        id="subcategory_name" placeholder="Sub Category Name">
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
        $(document).on("click", "#editsubcategory", function() {
            let id = $(this).attr("data");
            $.ajax({
                url: "/admin/subcategory/edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $("#subcategory_id").val(response.id);
                    $("#category_id").val(response.category_id);
                    $("#subcategory_name").val(response.subcategory_name);
                }
            })
        })
    </script>
@endsection
