<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home1');
});

Auth::routes();//composer require ui bootsrap --auth | it is route of authentication 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::resource('product', ProductController::class);//resource handle his 7 function of controller
route::get('/list',[ProductController::class,'listt']);
// Route::get('/product/listing', [ProductController::class, 'listing']);