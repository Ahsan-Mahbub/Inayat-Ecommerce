@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Product Review Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                    class="fa fa-plus"></i> Add Product Review</button>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center">S/L &nbsp;</th>
                                <th class="text-center">Customer Name &nbsp;</th>
                                <th class="text-center">Product Name &nbsp;</th>
                                <th class="text-center">Comments &nbsp;</th>
                                <th class="text-center">Review &nbsp;</th>
                                <th class="text-center">Access &nbsp;</th>
                                <th class="text-center">Action &nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_review as $review)
                                <tr>
                                    <td class="text-center">{{ $sl++ }}</td>
                                    <td class="text-center">
                                        @if($review->customer_id)
                                            {{ $review->customer ? $review->customer->name : 'Not Set' }}
                                        @else
                                            {{ $review->customer_name }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $review->product ? $review->product->product_name : 'Not Set' }}</td>
                                    <td class="text-center">{{ $review->comments }}</td>
                                    <td class="text-center">{{ $review->review }} Stars</td>
                                    <td class="text-center">
                                        @if ($review->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{ route('review.destroy', $review->id) }}" method="post"
                                                accept-charset="utf-8">
                                                <a href="{{ route('review.status', $review->id) }}"
                                                    class="btn btn-sm {{ $review->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                    <i class="fa fa-refresh"></i>
                                                </a>
                                                @if(!$review->customer_id)
                                                    <a data-bs-toggle="modal" data-bs-target="#edit_modal" id="editreview"
                                                        data="{{ $review->id }}"
                                                        class="btn btn-sm btn-info mb-2 js-bs-tooltip-enabled">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endif
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
                {{ $all_review->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Product Review</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12"> Customer Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" required placeholder=" Customer Name" name="customer_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Product Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <select class="form-control" name="product_id" required>
                                        <option value="">Select One</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Review Point (Out of 5) <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" required max="5" min="1" placeholder="Review Point" name="review" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Comments <span class="text-danger">*</span></label>
                                <div class="col-12">
                                    <textarea name="comments" id="inlineFormInputName" class="form-control" placeholder="Write a comment on selected product......" rows="3" required></textarea>
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
                        <h3 class="block-title">Update Product Review</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('review.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="review_id">
                            <div class="form-group row">
                                <label class="col-12"> Customer Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" id="customer_name" required placeholder=" Customer Name" name="customer_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Product Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <select class="form-control" name="product_id" id="product_id" required>
                                        <option value="">Select One</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"> Review Point (Out of 5) <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" required id="review" max="5" min="1" placeholder="Review Point" name="review" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Comments <span class="text-danger">*</span></label>
                                <div class="col-12">
                                    <textarea name="comments" id="comments" class="form-control" placeholder="Write a comment on selected product......" rows="3" required></textarea>
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
        $(document).on("click", "#editreview", function() {
            let id = $(this).attr("data");
            $.ajax({
                url: "/admin/review/edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $("#review_id").val(response.id);
                    $("#product_id").val(response.product_id);
                    $("#customer_name").val(response.customer_name);
                    $("#review").val(response.review);
                    $("#comments").val(response.comments);
                }
            })
        })
    </script>
@endsection