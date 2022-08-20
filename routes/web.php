<?php

use App\Http\Controllers\SupplyController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CropController;
use Illuminate\Support\Facades\Route;
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

Route::delete('/deletecrop_image/{id}',[CropController::class,'deletecrop_image']);

Route::delete('/deletecover/{id}',[CropController::class,'deletecover']);

Route::put('/crop_update/{id}',[CropController::class,'update']);

//Activity
Route::get('/activity_index',[ActivityController::class,'index'])->name('activity_index');

Route::get('/activity_create',function(){
    return view('Admin.activity_create');
    })->name('activity_create');;
Route::post('/activity_post',[ActivityController::class,'store']);

Route::delete('/delete/{id}',[ActivityController::class,'destroy']);

Route::get('/activity_edit/{id}',[ActivityController::class,'edit']);

Route::get('/activity_ver/{id}',[ActivityController::class,'show'])->name('activity_read');

Route::delete('/deleteactivity_image/{id}',[ActivityController::class,'deleteactivity_image']);

Route::delete('/deletecover/{id}',[ActivityController::class,'deletecover']);

Route::put('/activity_update/{id}',[ActivityController::class,'update']);

//Supply
Route::get('/supply_index',[SupplyController::class,'index'])->name('supply_index');

Route::get('/supply_create',function(){
    return view('Admin.supply_create');
    })->name('supply_create');;
Route::post('/supply_post',[SupplyController::class,'store']);

Route::delete('/delete/{id}',[SupplyController::class,'destroy']);

Route::get('/supply_edit/{id}',[SupplyController::class,'edit']);

Route::get('/supply_ver/{id}',[SupplyController::class,'show'])->name('supply_read');

Route::delete('/deletesupply_image/{id}',[SupplyController::class,'deletesupply_image']);

Route::delete('/deletecover/{id}',[SupplyController::class,'deletecover']);

Route::put('/supply_update/{id}',[SupplyController::class,'update']);

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';