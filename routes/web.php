<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Compare;
use App\Http\Livewire\Order;
use App\Http\Livewire\ShowRequest;
use App\Http\Livewire\ShowProduct;
use App\Http\Livewire\ShowProducts;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
});

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/ShowProducts', ShowProducts::class)->name('ShowProducts');
Route::get('/Compare', Compare::class)->name('Compare');
Route::get('/Product', ShowProduct::class)->name('Product');
Route::group(['middleware' => ['auth','verified']], function () {
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
    });
    Route::group(['middleware' => ['role:Admin|product-manager']], function () {
        Route::resource('products', ProductController::class);
    });


    Route::get('/ShowRequest', ShowRequest::class)->name('ShowRequest');
    Route::get('/Order', Order::class)->name('Order');

});
