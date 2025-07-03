<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\StatusTransaksiController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;
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
Route::get('/konfirmasi-pembayaran', function () {
    return 'Halaman konfirmasi pembayaran tersedia.';
})->middleware('check.pending.payment');

Route::middleware('auth.custom')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::resource('coffees', CoffeeController::class);
    Route::get('order', [OrderController::class, 'create'])->name('order.form');
    Route::post('/order/submit', [OrderController::class, 'store'])->name('order.submit');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::resource('orders', OrderController::class)->only(['destroy']);
    
    // Pembayaran routes
    Route::get('/Pembayaran', [PembayaranController::class, 'index']);
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::post('/pembayaran/complete', [PembayaranController::class, 'completePayment'])->name('pembayaran.complete');
    Route::get('/pembayaran', [OrderController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/pembayaran/{order}', [OrderController::class, 'redirectToPembayaran']);
    Route::post('/order/proses-pembayaran', [PembayaranController::class, 'prosesPembayaran'])->name('order.proses_pembayaran');
    Route::get('/pembayaran/proses/{metode}', [PembayaranController::class, 'proses'])->name('pembayaran.proses');
    Route::get('/pembayaran/status', [PembayaranController::class, 'status'])->name('pembayaran.status');
    
    // Admin routes untuk pembayaran
    Route::get('/admin/pembayaran', [PembayaranController::class, 'allPayments'])->name('admin.pembayaran');
    Route::put('/admin/pembayaran/{id}/status', [PembayaranController::class, 'updateStatus'])->name('admin.pembayaran.update-status');
    
    Route::get('/status-transaksi', [PembayaranController::class, 'status'])->name('transaksi.status');
    Route::get('/upload', [ImageController::class, 'create']);
    Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
    Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.delete');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');









