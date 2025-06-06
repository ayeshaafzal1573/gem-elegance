<?php

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\DiscountCodeController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

// ADMIN
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        //GOTO LOGIN PAGE
        Route::get('/signin', [AdminLoginController::class, 'index'])->name('admin.login');
        //CHECK VALIDATION AND INSERT DATA
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        //IF ADMIN IS AUTHENTICATED
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/showchange-password', [SettingController::class, 'showChangePassword'])->name('admin.showChangePassword');
        Route::post('/change-password', [SettingController::class, 'processChangePassword'])->name('account.adminchangePassword');



        // IF ADMIN IS NOT AUTHENTICATED
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');
        // CATEGORY ROUTES
        Route::get('category/list', [CategoryController::class, 'index'])->name('category.list');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category', [CategoryController::class, 'insert'])->name('category.insert');
        Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        //PRODUCT ROUTES
        Route::get('/product/list', [ProductController::class, 'index'])->name('product.list');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product', [ProductController::class, 'insert'])->name('product.insert');
        Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        //SHIPPING ROUTES
        Route::get('/shipping/create', [ShippingController::class, 'create'])->name('shipping.create');
        Route::post('/shipping/store', [ShippingController::class, 'store'])->name('shipping.store');
        Route::get('/shipping/edit/{id}', [ShippingController::class, 'edit'])->name('shipping.edit');
        Route::post('/shipping/update/{id}', [ShippingController::class, 'update'])->name('shipping.update');
        Route::get('/shipping/delete/{id}', [ShippingController::class, 'delete'])->name('shipping.delete');
        //COUPAN ROUTES
        Route::get('/coupan/create', [DiscountCodeController::class, 'create'])->name('coupan.create');
        Route::get('/coupan/list', [DiscountCodeController::class, 'index'])->name('coupan.list');
        Route::post('/coupan', [DiscountCodeController::class, 'store'])->name('coupan.store');
        Route::get('/coupan/edit/{id}', [DiscountCodeController::class, 'edit'])->name('coupan.edit');
        Route::post('/coupan/update/{id}', [DiscountCodeController::class, 'update'])->name('coupan.update');
        Route::get('/coupan/delete/{id}', [DiscountCodeController::class, 'delete'])->name('coupan.delete');
        //ORDER ROUTES
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');
        Route::post('/order/change-status/{id}', [OrderController::class, 'changeOrderStatus'])->name('orders.changeOrderStatus');

        //USER ROUTES
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/frontend-list', [BannerController::class, 'list'])->name('home.list');
        Route::get('/frontend-create', [BannerController::class, 'create'])->name('home.create');
        Route::post('/home-insert', [BannerController::class, 'store'])->name('home.insert');
        Route::get('/home-edit/{id}', [BannerController::class, 'edit'])->name('home.edit');
        Route::post('/home-update/{id}', [BannerController::class, 'update'])->name('home.update');
        Route::get('/home-delete/{id}', [BannerController::class, 'delete'])->name('home.delete');
        Route::get('/home/app', [BannerController::class, 'header'])->name('home.app');
    });

});
// FRONTEND

Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/{slug}', [FrontendController::class, 'detail'])->name('front.product-detail');
Route::get('/gem-elegance/new-arrival', [FrontendController::class, 'newarrival'])->name('front.newarrival');
Route::get('/gem-elegance/about', [FrontendController::class, 'about'])->name('front.about');
Route::get('/gem-elegance/men', [FrontendController::class, 'showMen'])->name('front.men');
Route::get('/gem-elegance/women', [FrontendController::class, 'showWomen'])->name('front.women');
Route::get('/gem-elegance/{categorySlug}', [FrontendController::class, 'Products'])->name("front.products");

//CART
Route::get('/product/cart', [CartController::class, 'cart'])->name('front.cart');
Route::post('/product/add-to-cart', [CartController::class, 'addToCart'])->name('front.addToCart');
Route::post('/product/update-cart', [CartController::class, 'updateCart'])->name('front.updateCart');
Route::delete('/delete-item/{rowId}', [CartController::class, 'deleteItem'])->name('front.deleteItem');
Route::get('/product/checkout', [CartController::class, 'checkout'])->name('front.checkout');
Route::post('/product/process-checkout', [CartController::class, 'processCheckout'])->name('front.processCheckout');
Route::get('/product/thanks/{OrderId}', [CartController::class, 'thankyou'])->name('front.thanks');
Route::post('/product/get-order-summary', [CartController::class, 'getOrderSummary'])->name('front.ordersummary');
Route::post('/product/apply-discount', [CartController::class, 'applyDiscount'])->name('front.applyDiscount');

//AUTHENTICATION

Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/user/register', [AuthController::class, 'register'])->name('account.register');
        Route::post('/process/register', [AuthController::class, 'processRegister'])->name('account.processregister');
        Route::get('/user/login', [AuthController::class, 'login'])->name('account.login');
        Route::post('/user/authenticate', [AuthController::class, 'authenticate'])->name('account.authenticate');

    });
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/user/profile', [AuthController::class, 'profile'])->name('account.profile');
        Route::get('/user/{id}/editprofile', [AuthController::class, 'editprofile'])->name('account.editprofile');
        Route::post('/user/{id}/updateprofile', [AuthController::class, 'updateprofile'])->name('account.updateprofile');
        Route::post('/user/{id}/updateaddress', [AuthController::class, 'updateAddress'])->name('account.updateaddress');
        Route::get('/user/my-order', [AuthController::class, 'order'])->name('account.order');
        Route::get('/user/order-detail/{orderId}', [AuthController::class, 'orderDetail'])->name('account.orderDetail');
        Route::get('/user/change-password', [AuthController::class, 'showchangePasswordForm'])->name('account.changePassword');
        Route::post('/user/process-change-password', [AuthController::class, 'changePassword'])->name('account.processchangePassword');
        Route::get('/user/logout', [AuthController::class, 'logout'])->name('account.logout');
    });
});
