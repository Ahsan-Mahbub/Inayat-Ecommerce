<!-- Header Section Start -->
<header class="header">
    <!-- Mobile Menu -->
    <div class="mobile-menu-container">
        <div class="mobile-menu-close"></div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Mobile Menu End -->

    <!-- Bottom Header & Main Menu -->
    <div class="main-nav">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light w-100 site-navigation">
                    <a class="navbar-brand" href="/">
                        <img src="{{ $information->image ? '/' . $information->image : '/logo.png' }}" alt="">
                    </a>
                    <!-- Toggle Button -->
                    <div class="header_cart header-cart-mobile d-none">
                        <?php
                            $cart_data = Cart::content()->count();
                            $total = Cart::subtotal();
                        ?>
                        <a href="/cart" class="cart-link">
                            <svg version="1.1" id="Calque_1" x="0px" y="0px" style="fill:#fff;stroke:#fff;" width="16px" height="17px" viewBox="0 0 100 160.13" data-reactid=".1ccd8vujb28.3.0.3.2.0.0"><g data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0"><polygon points="11.052,154.666 21.987,143.115 35.409,154.666  " data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0.0"></polygon><path d="M83.055,36.599c-0.323-7.997-1.229-15.362-2.72-19.555c-2.273-6.396-5.49-7.737-7.789-7.737   c-6.796,0-13.674,11.599-16.489,25.689l-3.371-0.2l-0.19-0.012l-5.509,1.333c-0.058-9.911-1.01-17.577-2.849-22.747   c-2.273-6.394-5.49-7.737-7.788-7.737c-8.618,0-17.367,18.625-17.788,37.361l-13.79,3.336l0.18,1.731h-0.18v106.605l17.466-17.762   l18.592,17.762V48.06H9.886l42.845-10.764l2.862,0.171c-0.47,2.892-0.74,5.865-0.822,8.843l-8.954,1.75v106.605l48.777-10.655   V38.532l0.073-1.244L83.055,36.599z M36.35,8.124c2.709,0,4.453,3.307,5.441,6.081c1.779,5.01,2.69,12.589,2.711,22.513   l-23.429,5.667C21.663,23.304,30.499,8.124,36.35,8.124z M72.546,11.798c2.709,0,4.454,3.308,5.44,6.081   c1.396,3.926,2.252,10.927,2.571,18.572l-22.035-1.308C61.289,21.508,67.87,11.798,72.546,11.798z M58.062,37.612l22.581,1.34   c0.019,0.762,0.028,1.528,0.039,2.297l-23.404,4.571C57.375,42.986,57.637,40.234,58.062,37.612z M83.165,40.766   c-0.007-0.557-0.01-1.112-0.021-1.665l6.549,0.39L83.165,40.766z" data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0.1"></path></g></svg> <span class="ml-1">Cart</span>
                            <span class="cart-count ml-1 miniCartItemCount">{{ $cart_data }}</span>
                        </a>
                    </div>
                    <button class="mobile-menu-trigger for-mobile-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div class="navbar-collapse site-menu-wrap">
                        <!-- Close Menu Icon -->
                        <div class="close-menu-wrap">
                            <span class="fa fa-times close-menu-icon"></span>
                        </div>

                        <ul class="navbar-nav ml-auto site-menu">
                            <li class="nav-item ">
                                <a class="menu-link" href="/">Home</a>
                            </li>

                            <li class="nav-item has-children">
                                <a class="menu-link" href="javascript::void(0)">Info
                                    <span class="flaticon-angle-arrow-down"></span>
                                </a>
                                <ul class="navigation-mega-menu dropdown">
                                    <li class="nav-item has-children">
                                        <a href="/about-us">
                                            About Us
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/team">
                                            Our Team
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/certificate">
                                            Certificate
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/terms-condition">
                                            Terms & Condition
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/privacy-policy">
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/return-policy">
                                            Return Policy
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/become-a-dealer">
                                            Become a Dealer
                                        </a>
                                    </li>
                                    @if(!Auth::guard('customers')->user())
                                    <li class="nav-item has-children">
                                        <a href="/customer-login">
                                            Customer Login
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/customer-register">
                                            Customer Registration
                                        </a>
                                    </li>
                                    @else
                                    <li class="nav-item has-children">
                                        <a href="/customer/dashboard">
                                            My Dashboard
                                        </a>
                                    </li>
                                    @endif
                                    <li class="nav-item has-children">
                                        <a href="/connect-with-us">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-children">
                                <a class="menu-link" href="/categories">Category
                                    <span class="flaticon-angle-arrow-down"></span>
                                </a>
                                <ul class="navigation-mega-menu dropdown">
                                    @foreach ($categories as $category)
                                        <li class="nav-item has-children">
                                            <a href="/cat/product/{{ $category->slug }}">
                                                {{ $category->category_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item has-children">
                                <a class="menu-link" href="/shop-by-space">Shop by Space
                                    <span class="flaticon-angle-arrow-down"></span>
                                </a>
                                <ul class="navigation-mega-menu dropdown">
                                    @foreach ($spaces as $space)
                                        <li class="nav-item has-children">
                                            <a href="/shop-by-space/product/{{$space->slug}}">
                                                {{ $space->space_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item has-children">
                                <a class="menu-link" href="javascript::void(0)">Resources
                                    <span class="flaticon-angle-arrow-down"></span>
                                </a>
                                <ul class="navigation-mega-menu dropdown">
                                    <li class="nav-item has-children">
                                        <a href="/e-catalogue">
                                            E-Catalogue
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/video">
                                            All Videos
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/blog">
                                            Blog
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-children">
                                <a class="menu-link" href="javascript::void(0)">Our Works
                                    <span class="flaticon-angle-arrow-down"></span>
                                </a>
                                <ul class="navigation-mega-menu dropdown">
                                    <li class="nav-item has-children">
                                        <a href="/client">
                                            Client List
                                        </a>
                                    </li>
                                    <li class="nav-item has-children">
                                        <a href="/project">
                                            Projects
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header_search"><!-- header_search -->
                        <div class="header_search_content">
                            <div id="search_block_top" class="search_block_top">
                                <form id="searchbox" action="/product-search" method="GET">
                                    <input class="search_query form-control" type="text" id="search_query_top" name="product_name" placeholder="Search For Shopping...." value="">
                                    <button type="submit" name="submit_search" class="btn btn-default button-search"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="header_cart header-cart-large-medium">
                        <?php
                            $cart_data = Cart::content()->count();
                            $total = Cart::subtotal();
                        ?>
                        <a href="/cart" class="cart-link">
                            <svg version="1.1" id="Calque_1" x="0px" y="0px" style="fill:#fff;stroke:#fff;" width="16px" height="17px" viewBox="0 0 100 160.13" data-reactid=".1ccd8vujb28.3.0.3.2.0.0"><g data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0"><polygon points="11.052,154.666 21.987,143.115 35.409,154.666  " data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0.0"></polygon><path d="M83.055,36.599c-0.323-7.997-1.229-15.362-2.72-19.555c-2.273-6.396-5.49-7.737-7.789-7.737   c-6.796,0-13.674,11.599-16.489,25.689l-3.371-0.2l-0.19-0.012l-5.509,1.333c-0.058-9.911-1.01-17.577-2.849-22.747   c-2.273-6.394-5.49-7.737-7.788-7.737c-8.618,0-17.367,18.625-17.788,37.361l-13.79,3.336l0.18,1.731h-0.18v106.605l17.466-17.762   l18.592,17.762V48.06H9.886l42.845-10.764l2.862,0.171c-0.47,2.892-0.74,5.865-0.822,8.843l-8.954,1.75v106.605l48.777-10.655   V38.532l0.073-1.244L83.055,36.599z M36.35,8.124c2.709,0,4.453,3.307,5.441,6.081c1.779,5.01,2.69,12.589,2.711,22.513   l-23.429,5.667C21.663,23.304,30.499,8.124,36.35,8.124z M72.546,11.798c2.709,0,4.454,3.308,5.44,6.081   c1.396,3.926,2.252,10.927,2.571,18.572l-22.035-1.308C61.289,21.508,67.87,11.798,72.546,11.798z M58.062,37.612l22.581,1.34   c0.019,0.762,0.028,1.528,0.039,2.297l-23.404,4.571C57.375,42.986,57.637,40.234,58.062,37.612z M83.165,40.766   c-0.007-0.557-0.01-1.112-0.021-1.665l6.549,0.39L83.165,40.766z" data-reactid=".1ccd8vujb28.3.0.3.2.0.0.0.1"></path></g></svg> <span class="ml-1">Cart</span>
                            <span class="cart-count ml-1 miniCartItemCount">{{ $cart_data }}</span>
                        </a>
                    </div>

                    <button class="mobile-menu-trigger for-tab-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
