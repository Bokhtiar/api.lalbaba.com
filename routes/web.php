<?php

use App\Http\Controllers\Admin\BannerBundleController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\VariantController;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//text clear

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["as"=>'user.', "prefix"=>'user',  "middleware"=>['auth','user']],function(){
    Route::get('dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
});

Route::group(["as"=>'admin.', "prefix"=>'admin', "middleware"=>['auth','admin']],function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
    /*banner */
    Route::resource('banner', BannerController::class);
    Route::get('banner/status/{id}', [BannerController::class, 'status'])->name('banner.status');

    /**banner bundle */
    Route::resource('banner-bundle', BannerBundleController::class);
    Route::get('banner-bundle/status/{id}', [BannerBundleController::class, 'status'])->name('banner-bundle.status');

    /*category */
    Route::resource('category', CategoryController::class);
    Route::get('category/status/{id}', [CategoryController::class, 'status'])->name('category.status');

    /*Sub category */
    Route::resource('subcategory', SubCategoryController::class);
    Route::get('subcategory/status/{id}', [SubCategoryController::class, 'status'])->name('subcategory.status');

    /*Product */
    Route::resource('product', ProductController::class);
    Route::get('product/status/{id}', [ProductController::class, 'status'])->name('product.status');
    Route::resource('variant', VariantController::class);
    Route::get('variant/status/{id}', [VariantController::class, 'status'])->name('variant.status');

    /*order */
    Route::group(["as"=>'order.', "prefix"=>'order'],function(){
        Route::resource('/', OrderController::class);
        Route::get('/type/{type}', [App\Http\Controllers\Admin\OrderController::class, 'index']);
        Route::get('/show/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('show');
        Route::get('/packed/{id}', [App\Http\Controllers\Admin\OrderController::class, 'packed'])->name('packed');
        Route::get('/out_for_delivery/{id}', [App\Http\Controllers\Admin\OrderController::class, 'out_for_delivery'])->name('out_for_delivery');
        Route::get('/delivered/{id}', [App\Http\Controllers\Admin\OrderController::class, 'delivered'])->name('delivered');
    });
    Route::get('cart/destroy/{id}', [OrderController::class, 'cart_destroy']);
    Route::get('order/status/{id}', [ProductController::class, 'status'])->name('order.status');
});


// Route::get('send-mail', function () {
//     $details = [
//     'title' => 'Mail from localhost.com',
//     'body' => 'This is for testing email using smtp'
//     ];
//     \Mail::to('bokhtiar.swe@gmail.com')->send(new PasswordReset($details));
//     dd("Email is Sent.");
//     });
