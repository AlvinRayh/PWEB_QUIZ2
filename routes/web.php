<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\MenuController;

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
    return view('home');
}); 

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//pendaftar
Route::get('/pendaftaran', function () {
    return view('pendaftaran');
})->name('pendaftaran');
Route::post('/pendaftar', [DaftarController::class, 'store'])->name('pendaftar.store');

// Route::get('/location', function () {
//     return view('location');
// });

// Route::get('/user', function () {
//     return view('user');
// });

Route::get('/receipt', function () {
    return view('receipt');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [MenuController::class, 'index'])->name('admin');
    Route::post('/admin/add-product', [MenuController::class, 'store'])->name('menu.store');
    Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/sale', [MenuController::class, 'showSales'])->name('admin.sales');
});

// // Seller Routes
// Route::middleware('auth:seller')->group(function () {
//     Route::get('/seller', [SellerController::class, 'showSellerDashboard'])->name('seller.dashboard');
//     Route::post('/seller/location', [SellerController::class, 'storeLocation'])->name('seller.location.store');
// });

// Customer Routes
Route::middleware('auth:customer')->group(function () {
    Route::get('/user', function () {
        return view('user');
    })->name('user');
});
