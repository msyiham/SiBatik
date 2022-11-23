<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;

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

//halaman customer
Route::get('/home', function () {
    return view('user.page.home');
});
Route::get('/shop', [App\Http\Controllers\ProdukController::class,'index']);
Route::get('/buy', [App\Http\Controllers\BuyController::class,'index']);
Route::get('/about', function () {
    return view('user.page.about');
});
Route::get('/profil', function () {
    return view('user.page.profil');
});
Route::get('/login', function () {
    return view('user.login.Login');
});

//halaman admin
Route::get('/a', function () {
    return view('admin.Master.Admin');
});
Route::get('/Dashbord', function () {
    return view('admin.isi.Dashbord');
});
Route::get('/Customer', function () {
    return view('admin.isi.Customer');
});
Route::get('/Produk', function () {
    return view('admin.isi.Product');
});

//crud customer
Route::get('/customers/regis', [CustomerController::class,'create'])
        ->name('customers.create');
Route::post('/customers', [CustomerController::class,'store'])
        ->name('customers.store');
// Route::resource('customers', CustomerController::class);
// hallo
// SYIHAM
//Nuafal