<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('user')
  ->namespace('USER')
  ->group(function(){
  });
  
  Route::get('/',  [DashboardController::class, 'index'])
  ->name('dashboard');


Route::get('/aditya', function(){
  return '<h1>Hello World</h1>';
});

