<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/{id?}', [ProductController::class, 'productId'])->name('product');


Route::post('{id?}', [CartController::class, 'CartSave'])->name('CartSave');
Route::post('user/cart/delete/{id?}', [CartController::class, 'destroy'])->name('destroy');
Route::post('user/cart/delete/user/{id?}', [CartController::class, 'destroyAll'])->name('destroyAll');
Route::get('user/cart', [CartController::class, 'CartIndex'])->name('CartIndex');

Route::get('/search', [SearchController::class, 'Search'])->name('search');

Route::get('/contact', function () {
    return view('contacts.contact');
})->name('contact');



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('admin/users', [UserController::class, 'UserIndex'])->name('AdminUsers');
Route::get('admin/user/add', [UserController::class, 'AddUserGet'])->name('AddUserGet'); 
Route::get('admin/user/update/{id?}', [UserController::class, 'UserUpdate'])->name('UserUpdate');
Route::post('admin/user/update/{id?}', [UserController::class, 'Update'])->name('Update');
Route::post('admin/user/add', [UserController::class, 'AddUserPost'])->name('AddUserPost');
Route::post('admin/users/delete/{id?}', [UserController::class, 'UserDelete'])->name('UserDelete');


Route::get('admin/products', [AdminProductController::class, 'ProductIndex'])->name('AdminProducts');
Route::get('admin/product/update/{id?}', [AdminProductController::class, 'ProductUpdate'])->name('ProductUpdate');
Route::post('admin/product/update/{id?}', [AdminProductController::class, 'Update'])->name('Update');
Route::post('admin/product/delete/{id?}', [AdminProductController::class, 'ProductDelete'])->name('ProductDelete');

require __DIR__.'/auth.php';