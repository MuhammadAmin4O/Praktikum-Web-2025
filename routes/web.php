<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

//Route::get('/', function () {
//  return view('welcome');
//})
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('registeruser', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


route::resource('/products', \App\Http\Controllers\ProductController::class);
route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
route::resource('/satuan', \App\Http\Controllers\SatuanController::class);
route::resource('/kustomer', \App\Http\Controllers\KustomerController::class);
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('printpdf', [UserController::class, 'printPDF'])->name('printuser');
Route::get('printexcel', [UserController::class, 'userExcel'])->name('exportuser');
Route::get('printpdfkategori', [KategoriController::class, 'printPDFkategori'])->name('printkategori');
Route::get('kategoriexcel', [KategoriController::class, 'kategoriExcel'])->name('exportkategori');
Route::get('printpdfproduct', [ProductController::class, 'printPDFproduct'])->name('printproduct');
Route::get('productexcel', [ProductController::class, 'productExcel'])->name('exportproduct');
