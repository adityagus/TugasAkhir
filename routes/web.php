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
  
  
Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function(){  
  
  Route::get('/',  function(){
    return view('pages.user.home', [
      "title" => "home"
    ]);
  });

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
  
  Route::get('/checkout-success',  function(){
    return view('pages.user.checkout-success', [
      "title" => "peminjaman"
    ]);
  });

});

Route::middleware(['auth:sanctum', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function(){
  
  Route::get('/', [DashboardController::class, 'index'])->name('index');
  
  Route::resource('inventory', InventoryController::class);
  // Route::resource('category', CategoryItemController::class); 
  // Route::resource('users', UserController::class); 
  
});
  
  
// });

// Route::get('/admin', [InventoryController::class, 'index'])
// ->name('admin');

// Route::get('/admin/inventory/', [InventoryController::class, 'index'])
// ->name('inventory');

// Route::get('/admin/inventory/create', [InventoryController::class, 'create'])
// ->name('inventory-create');










  

  
  
Route::get('/aditya', function(){
  return '<h1>Hello World</h1>';
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
