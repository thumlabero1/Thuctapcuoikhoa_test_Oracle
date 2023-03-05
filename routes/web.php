<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;

Route::get('admin/users/login', [LoginController::class, 'index']);
Route::post('/store', [LoginController::class, 'store']);

Route::get('admin/main',[MainController::class, 'index'] )->name(name: 'admin');