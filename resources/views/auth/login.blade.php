<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>INAYAT || Admin Login </title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/fav.jpg">
    <link rel="icon" type="image/png" sizes="192x192" href="/fav.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="/fav.jpg">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="/backend/assets/css/codebase.min.css">
    <style>
        .form-floating>label {
            opacity: 0.5;
        }
    </style>
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-body-dark">
                <div class="row mx-0 justify-content-center">
                    <div class="hero-static col-lg-6 col-xl-4">
                        <div class="content content-full overflow-hidden">
                            <!-- Header -->
                            <div class="py-4 text-center">
                                <h1 class="h3 fw-bold mt-4 mb-2">INAYAT</h1>
                                <h2 class="h5 fw-medium text-muted mb-0">Please Enter Your Email & Password</h2>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->

                            <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="block block-themed block-rounded block-fx-shadow">
                                    <div class="block-header bg-gd-dusk text-center">
                                        <h3 class="block-title">Unlock Account</h3>
                                    </div>
                                    <div class="block-content">
                                        <div class="form-floating mb-4">
                                            <input type="email" id="login-username"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Enter your email">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="login-username">Email</label>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" id="login-password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Enter your password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="login-password">Password</label>
                                        </div>
                                        <div class="row justify">
                                            <div class="col-sm-12 text-center push">
                                                <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                                    Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full bg-body-light text-center">
                                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block"
                                            href="/">
                                            <i class="fa fa-user opacity-50 me-1"></i> Not you? Please visit our
                                            website.
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        Codebase JS

        Core libraries and functionality
        webpack is putting everything together at /backend/assets/_js/main/app.js
    -->
    <script src="/backend/assets/js/codebase.app.min.js"></script>

    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="/backend/assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="/backend/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="/backend/assets/js/pages/op_auth_signin.min.js"></script>
</body>

</html>
