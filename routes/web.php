<?php

use App\Http\Controllers\cetak\CetakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\FrontendController;
use App\Http\Controllers\TransactionReturnController;

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

  Route::get('/', [FrontendController::class, 'home'])
    ->name('index');
  Route::get('/peminjaman', [FrontendController::class, 'peminjaman'])
    ->name('peminjaman');
  Route::get('/details/{slug}', [FrontendController::class, 'details'])
    ->name('details');

  
    
    // Route::get('/', [DashboardController::class, 'index'])->name('index');
    
    Route::middleware(['auth', 'verified', 'admin'])->group(function(){
      
      Route::get('/cart', [FrontendController::class, 'cart'])
      ->name('cart');
      Route::post('/cart/{id}', [FrontendController::class, 'cartAdd'])
      ->name('cart-add');
      Route::get('/read', [FrontendController::class, 'read'])
      ->name('cart-delete');
      Route::delete('/cart/{id}', [FrontendController::class, 'cartDelete'])
      ->name('cart-delete');
      Route::post('/checkout-peminjaman', [FrontendController::class, 'checkout'])
    ->name('checkout');
      Route::post('/checkout-pengembalian', [FrontendController::class, 'return'])
      ->name('return');
      // Route::post('/return', [FrontendController::class, 'checkout'])
      // ->name('checkout');
      Route::post('/return-success', [FrontendController::class, 'return'])
      ->name('return-success');
      Route::get('/checkout-success', [FrontendController::class, 'success'])
      ->name('success');
      Route::get('/pengembalian', [FrontendController::class, 'pengembalian'])
        ->name('pengembalian');
    });
  
    

Route::middleware(['auth:sanctum', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {

  // Route::get('/', [DashboardController::class, 'index'])->name('index');

  Route::get('/cetakdatabarang', [CetakController::class, 'dataBarang'])
  ->name('cetakdatabarang');
  
  Route::resource('inventory', InventoryController::class, [
    'title' => 'approval'
  ]);
  Route::resource('transaction', TransactionController::class)->only([
    'index', 'show', 'edit', 'update', 'store'
  ]);
  Route::resource('return', TransactionReturnController::class)->only([
    'index', 'show', 'edit', 'update', 'store'
  ]);
  Route::resource('user', UserController::class)->only([
    'index', 'edit', 'update', 'destroy'
  ]);
  Route::resource('gallery', GalleryController::class);
  
  
  
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














Route::get('/aditya', function () {
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
