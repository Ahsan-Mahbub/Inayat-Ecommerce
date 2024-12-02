@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Update Customer</h3>
		  <div class="block-options">
		    <a href="{{route('customer.index')}}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Customer List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('customer.update', $customer->id)}}" method="post" enctype="multipart/form-data">
            	@csrf
            	<div class="row">
            		<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-4">
								<label class="col-12">Customer Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type='text' class="form-control" value="{{$customer->name}}" required name="name" placeholder="Customer Name..">
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
								</div>
							</div>

							<div class="form-group col-md-4">
								<label class="col-12">Email <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type='email' class="form-control" value="{{$customer->email}}" required name="email" placeholder="Email">
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
								</div>
							</div>

							<div class="form-group col-md-4">
								<label class="col-12">Phone <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type='tel' class="form-control" name="phone"  value="{{$customer->phone}}" required placeholder="Phone Number">
                                    @error('phone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
								</div>
							</div>

							<div class="form-group col-md-12">
								<label class="col-12">Address </label>
								<div class="col-lg-12">
		            				<textarea class="form-control form-control-lg" name="address" placeholder="Address">{{$customer->address}}</textarea>
								</div>
							</div>
                            <div class="form-group col-md-12">
								<label class="col-12">Password (if changes or updated password)</label>
								<div class="col-lg-12">
									<input type='password' class="form-control" name="password" placeholder="Password">
								</div>
							</div>
						</div>
						
					</div>
            	</div>
                <div class="form-group text-left mt-4 mb-4">
                    <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection