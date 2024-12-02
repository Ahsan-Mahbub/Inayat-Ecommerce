<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BuyNowOrderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminOrderCreateController;
use App\Http\Controllers\OrderInformationController;
use App\Http\Controllers\Employee\EmployeeDashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DealerController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['prefix'=>'employee','middleware' =>['employee','auth']], function(){
    Route::get('dashboard',[EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    //Profile Update Route
    Route::post('/profile-store', [HomeController::class, 'store'])->name('profile.store');
    //Slider Route
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/list', [SliderController::class, 'index'])->name('slider.index');
        Route::get('/status/{id}', [SliderController::class, 'status'])->name('slider.status');
        Route::post('store', [SliderController::class, 'store'])->name('slider.store');
        Route::get('edit/{id}', [SliderController::class, 'edit']);
        Route::post('update', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
    //Category Route
    Route::group(['prefix' => 'category'], function () {
        Route::get('/list', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/status/{id}', [CategoryController::class, 'status'])->name('category.status');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit']);
        Route::post('update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    //SubCategory Route
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/list', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/status/{id}', [SubCategoryController::class, 'status'])->name('subcategory.status');
        Route::post('store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('edit/{id}', [SubCategoryController::class, 'edit']);
        Route::post('update', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::delete('destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    });
    //Space Route
    Route::group(['prefix' => 'space'], function () {
        Route::get('/list', [SpaceController::class, 'index'])->name('space.index');
        Route::get('/status/{id}', [SpaceController::class, 'status'])->name('space.status');
        Route::post('store', [SpaceController::class, 'store'])->name('space.store');
        Route::get('edit/{id}', [SpaceController::class, 'edit']);
        Route::post('update', [SpaceController::class, 'update'])->name('space.update');
        Route::delete('destroy/{id}', [SpaceController::class, 'destroy'])->name('space.destroy');
    });

    //  Product Size
    Route::resource('product-watt', ProductSizeController::class);
    //  Product Color
    Route::resource('product-color', ProductColorController::class);
    Route::get('product-color-status', [ProductColorController::class, 'updateStatus'])->name('product-color.status.update');
    Route::post('update-product-color', [ProductColorController::class, 'update'])->name('update.product-color');

    //  Product Temperature
    Route::resource('temperature', TemperatureController::class);
    Route::get('temperature-status', [TemperatureController::class, 'updateStatus'])->name('temperature.status.update');
    Route::post('update-temperature', [TemperatureController::class, 'update'])->name('update.temperature');

    //Product Route
    Route::group(['prefix' => 'product'], function () {
        Route::get('/list', [ProductController::class, 'index'])->name('product.index');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/status/{id}', [ProductController::class, 'status'])->name('product.status');
        Route::get('/feature/{id}', [ProductController::class, 'feature'])->name('product.feature');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

        Route::get('subcategory/{id}', [ProductController::class, 'subcategory'])->name('product.subcategory');

        Route::get('/filter-product', [ProductController::class, 'filterProduct'])->name('product.filter');
    });
    //Stock Route
    Route::group(['prefix' => 'stock'], function () {
        Route::get('/list', [StockController::class, 'index'])->name('stock.index');
        Route::get('/total-stock', [StockController::class, 'totalStock'])->name('stock.total');
        Route::get('create', [StockController::class, 'create'])->name('stock.create');
        Route::post('store', [StockController::class, 'store'])->name('stock.store');

        Route::get('edit/{id}', [StockController::class, 'edit'])->name('stock.edit');
        Route::post('update/{id}', [StockController::class, 'update'])->name('stock.update');
        Route::delete('destroy/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

        Route::post('/stock-search-product', [StockController::class, 'getSearchProduct']);

        Route::post('/get-product-details', [StockController::class, 'getProductDetails'])->name('get-product-details');
    });
    //Setting Route
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/index', [SettingController::class, 'index'])->name('setting.index');
        Route::post('update/{id}', [SettingController::class, 'update'])->name('setting.update');
        Route::get('/e-catalogue', [SettingController::class, 'eCatalogue'])->name('setting.e-catalogue');
        Route::get('/promo', [SettingController::class, 'promo'])->name('setting.promo');
    });
    //Banner Route
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/index', [BannerController::class, 'index'])->name('banner.index');
        Route::post('update/{id}', [BannerController::class, 'update'])->name('banner.update');
    });
    //Message Route
    Route::group(['prefix' => 'message'], function () {
        Route::get('/list', [MessageController::class, 'index'])->name('message.index');
        Route::delete('destroy/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
    });
    //Order Route
    Route::group(['prefix' => 'order'], function () {
        Route::get('/customer-order-list', [OrderInformationController::class, 'index'])->name('order.index');
        Route::get('invoice/{id}', [OrderInformationController::class, 'invoice'])->name('order.invoice');
        Route::get('status/{id}', [OrderInformationController::class, 'status'])->name('order.status');
        Route::delete('destroy/{id}', [OrderInformationController::class, 'destroy'])->name('order.destroy');

        Route::get('/sales-order-list', [AdminOrderCreateController::class, 'index'])->name('order.admin.index');
        Route::get('/sales-order-create', [AdminOrderCreateController::class, 'create'])->name('order.admin.create');
        Route::post('/admin-order-search-product', [AdminOrderCreateController::class, 'getSearchProduct']);
        Route::post('/admin-order-get-product-details', [AdminOrderCreateController::class, 'adminOrderGetProductDetails']);

        Route::get('order/status/{status}', [OrderInformationController::class, 'statusWiseOrderList'])->name('order.status');
    });
    //  Buy Now Order
    Route::get('pre-order/index', [BuyNowOrderController::class, 'buyNowOrderIndex'])->name('pre-order.index');

    //Report Route
    Route::group(['prefix' => 'report'], function () {
        //Stock Category Product Route
        Route::get('/stock', [ReportController::class, 'stockIndex'])->name('report.stock');
        Route::get('/get-stock', [ReportController::class, 'stockGet'])->name('report.stock.get');
    });
    //Customer Route
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });

    //Order Route
    Route::group(['prefix' => 'sales'], function () {
        Route::post('/store', [SaleController::class, 'store'])->name('sale.store');
    });

    // //Employee Route
    // Route::group(['prefix' => 'employee'], function () {
    //     Route::get('/list', [EmployeeController::class, 'index'])->name('employee.index');
    //     Route::post('store', [EmployeeController::class, 'store'])->name('employee.store');
    //     Route::get('edit/{id}', [EmployeeController::class, 'edit']);
    //     Route::post('update', [EmployeeController::class, 'update'])->name('employee.update');
    //     Route::delete('destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    // });

    //  Role Route
    Route::resource('role', RoleController::class);
    Route::get('role-status', [RoleController::class, 'updateStatus'])->name('role.status.update');
    Route::post('update-role', [RoleController::class, 'update'])->name('update.role');

    //  Employee
    Route::resource('employee', EmployeeController::class);
    Route::post('employee-update', [EmployeeController::class, 'update'])->name('update.employee');

    //Blog Route
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/list', [BlogController::class, 'index'])->name('blog.index');
        Route::get('create', [BlogController::class, 'create'])->name('blog.create');
        Route::get('/status/{id}', [BlogController::class, 'status'])->name('blog.status');
        Route::post('store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    });

    //Client Route
    Route::group(['prefix' => 'client'], function () {
        Route::get('/list', [ClientController::class, 'index'])->name('client.index');
        Route::get('/status/{id}', [ClientController::class, 'status'])->name('client.status');
        Route::post('store', [ClientController::class, 'store'])->name('client.store');
        Route::get('edit/{id}', [ClientController::class, 'edit']);
        Route::post('update', [ClientController::class, 'update'])->name('client.update');
        Route::delete('destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
    });

    //Testimonial Route
    Route::group(['prefix' => 'testimonial'], function () {
        Route::get('/list', [TestimonialController::class, 'index'])->name('testimonial.index');
        Route::get('/status/{id}', [TestimonialController::class, 'status'])->name('testimonial.status');
        Route::post('store', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('edit/{id}', [TestimonialController::class, 'edit']);
        Route::post('update', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete('destroy/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    });

    //Review Route
    Route::group(['prefix' => 'review'], function () {
        Route::get('/list', [ProductReviewController::class, 'index'])->name('review.index');
        Route::get('/status/{id}', [ProductReviewController::class, 'status'])->name('review.status');
        Route::post('store', [ProductReviewController::class, 'store'])->name('review.store');
        Route::get('edit/{id}', [ProductReviewController::class, 'edit']);
        Route::post('update', [ProductReviewController::class, 'update'])->name('review.update');
        Route::delete('destroy/{id}', [ProductReviewController::class, 'destroy'])->name('review.destroy');
    });

    //Certificate Route
    Route::group(['prefix' => 'certificate'], function () {
        Route::get('/list', [CertificateController::class, 'index'])->name('certificate.index');
        Route::get('/status/{id}', [CertificateController::class, 'status'])->name('certificate.status');
        Route::post('store', [CertificateController::class, 'store'])->name('certificate.store');
        Route::get('edit/{id}', [CertificateController::class, 'edit']);
        Route::post('update', [CertificateController::class, 'update'])->name('certificate.update');
        Route::delete('destroy/{id}', [CertificateController::class, 'destroy'])->name('certificate.destroy');
    });
    //Video Category Route
    Route::group(['prefix' => 'video-category'], function () {
        Route::get('/list', [VideoCategoryController::class, 'index'])->name('video.category.index');
        Route::get('/status/{id}', [VideoCategoryController::class, 'status'])->name('video.category.status');
        Route::post('store', [VideoCategoryController::class, 'store'])->name('video.category.store');
        Route::get('edit/{id}', [VideoCategoryController::class, 'edit']);
        Route::post('update', [VideoCategoryController::class, 'update'])->name('video.category.update');
        Route::delete('destroy/{id}', [VideoCategoryController::class, 'destroy'])->name('video.category.destroy');
    });
    //Video Route
    Route::group(['prefix' => 'video'], function () {
        Route::get('/list', [VideoController::class, 'index'])->name('video.index');
        Route::get('/status/{id}', [VideoController::class, 'status'])->name('video.status');
        Route::post('store', [VideoController::class, 'store'])->name('video.store');
        Route::get('edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
        Route::post('update/{id}', [VideoController::class, 'update'])->name('video.update');
        Route::delete('destroy/{id}', [VideoController::class, 'destroy'])->name('video.destroy');
    });
    //Team Route
    Route::group(['prefix' => 'team'], function () {
        Route::get('/list', [TeamController::class, 'index'])->name('team.index');
        Route::get('/status/{id}', [TeamController::class, 'status'])->name('team.status');
        Route::post('store', [TeamController::class, 'store'])->name('team.store');
        Route::get('edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
        Route::post('update/{id}', [TeamController::class, 'update'])->name('team.update');
        Route::delete('destroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
    });
    //Project Route
    Route::group(['prefix' => 'project'], function () {
        Route::get('/list', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/status/{id}', [ProjectController::class, 'status'])->name('project.status');
        Route::post('store', [ProjectController::class, 'store'])->name('project.store');
        Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
        Route::post('update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
        Route::get('/image/{id}', [ProjectController::class, 'image'])->name('project.image');
        Route::post('image-store', [ProjectController::class, 'imageStore'])->name('project.image.store');
        Route::delete('image-destroy/{id}', [ProjectController::class, 'imageDestroy'])->name('project.image.destroy');
    });
    //Dealer Route
    Route::group(['prefix' => 'dealer'], function () {
        Route::get('/list', [DealerController::class, 'index'])->name('dealer.index');
        Route::delete('destroy/{id}', [DealerController::class, 'destroy'])->name('dealer.destroy');
    });
});

Route::get('/clear-all-caches', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return back()->with('message', 'All Cache Clear');
})->middleware('auth')->name('clear.all.caches');