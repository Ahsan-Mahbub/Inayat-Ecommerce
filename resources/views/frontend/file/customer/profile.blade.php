@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
<!-- Begin Chekout Area-->
<section class="my-profile-area padding-100-20 bg-F7F8FA">
	<div class="container">
		<div class="row">
        	@include('frontend.file.customer.sidebar')
		    <div class="col-12 col-md-9 pt-4">
				<div class="seller-dashboard-main-content-area">
					<div class="content-wrapper">
						<div class="row">
							<div class="col-md-12">
								<h1 class="page-header"><i class="fa fa-user mr-3"></i>Profile</h1>
							</div>
							<form role="form" action="{{url('/customer/profile-update')}}" method="post" enctype="multipart/form-data">
                   	 			@csrf
								<div class="col-md-12 m-auto">
									<div class="profile">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="labels">Name *</label>
													<input type="text" name="name" required class="form-control" placeholder="Enter Name" value="{{Auth::guard('customers')->user()->name}}">
													@error('name')
										              <span class="text-danger" role="alert">
										                  <strong>{{ $message }}</strong>
										              </span>
										            @enderror
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="labels">Email *</label>
													<input type="email" name="email" required class="form-control" placeholder="Enter Valid Email Address" value="{{Auth::guard('customers')->user()->email}}">
													@error('email')
										              <span class="text-danger" role="alert">
										                  <strong>{{ $message }}</strong>
										              </span>
										            @enderror
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="labels">Phone Number *</label>
													<input type="text" name="phone" required class="form-control" placeholder="Enter Valid Phone Number" value="{{Auth::guard('customers')->user()->phone}}">
													@error('phone')
										              <span class="text-danger" role="alert">
										                  <strong>{{ $message }}</strong>
										              </span>
										            @enderror
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="labels">Address </label>
													<textarea class="form-control" placeholder="Enter Address" name="address" rows="5">{{Auth::guard('customers')->user()->address}}</textarea>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="labels">Password </label>
													<input type="password" name="password" class="form-control" placeholder="Enter password if you change">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="labels">Profie Image</label>
													<input type='file' value="{{Auth::guard('customers')->user()->image}}" name="image" onchange="readURL(this);" />
			                        				<img class="p-4" id="image" src="{{Auth::guard('customers')->user()->image ? '/' . Auth::guard('customers')->user()->image :  '/demo.svg'}}" height="200" width="200" alt="your image" /><br>
			                        				@error('image')
										              <span class="text-danger" role="alert">
										                  <strong>{{ $message }}</strong>
										              </span>
										            @enderror
												</div>
											</div>
										</div>
										<div class="text-center">
											<button class="main-btn text-white" type="submit">Save Profile</button>
										</div>
									</div>
								</div>
							</from>
						</div>
					</div>
				</div>
		    	
		    </div>
		</div>
	</div>
</section>
<!-- End Chekout Product Area-->
@endsection
@section('javascript')
<script type="text/javascript">
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#image')
	                .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
</script>
@endsection