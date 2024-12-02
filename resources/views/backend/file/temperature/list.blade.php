@extends('backend.layouts.app')

@section('product') open @endsection
@section('temperature') active @endsection

@section('content')
<!-- Page Content -->
<div class="content">
    <div class="row">
        <!-- Row #2 -->
        <div class="col-md-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Temperature List
                    </h3>
                    <a href="{{ route('temperature.create') }}" id="add_button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_temperature_modal"><i class="fa-solid fa-circle-plus"></i> &nbsp;Add New</a>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full temperature_table">
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
                                        <a href="{{ route('temperature.status.update') }}" module_id="{{ $item->id }}" status="active" class="updateStatus"><i class="fa-solid fa-toggle-on text-success" style="font-size: 25px;"></i></a>
                                    @else
                                        <a href="{{ route('temperature.status.update') }}" module_id="{{ $item->id }}" status="inactive" class="updateStatus"><i class="fa-solid fa-toggle-off text-danger" style="font-size: 25px;"></i></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('temperature.edit', $item->id) }}"
                                        class="btn btn-sm btn-success me-2 temperature_edit_button" title="Edit" style="float: left" data-bs-toggle="modal" data-bs-target="#edit_temperature_modal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('temperature.destroy', $item->id) }}" module_id="{{ $item->id }}" method="POST" id="temperature_form" class="confirmDelete" style="float: left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            title="Delete">
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

<div class="modal" id="add_temperature_modal" tabindex="-1" role="dialog"
    aria-labelledby="add_temperature_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Add New Temperature</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm pb-3">                    
                    <form action="{{ route('temperature.store') }}" method="post" id="add_temperature_form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name.." value="{{ old('name') }}">
                                <small class="text-danger" id="temperature-add-name"></small>
                            </div>                      
                        </div>
                        <div class="block-content block-content-full block-content-sm text-center">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-primary" id="add-temperature-button">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="edit_temperature_modal" tabindex="-1" role="dialog"
    aria-labelledby="edit_temperature_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Update Temperature</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm pb-3">                    
                    <form action="{{ route('update.temperature') }}" method="post" enctype="multipart/form-data" id="edit_temperature_form">
                        @csrf
                        <input type="hidden" name="id" id="edit-id">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="name">Name:</label>
                                <input type="text" class="form-control" id="edit-name" name="name"
                                    placeholder="Name" value="{{ old('name') }}">
                                <small class="text-danger" id="temperature-edit-name"></small>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-center">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-alt-primary" id="update-temperature-button">
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
        $(document).on('click', '.temperature_edit_button', function(e){
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
        $(document).on('submit', '#add_temperature_form', function(e){
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
                        $('#add_temperature_form')[0].reset();
                        $('#add_temperature_modal').modal('hide');
                        $('.temperature_table').load(location.href+' .temperature_table');
                        toastr.success(resp.message);
                    }
                    if (resp.status == 'error') {
                        $.each(resp.errors, function(i, error){
                            $("#temperature-add-"+i).attr('style', 'temperature:red');
                            $("#temperature-add-"+i).html(error);
                            setTimeout(function(){
                                $('#temperature-add-'+i).css({'display': 'none'});
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
        $(document).on('submit', '#edit_temperature_form', function(e){
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
                        $('#edit_temperature_form')[0].reset();
                        $('#edit_temperature_modal').modal('hide');
                        $('.temperature_table').load(location.href+' .temperature_table');
                        toastr.success(resp.message);
                    }
                    if (resp.status == 'error') {
                        $.each(resp.errors, function(i, error){
                            $("#temperature-edit-"+i).attr('style', 'temperature:red');
                            $("#temperature-edit-"+i).html(error);
                            setTimeout(function(){
                                $('#temperature-edit-'+i).css({'display': 'none'});
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