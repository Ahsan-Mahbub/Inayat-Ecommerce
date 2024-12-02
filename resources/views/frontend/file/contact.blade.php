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
                    <i class="fa fa-home"></i> <a href="/">Home</a> Contact Us
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
                                <h5>Connect with Us</h5>
                                <h1 class="title">Reach us Quickly</h1>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('/messages') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">

                            <div class="form-group col-md-12 col-sm-12">
                                <label>Your name *</label>
                                <input type="text" name="name" placeholder="Enter Your Name..." required="">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label>Email address </label>
                                <input type="email" name="email" placeholder="Enter Your Email...">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label>Phone number *</label>
                                <input type="text" name="phone" placeholder="Enter Your Phone Number..."
                                    required="">
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label>Your Message *</label>
                                <textarea name="message" rows="5" placeholder="Enter Your Enquires Message" required></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
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
