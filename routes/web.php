<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//halaman customer
Route::get('/home', function () {
    return view('user.page.home');
});
Route::get('/shop', [App\Http\Controllers\ProdukController::class,'index']);
Route::get('/buy', [App\Http\Controllers\BuyController::class,'index']);
Route::get('/about', [App\Http\Controllers\AboutController::class,'about']);
Route::get('/profil', function () {
    return view('user.page.profil');
});

//Login
Route::get('/login', [App\Http\Controllers\LoginController::class,'index']);
Route::post('/login', [App\Http\Controllers\LoginController::class,'authenticate'])
->name('proses.login');

//halaman admin
Route::get('/admin',[App\Http\Controllers\AdminController::class,'admin']);
Route::get('/Dashbord', [App\Http\Controllers\AdminController::class,'dashbord']);
// Route::get('/Customer', [App\Http\Controllers\AdminController::class,'customer']);
// Route::get('/Produk', [App\Http\Controllers\AdminController::class,'product']);
// Route::get('/input', [App\Http\Controllers\AdminController::class,'inputproduct']);


//crud customer
Route::get('/customers/regis', [CustomerController::class,'create'])
->name('customers.create');
Route::post('/customers', [CustomerController::class,'store'])
->name('customers.store');
Route::get('/Customer', [CustomerController::class,'index'])
->name('customers.index');
// Route::resource('customers', CustomerController::class);

//crud product
Route::get('/Produk', [ProductController::class,'index'])
->name('products.index');
Route::get('/product/create', [ProductController::class,'create'])
->name('products.create');
Route::post('/product', [ProductController::class,'store'])
->name('products.store');
