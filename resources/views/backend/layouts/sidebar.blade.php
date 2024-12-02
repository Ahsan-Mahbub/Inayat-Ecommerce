<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
                <span class="smini-visible fw-bold tracking-wide fs-lg">
                    c<span class="text-primary">b</span>
                </span>
                <a class="link-fx fw-bold tracking-wide mx-auto" href="/admin">
                    <span class="smini-hidden">
                        <span class="fs-4 text-dark">INAYAT</span>
                    </span>
                </a>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side User -->
            <div class="content-side content-side-user px-0 py-0">
                <!-- Visible only in mini mode -->
                <div class="smini-visible-block animated fadeIn px-3">
                    <img class="img-avatar img-avatar32" src="/fav.jpg"
                        alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="smini-hidden text-center mx-auto">
                    <a class="img-link" href="/admin">
                        <img height="50" src="/fav.png" alt="">
                    </a>
                    <ul class="list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a class="link-fx text-dual fs-sm fw-semibold text-uppercase">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle"
                                href="javascript:void(0)">
                                <i class="fa fa-burn"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Main Module</li>
                    <li
                        class="nav-main-item {{ request()->is('admin/category*') || request()->is('admin/subcategory*') || request()->is('admin/space*') || request()->is('admin/product-watt*') || request()->is('admin/temperature*') || request()->is('admin/product-color*') ? 'open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-list-ol"></i>
                            <span class="nav-main-link-name">Product Module</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('category.index') }}">
                                    <span class="nav-main-link-name">Category</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('subcategory.index') }}">
                                    <span class="nav-main-link-name">Sub Category</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('space.index') }}">
                                    <span class="nav-main-link-name">Shop By Space</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('product-watt.index') }}">
                                    <span class="nav-main-link-name">Product Watt</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('product-color.index') }}">
                                    <span class="nav-main-link-name">Product Color</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('temperature.index') }}">
                                    <span class="nav-main-link-name">Product Temperature</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-main-item {{ request()->is('admin/product/*') ? 'open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fab fa-opencart"></i>
                            <span class="nav-main-link-name">Product</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('product.create') }}">
                                    <span class="nav-main-link-name">Add Product</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('product.index') }}">
                                    <span class="nav-main-link-name">Product List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item {{ request()->is('admin/stock*') ? 'open' : '' }}"">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-store"></i>
                            <span class="nav-main-link-name">Product Stock</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('stock.create') }}">
                                    <span class="nav-main-link-name">Add Stock</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('stock.index') }}">
                                    <span class="nav-main-link-name">Stock List</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('stock.total') }}">
                                    <span class="nav-main-link-name">Total Stock</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item {{ request()->is('admin/order*') ? 'open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-shopping-cart"></i>
                            <span class="nav-main-link-name">Order</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link {{ request()->is('admin/order/customer-order-list') ? 'active' : '' }}" href="{{ route('order.index') }}">
                                    <span class="nav-main-link-name">Order List</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('order.status', 2) }}">
                                    <span class="nav-main-link-name">Pending Order</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('order.status', 1) }}">
                                    <span class="nav-main-link-name">Deliverd Order</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('order.status', 0) }}">
                                    <span class="nav-main-link-name">Rejected Order</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-main-item {{ request()->is('admin/order/sales*') ? 'open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-handshake"></i>
                            <span class="nav-main-link-name">Sales</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('order.admin.create') }}">
                                    <span class="nav-main-link-name">Create Sales</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('order.admin.index') }}">
                                    <span class="nav-main-link-name">Sales List</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-file"></i>
                            <span class="nav-main-link-name">Report</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('report.stock') }}">
                                    <span class="nav-main-link-name">Product Stock</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-main-heading">Others Module</li>
                    @if (Auth::user()->role_id == 1)
                         <!-- RBAC  -->
                        <li class="nav-main-item @yield('rbac')">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-user-secret"></i>
                            <span class="nav-main-link-name">RBAC</span>
                            </a>
                            <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link @yield('role')" href="{{ route('role.index') }}">
                                <span class="nav-main-link-name">Role List</span>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <!-- Employee Section  -->          
                        <li class="nav-main-item">
                            <a class="nav-main-link @yield('employee')" href="{{ route('employee.index') }}">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">Employee List</span>
                            </a>
                        </li>
                        {{-- <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->is('admin/employee*') ? 'active' : '' }}"
                                href="{{ route('employee.index') }}">
                                <i class="nav-main-link-icon fa fa-user"></i>
                                <span class="nav-main-link-name">Employee</span>
                            </a>
                        </li> --}}
                    @endif
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/review*') ? 'active' : '' }}"
                            href="{{ route('review.index') }}">
                            <i class="nav-main-link-icon fa fa-comments"></i>
                            <span class="nav-main-link-name">Product Review</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/slider*') ? 'active' : '' }}"
                            href="{{ route('slider.index') }}">
                            <i class="nav-main-link-icon fa fa-sliders"></i>
                            <span class="nav-main-link-name">Slider</span>
                        </a>
                    </li>
                    <li class="nav-main-item {{ request()->is('admin/customer*') ? 'open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">Customer</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('customer.create') }}">
                                    <span class="nav-main-link-name">Add Customer</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('customer.index') }}">
                                    <span class="nav-main-link-name">Customer List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/blog*') ? 'active' : '' }}"
                            href="{{ route('blog.index') }}">
                            <i class="nav-main-link-icon fa fa-file"></i>
                            <span class="nav-main-link-name">Blog</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/client*') ? 'active' : '' }}"
                            href="{{ route('client.index') }}">
                            <i class="nav-main-link-icon fa fa-user-md"></i>
                            <span class="nav-main-link-name">Client</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/testimonial*') ? 'active' : '' }}"
                            href="{{ route('testimonial.index') }}">
                            <i class="nav-main-link-icon fa fa-quote-left"></i>
                            <span class="nav-main-link-name">Testimonial</span>
                        </a>
                    </li>

                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/team*') ? 'active' : '' }}"
                            href="{{ route('team.index') }}">
                            <i class="nav-main-link-icon fa fa-user"></i>
                            <span class="nav-main-link-name">Our Team</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/project*') ? 'active' : '' }}"
                            href="{{ route('project.index') }}">
                            <i class="nav-main-link-icon fa fa-building"></i>
                            <span class="nav-main-link-name">Project</span>
                        </a>
                    </li>
                    <li
                        class="nav-main-item {{ request()->is('admin/video*')}}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-video"></i>
                            <span class="nav-main-link-name">Video</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('video.category.index') }}">
                                    <span class="nav-main-link-name">Video Category</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('video.index') }}">
                                    <span class="nav-main-link-name">Video</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/message*') ? 'active' : '' }}"
                            href="{{ route('message.index') }}">
                            <i class="nav-main-link-icon fa fa-envelope"></i>
                            <span class="nav-main-link-name">User Message</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ request()->is('admin/dealer*') ? 'active' : '' }}"
                            href="{{ route('dealer.index') }}">
                            <i class="nav-main-link-icon fa fa-user-md"></i>
                            <span class="nav-main-link-name">Dealer Request</span>
                        </a>
                    </li>
                    <li
                        class="nav-main-item {{ request()->is('admin/setting*') || request()->is('admin/certificate*') || request()->is('admin/banner*') ? 'open' : '' }}">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-cogs"></i>
                            <span class="nav-main-link-name">Information Setting</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('certificate.index') }}">
                                    <span class="nav-main-link-name">Certificate</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('setting.index') }}">
                                    <span class="nav-main-link-name">Information Setting</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('setting.e-catalogue') }}">
                                    <span class="nav-main-link-name">E-Catalogue</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('setting.promo') }}">
                                    <span class="nav-main-link-name">Promo Update</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('banner.index') }}">
                                    <span class="nav-main-link-name">Promotional Banner</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
