<?php

use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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
