@extends('backend.layouts.app')

@section('rbac') open @endsection
@section('role') active @endsection

@section('content')
<!-- Page Content -->
<div class="content">
    <div class="row">
        <!-- Row #2 -->
        <div class="col-md-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Role List
                    </h3>
                    <a href="{{ route('role.create') }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_role_modal">Add New</a>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full role_table">
                        <thead>
                            <tr>
                                <th width="25" class="text-center">SL</th>
                                <th class="d-none d-sm-table-cell">Name</th>
                                <th class="d-none d-sm-table-cell">Status</th>
                                <th class="text-center" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>                               
                                <td class="d-none d-sm-table-cell">{{ $item->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    @if ($item->status == 1)
                                        <a href="{{ route('role.status.update') }}" module_id="{{ $item->id }}" status="active" class="updateStatus"><i class="fa-solid fa-toggle-on text-success" style="font-size: 25px;"></i></a>
                                    @else
                                        <a href="{{ route('role.status.update') }}" module_id="{{ $item->id }}" status="inactive" class="updateStatus"><i class="fa-solid fa-toggle-off text-danger" style="font-size: 25px;"></i></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('role.edit', $item->id) }}"
                                        class="btn btn-sm btn-success me-2 role_edit_button" title="Edit Role" style="float: left" data-bs-toggle="modal" data-bs-target="#edit_role_modal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('role.destroy', $item->id) }}" module_id="{{ $item->id }}" method="POST" id="role_form" class="confirmDelete" style="float: left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            title="Delete role">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>           
        </div>
        <!-- END Row #2 -->
    </div>
</div>
<!-- END Page Content -->

<div class="modal" id="add_role_modal" tabindex="-1" role="dialog"
    aria-labelledby="add_role_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add New Role</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">                    
                    <form action="{{ route('role.store') }}" method="post" enctype="multipart/form-data" id="add_role_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Role Name" value="{{ old('name') }}">
                                <small class="text-danger" id="role-add-name"></small>
                            </div>                               
                        </div>
                        <div class="block-content block-content-full block-content-sm text-center border-top">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-primary" id="add-role-button">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="edit_role_modal" tabindex="-1" role="dialog"
    aria-labelledby="edit_role_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Update Role informtion</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm">                    
                    <form action="{{ route('update.role') }}" method="post" enctype="multipart/form-data" id="edit_role_form">
                        @csrf
                        <input type="hidden" name="id" id="edit-id">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label" for="name">Name:</label>
                                <input type="text" class="form-control" id="edit-name" name="name"
                                    placeholder="Role Name" value="{{ old('name') }}">
                                <small class="text-danger" id="role-edit-name"></small>
                            </div>                               
                        </div>
                        <div class="block-content block-content-full block-content-sm text-center border-top">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-primary" id="update-role-button">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).on('click', '.role_edit_button', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            $.ajax({
                url: href,
                type: "GET",
                success:function(resp){
                    console.log(resp);
                    if (resp.status == 200) {
                        $("#edit-id").val(resp.data.id);                       
                        $("#edit-name").val(resp.data.name);                       
                    }
                },
                error: function(err){
                    toastr.error('Something is wrong!');
                    console.log(err);
                }
            });
        });
        $(document).on('submit', '#add_role_form', function(e){
            e.preventDefault();
            const fd = new FormData(this);
            const href = $(this).attr('action');
            $.ajax({
                url: href,
                method: "POST",
                data: fd,
                catch: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(resp){
                    if (resp.status == 'success') {
                        $('#add_role_form')[0].reset();
                        $('#add_role_modal').modal('hide');
                        $('.role_table').load(location.href+' .role_table');
                        toastr.success(resp.message);
                    }
                    if (resp.status == 'error') {
                        $.each(resp.errors, function(i, error){
                            $("#role-add-"+i).attr('style', 'color:red');
                            $("#role-add-"+i).html(error);
                            setTimeout(function(){
                                $('#role-add-'+i).css({'display': 'none'});
                            },[3000]);
                        });
                    }
                },
                error: function(err){
                    console.log(err);
                    toastr.error('Something went wrong!');
                }
            });
        });
        $(document).on('submit', '#edit_role_form', function(e){
            e.preventDefault();
            const fd = new FormData(this);
            const href = $(this).attr('action');
            $.ajax({
                url: href,
                method: "POST",
                data: fd,
                catch: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(resp){
                    console.log(resp);
                    if (resp.status == 'success') {
                        $('#edit_role_form')[0].reset();
                        $('#edit_role_modal').modal('hide');
                        $('.role_table').load(location.href+' .role_table');
                        toastr.success(resp.message);
                    }
                    if (resp.status == 'error') {
                        $.each(resp.errors, function(i, error){
                            $("#role-edit-"+i).attr('style', 'color:red');
                            $("#role-edit-"+i).html(error);
                            setTimeout(function(){
                                $('#role-edit-'+i).css({'display': 'none'});
                            },[3000]);
                        });
                    }
                },
                error: function(err){
                    console.log(err);
                    toastr.error('Something went wrong!');
                }
            });
        });
    </script>
@endsection