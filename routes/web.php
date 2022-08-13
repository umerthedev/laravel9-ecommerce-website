<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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



// Homepage Route
Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect', [HomeController::class, 'redirect']);

// Category Route:
Route::get('/view_catagory', [AdminController::class, 'view_catagory']);
// Add catagory
Route::post('/add_category', [AdminController::class, 'add_category']);
// delete Catagory
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::post('/update_category/{id}', [AdminController::class, 'update_category']);




// Product Route
Route::get('view_product', [ProductController::class, 'view_product']);
Route::post('add_product', [ProductController::class, 'add_product']);
Route::get('show_product', [ProductController::class, 'show_product']);
Route::get('delete_product/{id}', [ProductController::class, 'delete_product']);
Route::get('product_edit/{id}', [ProductController::class, 'product_edit']);
Route::post('update_product/{id}', [ProductController::class, 'UpdateProduct']);
