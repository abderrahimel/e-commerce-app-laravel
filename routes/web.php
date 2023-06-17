<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('view-category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productview']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart',[App\Http\Controllers\Frontend\CartController::class, 'addProduct']);
Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'deleteproduct']);
Route::post('update-cart', [App\Http\Controllers\Frontend\CartController::class, 'updatecart']);
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);
});

Route::middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class,'index']);
    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class,'add']);
    Route::post('insert-category', [App\Http\Controllers\Admin\CategoryController::class,'insert']);
    Route::get('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::put('update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::put('update-product/{id}', [App\Http\Controllers\Admin\ProductController::class,'update']);
    Route::get('delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class,'destroy']);
    Route::get('products', [App\Http\Controllers\Admin\ProductController::class,'index']);
    Route::get('add-products', [App\Http\Controllers\Admin\ProductController::class,'add']);
    Route::post('insert-product', [App\Http\Controllers\Admin\ProductController::class,'insert']);
    Route::get('edit-product/{id}',[App\Http\Controllers\Admin\ProductController::class,'edit']);
});