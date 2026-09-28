<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);
