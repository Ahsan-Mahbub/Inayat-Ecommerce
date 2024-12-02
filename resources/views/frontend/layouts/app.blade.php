<!DOCTYPE html>
<html>

<head>
    <title>{{ $information->title ? $information->title : 'Inayat Lighting' }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Inayat Lighting">

    {!! $information->head_script !!}
    @yield('meta')
    <!-- Links -->
    <link rel="icon" href="/fav.jpg" type="image/jpeg" />
    <meta property="og:title" content="{{ $information->title ? $information->title : 'Inayat Lighting' }}" />
    <meta property="og:description" content="{{ $information->description ? $information->description : 'Inayat Lighting' }}" />
    <meta property="og:image" content="{{ $information->image ? '/' . $information->image : '/logo.png' }}" />
    <meta property="og:url" content="https://www.inayatlighting.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ $information->title ? $information->title : 'Inayat Lighting' }}" />
    
    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/bootstrap.css">
    <!-- Template Css -->
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/frontend/assets/css/responsive.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/toastr.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style type="text/css">
        .pdf-wrapper {
            width: 100%;
        }

        .pdf-frame {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

    }
    </style>
</head>

<body>
    <div class="side-whatsapp-buttons">
        <a href="https://wa.me/{{ $information->whatsapp_number }}">
            <img height="60" src="/whatsapp.png">
        </a>
    </div>
    <!-- Page Wrapper Start -->
    <div class="page-wrapper">
        @include('frontend.layouts.header')
        @yield('content')
        @include('frontend.layouts.footer')
    </div>
    <!-- Page Wrapper End -->

    <!-- Modal -->
    <div class="modal fade" id="quickAddToCartModel" tabindex="-1" aria-labelledby="quickAddToCartLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h1 class="modal-title" style="font-size: 20px" id="quickAddToCartLabel"><span id="product_name"
                            style="font-weight: 600">Add
                            to Cart</span> </h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="appendAddToCartModalContent">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="quickPreOrder" tabindex="-1" aria-labelledby="quickPreOrderLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h1 class="modal-title" style="font-size: 20px" id="quickPreOrderLabel"><span id="product_name"
                            style="font-weight: 600">Please Pre Order Now</span> </h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/customer-pre-order-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" id="pre_order_product_id" value="1">
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
                                <label>Your Address *</label>
                                <textarea name="address" rows="5" placeholder="Enter Your Address" required></textarea>
                            </div>

                            <div class="col-md-12 mb-2 text-center">
                                <button class="text-white main-btn custom-warning-btn">
                                    Buy Now
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <section class="stickyHeader">
        <?php
            $cart_data = Cart::content()->count();
            $total = Cart::subtotal();
        ?>
        <a href="/cart">
            <div class="itemCount text-center">
                <svg version="1.1" id="Calque_1" x="0px" y="0px" style="fill:#fdad70;stroke:#fdad70;" width="16px" height="24px" viewBox="0 0 100 160.13" data-reactid=".1ccd8vujb28.3.0.3.2.0.0"><g data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0"><polygon points="11.052,154.666 21.987,143.115 35.409,154.666  " data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0.0"></polygon><path d="M83.055,36.599c-0.323-7.997-1.229-15.362-2.72-19.555c-2.273-6.396-5.49-7.737-7.789-7.737   c-6.796,0-13.674,11.599-16.489,25.689l-3.371-0.2l-0.19-0.012l-5.509,1.333c-0.058-9.911-1.01-17.577-2.849-22.747   c-2.273-6.394-5.49-7.737-7.788-7.737c-8.618,0-17.367,18.625-17.788,37.361l-13.79,3.336l0.18,1.731h-0.18v106.605l17.466-17.762   l18.592,17.762V48.06H9.886l42.845-10.764l2.862,0.171c-0.47,2.892-0.74,5.865-0.822,8.843l-8.954,1.75v106.605l48.777-10.655   V38.532l0.073-1.244L83.055,36.599z M36.35,8.124c2.709,0,4.453,3.307,5.441,6.081c1.779,5.01,2.69,12.589,2.711,22.513   l-23.429,5.667C21.663,23.304,30.499,8.124,36.35,8.124z M72.546,11.798c2.709,0,4.454,3.308,5.44,6.081   c1.396,3.926,2.252,10.927,2.571,18.572l-22.035-1.308C61.289,21.508,67.87,11.798,72.546,11.798z M58.062,37.612l22.581,1.34   c0.019,0.762,0.028,1.528,0.039,2.297l-23.404,4.571C57.375,42.986,57.637,40.234,58.062,37.612z M83.165,40.766   c-0.007-0.557-0.01-1.112-0.021-1.665l6.549,0.39L83.165,40.766z" data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0.1"></path></g></svg>
                <p class="text-center">
                    <span id="miniCartItemCount">{{ $cart_data }}</span> <span>ITEMS</span>
                </p>
            </div>
            <div class="total">
                <span>৳ </span>
                <div class="odometer odometer-auto-theme">
                    <div class="odometer-inside">
                        <span class="odometer-digit">
                            <span class="odometer-digit-spacer" id="getCountAmount">{{$total}}</span>
                        </span>
                    </div>
                </div>
            </div>
        </a>
    </section> --}}
    <!-- Script Start -->
    <script src="/frontend/assets/js/jquery.js"></script>
    <script src="/frontend/assets/js/jQuery-plugin-progressbar.js"></script>
    <script src="/frontend/assets/js/jquery.waypoints.min.js"></script>
    <script src="/frontend/assets/js/jquery.counterup.min.js"></script>
    <script src="/frontend/assets/js/popper.min.js"></script>
    <script src="/frontend/assets/js/bootstrap.min.js"></script>
    <script src="/frontend/assets/js/jquery.fancybox.js"></script>
    <script src="/frontend/assets/js/owl.js"></script>
    <script src="/frontend/assets/js/wow.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js"></script>
    <script src="/frontend/assets/js/jquery-ui.js"></script>
    <script src="/frontend/assets/js/main.js" defer=""></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    @yield('javascript')

    {{ $information->messenger_script }}

    <script src="{{ asset('frontend') }}/assets/js/custom.js"></script>

    <script>
        $(document).on("click", ".preOrder", function () {
            let product_id = $(this).attr("product_id");
            $("#pre_order_product_id").val(product_id);
        });
    </script>
    {{-- <script type="text/javascript">
        // Disable right-click context menu
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });

        // Disable copy functionality
        document.addEventListener('copy', function(event) {
            event.preventDefault();
        });

        // Disable keyboard shortcuts for copy
        document.addEventListener('keydown', function(event) {
            if ((event.ctrlKey || event.metaKey) && event.key === 'c') {
                event.preventDefault();
            }
        });
    </script> --}}

</body>

</html>
