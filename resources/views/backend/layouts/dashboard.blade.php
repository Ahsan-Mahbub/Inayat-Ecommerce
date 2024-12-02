@extends('backend.layouts.app')
@section('content')
    <!-- Page Content -->

    <div class="content">
        <div class="bg-image" style="background-image: url('/backend/assets/media/photos/photo26@2x.jpg');">
            <div class="bg-black-75">
                <div class="content content-top content-full text-center">
                    <div class="py-3">
                        <h1 class="fw-bold text-white mb-2">
                            Dashboard
                        </h1>
                        <h2 class="h4 fw-medium text-white-75">
                            Welcome to INAYAT - Admin Panel
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumb push rounded-pill mt-4">
            <span class="breadcrumb-item active text-dark fw-bold p-2">Quick Link</span>
        </nav>
        <div class="row mt-4">
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('category.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-list-ol text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Category</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('subcategory.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-list-ol text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Sub Category</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('product-watt.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-list text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Product Watt</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('product-color.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-list text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Product Color</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('space.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fab fa-bandcamp text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Shop By Space</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('temperature.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-thermometer-half text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Temperature</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('product.create') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fab fa-opencart text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Add Product</p>
                    </div>
                </a>
            </div>
            {{-- <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('stock.create') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-store text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Stock</p>
                    </div>
                </a>
            </div> --}}
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('order.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-shopping-cart text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Order</p>
                    </div>
                </a>
            </div>
            {{-- <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('order.admin.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-handshake text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Sales</p>
                    </div>
                </a>
            </div> --}}
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('employee.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-users text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Employee</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('slider.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-sliders text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Slider</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('customer.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-users text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Customer</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('blog.create') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-file text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Blog</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('client.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-user-md text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Client</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('testimonial.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-quote-left text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Testimonial</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('message.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="far fa-envelope text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Inbox</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded text-center" href="{{ route('setting.index') }}">
                    <div class="block-content px-2">
                        <p class="mt-1 mb-3">
                            <i class="fa fa-cogs text-gray fa-2x"></i>
                        </p>
                        <p class="fw-semibold fs-sm">Site Setting</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-7">
                <nav class="breadcrumb push rounded-pill">
                    <span class="breadcrumb-item active text-dark fw-bold p-2">Order Overview</span>
                </nav>
                <div class="row mt-4">
                    <!-- Row #1 -->
                    <div class="col-6 col-xl-4">
                        <a class="block block-rounded block-link-shadow text-end" href="/admin/order/order/status/1">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="fs-3 fw-semibold">{{ $deliverd }}</div>
                                <div class="fs-sm fw-semibold text-muted">Delivered Orders</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-xl-4">
                        <a class="block block-rounded block-link-shadow text-end" href="/admin/order/order/status/2">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="fs-3 fw-semibold">{{ $pandding }}</div>
                                <div class="fs-sm fw-semibold text-muted">Pending Orders</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-xl-4">
                        <a class="block block-rounded block-link-shadow text-end" href="/admin/order/order/status/0">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="fs-3 fw-semibold">{{ $rejected }}</div>
                                <div class="fs-sm fw-semibold text-muted">Rejected Orders</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-5">
                    <canvas id="pieChartCustomerInfo" width="100" height="50"></canvas>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <nav class="breadcrumb push rounded-pill">
                    <span class="breadcrumb-item active text-dark fw-bold">Sales Overview</span>
                </nav>
                <div class="row mt-4">
                    <!-- Row #1 -->
                    <div class="col-6 col-xl-4">
                        <a class="block block-rounded block-link-shadow text-end"
                            href="{{ route('order.admin.index') }}">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="fs-3 fw-semibold">{{ $admin_deliverd }}</div>
                                <div class="fs-sm fw-semibold text-muted">Delivered Orders</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-xl-4">
                        <a class="block block-rounded block-link-shadow text-end"
                            href="{{ route('order.admin.index') }}">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="fs-3 fw-semibold">{{ $admin_pandding }}</div>
                                <div class="fs-sm fw-semibold text-muted">Panding Orders</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-xl-4">
                        <a class="block block-rounded block-link-shadow text-end"
                            href="{{ route('order.admin.index') }}">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="fs-3 fw-semibold">{{ $admin_rejected }}</div>
                                <div class="fs-sm fw-semibold text-muted">Rejected Orders</div>
                            </div>
                        </a>
                    </div>
                    <!-- END Row #1 -->
                    <div class="p-5">
                        <canvas id="pieChartAdminInfo" width="100" height="50"></canvas>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const deliverd = @json($deliverd);
        const pandding = @json($pandding);
        const rejected = @json($rejected);
        var ctx = document.getElementById('pieChartCustomerInfo').getContext('2d');
        var pieChartCustomerInfo = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Delivered', 'Pending', 'Cancel'],
                datasets: [{
                    data: [deliverd, pandding, rejected],
                    backgroundColor: [
                        'rgba(0, 128, 0, 1)',
                        'rgba(128, 0, 0, 1)',
                        'rgba(0, 0, 128, 1)'
                    ],
                    borderColor: [
                        'rgba(0, 128, 0, 1)',
                        'rgba(128, 0, 0, 1)',
                        'rgba(0, 0, 128, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });
    </script>
    <script>
        const admin_deliverd = @json($admin_deliverd);
        const admin_pandding = @json($admin_pandding);
        const admin_rejected = @json($admin_rejected);
        var ctx = document.getElementById('pieChartAdminInfo').getContext('2d');
        var pieChartAdminInfo = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Delivered', 'Pending', 'Cancel'],
                datasets: [{
                    data: [admin_deliverd, admin_pandding, admin_rejected],
                    backgroundColor: [
                        'rgba(0, 128, 0, 1)',
                        'rgba(128, 0, 0, 1)',
                        'rgba(0, 0, 128, 1)'
                    ],
                    borderColor: [
                        'rgba(0, 128, 0, 1)',
                        'rgba(128, 0, 0, 1)',
                        'rgba(0, 0, 128, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });
    </script>
@endsection
