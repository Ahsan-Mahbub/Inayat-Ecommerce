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
          <i class="fa fa-home"></i> <a href="/">Home</a> / Customer Login
      </div>
    </div>
  	<div class="row">
  		<div class="col-md-12">
			<div class="section-title title-style-center_text style2">
                <div class="title-header">
                    <h2 class="title">Customer Login</h2>
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
        <form method="post" action="{{url('login-store')}}">
        	@csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Email Address *</label>
            <input type="email" class="form-control form-control-lg" name="email" value="{{old('email')}}" required placeholder="Enter a valid email address" />
            @error('email')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password *</label>
            <input type="password" class="form-control form-control-lg" name="password" required placeholder="Enter password" />
            @error('password')
              <span class="text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <!-- <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#" class="text-body">Forgot password?</a>
          </div> -->

          <div class="text-center text-lg-start mt-4 pt-2">
            <div class="col-md-12 mb-3">
            	<button class="text-white main-btn">
					Login
				</button>
            </div>
            <p class="mt-2 pt-1 text-center">Don't have an account? <a href="/customer-register"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
@endsection