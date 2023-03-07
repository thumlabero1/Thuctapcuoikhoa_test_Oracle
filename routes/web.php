<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name(name : 'login');
Route::post('/store', [LoginController::class, 'store']);
//qua trung gian middleware để đăng nhập
Route::middleware(['auth'])-> group(function () 
    {

        Route::prefix('admin')->group(function (){
        
        
        Route::get('/', [MainController::class, 'index'])->name(name : 'admin');
        Route::get('main', [MainController::class, 'index']);
        // menu
        Route::prefix('menus')->group(function (){
            Route::get('add', [MenuController::class,'create']);
        });
        });

});
