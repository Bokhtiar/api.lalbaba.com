<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', [App\Http\Controllers\Auth\ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register',  [App\Http\Controllers\Auth\ApiAuthController::class, 'register'])->name('register.api');
});

Route::middleware(['auth:api', 'cors'])->group(function () {
    Route::post('/logout', [App\Http\Controllers\Auth\ApiAuthController::class, 'logout'])->name('logout.api');
    Route::get('/user/profile', [App\Http\Controllers\Auth\ApiAuthController::class, 'userProfile']);
    /*reset Password */
    Route::post('/password/change', [App\Http\Controllers\Auth\ApiAuthController::class, 'changePassword']);

    /* cart */
    Route::post('/cart/store/{id?}/{type?}/{property_id?}/{qty?}', [App\Http\Controllers\Api\CartController::class, 'store']);
    Route::post('/cart/update/{id?}', [App\Http\Controllers\Api\CartController::class, 'update']);
    Route::get('/cart/list', [App\Http\Controllers\Api\CartController::class, 'index']);

    /*order */
    Route::group(["as"=>'order.', "prefix"=>'order'],function(){
        Route::post('/store', [App\Http\Controllers\Api\OrderController::class, 'store']);
    });

    /*wishlist */
    Route::group(["as"=>'wishlist.', "prefix"=>'wishlist'],function(){
        Route::post('/store/{type?}/{id?}', [App\Http\Controllers\Api\WishlistController::class, 'store']);
        Route::get('/list/{type?}', [App\Http\Controllers\Api\WishlistController::class, 'index']);
    });
});

Route::group(['middleware' => ['cors']], function () {
    /*verify email code */
    Route::post('/verify/email', [App\Http\Controllers\Api\VerifyController::class, 'emailVerification']);
    /*reset Password */
    Route::post('/password/reset', [App\Http\Controllers\Auth\ApiAuthController::class, 'resetPassword']);
    /*banner*/
    Route::get('/banner/list', [App\Http\Controllers\Api\BannerController::class, 'index']);
    /*category*/
    Route::get('/category/list', [App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('/category/ways/subcategory', [App\Http\Controllers\Api\CategoryController::class, 'categoryWaysSubcategory']);
    /*sub category*/
    Route::get('/subcategory/list', [App\Http\Controllers\Api\SubCategoryController::class, 'index']);
    /*product*/
    Route::get('/product/list/{type?}', [App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::post('/product/search', [App\Http\Controllers\Api\ProductController::class, 'search']);
    Route::get('/category/product/{id?}/{type?}', [App\Http\Controllers\Api\ProductController::class, 'categoryProduct']);
    Route::get('/subcategory/product/{id?}/{type?}', [App\Http\Controllers\Api\ProductController::class, 'subCategoryProduct']);
    Route::get('/product/show/{id?}', [App\Http\Controllers\Api\ProductController::class, 'show']);
});



