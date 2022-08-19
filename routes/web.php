<?php

use App\Http\Controllers\CropController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;

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
    return view('auth.login');
});

//post
Route::get('/index',[PostController::class,'index'])->name('index');

Route::get('/create',function(){
return view('Admin.create');
})->name('create');;
Route::post('/post',[PostController::class,'store']);
Route::delete('/delete/{id}',[PostController::class,'destroy']);
Route::get('/edit/{id}',[PostController::class,'edit']);
Route::get('/read/{id}',[PostController::class,'show'])->name('read');

Route::delete('/deleteimage/{id}',[PostController::class,'deleteimage']);
Route::delete('/deletecover/{id}',[PostController::class,'deletecover']);

Route::put('/update/{id}',[PostController::class,'update']);

//crop
Route::get('/crop_index',[CropController::class,'index'])->name('crop_index');

Route::get('/crop_create',function(){
    return view('Admin.crop_create');
    })->name('crop_create');;
Route::post('/crop_post',[CropController::class,'store']);
Route::delete('/delete/{id}',[CropController::class,'destroy']);
Route::get('/crop_edit/{id}',[CropController::class,'edit']);
Route::get('/crop_ver/{id}',[CropController::class,'show'])->name('crop_read');

Route::delete('/deleteimage/{id}',[CropController::class,'deleteimage']);
Route::delete('/deletecover/{id}',[CropController::class,'deletecover']);

Route::put('/crop_update/{id}',[CropController::class,'update']);

//product
Route::get('/add-product', function () {
    return view('Admin.add_product');
})->middleware(['auth'])->name('add.product');

Route::post('/insert-product',[ProductController::class,'store'])->middleware(['auth']);

Route::get('/all-product',[ProductController::class,'allProduct'])->middleware(['auth'])->name('all.product');

Route::get('/available-products',[ProductController::class,'availableProducts'])->middleware(['auth'])->name('available.products');

Route::get('/purchase-products/{id}', [ProductController::class,'purchaseData'])->middleware(['auth']);

Route::post('/insert-purchase-products',[ProductController::class,'storePurchase'])->middleware(['auth']);


//invoice
Route::get('/add-invoice/{id}', [InvoiceController::class,'formData'])->middleware(['auth']);

Route::get('/new-invoice', [InvoiceController::class,'newformData'])->middleware(['auth'])->name('new.invoice');

Route::post('/insert-invoice',[InvoiceController::class,'store'])->middleware(['auth']);

Route::get('/invoice-details', function () {
    return view('Admin.invoice_details');
})->middleware(['auth'])->name('invoice.details');

Route::get('/all-invoice', [InvoiceController::class,'allInvoices'])->middleware(['auth'])->name('all.invoices');

Route::get('/sold-products',[InvoiceController::class,'soldProducts'])->middleware(['auth'])->name('sold.products');
// Route::get('/delete', [InvoiceController::class,'delete']);


//order
Route::get('/add-order/{name}', [ProductController::class,'formData'])->middleware(['auth'])->name('add.order');

Route::post('/insert-order',[OrderController::class,'store'])->middleware(['auth']);

Route::get('/all-orders',[OrderController::class,'ordersData'])->middleware(['auth'])->name('all.orders');

Route::get('/pending-orders',[OrderController::class,'pendingOrders'])->middleware(['auth'])->name('pending.orders');

Route::get('/delivered-orders',[OrderController::class,'deliveredOrders'])->middleware(['auth'])->name('delivered.orders');

Route::get('/new-order', [OrderController::class,'newformData'])->middleware(['auth'])->name('new.order');

Route::post('/insert-new-order',[OrderController::class,'newStore'])->middleware(['auth']);


//customer
Route::get('/add-customer', function () {
    return view('Admin.add_customer');
})->middleware(['auth'])->name('add.customer');

Route::post('/insert-customer',[CustomerController::class,'store'])->middleware(['auth']);

Route::get('/all-customers',[CustomerController::class,'customersData'])->middleware(['auth'])->name('all.customers');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';