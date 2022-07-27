<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
// Client
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::get('products',[ProductController::class,'index'])->name('products');
Route::get('products/details/{id}',[ProductController::class,'indexDetails'])->name('products-details');
Route::get('lienhe',[ContactController::class,'index'])->name('contact');
Route::get('login',[UserController::class,'login'])->name('login');
Route::get('register',[UserController::class,'register'])->name('register');
// Admin
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('create',[UserController::class,'create'])->name('create');
        Route::get('show/{id}',[UserController::class,'show']);
        Route::delete('delete/{id}',[UserController::class,'destroy'])->name('delete');
    });
    Route::prefix('categories')->name('cate.')->group(function(){
      Route::get('/',[CategoryController::class,'index'])->name('index');
      Route::get('add',[CategoryController::class,'create'])->name('add');
      Route::post('save-add',[CategoryController::class,'store'])->name('save-add');
      Route::get('show/{id}',[CategoryController::class,'show'])->name('show');
      Route::get('edit/{id}',[CategoryController::class,'edit'])->name('edit');
      Route::put('update/{id}',[CategoryController::class,'update'])->name('update');
      Route::put('apiupdate/{id}',[CategoryController::class,'apiupdate'])->name('apiupdate');
      Route::delete('delete/{id}',[CategoryController::class,'destroy'])->name('delete');
    });
    Route::prefix('products')->name('products.')->group(function(){
       Route::get('/',[ProductController::class,'indexAdmin'])->name('index');
       Route::get('/add',[ProductController::class,'create'])->name('create');
       Route::post('/save-add',[ProductController::class,'store'])->name('store');
       Route::get('show/{id}',[ProductController::class,'show'])->name('show');
       Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
       Route::put('/update',[ProductController::class,'update'])->name('update');
       Route::put('/apiUpdate',[ProductController::class,'apiUpdate'])->name('apiUpdate');
       
    });
});