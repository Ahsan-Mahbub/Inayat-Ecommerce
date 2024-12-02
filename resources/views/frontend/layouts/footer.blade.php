<!-- Footer -->
<footer class="footer" id="footer">
    <div class="background-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 footer-item line-left-item col-logo">
                    <div class="footer-item-inner p-relative h-100">
                        <div class="footer-logo">
                            <a href="/" class="pb-2">

                                <img height="100" src="{{ $information->image ? '/' . $information->image : '/logo.jpeg' }}" alt="logo"
                                    style="max-width: 100%" class="logo-dark pb-3">
                            </a>
                            <p>
                                {{ $information->location }}
                            </p>
                            <ul>
                                <li>
                                    <strong><i class="fa fa-phone"></i></strong>
                                    <a href="tel:{{ $information->phone }}">{{ $information->phone }}</a>
                                </li>
                                <li>
                                    <strong><i class="fa fa-phone"></i></strong>
                                    <a href="tel:{{ $information->mobile }}">{{ $information->mobile }}</a>
                                </li>
                                <li class="over-hidden">
                                    <strong><i class="fa fa-envelope"></i></strong>
                                    <a class="link-hover"
                                        href="mailto:{{ $information->email }}">{{ $information->email }}</a>
                                </li>
                            </ul>
                        </div>

                        <ul class="social-icon">
                            @if ($information->fb_link)
                                <li>
                                    <a href="{{ $information->fb_link }}" id="facebook" target="_blank"><i
                                            class="fa fa-facebook">&nbsp;</i>
                                    </a>
                                </li>
                            @endif
                            @if ($information->tiktok_link)
                                <li>
                                    <a href="{{ $information->tiktok_link }}" class="bg-white" target="_blank"><svg
                                            xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path
                                                d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                                        </svg>
                                    </a>
                                </li>
                            @endif
                            @if ($information->twitter_link)
                                <li>
                                    <a href="{{ $information->twitter_link }}" id="twitter" target="_blank"><i
                                            class="fa fa-twitter"></i></a>
                                </li>
                            @endif
                            @if ($information->linkedin_link)
                                <li>
                                    <a href="{{ $information->linkedin_link }}" id="linkedin" target="_blank"><i
                                            class="fa fa-linkedin"></i></a>
                                </li>
                            @endif
                            @if ($information->youtube_link)
                                <li>
                                    <a href="{{ $information->youtube_link }}" id="f_youtube" target="_blank"><i
                                            class="fa fa-youtube"></i></a>
                                </li>
                            @endif
                            @if ($information->instagram_link)
                                <li>
                                    <a href="{{ $information->instagram_link }}" id="instagram" target="_blank"><i
                                            class="fa fa-instagram"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 footer-item line-left-item col-menu">
                    <div class="footer-item-inner p-relative h-100">
                        <h4 class="footer-title line-after p-relative">Information</h4>

                        <div class="footer-menu-container">
                            <ul>
                                <li>
                                    <a href="/about-us">About Us</a>
                                </li>
                                <li>
                                    <a href="/certificate">Certificate</a>
                                </li>
                                <li>
                                    <a href="/privacy-policy">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="/terms-condition">Terms & Condition</a>
                                </li>
                                <li>
                                    <a href="/return-policy">Return Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 footer-item line-left-item col-contact">
                    <div class="footer-item-inner p-relative h-100">
                        <h4 class="footer-title line-after p-relative">Quick Links</h4>

                        <div class="footer-menu-container">
                            <ul>
                                @if(!Auth::guard('customers')->user())
                                <li>
                                    <a href="/customer-login">Customer Login</a>
                                </li>
                                <li>
                                    <a href="/customer-register">Customer Registration</a>
                                </li>
                                @else
                                <li>
                                    <a href="/customer/dashboard">My Dashboard</a>
                                </li>
                                @endif
                                <li>
                                    <a href="/cart">Cart</a>
                                </li>
                                <li>
                                    <a href="/blog">Blog</a>
                                </li>
                                <li>
                                    <a href="/connect-with-us">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 footer-item line-left-item col-contact">
                    <div class="footer-item-inner p-relative h-100">
                        <h4 class="footer-title line-after p-relative">Google Maps</h4>
                        {!! $information->google_map !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright background-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 text-center">
                    <p class="copy-right">{!! $information->copyright !!}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
