@extends('backend.layouts.app')
@section('employee') active @endsection
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Employee Table
	        </h3>
	        <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fa fa-plus"></i> Add Employee</button>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Name &nbsp;</th>
	                <th class="text-center">Phone &nbsp;</th>
	                <th class="text-center">Email &nbsp;</th>
	                <th class="text-center">Password &nbsp;</th>
	                <th class="text-center">Address &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_data as $employee)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>						
			            <td class="text-center">{{$employee->name}}</td>
			            <td class="text-center">{{$employee->phone}}</td>
			            <td class="text-center">{{$employee->email}}</td>
			            <td class="text-center">{{$employee->password}}</td>
			            <td class="text-center">{{$employee->address}}</td>
			            <td class="text-center">
			            	<div class="btn-group">
				            	<form action="{{route('employee.destroy',$employee->id)}}" method="post" accept-charset="utf-8">
			                		<a data-bs-toggle="modal" data-bs-target="#edit_modal" id="editemployee" data="{{$employee->id}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-edit"></i>
		                            </a>
	                                @csrf
	                                @method('delete')
	    	                    	<button type="submit" class="btn btn-sm btn-secondary js-bs-tooltip-enabled delete-confirm">
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
		            <h3 class="block-title">Add Employee</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
	                	@csrf
	                	<div class="row">					
													
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-12"> Name <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' class="form-control" name="name" placeholder=" Name">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-12"> Phone <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' class="form-control" name="phone" placeholder=" Phone">
									</div>
								</div>								
							</div>
							<div class="col-md-6 ">
								<div class="form-group row">
									<label class="col-12"> Email <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='email' class="form-control" name="email" placeholder=" email">
									</div>
								</div>
								@error('email')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
							</div>	
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-12"> Password <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' class="form-control" name="password" placeholder="Password">
									</div>
								</div>
							</div>													
							<div class="col-md-12">
								<div class="form-group row">
									<label class="col-12"> Address <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
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
    <div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
	        <div class="block block-rounded shadow-none mb-0">
	          	<div class="block-header block-header-default">
		            <h3 class="block-title">Update Employee</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{ route('update.employee') }}" method="post">
	                	@csrf
	                	<input type="hidden" name="id" id="employee_id">
	                	<input type="hidden" name="user_id" id="user_id">
	                	<div class="row">
									
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-12">Name <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' id="employee_name" class="form-control" required name="name" placeholder="Employee Name">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-12">Phone <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' id="employee_phone" class="form-control" name="phone" placeholder="Employee phone">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-12">Email <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='email' id="employee_email" class="form-control" name="email" placeholder="Employee email">
									</div>
								</div>
								@error('email')
                                    <small class="text-danger text-bold">{{ $message }}</small>
                                @enderror
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-12"> Password <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<input type='text' id="employee_password" class="form-control" name="password" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group row">
									<label class="col-12"> Address <span class="text-danger">*</span></label>
									<div class="col-lg-12">
										<textarea name="address" id="employee_address" class="form-control" rows="3" placeholder="Address"></textarea>
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
<script type="text/javascript">
	$(document).on("click", "#editemployee", function () {
        let id = $(this).attr("data");
        $.ajax({
            url: "/admin/employee/"+id+"/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
				// console.log(response);
                $("#employee_id").val(response.employees.id);
                $("#user_id").val(response.employees.user_id);
                $("#employee_name").val(response.employees.name);
                $("#employee_phone").val(response.employees.phone);
                $("#employee_email").val(response.employees.email);
                $("#employee_password").val(response.employees.password);
                $("#employee_address").val(response.employees.address);
            }
        })
    }) 
</script>
@endsection