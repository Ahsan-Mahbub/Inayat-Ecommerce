@extends('frontend.layouts.app')
@section('meta')
<meta name="description" content="{{ $information->description }}">
<meta name="keywords" content="{{ $information->keyword }}">
@endsection
@section('content')
    <!-- Hero Section -->
    <div class="contact-us-section padding-100-20">
        <div class="container">
            <div class="navigation-bar">
                <div class="navigation-line">
                    <i class="fa fa-home"></i> <a href="/">Home</a> / Become a Dealer
            </div>
            <div class="row">
                <div class="col-md-5 mb-4">
                    <div class="contact-part">
                        <div class="contact-details">
                            <div class="section-title">
                                <div class="title-header">
                                    <h1 class="title">Office Location</h1>
                                </div>
                                {!! $information->google_map !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="col-md-12">
                        <div class="section-title title-style-center_text style2">
                            <div class="title-header">
                                <h1 class="title">Become a Dealer</h1>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('dealer.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">

                            <div class="form-group col-md-6 col-sm-12">
                                <label>Your Name *</label>
                                <input type="text" name="name" placeholder="Enter Your Name..." required="">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label>Email Address </label>
                                <input type="email" name="email" placeholder="Enter Your Email...">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label>Phone Number *</label>
                                <input type="text" name="phone" placeholder="Enter Your Phone Number..."
                                    required="">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Company Name *</label>
                                <input type="text" name="company_name" placeholder="Enter Company Name..." required="">
                            </div>
                            
                            <div class="form-group col-md-6 col-sm-12">
                                <label>Comapny Email Address </label>
                                <input type="email" name="company_email" placeholder="Enter Company Email...">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label>Comapny Phone Number *</label>
                                <input type="text" name="company_phone" placeholder="Enter Company Phone Number..."
                                    required="">
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Your Address *</label>
                                <textarea name="address" placeholder="Enter Your Address" required></textarea>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Company Address *</label>
                                <textarea name="company_address" placeholder="Enter Company Address" required></textarea>
                            </div>

                            <div class="col-md-12 mb-3 text-center">
                                <button class="text-white main-btn">
                                    Submit
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
