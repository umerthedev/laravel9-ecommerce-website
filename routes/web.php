<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddCartController;
use App\Http\Controllers\SslCommerzPaymentController;
use Stripe\SearchResult;

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
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

// Admin Category Route:
Route::get('/view_catagory', [AdminController::class, 'view_catagory']);
// Admin Add catagory
Route::post('/add_category', [AdminController::class, 'add_category']);
// Admin delete Catagory
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::post('/update_category/{id}', [AdminController::class, 'update_category']);




// Admin Product Route
Route::get('view_product', [ProductController::class, 'view_product']);
Route::post('add_product', [ProductController::class, 'add_product']);
Route::get('/show_product', [ProductController::class, 'show_product']);
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);
Route::get('/product_edit/{id}', [ProductController::class, 'product_edit']);
Route::post('/update_product/{id}', [ProductController::class, 'UpdateProduct']);
Route::get('/product_details/{id}', [ProductController::class, 'product_details']);
Route::get('/products_show', [ProductController::class, 'products_show']);


// Admin order tables
Route::get('/cod_orders', [AdminController::class, 'cod_orders']);
Route::get('/op_orders', [AdminController::class, 'op_orders']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/cancel/{id}', [AdminController::class, 'cancel']);
Route::get('/reset/{id}', [AdminController::class, 'reset']);

// Admin PDF download
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

// Sending Mail
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);

// Order Search
Route::get('/search', [AdminController::class, 'search_data']);










//frontend Add To Cart
Route::post('/add_cart/{id}', [AddCartController::class, 'add_cart']);
Route::get('/show_cart', [AddCartController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [AddCartController::class, 'remove_cart']);

//frontend Order
Route::get('/cash_order', [AddCartController::class, 'cash_order']);

// Show and cancel Order
Route::get('/show_order', [AddCartController::class, 'show_order']);
Route::get('/cancel_order/{id}', [AddCartController::class, 'cancel_order']);

// Search Product
Route::get('/product_search', [ProductController::class, 'product_search']);
Route::get('/product_search2', [ProductController::class, 'product_search2']);





// SSLCOMMERZ Start
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END