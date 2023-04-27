<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StaffController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

#homepage

Route::middleware(['auth'])->group(function () {

    // Route::prefix('shop',[App\Http\Controllers\MainController::class, 'index'])->group(function () {
    //     Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
    // });
    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        Route::prefix('producttypes')->group(function (){
        Route::get('add', [MenuController::class, 'addtype']);
        Route::post('add', [MenuController::class, 'storetype']);

        } );


        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        Route::prefix('staff')->group(function () {
            Route::get('add', [StaffController::class, 'create']);
            Route::post('add', [StaffController::class, 'store']);
            Route::get('list', [StaffController::class, 'index']);
            Route::get('edit/{staff}', [StaffController::class, 'show']);
            Route::post('edit/{staff}', [StaffController::class, 'update']);
            Route::DELETE('destroy', [StaffController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
    });
});


Route::get('/login', [App\Http\Controllers\MainController::class, 'login'])->name('login');
Route::post('login/storegoogle', [App\Http\Controllers\LoginController::class, 'storegoogle']);


Route::post('login/storeuser', [App\Http\Controllers\LoginController::class, 'storeuser']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
Route::get('/subscribe', [App\Http\Controllers\MainController::class, 'subscribe']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

//dang nhap bang google
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);

// Route::get('auth/google', [App\Http\Controllers\LoginController::class, 'redirectToGoogle'])->name('google-auth');
// Route::get('auth/google/callback',[LoginController::class, 'handleGoogleCallback']
// );

Route::get('auth/google', [App\Http\Controllers\LoginController::class, 'redirectTogoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\LoginController::class, 'handlegoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('shop')->group(function () {
    Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('user');
    });
});

// Route::prefix('shop',[App\Http\Controllers\MainController::class, 'index'])->group(function () {
//     Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
// });

Route::post('/logout', [App\Http\Controllers\MainController::class, 'logout'])->name('logout');
