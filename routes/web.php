<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

route::resource('/products', \App\Http\Controllers\ProductController::class);
route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
route::resource('/satuan', \App\Http\Controllers\SatuanController::class);
route::resource('/kustomer', \App\Http\Controllers\KustomerController::class);
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
