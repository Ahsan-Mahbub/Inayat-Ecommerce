@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Client Table
                </h3>
                <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i
                        class="fa fa-plus"></i> Add Client</button>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Priority &nbsp;</th>
                            <th class="text-center">Client Name &nbsp;</th>
                            <th class="text-center">Image &nbsp;</th>
                            <th class="text-center">Access &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_client as $client)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $client->priority }}</td>
                                <td class="text-center">{{ $client->client_name }}</td>
                                <td class="text-center"><img style="width: auto; height: 50px;"
                                        src="{{ $client->image ? '/' . $client->image : '/demo.svg' }}"></td>
                                <td class="text-center">
                                    @if ($client->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('client.destroy', $client->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('client.status', $client->id) }}"
                                                class="btn btn-sm  {{ $client->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-refresh"></i>
                                            </a>

                                            <a data-bs-toggle="modal" data-bs-target="#edit_modal" id="editclient"
                                                data="{{ $client->id }}"
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
                        <h3 class="block-title">Add Client</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Client Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder="Client Name" required name="client_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Client Image <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='file' class="form-group" required name="image"
                                        onchange="readURL(this);" />
                                    <img id="blah" src="/demo.svg" class="pt-2" height="200" width="auto"
                                        alt="client" /><br>
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
                        <h3 class="block-title">Update Client</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('client.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="client_id">
                            <div class="form-group row">
                                <label class="col-12"> Priority</label>
                                <div class="col-lg-12">
                                    <input type='number' class="form-control" id="priority" placeholder=" Priority" name="priority" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Client Name <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='text' class="form-control" placeholder="Client Name" id="client_name" required name="client_name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">Client Image <span class="text-danger">*</span></label>
                                <div class="col-lg-12">
                                    <input type='file' class="form-group" name="image"
                                        onchange="readURL2(this);" />
                                    <img id="blah2" src="" class="client_image pt-2" height="200"
                                        width="auto" alt="client" /><br>
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
        $(document).on("click", "#editclient", function() {
            let id = $(this).attr("data");
            $.ajax({
                url: "/admin/client/edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $("#client_id").val(response.id);
                    $("#priority").val(response.priority);
                    $("#client_name").val(response.client_name);
                    $('.client_image').attr('src', response.image ? '/' + response.image : '/demo.svg');
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
