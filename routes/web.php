<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryOrderController;
<<<<<<< HEAD
=======
use App\Http\Controllers\DashboardController;
>>>>>>> 05f9d31dfa95f27b5afd6b61d7c72208c5da4a13
use App\Models\User;
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

//halaman customer
Route::get('/home', function () {
    return view('user.page.home');
});
Route::get('/', function () {
    return view('user.page.home');
});

Route::get('/nyobak', [App\Http\Controllers\DashboardController::class,'totalPemesan']);

Route::get('/shop', [App\Http\Controllers\ProductController::class,'shop'])
    ->name('shop');
Route::get('/buy/{products}', [App\Http\Controllers\ProductController::class,'buy'])
    ->name('buy');
Route::get('/about', [App\Http\Controllers\AboutController::class,'about']);
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])
    ->name('profile.index');

//Login
Route::get('/login', [App\Http\Controllers\LoginController::class,'index'])
    ->name('login');
Route::get('/logout', [App\Http\Controllers\LoginController::class,'logout'])
    ->name('logout');
Route::post('/login', [App\Http\Controllers\LoginController::class,'authenticate'])
    ->name('proses.login');

//halaman admin
Route::get('/admin',[App\Http\Controllers\AdminController::class,function(){
    return redirect("Dashbord");
}]); 
Route::get('/Dashbord', [App\Http\Controllers\AdminController::class,'dashbord']);
// Route::get('/Customer', [App\Http\Controllers\AdminController::class,'customer']);
// Route::get('/Produk', [App\Http\Controllers\AdminController::class,'product']);
Route::get('/edit', [App\Http\Controllers\AdminController::class,'editproduct']);


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

Route::group(["middleware" => ["auth","middleware" => "role:".User::ROLE_USER]],function(){
    Route::group(["prefix" => "cart" , "as" => "cart."],function(){
        Route::get('/', [CartController::class,'index'])
        ->name('index');
        Route::post('/addCart', [CartController::class,'addCart'])
        ->name('addCart');
        Route::post('/updateCart', [CartController::class,'updateCart'])
        ->name('updateCart');
        Route::post('/removeCart', [CartController::class,'removeCart'])
        ->name('removeCart');
        Route::get('/clearAllCart', [CartController::class,'clearAllCart'])
        ->name('clearAllCart');
        Route::get('/checkout', [CartController::class,'checkout'])
        ->name('checkout');

    });
    Route::get('/history', [HistoryOrderController::class,'index'])
    ->name('history');
    Route::get('/history-detail/{id}', [HistoryOrderController::class,'detail'])
    ->name('history.detail');
<<<<<<< HEAD
=======
    Route::get('/back', [HistoryOrderController::class,'back'])
    ->name('back');
>>>>>>> 05f9d31dfa95f27b5afd6b61d7c72208c5da4a13
});