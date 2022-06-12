<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you \Illuminate\Database\Eloquent\SoftDeletes register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('user')
  ->namespace('USER')
  ->group(function(){
  });
  
Route::get('/',  function(){
  return view('pages.user.home', [
    "title" => "home"
  ]);
});

// Route::get('/admin', [InventoryController::class, 'index'])
// ->name('admin');

Route::get('/admin', [InventoryController::class, 'index'])
->name('inventory');




Route::get('/peminjaman',  function(){
  return view('pages.user.peminjaman', [
    "title" => "peminjaman"
  ]);
});

Route::get('/pengembalian',  function(){
  return view('pages.user.pengembalian', [
    "title" => "pengembalian"
  ]);
});

Route::get('/checkout',  function(){
  return view('pages.user.checkout', [
    "title" => "peminjaman"
  ]);
});


// Route::get('/checkout',  function(){
//   return view('dashboard');
// });

// Route::get('/',  function(){
//   return view('dashboard');
// });






  
  
  // Route::get('/', [DashboardController::class, 'loan'])
  // ->name('peminjaman');
  
  // Route::get('/', [DashboardController::class, 'loan'])
  // ->name('peminjaman');
  
  // Route::get('/', [DashboardController::class, 'loan'])
  // ->name('peminjaman');
  
  // Route::get('/checkout-success', [DashboardController::class, 'loan'])
  // ->name('peminjaman');
  
  
Route::get('/aditya', function(){
  return '<h1>Hello World</h1>';
});

