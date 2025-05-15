<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('coffees', CoffeeController::class);
Route::get('order', [OrderController::class, 'create'])->name('order.form');
Route::post('/order/submit', [OrderController::class, 'store'])->name('order.submit');


