<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderInformationController;
use App\Http\Controllers\Frontend\ProductReviewController;
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

Route::get('/', [HomeController::class, 'home']);
//Product Module
Route::get('/categories', function () {
    return view('frontend.file.category');
});
//Product
Route::get('/shop-by-space', [FrontendController::class, 'shopBySpace']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/cat/product/{slug}', [FrontendController::class, 'categoryProduct']);
Route::get('/subcat/product/{slug}', [FrontendController::class, 'subCategoryProduct']);
Route::get('/shop-by-space/product/{slug}', [FrontendController::class, 'shopBySpaceProduct']);
Route::get('/product/{slug}', [FrontendController::class, 'singleProduct']);
Route::get('/product-search', [SearchController::class, 'search']);

Route::get('/get-product-price', [SearchController::class, 'getPrice']);
//Cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('mini-cart/update', [CartController::class, 'miniCartUpdate'])->name('mini-cart.update');
Route::post('add-to-cart-product', [CartController::class, 'addToCartProduct'])->name('add_to_cart_product');
Route::post('cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::post('cart/delete', [CartController::class, 'cartDelete'])->name('cart.delete');
Route::post('/customer-pre-order-store', [FrontendController::class, 'customerPreOrderStore']);


Route::get('/get-sidebar-product', [FrontendController::class, 'getSidebarProduct'])->name('get-sidebar-product'); 

//Information
Route::get('/about-us', function () {
    return view('frontend.file.about');
});
Route::get('/privacy-policy', function () {
    return view('frontend.file.privacy');
});
Route::get('/terms-condition', function () {
    return view('frontend.file.terms');
});
Route::get('/return-policy', function () {
    return view('frontend.file.return-policy');
});
Route::get('/connect-with-us', function () {
    return view('frontend.file.contact');
});
Route::post('/messages', [FrontendController::class, 'message']);
Route::get('/e-catalogue', function () {
    return view('frontend.file.e-catalogue');
});
Route::get('/become-a-dealer', function () {
    return view('frontend.file.dealer');
});
Route::post('/dealerStore', [FrontendController::class, 'dealerStore'])->name('dealer.store');

Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/blog/{slug}', [FrontendController::class, 'singleBlog']);
Route::get('/client', [FrontendController::class, 'client']);
Route::get('/certificate', [FrontendController::class, 'certificate']);
Route::get('/video', [FrontendController::class, 'videoCategory']);
Route::get('/video/{slug}', [FrontendController::class, 'video']);
Route::get('/team', [FrontendController::class, 'team']);
Route::get('/team/{slug}', [FrontendController::class, 'singleTeam']);
Route::get('/project', [FrontendController::class, 'project']);
Route::get('/project/{slug}', [FrontendController::class, 'singleProject']);
//Auth Route
Route::get('/customer-login', [AuthController::class, 'login'])->name('customer-login');
Route::post('/login-store', [AuthController::class, 'logincheck']); 
Route::get('/customer-register', [AuthController::class, 'register']); 
Route::post('/customer-store', [AuthController::class, 'customer']);
Route::post('/customer-logout', [AuthController::class, 'logout'])->name('customer.logout');

//After customer Login
Route::group(['middleware'=>'customers','as'=>'Customer.', 'prefix'=>'customer', 'namespace'=>'Customer'],function(){
    Route::get('/dashboard', [OrderInformationController::class, 'dashboard']);
    Route::get('/all-orders', [OrderInformationController::class, 'allOrder']);
    Route::get('/order/invoice/{id}', [OrderInformationController::class, 'invoice']);
    //Profile Route
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/profile-update', [AuthController::class, 'profileUpdate']);
    //checkout
    Route::get('/checkout', [CartController::class, 'checkout']);
    //order
    Route::post('/order-store', [OrderInformationController::class, 'orderStore'])->name('order.store');
    // Review Store
    Route::post('/review-store', [ProductReviewController::class, 'reviewStore'])->name('review.store');
});

//geust checkout
Route::get('/guest-checkout', [CartController::class, 'guestCheckout']);
Route::post('/guest-order-store', [OrderInformationController::class, 'guestOrderStore']);