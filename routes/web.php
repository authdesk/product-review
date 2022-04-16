<?php

use Illuminate\Support\Facades\Route;

//admin cobtroller define here
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;


//user cobtroller define here
use App\Http\Controllers\Frontend\UserController;


//site cobtroller define here
use App\Http\Controllers\Site\SiteController;



//Site routes

Route::get('/', [SiteController::class, 'index'])->name('/');

//product review routes
Route::resource('product-review', Site\ProductReviewController::class);





require __DIR__.'/auth.php';

//user profile

Route::middleware('auth')->group(function(){

    //frontend routes
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    //admin dashboard route
    Route::get('user-profile', [UserController::class, 'user_profile'])->name('user-profile');

});



//admin routes

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){

        //admin login route
        Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthenticatedSessionController::class, 'store'])->name('adminlogin');

    });

    Route::middleware('admin')->group(function(){

        //admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        //settings routes
        Route::resource('settings', SettingController::class);
        Route::get('active-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'active_settings']);
        Route::get('inactive-settings/{id}', [App\Http\Controllers\Admin\SettingController::class,'inactive_settings']);
        
        //super admin routes
        Route::resource('super-admin', SuperAdminController::class);
        Route::get('make-super-admin/{id}', [App\Http\Controllers\Admin\SuperAdminController::class,'make_super_admin']);
        Route::get('make-admin/{id}', [App\Http\Controllers\Admin\SuperAdminController::class,'make_admin']);

        //product routes
        Route::resource('product', ProductController::class);
        Route::get('active-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'active_product']);
        Route::get('inactive-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'inactive_product']);


        //product image routes
        Route::resource('product-image', ProductImageController::class);
        Route::get('product-images/{product}', [App\Http\Controllers\Admin\ProductImageController::class,'product_images'])->name('product-images');
        Route::get('active-product-image/{id}', [App\Http\Controllers\Admin\ProductImageController::class,'active_product_image']);
        Route::get('inactive-product-image/{id}', [App\Http\Controllers\Admin\ProductImageController::class,'inactive_product_image']);


        //product color routes
        Route::resource('product-color', ProductColorController::class);
        Route::get('product-colors/{product}', [App\Http\Controllers\Admin\ProductColorController::class,'product_colors'])->name('product-colors');
        Route::get('active-product-color/{id}', [App\Http\Controllers\Admin\ProductColorController::class,'active_product_color']);
        Route::get('inactive-product-color/{id}', [App\Http\Controllers\Admin\ProductColorController::class,'inactive_product_color']);

        //product review routes
        Route::resource('product-review', ProductReviewController::class);
        Route::get('product-reviews/{product_id}', [App\Http\Controllers\Admin\ProductReviewController::class,'product_reviews'])->name('product-reviews');
    });

    //admin logout route
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});