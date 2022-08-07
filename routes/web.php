<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StatisticalController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('homepage');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('products/details/{id}', [ProductController::class, 'indexDetails'])->name('products-details');
Route::get('lienhe', [ContactController::class, 'index'])->name('contact');
Route::post('/add-comment',[CommentController::class,'store'])->name('addComment');
// Cart
Route::post('add_cart', [CartController::class, 'store'])->name('add-cart');
Route::middleware(['auth', 'authActive'])->get('getcart', [CartController::class, 'showcart'])->name('getcart');
// Auth
Route::middleware('guest')->prefix('auth')->name('auth.')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('login');
  Route::post('login-success', [LoginController::class, 'login'])->name('login-success');
  Route::get('register', [RegisterController::class, 'index'])->name('register');
  Route::post('register-success', [RegisterController::class, 'register'])->name('register-success');
  Route::get('/login-google', [AuthController::class, 'getLoginGoogle']);
  Route::get('/google/callback', [AuthController::class, 'loginGoogleCallBack']);
  Route::get('/login-facebook', [AuthController::class, 'getLoginFacebook']);
  Route::get('/facebook/callback', [AuthController::class, 'loginFacebookCallBack']);
});
// Logout phải được tiến hành khi người dùng đã đăng nhập,nên middleware là auth
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('404', function () {
  return view('error.404');
})->name('404');
// Admin
Route::middleware(['auth', 'authActive', 'authStatus'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('/', [DashboardController::class, 'index']);
  Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::get('show/{id}', [UserController::class, 'show']);
    Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('delete');
  });
  Route::prefix('categories')->name('cate.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('add', [CategoryController::class, 'create'])->name('add');
    Route::post('save-add', [CategoryController::class, 'store'])->name('save-add');
    Route::get('show/{id}', [CategoryController::class, 'show'])->name('show');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::put('apiupdate/{id}', [CategoryController::class, 'apiupdate'])->name('apiupdate');
    Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
  });
  Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'indexAdmin'])->name('index');
    Route::get('/add', [ProductController::class, 'create'])->name('create');
    Route::post('/save-add', [ProductController::class, 'store'])->name('store');
    Route::get('show/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::put('/apiUpdate', [ProductController::class, 'apiUpdate'])->name('apiUpdate');
    Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('delete');
  });
  Route::prefix('size')->name('size.')->group(function () {
    Route::get('/', [SizeController::class, 'index'])->name('index');
    Route::get('add', [SizeController::class, 'create'])->name('add');
    Route::post('save-add', [SizeController::class, 'store'])->name('save-add');
    Route::get('edit/{id}', [SizeController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [SizeController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [SizeController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('color')->name('color.')->group(function () {
    Route::get('/', [CollorController::class, 'index'])->name('index');
    Route::get('add', [CollorController::class, 'create'])->name('add');
    Route::post('save-add', [CollorController::class, 'store'])->name('save-add');
    Route::get('edit/{id}', [CollorController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [CollorController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [CollorController::class, 'destroy'])->name('destroy');
  });
  Route::prefix('statistical')->name('statis.')->group(function(){
    Route::get('/',[StatisticalController::class,'index'])->name('index');

    Route::get('/comment',[StatisticalController::class,'comment'])->name('comment');
    Route::get('/comment/product/{id}',[StatisticalController::class,'comment_detail'])->name('comment_details');
    Route::delete('/comment/delete/{id}',[StatisticalController::class,'destroyComment'])->name('comment_delete');
    Route::get('/order',[StatisticalController::class,'order'])->name('order');
  });
});
