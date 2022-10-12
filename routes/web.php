<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\matakuliahController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\cetak\CetakController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\FrontendController;
use App\Http\Controllers\TransactionReturnController;
use App\Http\Controllers\mahasiswa\MahasiswaController;
use App\Http\Controllers\otentikasi\OtentikasiController;

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
  Route::redirect('/register', '/login');
  Route::get('/', [FrontendController::class, 'home'])
    ->name('index');
  Route::get('/alat-dan-bahan', [FrontendController::class, 'barang'])
    ->name('barang');
  Route::get('/peminjaman', [FrontendController::class, 'peminjaman'])
    ->name('peminjaman');
  Route::get('/pengembalian', [FrontendController::class, 'pengembalian'])
    ->name('pengembalian');
  Route::get('/details/{slug}', [FrontendController::class, 'details'])
    ->name('details');
  Route::post('/masuk', [OtentikasiController::class, 'masuk'])
    ->name('masuk');
  Route::get('/keluar', [OtentikasiController::class, 'keluar'])
    ->name('keluar');
    Route::get('/informasi', [FrontendController::class, 'informasi'])
    ->name('informasi');
  Route::get('/email',[EmailController::class, 'email'] )
    ->name('email');
  // Route::get('/emailattach',[EmailController::class, 'attach'] )
  //   ->name('attach');
  // Route::get('/pesan',[EmailController::class, 'notif'] )
  //   ->name('notif');
  Route::post('/checkout-pengembalian/{id}', [ReturnController::class, 'return'])
  ->name('return');
  Route::get('/read', [FrontendController::class, 'read'])
  ->name('read');
  Route::get('/detail-peminjaman/{id}', [FrontendController::class, 'show'])
  ->name('showpeminjam');
  Route::get('/detail-pengembalian/{id}', [FrontendController::class, 'showpengembalian'])
  ->name('showpengembalian');
    

  
    
    // Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::middleware(['mahasiswa'])->group(function () {
  
    Route::get('/cart', [FrontendController::class, 'cart'])
    ->name('cart')->middleware('mahasiswa');
    Route::post('/cart/{id}', [FrontendController::class, 'cartAdd'])
    ->name('cart-add');

    Route::get('/incart', [FrontendController::class, 'incart'])
    ->name('incart');
    Route::post('/update-cart/{id}',[FrontendController::class, 'updatetocart'])
    ->name('cart.store');
    Route::delete('/cart/{id}', [FrontendController::class, 'cartDelete'])
    ->name('cart-delete');
    Route::post('/checkout-peminjaman', [FrontendController::class, 'checkout'])
    ->name('checkout');
    Route::post('/return-success', [FrontendController::class, 'return'])
    ->name('return-success');
    Route::get('/checkout-success', [FrontendController::class, 'success'])
    ->name('success');


    
});

    

Route::middleware(['auth', 'verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {

  // Route::get('/', [DashboardController::class, 'index'])->name('index');

  Route::get('/', [HomeController::class, 'home'])
  ->name('home');
  
  // print pdf
  Route::get('/cetakbarangTL', [CetakController::class, 'dataBarang'])
  ->name('cetakdatabarang');
  Route::get('/cetakbarangTE', [CetakController::class, 'cetakTe'])
  ->name('cetakTe');
  Route::get('/cetakpeminjaman/{id}', [CetakController::class, 'cPeminjaman'])
  ->name('cetakpeminjaman');
  Route::get('/cetakpengembalian/{id}', [CetakController::class, 'cPengembalian'])
  ->name('cetakpengembalian');
  Route::get('/ctkbulananlalu', [CetakController::class, 'ctkbulanlalu'])
  ->name('laporanbulanlalu');
  Route::get('/ctkbulanan', [CetakController::class, 'ctkbulan'])
  ->name('laporansebulan');
  Route::get('/cetakmahasiswa', [CetakController::class, 'ctkmhs'])
  ->name('cetakmahasiswa');
  
  Route::delete('/deleteloan/{id}', [ReturnController::class, 'deletebarang'])
  ->name('delete-loan');
  
  
  Route::get('/laporanlab', [CetakController::class, 'laporan'])
  ->name('laporan');
  
  
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
    'index', 'create', 'store', 'edit', 'update', 'destroy'
  ]);
  Route::resource('mahasiswa', MahasiswaController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
  ]);
  Route::resource('matakuliah', matakuliahController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
  ]);
  Route::resource('laboratorium', LaboratoriumController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
  ]);
  Route::resource('gallery', GalleryController::class);
  


});


// });

// Route::get('/admin', [InventoryController::class, 'index'])
// ->name('admin');

// Route::get('/admin/inventory/', [InventoryController::class, 'index'])
// ->name('inventory');

// Route::get('/admin/inventory/create', [InventoryController::class, 'create'])
// ->name('inventory-create');





// start configuration laravel jetstream

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});

// end configuration laravel jetstream

// route::post('/login', [LoginUserController::class, 'authenticate'])->name('login');






