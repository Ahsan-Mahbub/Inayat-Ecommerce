@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')

<section class="login-section padding-100-20">
  <div class="container">
    <div class="navigation-bar">
      <div class="navigation-line">
          <i class="fa fa-home"></i> <a href="/">Home</a> / Customer Registration
      </div>
    </div>
  	<div class="row">
  		<div class="col-md-12">
			<div class="section-title title-style-center_text style2">
                <div class="title-header">
                    <h2 class="title">Customer Registration</h2>
                </div>
            </div>
		</div>
  	</div>
    <div class="row pt-3 pb-5 justify-content-center">
      <div class="col-md-4">
        <img src="/login.avif"
          class="img-fluid">
      </div>
      <div class="col-md-4">
        <form method="post" action="{{url('customer-store')}}">
            @csrf
          <!-- Name input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Full Name *</label>
            <input type="text" class="form-control form-control-lg" name="name" required value="{{old('name')}}" placeholder="Enter Full Name" />
            @error('name')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Email Address *</label>
            <input type="email" class="form-control form-control-lg" name="email" required value="{{old('email')}}" placeholder="Enter a valid email address" />
            @error('email')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Phone input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Phone Number *</label>
            <input type="text" class="form-control form-control-lg" required name="phone" value="{{old('phone')}}" placeholder="Enter a valid Phone Number" />
            @error('phone')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password * <small>at least 8 characters</small></label>
            <input type="password" class="form-control form-control-lg" required name="password" placeholder="Enter password" />
            @error('password')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <div class="col-md-12 mb-3">
            	<button class="text-white main-btn">
					Register
				</button>
            </div>
            <p class="mt-2 pt-1 text-center">Already have an account? <a href="/customer-login"
                class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
@endsection