<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/',function(){
});
// Admin
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('create',[UserController::class,'create'])->name('create');
        Route::get('show/{id}',[UserController::class,'show']);
        Route::delete('delete/{id}',[UserController::class,'destroy'])->name('delete');
    });
});