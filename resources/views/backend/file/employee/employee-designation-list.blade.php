@extends('backend.layouts.app')
@section('employee-designation') active @endsection
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Employee Designation Table
	        </h3>
	        <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fa fa-plus"></i> Add Employee Designation</button>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive employee_designation_table">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Employee Designation Name &nbsp;</th>
	                <th class="text-center">Status  &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_data as $item)
					<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$item->name}}</td>
			            <td class="d-none d-sm-table-cell">
                            @if ($item->status == 1)
                                <a href="{{ route('employee-designation.status.update') }}" module_id="{{ $item->id }}" status="active" class="updateStatus"><i class="fa-solid fa-toggle-on text-success" style="font-size: 25px;"></i></a>
                            @else
                                <a href="{{ route('employee-designation.status.update') }}" module_id="{{ $item->id }}" status="inactive" class="updateStatus"><i class="fa-solid fa-toggle-off text-danger" style="font-size: 25px;"></i></a>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('employee-designation.edit', $item->id) }}"
                                class="btn btn-sm btn-success me-2 employee_designation_edit_button" title="Edit Employee Designation" style="float: left" data-bs-toggle="modal" data-bs-target="#edit_modal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('employee-designation.destroy', $item->id) }}" module_id="{{ $item->id }}" method="POST" id="employee_designation_form" class="confirmDelete" style="float: left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    title="Delete Employee Designation">
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

<!-- Add Modal -->
<div class="modal" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
      	<div class="modal-content">
	        <div class="block block-rounded shadow-none mb-0">
	          	<div class="block-header block-header-default">
		            <h3 class="block-title">Add Employee Designation</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{route('employee-designation.store')}}" method="post" id="add_employee_designation_form" enctype="multipart/form-data">
	                	@csrf
	                	<div class="row">
							<div class="col-md-12 mb-3">
								<div class="form-group row">
									<label class="col-12" for="name"> Employee Designation Name: <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' class="form-control" name="name" id="name" placeholder="Employee Designation Name.." required>
									</div>
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

<!-- Edit Modal -->
<div class="modal" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog" role="document">
      	<div class="modal-content">
	        <div class="block block-rounded shadow-none mb-0">
	          	<div class="block-header block-header-default">
		            <h3 class="block-title">Edit Employee Designation</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{ route('update.employee-designation') }}" id="edit_employee_designation_form" method="post">
	                	@csrf
	                	<input type="hidden" name="id" id="edit-id">
	                	<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									<label class="col-12" for="edit-name">Employee Designation Name: <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' id="edit-name" class="form-control" required name="name" placeholder="Employee Designation Name.." required>
									</div>
								</div>
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
    <script>
        $(document).on('click', '.employee_designation_edit_button', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            $.ajax({
                url: href,
                type: "GET",
                success:function(resp){
                    // console.log(resp);
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
        $(document).on('submit', '#add_employee_designation_form', function(e){
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
                        $('#add_employee_designation_form')[0].reset();
                        $('#add_modal').modal('hide');
                        $('.employee_designation_table').load(location.href+' .employee_designation_table');
                        toastr.success(resp.message);
                    }
                    if (resp.status == 'error') {
                        $.each(resp.errors, function(i, error){
                            $("#employee_designation-add-"+i).attr('style', 'color:red');
                            $("#employee_designation-add-"+i).html(error);
                            setTimeout(function(){
                                $('#employee_designation-add-'+i).css({'display': 'none'});
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
        $(document).on('submit', '#edit_employee_designation_form', function(e){
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
                    // console.log(resp);
                    if (resp.status == 'success') {
                        $('#edit_employee_designation_form')[0].reset();
                        $('#edit_modal').modal('hide');
                        $('.employee_designation_table').load(location.href+' .employee_designation_table');
                        toastr.success(resp.message);
                    }
                    if (resp.status == 'error') {
                        $.each(resp.errors, function(i, error){
                            $("#employee_designation-edit-"+i).attr('style', 'color:red');
                            $("#employee_designation-edit-"+i).html(error);
                            setTimeout(function(){
                                $('#employee_designation-edit-'+i).css({'display': 'none'});
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